<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Course;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index(Request $request){
        $order = $request->get("order","id");
        $sort = $request->get("sort","asc");
        $certificates = Certificate::query()->orderBY($order,$sort)->paginate(10);
        return view('admin.certificates.index',compact('certificates'));
    }
    public function create()
    {
        $data['courses'] = Course::all();
        return view('admin.certificates.create', $data);
    }
}
