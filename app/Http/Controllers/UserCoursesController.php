<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Direction;
use Illuminate\Http\Request;

class UserCoursesController extends Controller
{
    public function index(){
        return view('front.personal.courses');
    }

    public function show($id){
        $course = Course::findOrFail($id);
        $data['webinar'] = $course->webinars_object->first();
        return view('front.personal.course',$data);
    }
}
