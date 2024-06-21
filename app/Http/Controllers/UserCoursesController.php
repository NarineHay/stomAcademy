<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Course;
use App\Models\CourseWebinar;
use App\Models\Direction;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCoursesController extends Controller
{
   
    public function index(){
        return view('front.personal.courses');
    }

    public function show($id){

        $data['webinar'] = Webinar::findOrFail($id);
        $course_id = CourseWebinar::query()->where("webinar_id",$id)->first();
        $data['other_webinars'] = [];
        $accesses = Access::query()
            ->where("user_id",Auth::user()->id)
            ->where("course_id",$course_id->course_id)
            ->first();
        if($accesses){

            $data['other_webinars'] = Webinar::query()
                ->whereIn("id",CourseWebinar::query()->where("course_id",$course_id->course_id)->get()->map(function ($item){
                    return $item->webinar_id;
                })->filter(function ($item) use ($id) { return $item != $id; })->toArray())->get();
        }
        return view('front.personal.course',$data);
    }
}
