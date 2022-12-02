<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminWebinarStoreRequest;
use App\Models\Direction;
use App\Models\Lector;
use App\Models\Prices;
use App\Models\Webinar;
use Illuminate\Http\Request;

class WebinarController extends Controller
{
    public function index(Request $request)
    {
        $order = $request->get("order","id");
        $sort = $request->get("sort","asc");
        $webinars = Webinar::query()->with('user')->orderBY($order,$sort)->paginate(10);
        return view('admin.webinars.index', compact('webinars'));
    }

    public function create()
    {
        $data['lectors'] = Lector::all();
        $data['prices'] = Prices::all();
        return view('admin.webinars.create', $data);
    }

    public function store(AdminWebinarStoreRequest $request)
    {
        $webinar = new Webinar();
        $webinar->title = $request->get('title');
        $webinar->start_date = $request->get('start_date');
        $webinar->end_date = $request->get('end_date');
        $webinar->duration = $request->get('duration');
        $webinar->description = $request->get('description');
        $webinar->program = $request->get('program');
        $webinar->video_invitation = $request->get('video_invitation');
        $webinar->price_id = $request->get('price_id');
        $webinar->video = $request->get('video');
        $webinar->image = $request->file('image')->store('public/webinar');

        $webinar->save();

        return redirect()->route('admin.webinars.index')
            ->with('success', 'Webinar has been created successfully.');
    }


    public function edit(Webinar $webinar)
    {
        $data['prices'] = Prices::all();
        $data['directions'] = Direction::all();
        return view('admin.webinars.edit',compact('webinar','data'));
    }

    public function update(Request $request, Webinar $webinar)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'duration' => 'required',
            'description' => 'required',
            'program' => 'required',
            'video' => 'required',
            'video_invitation' => 'required',
        ]);

        $webinar = Webinar::find($webinar->id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $webinar->image = $request->file('image')->store('public/webinar');
        }

        $webinar->title = $request->title;
        $webinar->start_date = $request->start_date;
        $webinar->end_date = $request->end_date;
        $webinar->duration = $request->duration;
        $webinar->description = $request->description;
        $webinar->program = $request->program;
        $webinar->video = $request->video;
        $webinar->video_invitation = $request->video_invitation;
        $webinar->price_id = $request->price_id;
        $webinar->status = $request->status;
        $webinar->save();
        return redirect()->route('admin.webinars.index',$webinar)
            ->with('success','Webinar has been updated successfully');
    }

    public function destroy(Webinar $webinar)
    {
        $webinar->delete();
        return redirect()->route('admin.webinars.index')
            ->with('success','Webinar has been deleted successfully');
    }
}
