<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CourseController extends Controller
{
    function index(){
        return view("front.course.index");
    }
}
