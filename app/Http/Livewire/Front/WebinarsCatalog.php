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

        if(count($this->selectedDirections) > 0){
            $webinars_q = $webinars_q->whereIn("direction_id", $this->selectedDirections);
        }
        if(count($this->selectedLectors) > 0){
            $webinars_q = $webinars_q->whereIn("user_id", $this->selectedLectors);
        }

        $data['webinars'] = $webinars_q->paginate($this->perPage);
        $data['directions'] = Direction::all();
        $data['lectors'] = User::query()->get();
        return view('livewire.front.webinars-catalog',$data);
    }
}
