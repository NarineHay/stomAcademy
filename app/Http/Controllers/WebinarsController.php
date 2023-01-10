<?php

namespace App\Http\Controllers;


class WebinarsController extends Controller
{
    public function index(){
        return view("front.webinar.index");
    }
}
