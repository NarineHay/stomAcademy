<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_USER = "user";
    const ROLE_MODER = "moder";
    const ROLE_ADMIN = "admin";
    const ROLE_LECTOR = "lector";
    const ROLES = [self::ROLE_ADMIN,self::ROLE_USER,self::ROLE_MODER,self::ROLE_LECTOR];

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function userinfo(){
        return $this->hasOne(UserInfo::class,"user_id","id");
    }

    function directions()
    {
        return $this->hasMany(UserDirection::class, "user_id", "id");
    }

    function course(){
        return $this->hasOne(Course::class,"user_id","id");
    }

    function lector(){
        return $this->hasOne(Lector::class,"user_id","id");
    }

    function webinars(){
        return $this->hasMany(Webinar::class,"user_id","id");
    }

    function balance(){
        return $this->hasOne(Balance::class,"user_id","id");
    }
}
