<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Phase
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phase query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $description
 * @property float $approximate_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phase whereApproximateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phase whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Phase whereUpdatedAt($value)
 */
class Phase extends Model
{
    //
}
