<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class SupportChat extends Component
{
    public $chat;
    public function render()
    {
        return view('livewire.front.support-chat');
    }
}
