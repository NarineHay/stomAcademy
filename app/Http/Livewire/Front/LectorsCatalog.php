<?php

namespace App\Http\Livewire\Front;

use App\Models\Direction;
use App\Models\Lector;
use App\Models\User;
use App\Models\UserDirection;
use App\Models\Webinar;
use Livewire\Component;
use Livewire\WithPagination;

class LectorsCatalog extends Component
{

    use WithPagination;

    public $selectedDirections = [];

    public $perPage = 15;

    protected $paginationTheme = 'bootstrap';

    function loadNext(){
        $this->perPage += 15;
    }

    public function render()
    {
        $lectors_q = Lector::query();
        if(count($this->selectedDirections) > 0){
            $user_ids = UserDirection::query()->whereIn("direction_id",$this->selectedDirections)->get()->map(function ($d){
                return $d->user->lector->id;
            });
            $lectors_q = $lectors_q->whereIn("id",$user_ids);
        }
        $lectors_ids = $lectors_q->get()->map(function ($lector){
            return $lector->user_id;
        });
        $data['lectors'] = User::query()->withCount("webinars")->where("role",User::ROLE_LECTOR)
            ->whereIn("id",$lectors_ids)->paginate($this->perPage);
        $data['directions'] = Direction::all();
        return view('livewire.front.lectors-catalog',$data);
    }
}
