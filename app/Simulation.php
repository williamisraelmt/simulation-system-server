<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Simulation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $service_people
 * @property int $max_in_room_customers
 * @property int $max_customers
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereMaxCustomers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereMaxInRoomCustomers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereServicePeople($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereUpdatedAt($value)
 * @property int $schedule_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereScheduleId($value)
 */
class Simulation extends Model
{
    //
}
