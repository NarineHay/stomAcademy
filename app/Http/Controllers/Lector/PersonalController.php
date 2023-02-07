<?php

namespace App\Http\Controllers\Lector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index(){
        return view('front.lector.information');
    }
}
