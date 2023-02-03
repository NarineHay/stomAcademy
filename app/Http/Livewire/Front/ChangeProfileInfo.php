<?php

namespace App\Http\Livewire\Front;

use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChangeProfileInfo extends Component
{
    public $name;
    public $birth_date;
    public $hospital;
    public $experience;
    public $education;
    public $userDirections = [];

    public $success_ = null;
    public $error_ = null;

    public function mount(){
        $user = Auth::user();
        $this->name = $user->name;
        $this->userDirections = $user->directions->map(function ($direction){
            return $direction->direction_id;
        });
        $this->birth_date = $user->userinfo->birth_date;
    }

    public function render()
    {
        $data['user'] = Auth::user();
        $data['directions'] = Direction::all();
        $data['success'] = $this->success_;
        return view('livewire.front.change-profile-info',$data);
    }

    public function savePersonalData(){
        $data['user'] = Auth::user();
        $data['user']->name = $this->name;
        $data['user']->userinfo->birth_date = $this->birth_date;
        $data['user']->save();
        $data['user']->userinfo->save();
        $this->success_ = "Success";
    }

    public function experience(){
        $this->success_ = "Success";
    }

    public function education(){
        $this->success_ = "Success";
    }

    public function directions(Request $request){
        $data['user'] = Auth::user();
        $directions = $request->get('directions',[]);
        $data['user']->directions()->delete();
        foreach ($this->userDirections as $direction_id){
            $data['user']->directions()->create([
                "direction_id" => $direction_id
            ]);
        }
        $this->success_ = "Success";
    }
}
