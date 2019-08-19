<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\SimulationDetailLog
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetailLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetailLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetailLog query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $client_id
 * @property string $start_time
 * @property string $end_time
 * @property int $service_phase_id
 * @property int $simulation_detail_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetailLog whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetailLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetailLog whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetailLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetailLog whereServicePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetailLog whereSimulationDetailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetailLog whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetailLog whereUpdatedAt($value)
 * @property-read \App\ServicePhase $servicePhase
 * @property-read \App\SimulationDetail $simulationDetail
 * @property int $posibility_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SimulationDetailLog wherePosibilityId($value)
 */
class SimulationDetailLog extends Model
{
    function servicePhase(): BelongsTo {
        return $this->belongsTo(ServicePhase::class);
    }

    function simulationDetail(): BelongsTo {
        return $this->belongsTo(SimulationDetail::class);
    }
}
