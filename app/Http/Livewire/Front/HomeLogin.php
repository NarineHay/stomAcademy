<?php

namespace App\Http\Livewire\Front;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeLogin extends Component
{
    public $email = null;
    public $password = null;
    public $password_re = null;
    public $error = false;

    public $type = "login";

    public function render()
    {
        if($this->type == "login"){
            return view('livewire.front.home-login');
        }else{
            return view('livewire.front.home-register');
        }
    }

    public function changeType(){
        $this->type = $this->type == "login" ? "register" : "login";
    }

    public function login(){
        if(Auth::attempt(['email' => $this->email,'password' => $this->password])){
            return response()->redirectTo($this->redirectPath());
        }else{
            $this->error = "Неправильная почта или пароль";
        }
    }

    protected $rules = [
        'email' => 'required|email',
    ];
    public function register(){

        $this->validate();

        if(User::query()->where("email",$this->email)->exists()){
            $this->error = "Почта ужа используется";
            return;
        }

        if($this->password != $this->password_re){
            $this->error = "Пароли не совпадают";
            return;
        }

        if(strlen($this->password) < 8){
            $this->error = "Пароль должен содержать не менее 8 символов";
            return;
        }

        User::create([
            "email" => $this->email,
            "password" => $this->password
        ]);

        return $this->login();
    }

    function redirectPath(){
        if(Auth::user() && (Auth::user()->role=="admin" || Auth::user()->role=="moder")){
            return route('admin.users.index');
        }
        else if(Auth::user()->role=="lector"){
            return route('lector.personal');
        }
        return route('personal.index');
    }
}
