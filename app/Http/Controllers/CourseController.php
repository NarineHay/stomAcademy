<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    function index(){
        $data['webinar'] = Course::all();
        return view("front.webinar.index",compact('data'));
    }
}
