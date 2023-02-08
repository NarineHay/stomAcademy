<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $video = new Video();
        $video->url = $request->get("url");
        $video->save();
        return response()->redirectToRoute("admin.video.index");
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit',compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $video->url = $request->get("url");
        $video->save();
        return redirect()->back()->with('success','Video has been updated successfully');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('admin.videos.index');
    }
}
