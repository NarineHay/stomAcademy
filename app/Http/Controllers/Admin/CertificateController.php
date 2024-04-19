<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\CertificateImage;
use App\Models\Course;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Requests\AdminCertificateStoreRequest;
use App\Models\Webinar;

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
        $data['webinars'] = Webinar::all();

        return view('admin.certificates.create', $data);
    }

    public function store(Request $request)
    {
        $type = $request->get("type");

        if ($type == "course") {
            $request['webinar_id'] = null;
        } else {
            $request['course_id'] = null;
        }

        $certificate = new Certificate();
        $certificate->course_id = $request->get('course_id');
        $certificate->webinar_id = $request->get('webinar_id');
        $certificate->hours_number = $request->get('hours_number');
        $certificate->date = $request->get('date');



//        $certificate->image = $request->file('image')->store('public/certificates');
        $certificate->save();
        foreach ($request->file("image") as $lg_id => $image){
            CertificateImage::create([
                "certificate_id"  => $certificate->id,
                "lg_id" => $lg_id,
                "image" => $image->store('public/certificates')
            ]);
        }
        return redirect()->route('admin.certificates.edit',$certificate->id)
            ->with('success', 'Certificate has been created successfully.');
    }

    public function edit(Certificate $certificate)
    {
        $courses = Course::all();
        $webinars = Webinar::all();

        return view('admin.certificates.edit',compact('certificate'));
    }

    public function update(Request $request,Certificate $certificate)
    {
        $certificate = Certificate::find($certificate->id);
        $certificate->course_id = $request->course_id;
        $certificate->webinar_id = $request->webinar_id;
        $certificate->name_x = $request->name_x;
        $certificate->name_y = $request->name_y;
        $certificate->hour_x = $request->hour_x;
        $certificate->hour_y = $request->hour_y;
        $certificate->id_x = $request->id_x;
        $certificate->id_y = $request->id_y;
        $certificate->type = $request->type;
        $certificate->hours_number = $request->hours_number;
        $certificate->date = $request->date;

        foreach ($request->get("image",[]) as $lg_id => $image){
            $certificate->infos()->where("lg_id",$lg_id)->update(['image' => $image]);
        }

        $certificate->save();
        return redirect()->back()->with('success','Certificate has been updated successfully');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('admin.certificates.index')
            ->with('success','Certificate has been deleted successfully');
    }
}
