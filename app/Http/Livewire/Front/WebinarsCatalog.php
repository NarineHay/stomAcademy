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

    public $perPage = 15;

    protected $paginationTheme = 'bootstrap';

    function loadNext(){
        $this->perPage += 15;
    }



    public function render()
    {
        $data['webinar'] = Webinar::query()->paginate($this->perPage);
        return view('livewire.front.webinars-catalog',compact('data'));
    }
}
