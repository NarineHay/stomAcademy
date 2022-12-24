<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Course extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'start_date',
        'end_date',
        'video',
        'price_id',
        'url_to_page',
        'image',
    ];

    function price(){
        return $this->hasOne(Prices::class,"id","price_id");
    }

    function webinars()
    {
        return $this->hasMany(CourseWebinar::class, "course_id", "id");
    }

    function infos(){
        return $this->hasMany(CourseInfo::class,"","id");
    }

    function info(){
        $lg_id = Session::get("lg");
        return $this->hasOne(CourseInfo::class,"course_id",'id')
            ->where("lg_id",$lg_id);
    }
}
