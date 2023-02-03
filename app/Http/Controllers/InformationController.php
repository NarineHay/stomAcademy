<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public function index(){
        return view('front.personal.information');
    }

    public function deleteAccount(){
        $user = Auth::user();
        $user->delete();
        return redirect()->route("home");
    }
}
