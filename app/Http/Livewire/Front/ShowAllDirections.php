<?php

namespace App\Http\Livewire\Front;

use App\Models\Direction;
use Livewire\Component;

class ShowAllDirections extends Component
{
    public $limit = 9;

    public function render()
    {
        $data['directions'] = Direction::query()->limit($this->limit)->get();

        return view('livewire.front.show-all-directions',$data);
    }

    public function showAll(){
        $this->limit = 1000;
    }
}
