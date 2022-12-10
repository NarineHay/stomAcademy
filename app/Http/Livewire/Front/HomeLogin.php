<?php

namespace App\Http\Livewire\Front;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeLogin extends Component
{
    public $email = null;
    public $password = null;
    public $error = false;

    public function render()
    {
        return view('livewire.front.home-login');
    }

    public function login(){
        if(Auth::attempt(['email' => $this->email,'password' => $this->password])){
            return response()->redirectTo($this->redirectPath());
        }else{
            $this->error = "Неправильная почта или пароль";
        }
    }

    function redirectPath(){
        if(Auth::user() && (Auth::user()->role=="admin" || Auth::user()->role=="moder")){
            return route('admin.users.index');
        }
        else if(Auth::user()->role=="lector"){
            return route('lector');
        }
        return route('account');
    }
}
