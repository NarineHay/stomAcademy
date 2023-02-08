<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;
use App\Models\Direction;
use App\Models\User;
use App\Models\Webinar;

class HomeController extends Controller
{
    public function index()
    {
        $data['courses'] = Course::query()->withSum('webinars_object','duration')->withCount('webinars')->limit(10)->orderBy('id','desc')->get();
        $data['blogs'] = Blog::query()->limit(4)->orderBy('id','desc')->get();
        $data['lectors'] = User::query()->withCount('webinars')->where("role",User::ROLE_LECTOR)->with("lector")->limit(6)->get();
        $data['webinars'] = Webinar::query()->limit(6)->orderBy('id','desc')->get();
        $data['directions'] = Direction::all();
        return view("front.index", $data);
    }
}
