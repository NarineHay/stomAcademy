<?php

namespace App\Http\Controllers;


use App\Models\Course;

class WebinarsController extends Controller
{
    public function index(){
        return view("front.webinar.index");
    }
    function show($id){
        $data['course'] = Course::find($id);
        return view("front.course.show",$data);
    }
}
