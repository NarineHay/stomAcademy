<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\User;
use App\Models\Webinar;
use Illuminate\Http\Request;

class LectorsController extends Controller
{
    function index(){

        return view("front.lectors.index");
    }

    function show($id){
        $data['lector'] = User::findOrFail($id);
        $data['webinars'] = Webinar::all();
        return view("front.lectors.show",$data);
    }
}
