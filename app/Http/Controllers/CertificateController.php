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
        $certificate = UserCertificate::find($id);
//        dd($certificate);
        $imagePath = Storage::url($certificate->image);

        return response()->download(public_path($imagePath));
    }
}
