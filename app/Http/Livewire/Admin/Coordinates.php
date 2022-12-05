<?php

namespace App\Http\Livewire\Admin;

use App\Models\Certificate;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithFileUploads;

class Coordinates extends Component
{
    use WithFileUploads;
    public $certificate;
    public $image = null;
    public $file;

    public function save()
    {
//        $this->validate([
//            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
//        ]);

        $this->image = $this->file->store('public/certificates');
    }

    public function render()
    {
        $data['courses'] = Course::all();
        $this->image = $this->image ?? $this->certificate->image;
        return view('livewire.admin.coordinates',$data);
    }
}
