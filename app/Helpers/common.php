<?php


use App\Models\Course;
use App\Models\Webinar;

 function courses()
    {

        return Course::all();
    }
function webinars()
    {

        return Webinar::all();
    }
