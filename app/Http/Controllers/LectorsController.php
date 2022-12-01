<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\User;
use Illuminate\Http\Request;

class LectorsController extends Controller
{
    function index(){
        $data['lectors'] = User::query()->where("role",User::ROLE_LECTOR)->with("lector")->paginate(15);
        $data['directions'] = Direction::all();
        return view("front.lectors.index",$data);
    }

    function show($lector){
        return view("front.lectors.show");
    }
}
