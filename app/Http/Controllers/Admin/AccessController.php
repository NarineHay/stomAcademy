<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAccessStoreRequest;
use App\Models\Access;
use App\Models\Course;
use App\Models\User;
use App\Models\Webinar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessController extends Controller
{
    public function index(Request $request){
        $order = $request->get("order","id");
        $sort = $request->get("sort","asc");
        $accesses = Access::query()->orderBY($order,$sort)->paginate(10);
        return view('admin.accesses.index',compact('accesses'));
    }

    public function create(){
        $data['courses'] = Course::all();
        $data['webinars'] = Webinar::all();
        $data['users'] = User::all();
        return view('admin.accesses.create',$data);
    }

    public function store(AdminAccessStoreRequest $request)
    {
        foreach ($request->get('user_ids') as $user_id){
            $access = new Access();
            $access->manager_id = Auth::user()->id;
            $access->user_id = $user_id;
            if($request->get("type") == "course"){
                $access->course_id = $request->get('course_id');
            }else{
                $access->webinar_id = $request->get('webinar_id');
            }
            $access_time = $request->boolean("access_time");
            $access->access_time = $access_time;
            if(!$access_time){
                $access->duration = $request->get('duration');
            }
            $access->save();
        }
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
        $access->user_id = $request->user_id;
        if($request->get("type") == "course"){
            $access->course_id = $request->course_id;
        }else{
            $access->webinar_id = $request->webinar_id;
        }
        $access_time = $request->boolean("access_time");
        $access->access_time = $request->access_time;
        if(!$access_time){
            $access->duration = $request->duration;
        }
        $access->save();
        return redirect()->route('admin.accesses.index',$access);
    }

    public function destroy(Access $access)
    {
        $access->delete();
        return redirect()->route('admin.accesses.index');
    }
}
