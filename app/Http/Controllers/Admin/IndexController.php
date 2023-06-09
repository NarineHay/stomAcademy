<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Course;
use App\Models\IndexContent;
use App\Models\User;
use App\Models\Webinar;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index(){
        $data['content'] = IndexContent::find(1);
        $data['courses'] = Course::query()->where("online",false)->get();
        $data['onlines'] = Course::query()->where("online",true)->get();
        $data['webinars'] = Webinar::query()->get();
        $data['articles'] = Blog::all();
        $data['lectors'] = User::query()->where("role",User::ROLE_LECTOR)->with("lector")->get();
        return view("admin.index",$data);
    }

    function update(Request $request){
        $data['popular'] = $request->get("popular",[]);
        $data['new'] = $request->get("new",[]);
        $data['online_co'] = $request->get("online_co",[]);
        $data['online_le'] = $request->get("online_le",[]);
        $data['articles'] = $request->get("articles",[]);
        $data['lectors'] = $request->get("lectors",[]);
        IndexContent::query()->where("id",1)->update($data);
        return back();
    }
}
