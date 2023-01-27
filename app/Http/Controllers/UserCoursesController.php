<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class UserCoursesController extends Controller
{
    public function index(){
        return view('front.personal.courses');
    }

    public function show($id){
        $data['course'] = Course::findOrFail($id);
        return view('front.personal.course',$data);
    }
}
