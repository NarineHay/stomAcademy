<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'course_id',
        'name_x',
        'name_y',
        'hour_x',
        'hour_y',
        'id_x',
        'id_y',
        'type',
        'hours_number',
        'date',
        'image'
    ];

    function course(){
        return $this->hasOne(Course::class,"id","course_id");
    }

//    function user(){
//        return $this->hasOne(User::class,"id","user_id");
//    }
}
