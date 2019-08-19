<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\DiscardedPosibility
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscardedPosibility newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscardedPosibility newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscardedPosibility query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $simulation_detail_id
 * @property int $posibility_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscardedPosibility whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscardedPosibility whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscardedPosibility wherePosibilityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscardedPosibility whereSimulationDetailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DiscardedPosibility whereUpdatedAt($value)
 * @property-read \App\Posibility $posibility
 * @property-read \App\SimulationDetail $simulationDetail
 */
class DiscardedPosibility extends Model
{
    function simulationDetail(): BelongsTo {
        return $this->belongsTo(SimulationDetail::class);
    }
    function posibility(): BelongsTo {
        return $this->belongsTo(Posibility::class);
    }
}
