<?php

namespace App\Http\Controllers;

use App\Helpers\LG;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Direction;
use App\Models\User;
use App\Models\Video;
use App\Models\Webinar;

class HomeController extends Controller
{
    public function index()
    {
        $data['courses'] = Course::query()->where('online',0)->withSum('webinars_object','duration')->withCount('webinars')->limit(10)->orderBy('id','desc')->get();
        $data['conferences'] = Course::query()->where('online',1)->withCount('webinars')->limit(9)->orderBy('id','desc')->get();
        $data['blogs'] = Blog::query()->limit(4)->orderBy('id','desc')->get();
        $data['lectors'] = User::query()->withCount('webinars')->where("role",User::ROLE_LECTOR)->with("lector")->limit(6)->get();
        $data['webinars'] = Webinar::query()->limit(6)->orderBy('id','desc')->get();
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
