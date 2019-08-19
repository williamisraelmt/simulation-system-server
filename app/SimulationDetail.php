<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\SimulationDetail
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetail query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $client
 * @property int $service_phase_id
 * @property int $done
 * @property string $start_time
 * @property string $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetail whereClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetail whereDone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetail whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetail whereServicePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetail whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetail whereUpdatedAt($value)
 * @property-read \App\ServicePhase $servicePhase
 * @property int $simulation_service_people_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetail whereSimulationServicePeopleId($value)
 * @property int|null $simulation_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetail whereSimulationId($value)
 */
class SimulationDetail extends Model
{

    protected $casts = [
        'done' => 'boolean'
    ];

    function servicePhase(): BelongsTo {
        return $this->belongsTo(ServicePhase::class);
    }
}
