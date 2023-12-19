<?php

namespace App\Http\Controllers;

use App\Models\IndexContent;
use App\Models\User;
use App\Models\Video;

class AboutController extends Controller
{
    function index(){
        $content = IndexContent::find(1);
        $data['lectors'] = User::query()->whereIn("id",$content['lectors'])->withCount('webinars')->where("role",User::ROLE_LECTOR)->with("lector")->get();
        $data['video'] = Video::query()->first();
//        if (!str_contains($data['video']->url, "player")) {
//            $data['video']->url = str_replace("vimeo.com", "player.vimeo.com/video", $data['video']->url);
//        }
        return view("front.about",$data);
    }
}
