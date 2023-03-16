<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class OnlineCoursesController extends Controller
{
    public function index(){
        return view('front.online.index');
    }

    function show($id){
        $data['course'] = Course::find($id);
        return view("front.course.show",$data);
    }
}
