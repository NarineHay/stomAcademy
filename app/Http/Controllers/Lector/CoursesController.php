<?php

namespace App\Http\Controllers\Lector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(){
        return view('front.lector.courses');
    }
}
