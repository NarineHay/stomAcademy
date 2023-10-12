<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\UserCertificate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::user();
        $data['certificates'] = Certificate::all();
        return view('front.personal.certificate',$data);
    }

    public function download($id)
    {
        $user_certificate = UserCertificate::find($id);
        $certificate = Certificate::find($user_certificate->certificate_id);
        $imagePath = Storage::url($certificate->images->where('lg_id',\App\Helpers\LG::get())->first()->image);

        return response()->download(public_path($imagePath));
    }
}
