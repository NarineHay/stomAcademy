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
    public $name = [
        'x' => 0,
        'y' => 0,
        'color' => '#000000',
        'size' => 32
    ];
    public $hour = [
        'x' => 0,
        'y' => 0,
        'color' => '#000000',
        'size' => 32
    ];
    public $cert_id = [
        'x' => 0,
        'y' => 0,
        'color' => '#000000',
        'size' => 32
    ];
    public $original = '';

    function mount(){
        $this->date = $this->certificate->date;
        $this->image = $this->certificate->image;
        $this->original = $this->certificate->image;
        $this->hours_number = $this->certificate->hours_number;
        $this->type = $this->certificate->type;
//        $this->name_x = $this->certificate->name_x;
//        $this->name_y = $this->certificate->name_y;
//        $this->hour_x = $this->certificate->hour_x;
//        $this->hour_y = $this->certificate->hour_y;
//        $this->id_x = $this->certificate->id_x;
//        $this->id_y = $this->certificate->id_y;

        $this->course_id = $this->certificate->course_id;
    }

//    protected $rules = [
//        'name_x' => 'required',
//        'name_y' => 'required',
//        'hour_x' => 'required',
//        'hour_y' => 'required',
//        'id_x' => 'required',
//        'id_y' => 'required',
//    ];

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
//        $this->certificate->name_x = $this->name_x;
//        $this->certificate->name_y = $this->name_y;
//        $this->certificate->hour_x = $this->hour_x;
//        $this->certificate->hour_y = $this->hour_y;
//        $this->certificate->id_x = $this->id_x;
//        $this->certificate->id_y = $this->id_y;
        $this->certificate->image = $this->image;
        $this->certificate->save();

        return redirect()->route('admin.certificates.index')
            ->with('success','Certificate has been updated successfully');
    }

    public function preview(){
        $disc = Storage::disk("public");
        if($this->tmp){
            $disc->delete($this->tmp);
        }else{
            $this->tmp = "certificates\\".Str::random(9).".jpg";
        }
        $disc->copy(str_replace("public/","",$this->certificate->image),$this->tmp);

        $image = Image::make($disc->get($this->tmp));

        $image->text($this->certificate->hours_number, $this->hour['x'], $this->hour['y'], function($font) {
            $font->file(public_path('verdana.ttf'));
            $font->size($this->hour['size']);
            $font->color($this->hour['color']);
        });

        $image->text($this->certificate->course->info->title, $this->name['x'], $this->name['y'], function($font) {
            $font->file(public_path('verdana.ttf'));
            $font->size($this->name['size']);
            $font->color($this->name['color']);
        });

        $image->text($this->certificate->course->id, $this->cert_id['x'], $this->cert_id['y'], function($font) {
            $font->file(public_path('verdana.ttf'));
            $font->size($this->cert_id['size']);
            $font->color($this->cert_id['color']);
        });
        $disc->put($this->tmp,$image->encode());
        $this->image = "public/".$this->tmp;
    }
}
