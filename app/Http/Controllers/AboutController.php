<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;

class AboutController extends Controller
{
    function index(){
        $data['lectors'] = User::query()->withCount("webinars")->where("role",User::ROLE_LECTOR)->with("lector")->limit(4)->get();
        $data['video'] = Video::query()->first();
//        if (!str_contains($data['video']->url, "player")) {
//            $data['video']->url = str_replace("vimeo.com", "player.vimeo.com/video", $data['video']->url);
//        }
        return view("front.about",$data);
    }
}
