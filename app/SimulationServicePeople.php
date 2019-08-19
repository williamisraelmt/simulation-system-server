<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SimulationServicePeople
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationServicePeople newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationServicePeople newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationServicePeople query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $service_cashier
 * @property bool|null $available
 * @property int $simulation_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationServicePeople whereAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationServicePeople whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationServicePeople whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationServicePeople whereServiceCashier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationServicePeople whereSimulationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationServicePeople whereUpdatedAt($value)
 */
class SimulationServicePeople extends Model
{
    protected $casts = [
        'available' => 'boolean'
    ];
}
