<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected function password(): Attribute
    {
        return Attribute::make(
            //get: fn ($value) => ucfirst($value),
            set: fn ($value) => Hash::make($value),
        );
    }
    // protected function password()
    // {
    //     return Hash::make($value),
    //     );
    // }

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

    function cart(){
        return $this->hasMany(Cart::class,"user_id","id");
    }

    function direction_ids()
    {
        return $this->directions->pluck('direction_id')->toArray();
    }

    function access_courses(){
        return $this->hasMany(Access::class, 'user_id')->whereNotNull('course_id');
    }

    function access_webinars(){
        return $this->hasMany(Access::class, 'user_id')->whereNotNull('webinar_id');
    }

    function orders()
    {
        return $this->hasMany(Order::class);
    }

    function lector_incomes(){
        return $this->hasMany(LectorIncome::class);
    }
}
