<?php

namespace App\Http\Controllers\Lector;

use App\Http\Controllers\Controller;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebinarsController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id();
        $data['webinars'] = Webinar::query()->where('user_id',$user_id);
        return view('front.lector.webinars',$data);
    }
}
