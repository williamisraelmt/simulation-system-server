<?php

use App\Phase;
use App\Posibility;
use App\Schedule;
use App\Service;
use App\ServicePhase;
use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
         * Schedules
         */

        $schedule_1 = new Schedule();
        $schedule_1->description = "Matutina";
        $schedule_1->avg_income_time = 12;
        $schedule_1->save();

        $schedule_2 = new Schedule();
        $schedule_2->description = "Vespertina";
        $schedule_2->avg_income_time = 5;
        $schedule_2->save();

        /*
         * Service
         */

        $born_act = new Service();
        $born_act->description = "Solicitar acta de nacimiento";
        $born_act->save();
/*
        $id = new Service();
        $id->description = "Solicitar cédula";
        $id->save();

        $legalized_born_act = new Service();
        $legalized_born_act->description = "Solicitar acta de nacimiento legalizada";
        $legalized_born_act->save();

        $wedding_act = new Service();
        $wedding_act->description = "Solicitar acta matrimonial";
        $wedding_act->save();

        $wedding = new Service();
        $wedding->description = "Trámites de matrimonio";
        $wedding->save();*/

        /*
         * Phases
         */

        $provide_documents = new Phase();
        $provide_documents->description = "Proveer documentos";
        $provide_documents->save();

        $document_review = new Phase();
        $document_review->description = "Revisión de documentos por servicio al cliente";
        $document_review->save();

        $form_fill_out = new Phase();
        $form_fill_out->description = "Llenado de formulario";
        $form_fill_out->save();

        $template_print = new Phase();
        $template_print->description = "Impresión y verificación de plantilla por el cliente";
        $template_print->save();

        $official_document_print = new Phase();
        $official_document_print->description = "Impresión de documento oficial";
        $official_document_print->save();

        $payment = new Phase();
        $payment->description = "Pago";
        $payment->save();

        $leaving = new Phase();
        $leaving->description = "Salida";
        $leaving->save();

        $marriage_appointment = new Phase();
        $marriage_appointment->description = "Realización de cita";
        $marriage_appointment->save();

        /*
         * Acta de nacimiento
         */

        $service_phases_1_born_act = new ServicePhase();
        $service_phases_1_born_act->service_id = $born_act->id;
        $service_phases_1_born_act->phase_id = $provide_documents->id;
        $service_phases_1_born_act->execution_order = 1;
        $service_phases_1_born_act->approximate_time = 3;
        $service_phases_1_born_act->save();

        $service_phases_2_born_act = new ServicePhase();
        $service_phases_2_born_act->service_id = $born_act->id;
        $service_phases_2_born_act->phase_id = $document_review->id;
        $service_phases_2_born_act->execution_order = 2;
        $service_phases_2_born_act->approximate_time = 2;
        $service_phases_2_born_act->save();

        $service_phases_3_born_act = new ServicePhase();
        $service_phases_3_born_act->service_id = $born_act->id;
        $service_phases_3_born_act->phase_id = $template_print->id;
        $service_phases_3_born_act->execution_order = 3;
        $service_phases_3_born_act->approximate_time = 5;
        $service_phases_3_born_act->save();

        $service_phases_4_born_act = new ServicePhase();
        $service_phases_4_born_act->service_id = $born_act->id;
        $service_phases_4_born_act->phase_id = $official_document_print->id;
        $service_phases_4_born_act->execution_order = 4;
        $service_phases_4_born_act->approximate_time = 3;
        $service_phases_4_born_act->save();

        $service_phases_5_born_act = new ServicePhase();
        $service_phases_5_born_act->service_id = $born_act->id;
        $service_phases_5_born_act->phase_id = $payment->id;
        $service_phases_5_born_act->execution_order = 5;
        $service_phases_5_born_act->approximate_time = 2;
        $service_phases_5_born_act->save();

        $service_phases_6_born_act = new ServicePhase();
        $service_phases_6_born_act->service_id = $born_act->id;
        $service_phases_6_born_act->phase_id = $leaving->id;
        $service_phases_6_born_act->execution_order = 6;
        $service_phases_6_born_act->approximate_time = 0;
        $service_phases_6_born_act->save();

        /*
         *  1
         */

        $posibility_1 = new Posibility();
        $posibility_1->description = "Provee la cantidad de documentos necesaria";
        $posibility_1->service_phase_id = $service_phases_1_born_act->id;
        $posibility_1->next_service_phase_id = $service_phases_2_born_act->id;
        $posibility_1->min_interval = 0;
        $posibility_1->max_interval = 0.7099;
        $posibility_1->save();

        $posibility_2 = new Posibility();
        $posibility_2->description = "No provee la cantidad de documentos necesaria";
        $posibility_2->service_phase_id = $service_phases_1_born_act->id;
        $posibility_2->next_service_phase_id = $service_phases_6_born_act->id;
        $posibility_2->is_success = false;
        $posibility_2->min_interval = 0.71;
        $posibility_2->max_interval = 0.8099;
        $posibility_2->save();

        $posibility_3 = new Posibility();
        $posibility_3->description = "Se va porque necesita el acta de nacimiento legalizada";
        $posibility_3->service_phase_id = $service_phases_1_born_act->id;
        $posibility_3->next_service_phase_id = $service_phases_6_born_act->id;
        $posibility_3->is_success = false;
        $posibility_3->min_interval = 0.81;
        $posibility_3->max_interval = 0.9099;
        $posibility_3->save();

        $posibility_4 = new Posibility();
        $posibility_4->description = "Se va porque está cansado de esperar";
        $posibility_4->service_phase_id = $service_phases_1_born_act->id;
        $posibility_4->next_service_phase_id = $service_phases_6_born_act->id;
        $posibility_4->time_exceeding_probability = true;
        $posibility_4->is_success = false;
        $posibility_4->min_interval = 0.91;
        $posibility_4->max_interval = 1;
        $posibility_4->save();

        /*
         *  2
         */

        $posibility_1 = new Posibility();
        $posibility_1->description = "Los documentos están correctos";
        $posibility_1->service_phase_id = $service_phases_2_born_act->id;
        $posibility_1->next_service_phase_id = $service_phases_3_born_act->id;
        $posibility_1->min_interval = 0;
        $posibility_1->max_interval = 0.6099;
        $posibility_1->save();

        $posibility_2 = new Posibility();
        $posibility_2->description = "Los documentos no están correctos";
        $posibility_2->service_phase_id = $service_phases_2_born_act->id;
        $posibility_2->next_service_phase_id = $service_phases_6_born_act->id;
        $posibility_2->is_success = false;
        $posibility_2->min_interval = 0.61;
        $posibility_2->max_interval = 0.8099;
        $posibility_2->save();

        $posibility_3 = new Posibility();
        $posibility_3->description = "Se va porque está cansado de esperar";
        $posibility_3->service_phase_id = $service_phases_2_born_act->id;
        $posibility_3->next_service_phase_id = $service_phases_6_born_act->id;
        $posibility_3->time_exceeding_probability = true;
        $posibility_3->is_success = false;
        $posibility_3->min_interval = 0.81;
        $posibility_3->max_interval = 1;
        $posibility_3->save();

        /*
         * 3
         */

        $posibility_1 = new Posibility();
        $posibility_1->description = "La plantilla está correcta";
        $posibility_1->service_phase_id = $service_phases_3_born_act->id;
        $posibility_1->next_service_phase_id = $service_phases_4_born_act->id;
        $posibility_1->min_interval = 0;
        $posibility_1->max_interval = 0.6099;
        $posibility_1->save();

        $posibility_2 = new Posibility();
        $posibility_2->description = "Se imprimió la plantilla incorrecta";
        $posibility_2->service_phase_id = $service_phases_3_born_act->id;
        $posibility_2->next_service_phase_id = $service_phases_3_born_act->id;
        $posibility_2->is_success = false;
        $posibility_2->min_interval = 0.61;
        $posibility_2->max_interval = 0.8099;
        $posibility_2->save();

        $posibility_3 = new Posibility();
        $posibility_3->description = "Se va porque está cansado de esperar";
        $posibility_3->service_phase_id = $service_phases_3_born_act->id;
        $posibility_3->next_service_phase_id = $service_phases_6_born_act->id;
        $posibility_3->time_exceeding_probability = true;
        $posibility_3->is_success = false;
        $posibility_3->min_interval = 0.81;
        $posibility_3->max_interval = 1;
        $posibility_3->save();

        /*
         * 4
         */

        $posibility_1 = new Posibility();
        $posibility_1->description = "La plantilla está correcta";
        $posibility_1->service_phase_id = $service_phases_4_born_act->id;
        $posibility_1->next_service_phase_id = $service_phases_5_born_act->id;
        $posibility_1->min_interval = 0;
        $posibility_1->max_interval = .6099;
        $posibility_1->save();

        $posibility_2 = new Posibility();
        $posibility_2->description = "La plantilla es incorrecta";
        $posibility_2->service_phase_id = $service_phases_4_born_act->id;
        $posibility_2->next_service_phase_id = $service_phases_4_born_act->id;
        $posibility_2->is_success = false;
        $posibility_2->min_interval = .61;
        $posibility_2->max_interval = .8099;
        $posibility_2->save();

        $posibility_3 = new Posibility();
        $posibility_3->description = "Se va porque está cansado de esperar";
        $posibility_3->service_phase_id = $service_phases_4_born_act->id;
        $posibility_3->next_service_phase_id = $service_phases_6_born_act->id;
        $posibility_3->time_exceeding_probability = true;
        $posibility_3->is_success = false;
        $posibility_3->min_interval = .81;
        $posibility_3->max_interval = 1;
        $posibility_3->save();

        /*
         * 4
         */

        $posibility_1 = new Posibility();
        $posibility_1->description = "El documento se imprimió correctamente";
        $posibility_1->service_phase_id = $service_phases_5_born_act->id;
        $posibility_1->next_service_phase_id = $service_phases_6_born_act->id;
        $posibility_1->min_interval = 0;
        $posibility_1->max_interval = .4;
        $posibility_1->save();

        $posibility_2 = new Posibility();
        $posibility_2->description = "Hubo error en la impresión";
        $posibility_2->service_phase_id = $service_phases_5_born_act->id;
        $posibility_2->next_service_phase_id = $service_phases_5_born_act->id;
        $posibility_2->is_success = false;
        $posibility_2->min_interval = .41;
        $posibility_2->max_interval = .6;
        $posibility_2->save();

        $posibility_3 = new Posibility();
        $posibility_3->description = "Cliente desea legalizarla";
        $posibility_3->service_phase_id = $service_phases_5_born_act->id;
        $posibility_3->next_service_phase_id = $service_phases_6_born_act->id;
        $posibility_3->is_success = false;
        $posibility_3->min_interval = 0.61;
        $posibility_3->max_interval = 1;
        $posibility_3->save();

        /*
         * Acta de nacimiento legalizada
         */
/*
        $service_phases_1_legalized_born_act = new ServicePhase();
        $service_phases_1_legalized_born_act->service_id = $legalized_born_act->id;
        $service_phases_1_legalized_born_act->phase_id = $provide_documents->id;
        $service_phases_1_legalized_born_act->execution_order = 1;
        $service_phases_1_legalized_born_act->approximate_time = 15;
        $service_phases_1_legalized_born_act->save();

        $service_phases_2_legalized_born_act = new ServicePhase();
        $service_phases_2_legalized_born_act->service_id = $legalized_born_act->id;
        $service_phases_2_legalized_born_act->phase_id = $document_review->id;
        $service_phases_2_legalized_born_act->execution_order = 2;
        $service_phases_2_legalized_born_act->approximate_time = 15;
        $service_phases_2_legalized_born_act->save();

        $service_phases_3_legalized_born_act = new ServicePhase();
        $service_phases_3_legalized_born_act->service_id = $legalized_born_act->id;
        $service_phases_3_legalized_born_act->phase_id = $template_print->id;
        $service_phases_3_legalized_born_act->execution_order = 3;
        $service_phases_3_legalized_born_act->approximate_time = 5;
        $service_phases_3_legalized_born_act->save();

        $service_phases_4_legalized_born_act = new ServicePhase();
        $service_phases_4_legalized_born_act->service_id = $legalized_born_act->id;
        $service_phases_4_legalized_born_act->phase_id = $customer_verification->id;
        $service_phases_4_legalized_born_act->execution_order = 4;
        $service_phases_3_legalized_born_act->approximate_time = 15;
        $service_phases_3_legalized_born_act->approximate_time = 5;
        $service_phases_4_legalized_born_act->save();

        $service_phases_5_legalized_born_act = new ServicePhase();
        $service_phases_5_legalized_born_act->service_id = $legalized_born_act->id;
        $service_phases_5_legalized_born_act->phase_id = $official_document_print->id;
        $service_phases_5_legalized_born_act->execution_order = 5;
        $service_phases_5_legalized_born_act->save();

        $service_phases_5_legalized_born_act= new ServicePhase();
        $service_phases_5_legalized_born_act->service_id = $legalized_born_act->id;
        $service_phases_5_legalized_born_act->phase_id = $payment->id;
        $service_phases_5_legalized_born_act->execution_order = 6;
        $service_phases_5_legalized_born_act->save();

        $service_phases_5_legalized_born_act= new ServicePhase();
        $service_phases_5_legalized_born_act->service_id = $legalized_born_act->id;
        $service_phases_5_legalized_born_act->phase_id = $leaving->id;
        $service_phases_5_legalized_born_act->execution_order = 7;
        $service_phases_5_legalized_born_act->save();*/

        /*
         * Acta de matrimonio
         */
/*
        $service_phases_1_wedding_act = new ServicePhase();
        $service_phases_1_wedding_act->service_id = $wedding_act->id;
        $service_phases_1_wedding_act->phase_id = $provide_documents->id;
        $service_phases_1_wedding_act->execution_order = 1;
        $service_phases_1_wedding_act->save();

        $service_phases_2_wedding_act = new ServicePhase();
        $service_phases_2_wedding_act->service_id = $wedding_act->id;
        $service_phases_2_wedding_act->phase_id = $document_review->id;
        $service_phases_2_wedding_act->execution_order = 2;
        $service_phases_2_wedding_act->save();

        $service_phases_3_wedding_act = new ServicePhase();
        $service_phases_3_wedding_act->service_id = $wedding_act->id;
        $service_phases_3_wedding_act->phase_id = $template_print->id;
        $service_phases_3_wedding_act->execution_order = 3;
        $service_phases_3_wedding_act->save();

        $service_phases_4_wedding_act = new ServicePhase();
        $service_phases_4_wedding_act->service_id = $wedding_act->id;
        $service_phases_4_wedding_act->phase_id = $customer_verification->id;
        $service_phases_4_wedding_act->execution_order = 4;
        $service_phases_4_wedding_act->save();

        $service_phases_5_wedding_act = new ServicePhase();
        $service_phases_5_wedding_act->service_id = $wedding_act->id;
        $service_phases_5_wedding_act->phase_id = $official_document_print->id;
        $service_phases_5_wedding_act->execution_order = 5;
        $service_phases_5_wedding_act->save();

        $service_phases_6_wedding_act= new ServicePhase();
        $service_phases_6_wedding_act->service_id = $wedding_act->id;
        $service_phases_6_wedding_act->phase_id = $payment->id;
        $service_phases_6_wedding_act->execution_order = 6;
        $service_phases_6_wedding_act->save();

        $service_phases_7_wedding_act= new ServicePhase();
        $service_phases_7_wedding_act->service_id = $wedding_act->id;
        $service_phases_7_wedding_act->phase_id = $leaving->id;
        $service_phases_7_wedding_act->execution_order = 7;
        $service_phases_7_wedding_act->save();
*/
        /*
         * Wedding
         */
/*
        $service_phases_1_wedding_act = new ServicePhase();
        $service_phases_1_wedding_act->service_id = $wedding_act->id;
        $service_phases_1_wedding_act->phase_id = $provide_documents->id;
        $service_phases_1_wedding_act->execution_order = 1;
        $service_phases_1_wedding_act->save();

        $service_phases_2_wedding_act = new ServicePhase();
        $service_phases_2_wedding_act->service_id = $wedding_act->id;
        $service_phases_2_wedding_act->phase_id = $document_review->id;
        $service_phases_2_wedding_act->execution_order = 2;
        $service_phases_2_wedding_act->save();

        $service_phases_3_wedding_act = new ServicePhase();
        $service_phases_3_wedding_act->service_id = $wedding_act->id;
        $service_phases_3_wedding_act->phase_id = $template_print->id;
        $service_phases_3_wedding_act->execution_order = 3;
        $service_phases_3_wedding_act->save();

        $service_phases_4_wedding_act = new ServicePhase();
        $service_phases_4_wedding_act->service_id = $wedding_act->id;
        $service_phases_4_wedding_act->phase_id = $customer_verification->id;
        $service_phases_4_wedding_act->execution_order = 4;
        $service_phases_4_wedding_act->save();

        $service_phases_5_wedding_act= new ServicePhase();
        $service_phases_5_wedding_act->service_id = $wedding_act->id;
        $service_phases_5_wedding_act->phase_id = $payment->id;
        $service_phases_5_wedding_act->execution_order = 5;
        $service_phases_5_wedding_act->save();

        $service_phases_6_wedding_act= new ServicePhase();
        $service_phases_6_wedding_act->service_id = $wedding_act->id;
        $service_phases_6_wedding_act->phase_id = $marriage_appointment->id;
        $service_phases_6_wedding_act->execution_order = 6;
        $service_phases_6_wedding_act->save();

        $service_phases_7_wedding_act= new ServicePhase();
        $service_phases_7_wedding_act->service_id = $wedding_act->id;
        $service_phases_7_wedding_act->phase_id = $leaving->id;
        $service_phases_7_wedding_act->execution_order = 7;
        $service_phases_7_wedding_act->save();*/


    }
}
