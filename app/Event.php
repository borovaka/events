<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sofa\Eloquence\Eloquence;

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
    use Eloquence;

    protected $dates = ['start_date'];

    protected $hidden = ['user_id','created_at','updated_at','deleted_at'];

    protected $fillable = ['event_name', 'event_desc', 'start_date', 'quantity', 'price', 'discount','discount','promocode'];

    protected $searchableColumns = ['event_name', 'event_desc','user.name'];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function ticket() {
        return $this->hasMany(Ticket::class);
    }


}
