<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lector extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'direction_id',
        'photo',
        'per_of_sales',
    ];

    function user(){
        return $this->hasOne(User::class,"id","user_id");
    }

    function userinfo(){
        return $this->hasOne(User::class,"id","user_id");
    }

    function direction(){
        return $this->hasOne(Direction::class,"id","direction_id");
    }

    function webinars(){
        return $this->hasMany(Webinar::class,"user_id","id");
    }

    function courses(){
        return $this->hasMany(Course::class,"user_id","id");
    }

    function infos(){
        return $this->hasMany(LectorInfo::class,"user_id","id");
    }

    function getCourseCount(){
        $sql = 'select courses.id from webinars
                join course_webinars on course_webinars.webinar_id = webinars.id
                join courses on courses.id = course_webinars.course_id
                where webinars.user_id = '.$this->user_id.'
                GROUP by courses.id;';
        return count(DB::select(DB::raw($sql)));
    }
}
