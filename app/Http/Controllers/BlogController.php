<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index(){
        return view("front.blog.index");
    }

    function show($blog){
        return view("front.blog.show");
    }
}
