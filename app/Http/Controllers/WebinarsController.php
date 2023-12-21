<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Webinar;
use App\Models\WebinarInfo;

class WebinarsController extends Controller
{
    public function index(){
        return view("front.webinar.index");
    }
    function show($id){
        $slug = $id;
        $id = WebinarInfo::query()->where('slug',$slug)->value('webinar_id');
        $data['course'] = Webinar::find($id);
        $data['course']['video'] = $data['course']->info->video_invitation;
        $data['courses'] = Course::query()->get()->take(10);
        return view("front.course.show",$data);
    }
}
