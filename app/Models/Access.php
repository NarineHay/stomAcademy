<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'webinar_id',
        'access_time',
        'duration',
        'manager_id'
    ];

    function user(){
        return $this->hasOne(User::class,"id","user_id");
    }

    function course(){
        return $this->hasOne(Course::class,"id","course_id");
    }

    function webinar(){
        return $this->hasOne(Webinar::class,"id","webinar_id");
    }
}
