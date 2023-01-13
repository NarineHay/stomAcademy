<?php

namespace App\Http\Controllers;

class BlogController extends Controller
{
    function index(){
        return view("front.blog.index");
    }

    function show($blog){
        return view("front.blog.show");
    }
}
