<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class HeaderUser extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        $data = [];
        $data['count'] = 0;
        if(Auth::user()){
            $data['user'] = Auth::user();
            $data['href'] = "";
            switch (Auth::user()->role){
                case User::ROLE_USER:
                    $data['href'] = route("personal.index");
                    break;
                case User::ROLE_ADMIN:
                    $data['href'] = route("admin.users.index");
                    break;
                case User::ROLE_LECTOR:
                    $data['href'] = "";
                    break;
                case User::ROLE_MODER:
                    $data['href'] = "";
                    break;
            }
            $items = Auth::user()->cart;
            $data['count'] = count($items);
        }

        return view('components.header-user',$data);
    }
}
