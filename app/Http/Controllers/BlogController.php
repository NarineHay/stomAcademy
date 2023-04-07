<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Direction;

class BlogController extends Controller
{

    function index(){
//        $data['directions'] = Direction::query()->where("id",$this->direction_id);
        return view("front.blog.index");
    }

    function show($id){
        $data['blog'] = Blog::findOrFail($id);
        $data['blogs'] = Blog::query()->whereNot("id",$id)->orderBy('id','desc')->take(2)->get();
        return view("front.blog.show",$data);
    }
}
