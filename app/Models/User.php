<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use  Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'commercial_register',
        'phone',
        'country_key',
        'type',
        'role_id',
        'image'
    ];

    public const adminRole = 'admin';
    public const storeOwnerRole = 'store-owner';
    public const userRole = 'user';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function store()
    {
        return $this->hasOne(Store::class);
    }

    public static function getPhone($phone)
    {
        $data = [];
        // if start with +
        if (substr($phone, 0, 1) == '+') {
            // Egypt
            if (substr($phone, 1, 1) == '2') {
                $data['key'] = substr($phone, 0, 2);
                $data['phone'] = substr($phone, 2);
                // saudi arabia
            } else {
                $data['key'] = substr($phone, 0, 4);
                $data['phone'] = substr($phone, 4);
            }
            // if start with '00'
        } else {
            // Egypt
            if (substr($phone, 2, 1) == '2') {
                $data['key'] = substr($phone, 0, 3);
                $data['phone'] = substr($phone, 3);
                // Saudi arabia
            } else {
                // $key = substr($phone, 0, 5);
                $data['key'] = substr($phone, 0, 5);
                $data['phone'] = substr($phone, 5);
            }
        }
        return $data;
    }
}
