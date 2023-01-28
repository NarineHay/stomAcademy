<?php

namespace App\Http\Livewire\Front;

use App\Models\Direction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChangeProfileInfo extends Component
{
    public $name;
    public $fname;
    public $lname;
    public $phone;
    public $birth_date;
    public $hospital;
    public $experience;
    public $education;
    public $directions = [];


    public function render()
    {
        $data['user'] = Auth::user();
        $data['directions'] = Direction::all();
        $this->name = $data['user']->name;
        $this->fname = $data['user']->userinfo->fname;
        $this->lname = $data['user']->userinfo->lname;
        $this->phone = $data['user']->userinfo->phone;
        $this->birth_date = $data['user']->userinfo->birth_date;

        return view('livewire.front.change-profile-info',$data);
    }

    public function savePersonalData(){

    }

    public function experience(){

    }

    public function education(){

    }

    public function directions(){

    }
}
