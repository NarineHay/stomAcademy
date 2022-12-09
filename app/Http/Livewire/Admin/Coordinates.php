<?php

namespace App\Http\Livewire\Admin;

use App\Models\Certificate;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;

class Coordinates extends Component
{
    use WithFileUploads;
    public $certificate;
    public $image = null;
    public $hours_number;
    public $course_id;
    public $type;
    public $date;
    public $file;
    public $name_x;
    public $name_y;
    public $hour_x;
    public $hour_y;
    public $id_x;
    public $id_y;
    public $tmp;

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

    public function submit(Certificate $certificate){
//        dd(
//            $this->name_x,
//            $this->name_y,
//            $this->hour_x,
//            $this->hour_y,
//            $this->id_x,
//            $this->id_y,
//            $this->date,
//            $this->type,
//            $this->hours_number,
//            $this->course_id,
//        );

//        $certificate->course_id = $this->course_id;
//        $certificate->hours_number = $this->hours_number;
//        $certificate->type = $this->type;
//        $certificate->date = $this->date;
//        $certificate->name_x = $this->name_x;
//        $certificate->name_y = $this->name_y;
//        $certificate->hour_x = $this->hour_x;
//        $certificate->hour_y = $this->hour_y;
//        $certificate->id_x = $this->id_x;
//        $certificate->id_y = $this->id_y;
//
//        $certificate->save();
//        $this->course_id = $request->course_id;
//        $this->hours_number = $request->hours_number;
//        $this->type = $request->type;
//        $this->date = $request->date;
//        $this->name_x = $request->name_x;
//        $this->name_y = $request->name_y;
//        $this->hour_x = $request->hour_x;
//        $this->hour_y = $request->hour_y;
//        $this->id_x = $request->id_x;
//        $this->id_y = $request->id_y;
    }

    public function preview(){
        if($this->tmp){
            Storage::delete("public\\".$this->tmp);
        }
        $this->tmp = 'certificates'.'\\'.Str::random(8).'.jpg';
        $this->image = $this->certificate->image;
        $this->image = str_replace("public","",$this->image);
        $image = Image::make(storage_path("app\\public\\".$this->image));

        $image->text($this->certificate->hours_number, $this->hour_x, $this->hour_y, function($font) {
            $font->file('verdana.ttf');
            $font->size(72);
            $font->color('#FF0000');
        });

        $image->text($this->certificate->course->title, $this->name_x, $this->name_y, function($font) {
            $font->file('verdana.ttf');
            $font->size(36);
            $font->color('#FF0000');
        });

        $image->save(storage_path('app\\public\\'.$this->tmp));
        $this->image = $this->tmp;
    }
}
