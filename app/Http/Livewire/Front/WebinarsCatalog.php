<?php

namespace App\Http\Livewire\Front;

use App\Models\Direction;
use App\Models\Lector;
use App\Models\Prices;
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

    public $sortBy;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->sortBy = "default";
    }
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

        if ($this->sortBy == 'price') {
            $webinars_q = $webinars_q->select('webinars.*')
                ->join('prices', 'prices.id', '=', 'webinars.price_id')
                ->orderBy('prices.name')->paginate($this->perPage);
        }
        else if ($this->sortBy == 'title') {
            $webinars_q = $webinars_q->select('webinars.*')
                ->join('webinar_infos', 'webinar_infos.webinar_id', '=', 'webinars.id')
                ->orderBy('webinar_infos.title')->paginate($this->perPage);
//        } else if ($this->sortBy == 'popularity') {
//            $webinars_q = Webinar::orderBy('popularity', 'asc')->paginate($this->perPage);
        }
        else {
            $webinars_q = $webinars_q->paginate($this->perPage);
        }

        $data['webinars'] = $webinars_q;
        $data['directions'] = Direction::all();
        $data['lectors'] = User::query()->get();
        return view('livewire.front.webinars-catalog',$data);
    }
}
