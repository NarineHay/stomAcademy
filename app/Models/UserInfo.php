<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable=[
        'user_id',
        'fname',
        'lname',
        'youtube_email',
        'phone',
        'birth_date',
        'country_id',
        'city',
        'status',
        'image',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function user(){
        return $this->belongsTo(User::class,"id","user_id");
    }

    function country(){
        return $this->hasOne(Country::class,"id","country_id");
    }

    function GetFullNameAttribute(){
        return $this->fname . " " . $this->lname;
    }
}
