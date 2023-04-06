<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Webinar;

class WebinarsController extends Controller
{
    public function index(){
        return view("front.webinar.index");
    }
    function show($id){
        $data['course'] = Webinar::find($id);
        $data['courses'] = Course::query()->get()->random(10);
        return view("front.course.show",$data);
    }
}
