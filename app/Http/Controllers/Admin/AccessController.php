<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAccessStoreRequest;
use App\Models\Access;
use App\Models\Course;
use App\Models\User;
use App\Models\Webinar;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function index(){
        $data['courses'] = Course::all();
        $data['webinars'] = Webinar::all();
        $data['users'] = User::all();
        return view('admin.accesses.index',$data);
    }

    public function create(){
        $data['courses'] = Course::all();
        $data['webinars'] = Webinar::all();
        $data['users'] = User::all();
        return view('admin.accesses.create',$data);
    }

    public function store(AdminAccessStoreRequest $request)
    {
        $access = new Access();
        $access->user_id = $request->get('user_id');
        $access->course_id = $request->get('course_id');
        $access->webinar_id = $request->get('webinar_id');
        $access->access_time = $request->get('access_time');
        $access->duration = $request->get('duration');
        $access->save();

        return redirect()->route('admin.accesses.index');
    }

    public function edit(Access $access){
        $data['courses'] = Course::all();
        $data['webinars'] = Webinar::all();
        $data['users'] = User::all();
        return view('admin.accesses.edit',compact('access','data'));
    }

    public function update(Request $request, Access $access)
    {
//        $request->validate([
//            'user_id' => 'required',
//        ]);

        $access = Course::find($access->id);

        $access->user_id = $request->user_id;
        $access->course_id = $request->course_id;
        $access->webinar_id = $request->webinar_id;
        $access->access_time = $request->access_time;
        $access->duration = $request->duration;

        $access->save();
        return redirect()->route('admin.accesses.index',$access);
    }

    public function destroy(Access $access)
    {
        $access->delete();
        return redirect()->route('admin.accesses.index');
    }
}
