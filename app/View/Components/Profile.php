<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Profile extends Component
{
    public function __construct(){}

    public function render()
    {
        $data['user'] = Auth::user();
        return view('components.profile',$data);
    }
}
