<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CertificateController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function imageFileUpload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpg,jpeg,png,svg|max:4096',
        ]);
        $image = $request->file('file');

        $input['file'] = time().'.'.$image->getClientOriginalExtension();
        $imgFile = Image::make($image->getRealPath());
        $width = $imgFile->width();
        $height = $imgFile->height();
        if(($width/$height)>(3508/2480)){
            $nh = 2480;
            $nw = ($width * $nh) / $height;
            $y = 0;
            $x = intval(($nw - 3508) / 2);
        }
        else if(($width/$height)<(3508/2480)) {
            $nw = 3508;
            $nh = ($height * $nw) / $width;
            $y = intval(($nh - 2480) / 2);
            $x = 0;
        }
        $imgFile->resize($nw,$nh);
        $imgFile->crop(3508,2480,$x,$y);
        $imgFile->text('Stom Academy', 1000, 1000, function($font) {
            $font->file('verdana.ttf');
            $font->size(200);
            $font->color('#000000');
        })->save(storage_path('app\public\certificates').'\\'.$input['file']);
        return back()
            ->with('success','File successfully uploaded.')
            ->with('fileName',$input['file']);
    }
}
