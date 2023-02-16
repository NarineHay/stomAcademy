<?php

namespace App\Http\Livewire\Lector;

use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChangeLectorProfileInfo extends Component
{
    public $biography;
    public $per_of_sales;
    public $birth_date;
    public $hospital;
    public $experience;
    public $education;
    public $userDirections = [];
    public $success_ = null;

    public function render()
    {
        $data['user'] = Auth::user();
        $data['directions'] = Direction::all();
        $data['success'] = $this->success_;
        return view('livewire.lector.change-lector-profile-info', $data);
    }

    public function mount()
    {
        $user = Auth::user();
        $this->userDirections = $user->directions->map(function ($direction) {
            return $direction->direction_id;
        });
        $this->biography = $user->lector->info->biography;
        $this->birth_date = $user->userinfo->birth_date;
        $this->per_of_sales = $user->lector->per_of_sales;
        $this->hospital = $user->lector->hospital;
    }

    public function savePersonalData()
    {
        $data['user'] = Auth::user();
        $data['user']->userinfo->birth_date = $this->birth_date;
        $data['user']->lector->per_of_sales = $this->per_of_sales;
        $data['user']->lector->hospital = $this->hospital;
        $data['user']->save();
        $data['user']->lector->save();
        $data['user']->userinfo->save();
        $this->success_ = "Success";
    }

    public function saveBiography()
    {
        $data['user'] = Auth::user();
        $data['user']->lector->info->biography = $this->biography;
        $data['user']->lector->info->save();
        $this->success_ = "Success";
    }

    public function directions(Request $request)
    {
        $data['user'] = Auth::user();
        $directions = $request->get('directions', []);
        $data['user']->directions()->delete();
        foreach ($this->userDirections as $direction_id) {
            $data['user']->directions()->create([
                "direction_id" => $direction_id
            ]);
        }
        $this->success_ = "Success";
    }
}
