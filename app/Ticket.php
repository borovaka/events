<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Ticket
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $event_id
 * @property integer $quantity
 * @property float $raw_price
 * @property float $price
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 */
class Ticket extends Model
{
    use SoftDeletes;

    protected $fillable = ['event_id','quantity','price','raw_price'];

    protected $hidden = ['user_id', 'event_id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
