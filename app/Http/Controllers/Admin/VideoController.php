<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $data['videos'] = Video::all();
        return view('admin.videos.index',$data);
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required',
        ]);
        $video = new Video();
        $video->url = str_replace("watch?v=","embed/",$request->get("url"));
        $video->image = $request->file('image')->store('public/videoImages');
        if (!str_contains($video->url, "player")) {
            $video->url = str_replace("vimeo.com", "player.vimeo.com/video", $video->url);
        }
        $video->save();
        return response()->redirectToRoute("admin.videos.index");
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit',compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $video = Video::find($video->id);
        $video->url = str_replace("watch?v=","embed/",$request->get("url"));
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $video->image = $request->file('image')->store('public/videoImages');
        }
        if (!str_contains($video->url, "player")) {
            $video->url = str_replace("vimeo.com", "player.vimeo.com/video", $video->url);
        }
        $video->save();
        return redirect()->back()->with('success','Video has been updated successfully');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('admin.videos.index');
    }
}
