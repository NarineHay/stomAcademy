<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'description',
        'video',
        'price_id',
        'url_to_page',
    ];

    function price(){
        return $this->hasOne(Prices::class,"id","price_id");
    }

    function webinars()
    {
        return $this->hasMany(CourseWebinar::class, "course_id", "id");
    }
}
