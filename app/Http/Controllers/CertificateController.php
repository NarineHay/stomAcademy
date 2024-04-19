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
        // $data['user'] = Auth::user();
        // $ids = Access::query()->where("user_id",$data['user']->id)->get()
        //     ->map(function ($item){
        //         return $item->course_id ? $item->course_id : $item->webinar_id;
        //     });
        // $data['certificates'] = Certificate::query()->whereIn("id",$ids)->get();
        // return view('front.personal.certificate',$data);
        $course_ids = Auth::user()->access_courses->pluck('course.id');
        $webinar_ids = Auth::user()->access_webinars->pluck('webinar.id');

        $courses_certificate =  Certificate::whereIn('course_id', $course_ids)->get();
        $webinars_certificate =  Certificate::whereIn('webinar_id', $webinar_ids)->get();

        return view('front.personal.certificate', compact('courses_certificate', 'webinars_certificate'));

    }

    public function download($id, $type)
    {

        $certificate = Certificate::find($id);

        $course_ids = Auth::user()->access_courses->pluck('course.id')->toArray();
        $webinar_ids = Auth::user()->access_webinars->pluck('webinar.id')->toArray();

        if($type == 'course' && !in_array($certificate->course_id, $course_ids)  ){
            return back();
        }

        if($type == 'webinar' && !in_array($certificate->webinar_id, $webinar_ids)  ){
            return back();
        }

        $imagePath = Storage::url($certificate->images->where('lg_id',\App\Helpers\LG::get())->first()->image);
        $temp = public_path("/storage/certificates/".Str::random(16).".jpg");
        copy(public_path($imagePath),$temp);
        $image = Image::make($temp);

        if($certificate->hour_y > 0) {
            $image->text($certificate->hours_number, ($image->width() / 2) + $certificate->hour_x, $certificate->hour_y, function ($font) use($certificate) {
                $font->file($certificate->hour_font);
                $font->size($certificate->hour_size);
                $font->color($certificate->hour_color);
                $font->align('center');
            });
        }

        if($certificate->name_y > 0) {
            $image->text(Auth::user()->name, ($image->width() / 2) + $certificate->name_x, $certificate->name_y, function ($font) use ($certificate) {
                $font->file($certificate->name_font);
                $font->size($certificate->name_size);
                $font->color($certificate->name_color);
                $font->align('center');
            });
        }

        if($certificate->date_y > 0) {
            $image->text($certificate->date, ($image->width() / 2) + $certificate->date_x, $certificate->date_y, function ($font) use ($certificate) {
                $font->file($certificate->date_font);
                $font->size($certificate->date_size);
                $font->color($certificate->date_color);
                $font->align('center');
            });
        }

        $image->save();

        $temp = Storage::url(explode("storage/",$temp)[1]);

        return response()->download(public_path($temp));
    }
}
