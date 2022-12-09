<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Coordinates extends Component
{
    use WithFileUploads;
    public $certificate;
    public $image = null;
    public $file;
    public $tmp;
    public $hours_number = '';
    public $course_id = '';
    public $type = '';
    public $date = '';
    public $name_x = '';
    public $name_y = '';
    public $hour_x = '';
    public $hour_y = '';
    public $id_x = '';
    public $id_y = '';
    public $original = '';

    function mount(){
        $this->date = $this->certificate->date;
        $this->image = $this->certificate->image;
        $this->original = $this->certificate->image;
        $this->hours_number = $this->certificate->hours_number;
        $this->type = $this->certificate->type;
        $this->name_x = $this->certificate->name_x;
        $this->name_y = $this->certificate->name_y;
        $this->hour_x = $this->certificate->hour_x;
        $this->hour_y = $this->certificate->hour_y;
        $this->id_x = $this->certificate->id_x;
        $this->id_y = $this->certificate->id_y;

        $this->course_id = $this->certificate->course_id;
    }

    protected $rules = [
        'name_x' => 'required',
        'name_y' => 'required',
        'hour_x' => 'required',
        'hour_y' => 'required',
        'id_x' => 'required',
        'id_y' => 'required',
    ];

    public function save()
    {
        $this->image = $this->file->store('public/certificates');
    }

    public function render()
    {
        $data['courses'] = Course::all();
        $this->image = $this->image ?? $this->certificate->image;
        return view('livewire.admin.coordinates',$data);
    }

    public function submit(){
        $this->certificate->course_id = $this->course_id;
        $this->certificate->hours_number = $this->hours_number;
        $this->certificate->type = $this->type;
        $this->certificate->date = $this->date;
        $this->certificate->name_x = $this->name_x;
        $this->certificate->name_y = $this->name_y;
        $this->certificate->hour_x = $this->hour_x;
        $this->certificate->hour_y = $this->hour_y;
        $this->certificate->id_x = $this->id_x;
        $this->certificate->id_y = $this->id_y;
        $this->certificate->image = $this->image;
        $this->certificate->save();

        return redirect()->route('admin.certificates.index')
            ->with('success','Certificate has been updated successfully');
    }

    public function preview(){
        if($this->tmp){
            Storage::delete("public\\".$this->tmp);
        }
        $this->tmp = 'certificates'.'\\'.Str::random(8).'.jpg';
        $this->image = $this->image ?? $this->certificate->image;
        $this->image = str_replace("public","",$this->image);
        $image = Image::make(storage_path("app\\public\\".$this->image));

        $image->text($this->certificate->hours_number, $this->hour_x, $this->hour_y, function($font) {
            $font->file('verdana.ttf');
            $font->size(36);
            $font->color('#FFFFFF');
        });

        $image->text($this->certificate->course->title, $this->name_x, $this->name_y, function($font) {
            $font->file('verdana.ttf');
            $font->size(36);
            $font->color('#FFFFFF');
        });

        $image->save(storage_path('app\\public\\'.$this->tmp));
        $this->image = $this->tmp;
    }
}
