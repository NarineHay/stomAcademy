<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class LectorProfile extends Component
{
    public function __construct(){}

    public function render()
    {
        $data['user'] = Auth::user();
        return view('components.lector-profile',$data);
    }
}
