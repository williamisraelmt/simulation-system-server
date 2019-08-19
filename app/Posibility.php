<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Posibility
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posibility newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posibility newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posibility query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $is_success
 * @property int $time_exceeding_probability
 * @property float $probability
 * @property int $service_phase_id
 * @property int $next_service_phase_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posibility whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posibility whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posibility whereIsSuccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posibility whereNextServicePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posibility whereProbability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posibility whereServicePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posibility whereTimeExceedingProbability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posibility whereUpdatedAt($value)
 * @property-read \App\ServicePhase $nextServicePhase
 * @property-read \App\ServicePhase $servicePhase
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posibility whereDescription($value)
 * @property float $min_interval
 * @property float $max_interval
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posibility whereMaxInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posibility whereMinInterval($value)
 */
class Posibility extends Model
{
    function servicePhase(): BelongsTo {
        return $this->belongsTo(ServicePhase::class);
    }

    function nextServicePhase(): BelongsTo {
        return $this->belongsTo(ServicePhase::class, 'next_service_phase_id');
    }

}
