<?php

namespace App\Http\Controllers;

use App\Helpers\LG;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Direction;
use App\Models\IndexContent;
use App\Models\User;
use App\Models\Video;
use App\Models\Webinar;

class HomeController extends Controller
{
    public function index()
    {
        $content = IndexContent::find(1);
        $data['courses'] = Course::query()->where('online',0)->whereIn("id",$content['popular'])->withSum('webinars_object','duration')->withCount('webinars')->get();
        $data['courses_new'] = Course::query()->where('online',0)->whereIn("id",$content['new'])->withSum('webinars_object','duration')->withCount('webinars')->get();
//        dd($data['courses_new']->count());
        $data['conferences'] = Course::query()->where('online',1)->whereIn("id",$content['online_co'])->withCount('webinars')->get();
        $data['blogs'] = Blog::query()->whereIn("id",$content['articles'])->limit(4)->get();
        $data['lectors'] = User::query()->whereIn("id",$content['lectors'])->withCount('webinars')->where("role",User::ROLE_LECTOR)->with("lector")->limit(6)->get();
        $data['webinars'] = Webinar::query()->whereIn("id",$content['online_le'])->limit(6)->get();
        $data['directions'] = Direction::all();
        $data['videos'] = Video::all();
        return view("front.index", $data);
    }

    function change_lg($lg_id){
        LG::set($lg_id);
        return back();
    }

    function change_cur($cur_id){
        return back()->withCookie("currency_id",$cur_id);
    }
}
