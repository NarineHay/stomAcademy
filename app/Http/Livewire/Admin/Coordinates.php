<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course;
use Livewire\Component;

class Coordinates extends Component
{
    public $certificate;
    public $image;

    public function render()
    {
        $data['courses'] = Course::all();
        $this->image = $this->certificate->image;
        return view('livewire.admin.coordinates',$data);
    }
}
