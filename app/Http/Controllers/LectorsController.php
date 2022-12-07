<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\User;
use Illuminate\Http\Request;

class LectorsController extends Controller
{
    function index(){

        return view("front.lectors.index");
    }

    function show($lector){
        return view("front.lectors.show");
    }
}
