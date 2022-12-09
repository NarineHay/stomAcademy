<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\AdminCertificateStoreRequest;

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
    public function store(AdminCertificateStoreRequest $request)
    {
        $certificate = new Certificate();
        $certificate->course_id = $request->get('course_id');
        $certificate->type = $request->get('type');
        $certificate->hours_number = $request->get('hours_number');
        $certificate->date = $request->get('date');
        $certificate->image = $request->file('image')->store('public/certificates');
//        $image = $certificate->image;
//        $input['image'] = time().'.'.$image->getClientOriginalExtension();
//        $imgFile = Image::make($image->getRealPath());
//
//        $width = $imgFile->width();
//        $height = $imgFile->height();
//        if(($width/$height)>(3508/2480)){
//            $nh = 2480;
//            $nw = ($width * $nh) / $height;
//            $y = 0;
//            $x = intval(($nw - 3508) / 2);
//        }
//        else if(($width/$height)<(3508/2480)) {
//            $nw = 3508;
//            $nh = ($height * $nw) / $width;
//            $y = intval(($nh - 2480) / 2);
//            $x = 0;
//        }
//        $imgFile->resize($nw,$nh);
//        $imgFile->crop(3508,2480,$x,$y);
        $certificate->save();
        return redirect()->route('admin.certificates.edit',$certificate->id)
            ->with('success', 'Certificate has been created successfully.');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit',compact('certificate'));
    }

    public function update(Request $request,Certificate $certificate)
    {
        $request->validate([
            'name_x' => 'required',
            'name_y' => 'required',
            'hour_x' => 'required',
            'hour_y' => 'required',
            'id_x' => 'required',
            'id_y' => 'required',
            'date' => 'required',
            'hours_number' => 'required',
        ]);

        $certificate = Certificate::find($certificate->id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $certificate->image = $request->file('image')->store('public/certificates');
        }

        $certificate->course_id = $request->course_id;
        $certificate->name_x = $request->name_x;
        $certificate->name_y = $request->name_y;
        $certificate->hour_x = $request->hour_x;
        $certificate->hour_y = $request->hour_y;
        $certificate->id_x = $request->id_x;
        $certificate->id_y = $request->id_y;
        $certificate->type = $request->type;
        $certificate->hours_number = $request->hours_number;
        $certificate->date = $request->date;

        $certificate->save();
        return redirect()->route('admin.certificates.index',$certificate)
            ->with('success','Certificate has been updated successfully');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('admin.certificates.index')
            ->with('success','Certificate has been deleted successfully');
    }
}
