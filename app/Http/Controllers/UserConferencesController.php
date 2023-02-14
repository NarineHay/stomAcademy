<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class UserConferencesController extends Controller
{
    public function index(){
        return view('front.personal.conferences');
    }

    public function show($id){
        $data['course'] = Course::findOrFail($id);
        return view('front.personal.conference',$data);
    }
}
