<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\ServicePhase
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePhase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePhase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePhase query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $service_id
 * @property int $phase_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePhase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePhase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePhase wherePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePhase whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePhase whereUpdatedAt($value)
 * @property int $execution_order
 * @property-read \App\Phase $phase
 * @property-read \App\Service $service
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePhase whereExecutionOrder($value)
 * @property float $approximate_time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicePhase whereApproximateTime($value)
 */
class ServicePhase extends Model
{
    function service(): BelongsTo {
        return $this->belongsTo(Service::class);
    }

    function phase(): BelongsTo {
        return $this->belongsTo(Phase::class);
    }
}
