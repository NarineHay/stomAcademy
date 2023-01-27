<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $user = User::query()->where('id',$user_id)->with('userinfo')->get();
//        dd($user);
        return view('front.personal.information',$user);
    }
}
