<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property boolean $type
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property string $deleted_at
 */
class User extends Authenticatable
{
    const USER_USER = 1;
    const USER_PROMOTER = 2;
    const USER_ADMIN = 3;

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'type',
    ];


    public function isAdmin()
    {
        return (int)$this->type === static::USER_ADMIN;
    }

    public function isPromoter()
    {
        return (int)$this->type === static::USER_PROMOTER;
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
