<?php

namespace App\Http\Livewire\Admin;

use App\Models\CertificateImage;
use App\Models\Course;
use App\Models\User;
use App\Models\UserCertificate;
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
    public $course_id = '';
    public $type = '';
    public $date = '';

    public $images = [];

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
        $this->image = $this->certificate->image->image;
        $this->original = $this->certificate->image;
        $this->hours_number = $this->certificate->hours_number;
        $this->type = $this->certificate->type;
        $this->course_id = $this->certificate->course_id;
        $this->certificate->images->map(function ($image){
            $this->images[$image->lg_id] = $image->image;
        });
    }


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
        $this->certificate->save();

        $user = User::find($this->user_id);

        $disc = Storage::disk("public");

        CertificateImage::query()->where("certificate_id",$this->certificate->id)->delete();

        foreach ($this->images as $lg_id => $img){
            $image = Image::make($disc->get(str_replace("public/","",$img)));

            $image->text($this->certificate->hours_number, $this->hour['x'], $this->hour['y'], function($font) {
                $font->file(public_path('verdana.ttf'));
                $font->size($this->hour['size']);
                $font->color($this->hour['color']);
            });

            $image->text($user->name, $this->name['x'], $this->name['y'], function($font) {
                $font->file(public_path('verdana.ttf'));
                $font->size($this->name['size']);
                $font->color($this->name['color']);
            });

            $image->text($this->date, $this->cert_id['x'], $this->cert_id['y'], function($font) {
                $font->file(public_path('verdana.ttf'));
                $font->size($this->cert_id['size']);
                $font->color($this->cert_id['color']);
            });
            $temp = "certificates\\".Str::random(16).".jpg";
            $disc->put($temp,$image->encode());
            CertificateImage::create([
                "certificate_id" => $this->certificate->id,
                "image" => "public/".$temp,
                "lg_id" => $lg_id
            ]);
        }

        UserCertificate::create([
            "user_id" => $user->id,
            "certificate_id" => $this->certificate->id
        ]);

        return redirect()->route('admin.certificates.index')
            ->with('success','Certificate has been updated successfully');
    }

    public function preview(){
        $user = User::find($this->user_id);

        $disc = Storage::disk("public");
        if($this->tmp){
            $disc->delete($this->tmp);
        }else{
            $this->tmp = "certificates\\".Str::random(16).".jpg";
        }
        $disc->copy(str_replace("public/","",$this->certificate->image->image),$this->tmp);

        $image = Image::make($disc->get($this->tmp));

        $image->text($this->certificate->hours_number, $this->hour['x'], $this->hour['y'], function($font) {
            $font->file(public_path('verdana.ttf'));
            $font->size($this->hour['size']);
            $font->color($this->hour['color']);
        });

        $image->text($user->name, $this->name['x'], $this->name['y'], function($font) {
            $font->file(public_path('verdana.ttf'));
            $font->size($this->name['size']);
            $font->color($this->name['color']);
        });

        $image->text($this->date, $this->cert_id['x'], $this->cert_id['y'], function($font) {
            $font->file(public_path('verdana.ttf'));
            $font->size($this->cert_id['size']);
            $font->color($this->cert_id['color']);
        });
        $disc->put($this->tmp,$image->encode());
        $this->image = "public/".$this->tmp;

    }
}
