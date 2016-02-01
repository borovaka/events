<?php

namespace App;

use Chrisbjr\ApiGuard\Models\ApiKey;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Sofa\Eloquence\Eloquence;

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
    use SoftDeletes;
    use Eloquence;

    const USER_USER = 1;
    const USER_PROMOTER = 2;
    const USER_ADMIN = 3;

    public static $roleNames = [
        self::USER_USER => 'User',
        self::USER_PROMOTER => 'Promoter',
        self::USER_ADMIN => 'Administrator',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at', 'deleted_at'
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

    public function apikey()
    {
        return $this->hasOne(ApiKey::class);
    }

    public function getTypeStringAttribute()
    {
        return self::$roleNames[$this->type];
    }

    public function setPasswordAttribute($password)
    {
        if(!empty(trim($password))) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
    
    public function getApikeyStringAttribute()
    {
        if (!is_null($this->apikey)) {
            return $this->apikey->key;
        }
        return '';
    }
    
    public function generateApiKey($key = null)
    {
        if (!is_null($this->apikey)) {
            $apiKey = $this->apikey()->delete();
        }

        $apiKey = new \Chrisbjr\ApiGuard\Models\ApiKey;
        $apiKey->user_id = $this->id;
        $apiKey->key = is_null($key) ? $apiKey->generateKey() : $key;
        $apiKey->level = 10;
        $apiKey->ignore_limits = 1;
        $apiKey->save();
    }



}
