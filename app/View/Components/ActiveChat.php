<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ActiveChat extends Component
{
    public function __construct()
    {

    }
    public function render()
    {
        return view('components.active-chat');
    }
}
