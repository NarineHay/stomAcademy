<?php

namespace App\Http\Livewire\Front;

use App\Mail\SendRegisterInfoEmail;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Mail;
class HomeLogin extends Component
{
    public $name = null;
    public $lname = null;
    public $phone = null;
    public $email = null;
    public $password = null;
    public $password_re = null;
    public $password_confirmation = null;
    public $captcha = null;

    public $error = false;

    public $type = "login";
    // public $showRecaptcha = false;

    public function render()
    {
        $previousUrl = url()->previous();

        // Parse the URL to retrieve the route name
        $previousRouteName = app('router')->getRoutes()->match(app('request')->create($previousUrl))->getName();

        if(request()->type == 'register'){
            $this->type = "register";
        }

        if($this->type == "login"){
            return view('livewire.front.home-login');
        }else{
            return view('livewire.front.home-register');
        }
    }

    public function changeType(){
        // if($this->type == "login"){
        //     $this->type = "register";
        //     $this->showRecaptcha = true;
        // }
        // else{
        //     $this->type = "login";

        // }
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
        'email' => 'required|email|unique:users',
        'name' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'password' => 'required|min:8|confirmed',
        // 'captcha' => 'required|captcha',
        // 'g-recaptcha-response' => 'required|recaptcha',
        'phone' => 'required|regex:/^\+?\d{1,3}(\s?\d{3,4}){2,3}$/',
    ];

    // private function getRecaptchaResponse()
    // {
    //     $client = new Client();
    //     $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
    //         'form_params' => [
    //             'secret' => config('services.recaptcha.secret'),
    //             'response' => $this->input('g-recaptcha-response'),
    //         ],
    //     ]);
    //     $body = json_decode((string)$response->getBody());
    //     return $body->success ? $request->input('g-recaptcha-response') : null;
    // }

    public function register(){

        $this->validate();

        // if($this->name == null || $this->lname == null){
        //      $this->error = "Пароли не совпадают555";
        //      return;

        // }
        // if(User::query()->where("email",$this->email)->exists()){
        //     $this->error = "Почта ужа используется";
        //     return;
        // }

        // if($this->password != $this->password_re){
        //     $this->error = "Пароли не совпадают";
        //     return;
        // }

        // if(strlen($this->password) < 8){
        //     $this->error = "Пароль должен содержать не менее 8 символов";
        //     return;
        // }

        $name = $this->name . ' ' . $this->lname;
        $user = User::create([
            'name' => $name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        $user->userinfo()->update([
            "fname" => $this->name,
            "lname" => $this->lname,
            "phone" => $this->phone

        ]);

        $subject = 'Вы успешно зарегистрировались на платформе Stom Academy';

        mail::send(new SendRegisterInfoEmail($this->all(), $subject));

        return $this->login();
    }

    function redirectPath(){
        if(Auth::user() && (Auth::user()->role=="admin" || Auth::user()->role=="moder")){
            return route('admin.users.index');
        }
        // else if(Auth::user()->role=="lector"){
        //     return route('lector.personal');
        // }
        return route('personal.index');
    }


}
