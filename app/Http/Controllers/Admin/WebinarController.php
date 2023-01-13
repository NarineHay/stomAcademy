<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminWebinarStoreRequest;
use App\Models\Direction;
use App\Models\Language;
use App\Models\Lector;
use App\Models\Prices;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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
        $data['directions'] = Direction::all();
        return view('admin.webinars.create', $data);
    }

    public function store(AdminWebinarStoreRequest $request)
    {
        $webinar = new Webinar();
        $webinar->user_id = $request->get("user_id");
        $webinar->start_date = $request->get('start_date');
        $webinar->duration = $request->get('duration');
        $webinar->price_id = $request->get('price_id');
        $webinar->direction_id = $request->get('direction_id');
        $webinar->image = $request->file('image')->store('public/webinar');
        $webinar->save();


        $titles = $request->get("title");
        $descriptions = $request->get("description");
        $programs = $request->get("program");
        $video_invitations = $request->get("video_invitation");
        $videos = $request->get("video");

        foreach (Language::all() as $lg){
            $webinar->infos()->create(
                [
                    'webinar_id' => $webinar->id,
                    'lg_id' => $lg->id,
                    'title' => $titles[$lg->id],
                    'description' => $descriptions[$lg->id],
                    'program' => $programs[$lg->id],
                    'video_invitation' => $video_invitations[$lg->id],
                    'video' => $videos[$lg->id],
                ]
            );
        }

        return redirect()->route('admin.webinar.index')
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
            'title.*' => 'required',
            'start_date' => 'required',
            'duration' => 'required',
            'description.*' => 'required',
            'program.*' => 'required',
        ]);

        $webinar = Webinar::find($webinar->id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $webinar->image = $request->file('image')->store('public/webinar');
        }

        $webinar->start_date = $request->start_date;
        $webinar->duration = $request->duration;
        $webinar->price_id = $request->price_id;
        $webinar->status = $request->status;
        $webinar->direction_id = $request->get('direction_id');

        foreach ($request->get("title",[]) as $lg_id => $title){
            $webinar->infos()->where("lg_id",$lg_id)->update(['title' => $title]);
        }

        foreach ($request->get("description",[]) as $lg_id => $desc){
            $webinar->infos()->where("lg_id",$lg_id)->update(['description' => $desc]);
        }

        foreach ($request->get("program",[]) as $lg_id => $program){
            $webinar->infos()->where("lg_id",$lg_id)->update(['program' => $program]);
        }

        foreach ($request->get("video_invitation",[]) as $lg_id => $video_inv){
            $webinar->infos()->where("lg_id",$lg_id)->update(['video_invitation' => $video_inv]);
        }

        foreach ($request->get("video",[]) as $lg_id => $video){
            $webinar->infos()->where("lg_id",$lg_id)->update(['video' => $video]);
        }

        $webinar->save();
        return redirect()->back()->with('success','Webinar has been updated successfully');
    }

    public function destroy(Webinar $webinar){
        $webinar->delete();
        return redirect()->route('admin.webinar.index')
            ->with('success','Webinar has been deleted successfully');
    }
}
