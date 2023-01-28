<?php

namespace App\Http\Livewire\Front;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChangeInfo extends Component
{
    public $fname;
    public $lname;
    public $phone;
    public $email;
    public $password;


    public function render()
    {
        $data['user'] = Auth::user();
        $this->fname = $data['user']->userinfo->fname;
        $this->lname = $data['user']->userinfo->lname;
        $this->phone = $data['user']->userinfo->phone;
        $this->email = $data['user']->email;
        $this->password = $data['user']->password;
        return view('livewire.front.change-info',$data);
    }

    protected $rules = [
        'email' => 'required|email',
    ];

    public function changeName(){
        $data['user'] = Auth::user();
        $data['user']->userinfo->fname = $this->fname;
        $data['user']->userinfo->lname = $this->lname;
        $data['user']->userinfo->save();
    }

    public function changePhone(){
        $data['user'] = Auth::user();
        $data['user']->userinfo->phone = $this->phone;
        $data['user']->userinfo->save();
    }

    public function changeEmail(){
        $data['user'] = Auth::user();
        $data['user']->email = $this->email;
    }

    public function changePassword(){
        $data['user'] = Auth::user();
        $data['user']->password = $this->password;
    }
}
