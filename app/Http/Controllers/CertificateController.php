<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Certificate;
use App\Models\UserCertificate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CertificateController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::user();
        $ids = Access::query()->where("user_id",$data['user']->id)->get()
            ->map(function ($item){
                return $item->course_id ? $item->course_id : $item->webinar_id;
            });
        $data['certificates'] = Certificate::query()->whereIn("id",$ids)->get();
        return view('front.personal.certificate',$data);
    }

    public function download($id)
    {
        $user = Auth::user();
        $ids = Access::query()->where("user_id",$user->id)->get()
            ->map(function ($item){
                return $item->course_id ? $item->course_id : $item->webinar_id;
            });
        if(in_array($id,$ids->toArray())){
            $certificate = Certificate::find($id);
        }
        $imagePath = Storage::url($certificate->images->where('lg_id',\App\Helpers\LG::get())->first()->image);
        $temp = public_path("storage\\certificates\\".Str::random(16).".jpg");
        copy(public_path($imagePath),$temp);
        $image = Image::make($temp);

        if($certificate->hour_x > 0 && $certificate->hour_y > 0) {
            $image->text($certificate->hours_number, $certificate->hour_x, $certificate->hour_y, function ($font) use($certificate) {
                $font->file($certificate->hour_font);
                $font->size($certificate->hour_size);
                $font->color($certificate->hour_color);
            });
        }

        if($certificate->name_x > 0 && $certificate->name_y > 0) {
            $image->text(Auth::user()->name, $certificate->name_x, $certificate->name_y, function ($font) use ($certificate) {
                $font->file($certificate->name_font);
                $font->size($certificate->name_size);
                $font->color($certificate->name_color);
            });
        }

        if($certificate->date_x > 0 && $certificate->date_y > 0) {
            $image->text($certificate->date, $certificate->date_x, $certificate->date_y, function ($font) use ($certificate) {
                $font->file($certificate->date_font);
                $font->size($certificate->date_size);
                $font->color($certificate->date_color);
            });
        }

        $image->save();

        dd($temp);

        return response()->download($temp);
    }
}
