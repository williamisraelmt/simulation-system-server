<?php

namespace App\Console\Commands;

use App\Posibility;
use App\Schedule;
use App\Service;
use App\ServicePhase;
use App\Simulation;
use App\SimulationDetail;
use App\SimulationDetailLog;
use App\SimulationServicePeople;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


        $service_people = 3;
        $schedule_id = Schedule::first()->id;

        $counter = 0;
        $counter_limit = 20;

        $done = false;  // TODO: Esto es para probar

        // Creando el header de la simulación
        $simulation = new Simulation();
        $simulation->service_people = $service_people;
        $simulation->max_in_room_customers = 0;
        $simulation->max_customers = $counter_limit;
        $simulation->schedule_id = $schedule_id;
        $simulation->save();

        // Creando las personas en servicio.
        $service_people_counter = 0;

        while ($service_people_counter < $simulation->service_people) {
            $simulation_service_people = new SimulationServicePeople();
            $simulation_service_people->simulation_id = $simulation->id;
            $simulation_service_people->service_cashier = $service_people_counter + 1;
            $simulation_service_people->save();
            $service_people_counter++;
        }

        $initial_time = Carbon::now();

        // Creando el detalle de la simulación
        while ($counter < $counter_limit) {
            $start_time = $initial_time->toTimeString();
            if (1 === 1  && !$done) { // Define si se insertará un cliente de forma random. mt_rand(0, 1)   // TODO: Esto es para probar
                $client_counter = 0;
                #TODO: Reemplazar 1,3 por min_range y max_range de schedules
                while ($client_counter < mt_rand(1, 1)) { // Insertará una cantidad random de clientes dependiendo de la tanda.
                    $simulation_detail = new SimulationDetail();
                    $simulation_detail->client = mt_rand(0, 100000);
                    $simulation_detail->start_time = $start_time;
                    $simulation_detail->end_time = $start_time;
                    $simulation_detail->simulation_id = $simulation->id;
                    $simulation_detail->save();
                    echo "Customer " . $simulation_detail->client . " arrived at " . $start_time . "\n";
                    $client_counter++;
                }
                $done = true; // TODO: Esto es para probar
            } else {
                echo "No hay clientes nuevas \n";
            }

            // Trabajando con los clientes que ya están en queue y no han terminado de ser atendidos.
            $being_assisted_customers = SimulationDetail
                ::whereNotNull('simulation_service_people_id')
                ->whereSimulationId($simulation->id)
                ->whereDone(false)
                ->get()
                ->toArray();

            foreach ($being_assisted_customers as $row) :
                echo "Trabajando con clientes que necesitan asistencia... \n";
                $customer = SimulationDetail::whereId($row['id'])->whereSimulationId($simulation->id)->first();
                echo "Trabajando con el cliente $customer->client \n";
                $customer_start_time = Carbon::createFromTimeString($customer['start_time']);
                $customer_end_time = Carbon::createFromTimeString($customer['end_time']);
                // Si el tiempo que el cliente ha durado es menor al tiempo aproximado que dura el proceso, quiere decir que el cliente no ha terminado

                if ($customer_start_time->diffInSeconds($customer_end_time) < 2) { // < $customer->servicePhase->approximate_time
                    $customer->end_time = $customer_end_time->addSeconds(1)->toTimeString();
                    $customer->save();
                } else {
                    $random = mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax(); // Random entre 0 y 1
                    $probability = Posibility::
                    whereRaw("$random BETWEEN min_interval AND max_interval AND service_phase_id =" . $customer->servicePhase->id)
                    ->first(); // Buscando la probabilidad random

                    // Guardando los logs para saber la hora de inicio y la hora final
                    $simulation_log = new SimulationDetailLog();
                    $simulation_log->simulation_detail_id = $customer->id;
                    $simulation_log->service_phase_id = $customer->service_phase_id;
                    $simulation_log->start_time = $customer->start_time;
                    $simulation_log->end_time = $initial_time;
                    $simulation_log->posibility_id = $probability->id;
                    $simulation_log->save();

                    // Actualizando el detalle para pasar a la siguiente fase
                    $customer->start_time = $customer->end_time; // Terminando el proceso
                    $customer->service_phase_id = $probability->next_service_phase_id; // Terminando el proceso
                    $customer->save();

                    // Poniendo disponible a la persona de servicio al cliente y marcando que el cliente ya terminó
                    if ($customer->service_phase_id === ServicePhase::whereServiceId($customer->servicePhase->service->id)->orderByDesc('execution_order')->first()->execution_order) {
                        $service_people = SimulationServicePeople::findOrFail($customer->simulation_service_people_id);
                        $service_people->available = 1;
                        $service_people->save();
                        $customer->simulation_service_people_id = null;
                        $customer->done = 1;
                        echo "El cliente " . $customer->id . " salió por " . $probability->description . "\n";
                        $customer->save();
                    }

                }

            endforeach;

            $available_simulation_service_people = SimulationServicePeople::whereAvailable(1)->whereSimulationId($simulation->id)->get()->toArray(); // Buscando cajeros disponibles
            $on_queue_customers = SimulationDetail::whereDone(0)->whereSimulationId($simulation->id)->whereNull('simulation_service_people_id')->orderBy('start_time')->get()->toArray();

            // Insertando nuevas personas para ser atendidas.
            if (!empty($available_simulation_service_people) && !empty($on_queue_customers)) {
                echo "Poniendo personas en servicio \n";
                foreach ($available_simulation_service_people as $row) : // Por cada persona de servicio al cliente disponible, toma el cliente que primero llegó.

                    try {

                        $customer = SimulationDetail::whereSimulationId($simulation->id)->whereId($on_queue_customers[0]['id'])->first();

                        $service_people = SimulationServicePeople::whereSimulationId($simulation->id)->whereId($row['id'])->first();
                        $service_people->available = false;
                        $service_people->save();
                        $working_time = $customer->end_time ?? $customer->start_time;

                        $customer->end_time = Carbon::createFromTimeString($working_time)
                            ->addSeconds(1)
                            ->toTimeString(); // Agregando un segundo más al tiempo de espera del cliente

                        $customer->service_phase_id = Service::with('servicePhases')->inRandomOrder()->first()->servicePhases->first()->id;
                        $customer->simulation_service_people_id = $row['id'];
                        $customer->save();

                        array_shift($on_queue_customers);

                    } catch (\Exception $e) {
                        echo $e->getMessage();
                        die();
                    }
                    if (empty($on_queue_customers)) { // Si ya no hay más personas en queue, sale del ciclo.
                        break;
                    }

                endforeach;

            }

            $initial_time->addSeconds(1);
            sleep(5);
            $counter++;
        }

    }
}
