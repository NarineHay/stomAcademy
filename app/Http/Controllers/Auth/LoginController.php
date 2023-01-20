<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\LG;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function redirectPath(){
        if(Auth::user() && (Auth::user()->role=="admin" || Auth::user()->role=="moder")){
            LG::set(1);
            Carbon::setLocale('ru');
            return route('admin.users.index');
        }
        else if(Auth::user()->role=="lector"){
            return route('lector');
        }
        return route('account');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
