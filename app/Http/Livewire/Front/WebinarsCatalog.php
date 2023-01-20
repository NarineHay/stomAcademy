<?php

namespace App\Http\Livewire\Front;

use App\Models\Direction;
use App\Models\Lector;
use App\Models\User;
use App\Models\Webinar;
use Livewire\Component;
use Livewire\WithPagination;

class WebinarsCatalog extends Component
{
    use WithPagination;

    public $selectedDirections = [];

    public $selectedLectors = [];

    public $perPage = 15;

    protected $paginationTheme = 'bootstrap';

    function loadNext(){
        $this->perPage += 15;
    }

    public function render()
    {
        $webinars_q = Webinar::query();
        $lectors_q = User::query()->where("role",User::ROLE_LECTOR);

        if(count($this->selectedDirections) > 0){
            $webinars_q = $webinars_q->whereIn("direction_id",$this->selectedDirections);
        }
        $webinars_ids = $webinars_q->get()->map(function ($webinar){
            return $webinar->id;
        });

        if(count($this->selectedLectors) > 0){
            $lectors_q = $lectors_q->whereIn("id",$this->selectedLectors);
        }
        $lectors_ids = $lectors_q->get()->map(function ($user){
            return $user->id;
        });

        $data['webinars'] = Webinar::query()->whereIn("id",$webinars_ids)->orWhereIn("user_id",$lectors_ids)->paginate($this->perPage);
        $data['directions'] = Direction::all();
        $data['lectors'] = User::query()->get();
        return view('livewire.front.webinars-catalog',$data);
    }
}
