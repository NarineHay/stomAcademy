<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDirection extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $incrementing = null;

    protected $fillable = [
        "direction_id",
        "course_id"
    ];
}
