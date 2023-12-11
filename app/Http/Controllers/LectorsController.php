<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Webinar;
use Illuminate\Http\Request;

class LectorsController extends Controller
{
    function index(){

        return view("front.lectors.index");
    }

    function show($id){
        $slug = $id;
        $id = UserInfo::query()->where('slug',$slug)->value('user_id');
        $data['lector'] = User::findOrFail($id);
//        dd(  $data['lector']->lector->info->enabled) ;
        if ($data['lector']->lector->info->enabled === false){
            abort(404);
        }
        $data['webinars'] = Webinar::all();
        return view("front.lectors.show",$data);
    }
}
