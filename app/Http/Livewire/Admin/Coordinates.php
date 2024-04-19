<?php

namespace App\Http\Livewire\Admin;

use App\Helpers\TTFInfo;
use App\Models\CertificateImage;
use App\Models\Course;
use App\Models\User;
use App\Models\UserCertificate;
use App\Models\Webinar;
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
    public $user_id;
    public $file;
    public $tmp;
    public $hours_number = '';
    // public $course_id = '';
    public $date = '';
    public $default_font;

    public $images = [];

    public $name_ = [
        'x' => 0,
        'y' => 0,
        'color' => '#000000',
        'size' => 32,
        'font' => null,
    ];
    public $hour_ = [
        'x' => 0,
        'y' => 0,
        'color' => '#000000',
        'size' => 32,
        'font' => null,
    ];
    public $date_ = [
        'x' => 0,
        'y' => 0,
        'color' => '#000000',
        'size' => 32,
        'font' => null,
    ];
    public $original = '';

    function mount(){

        $this->date = $this->certificate->date;
        $this->image = $this->certificate->image->image;
        $this->original = $this->certificate->image;
        $this->hours_number = $this->certificate->hours_number;
        // $this->course_id = $this->certificate->course_id;
        $this->certificate->images->map(function ($image){
            $this->images[$image->lg_id] = $image->image;
        });

        $this->name_['x'] = $this->certificate->name_x;
        $this->name_['y'] = $this->certificate->name_y;
        $this->name_['color'] = $this->certificate->name_color;
        $this->name_['size'] = $this->certificate->name_size;
        $this->name_['font'] = public_path($this->certificate->name_font);

        $this->hour_['x'] = $this->certificate->hour_x;
        $this->hour_['y'] = $this->certificate->hour_y;
        $this->hour_['color'] = $this->certificate->hour_color;
        $this->hour_['size'] = $this->certificate->hour_size;
        $this->hour_['font'] = public_path($this->certificate->hour_font);

        $this->date_['x'] = $this->certificate->date_x;
        $this->date_['y'] = $this->certificate->date_y;
        $this->date_['color'] = $this->certificate->date_color;
        $this->date_['size'] = $this->certificate->date_size;
        $this->date_['font'] = public_path($this->certificate->date_font);
    }


    public function save()
    {
        $this->image = $this->file->store('public/certificates');
    }

    public function render()
    {
        // dd(11);
        $data['courses'] = Course::all();
        $data['webinars'] = Webinar::all();

        $this->image = $this->image ?? $this->certificate->image;
        $data['fonts'] = [];
        $path = public_path("fonts/");

        foreach (scandir(public_path("fonts")) as $file){
            $file = $path.$file;
            if(is_file($file)){
                $ttfInfo = (new TTFInfo())->setFontFile($file);
                $fontInfo = $ttfInfo->getFontInfo();
                $data['fonts'][] = [
                    "name" => $fontInfo[1]." - ".$fontInfo[2],
                    "path" => $file,
                ];
            }
        }
        $this->default_font = $data['fonts'][0]['path'];


        if(!$this->name_['font']){
            $this->name_['font'] = $data['fonts'][0]['path'];
        }
        if(!$this->date_['font']){
            $this->date_['font'] = $data['fonts'][0]['path'];
        }
        if(!$this->hour_['font']){
            $this->hour_['font'] = $data['fonts'][0]['path'];
        }
        $this->preview();
        return view('livewire.admin.coordinates',$data);
    }

    public function submit(){
        // $this->certificate->course_id = $this->course_id;
        $this->certificate->hours_number = $this->hours_number;
        $this->certificate->date = $this->date;

        $this->certificate->name_x = $this->name_['x'];
        $this->certificate->name_y = $this->name_['y'];
        $this->certificate->name_color = $this->name_['color'];
        $this->certificate->name_size = $this->name_['size'];
        $this->certificate->name_font = explode("public\\",is_file($this->name_['font']) ? $this->name_['font'] : $this->default_font)[1];

        $this->certificate->hour_x = $this->hour_['x'];
        $this->certificate->hour_y = $this->hour_['y'];
        $this->certificate->hour_color = $this->hour_['color'];
        $this->certificate->hour_size = $this->hour_['size'];
        $this->certificate->hour_font = explode("public\\",is_file($this->hour_['font']) ? $this->hour_['font'] : $this->default_font)[1];

        $this->certificate->date_x = $this->date_['x'];
        $this->certificate->date_y = $this->date_['y'];
        $this->certificate->date_color = $this->date_['color'];
        $this->certificate->date_size = $this->date_['size'];
        $this->certificate->date_font = explode("public\\",is_file($this->date_['font']) ? $this->date_['font'] : $this->default_font)[1];


        $this->certificate->save();


        return redirect()->route('admin.certificates.index')
            ->with('success','Certificate has been updated successfully');
    }

    public function preview(){

        $disc = Storage::disk("public");
        if($this->tmp){
            $disc->delete($this->tmp);
        }else{
            $this->tmp = "certificates/".Str::random(16).".jpg";
        }
        $disc->copy(str_replace("public/","",$this->certificate->image->image),$this->tmp);

        $image = Image::make($disc->get($this->tmp));

        if($this->hour_['y'] > 0) {
            $hour_x = $this->hour_['x'] == '' ? 0 : $this->hour_['x'];

            $image->text($this->certificate->hours_number, ($image->width() / 2) + $hour_x, $this->hour_['y'], function ($font) {
                $font->file($this->hour_['font']);
                $font->size($this->hour_['size'] == '' ? 0 : $this->hour_['size']);
                $font->color($this->hour_['color']);
                $font->align('center');
            });
        }

        if($this->name_['y'] > 0) {
            $name_x = $this->name_['x'] == '' ? 0 : $this->name_['x'];

            $image->text("Фамилия Имя Отчество", (($image->width() / 2) + $name_x), $this->name_['y'], function ($font) {
                $font->file($this->name_['font']);
                $font->size($this->name_['size'] == '' ? 0 : $this->name_['size']);
                $font->color($this->name_['color']);
                $font->align('center');

            });


        }

        if($this->date_['y'] > 0) {
            $date_x = $this->date_['x'] == '' ? 0 : $this->date_['x'];
            $image->text($this->date, ($image->width() / 2) +  $date_x,$this->date_['y'], function ($font) {
                $font->file($this->date_['font']);
                $font->size($this->date_['size'] == '' ? 0 : $this->date_['size']);
                $font->color($this->date_['color']);
                $font->align('center');
            });
        }

        $disc->put($this->tmp,$image->encode());
        $this->image = "public/".$this->tmp;

    }
}
