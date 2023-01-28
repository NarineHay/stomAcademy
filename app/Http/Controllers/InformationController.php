<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public function index(){
        return view('front.personal.information');
    }

    public function deleteAccount(User $user){
        $user->delete();
        return route('home');

//        $user = Auth::user()->id;
//        User::query()->where('id',$user)->delete();
    }
}
