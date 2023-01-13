<?php

namespace App\Http\Controllers;

use App\Models\User;

class AboutController extends Controller
{
    function index(){
        $data['lectors'] = User::query()->withCount("webinars")->where("role",User::ROLE_LECTOR)->with("lector")->limit(4)->get();
        return view("front.about",$data);
    }
}
