<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\PosibilityRecommendation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PosibilityRecommendation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PosibilityRecommendation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PosibilityRecommendation query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $description
 * @property int $posibility_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PosibilityRecommendation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PosibilityRecommendation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PosibilityRecommendation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PosibilityRecommendation wherePosibilityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PosibilityRecommendation whereUpdatedAt($value)
 * @property-read \App\Posibility $posibility
 */
class PosibilityRecommendation extends Model
{
    function posibility(): BelongsTo {
        return $this->belongsTo(Posibility::class);
    }
}
