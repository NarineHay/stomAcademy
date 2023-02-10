<?php

namespace App\Models;

use App\Helpers\LG;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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
        'direction_id',
        'online',
    ];

    function price(){
        return $this->hasOne(Prices::class,"id","price_id");
    }

    function directions(){
        return $this->hasOne(Direction::class,"id","direction_id");
    }

    function webinars()
    {
        return $this->hasMany(CourseWebinar::class, "course_id", "id");
    }

    function webinars_object(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Webinar::class,CourseWebinar::class,"course_id",'id','id','webinar_id');
    }

    function getDuration(){
        $sql = 'SELECT sum(webinars.duration) as duration FROM course_webinars JOIN webinars on webinars.id = course_webinars.webinar_id WHERE course_id = '.$this->id;
        $minute = collect(DB::select(DB::raw($sql)))->first()->duration;
        return CarbonInterval::minutes($minute)->cascade()->forHumans();
    }

    function infos(){
        return $this->hasMany(CourseInfo::class,"","id");
    }

    function info(){
        $lg_id = LG::get();
        return $this->hasOne(CourseInfo::class,"course_id",'id')
            ->where("lg_id",$lg_id);
    }

    function getWebinarsCount(){
        return count($this->getWebinars());
    }


    function getWebinars(){
        $sql = 'select courses.id from webinars
                join course_webinars on course_webinars.webinar_id = webinars.id
                join courses on courses.id = course_webinars.course_id
                where webinars.user_id = '.$this->user_id.'
                GROUP by courses.id';
        $ids = [];
        foreach (DB::select(DB::raw($sql)) as $item){
            $ids[] = $item->id;
        }
        return Course::query()->whereIn("id",$ids)->get();
    }

    function getLectors(){
        $webinars = $this->webinars_object;
        return collect($webinars)->map(function ($webinar){
            return $webinar->user;
        })->unique("id")->values();
    }

}
