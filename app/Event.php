<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Event
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $event_name
 * @property string $event_desc
 * @property \Carbon\Carbon $start_date
 * @property integer $quantity
 * @property float $price
 * @property float $discount
 * @property string $promocode
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 */
class Event extends Model
{

    use SoftDeletes;

    protected $dates = ['start_date'];

    protected $hidden = ['user_id'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
