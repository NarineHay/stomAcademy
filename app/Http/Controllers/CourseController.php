<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Webinar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CourseController extends Controller
{
    function index(){
        return view("front.course.index");
    }

    function show($id){
        $data['course'] = Course::find($id);
        $data['courses'] = Course::query()->get()->take(10);
        return view("front.course.show",$data);
    }

    function all(){
        return view("front.catalog");
    }
}
