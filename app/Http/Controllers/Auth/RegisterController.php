<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'regex:/^(\+?\d{1,3}|\(\+?\d{1,3}\))?\s?\d{10}$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $name = $data['name'] . ' ' . $data['lname'];
        $user = User::create([
            'name' => $name,
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        $user->userinfo()->update([
            "fname" => $data['name'],
            "lname" => $data['lname'],
            "phone" => $data['phone']

        ]);

        return $user;

    }

    function redirectPath(){
        if(Auth::user()->role=="lector"){
            return route('lector');
        }
        return route('account');
    }
}
