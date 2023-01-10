<?php

namespace App\Http\Controllers;


use App\Models\Course;

class HomeController extends Controller
{

    public function index()
    {
        $data['courses'] = Course::all();
        return view("front.index", $data);
    }
}
