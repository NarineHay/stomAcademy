<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCourseStoreRequest;
use App\Models\Course;
use App\Models\Direction;
use App\Models\Language;
use App\Models\Lector;
use App\Models\Prices;
use App\Models\Webinar;
use App\Models\WebinarInfo;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    public function index(Request $request){
        $order = $request->get("order","id");
        $sort = $request->get("sort","asc");
        $data['courses'] = Course::query()->orderBY($order,$sort)->paginate(10);
        return view('admin.courses.index',$data);
    }

    public function create()
    {
        $data['webinars'] = Webinar::all();
        $data['prices'] = Prices::all();
        $data['directions'] = Direction::all();
        return view('admin.courses.create', $data);
    }

    public function store(AdminCourseStoreRequest $request)
    {
        $course = new Course();
        $course->start_date = $request->get('start_date');
        $course->end_date = $request->get('end_date');
        $course->video = $request->get('video');
        $course->price_id = $request->get('price_id');
        $course->direction_id = $request->get('direction_id');
        $course->url_to_page = $request->get('url_to_page');
        $course->image = $request->file('image')->store('public/course');

        $course->save();

        $titles = $request->get("title");
        $descriptions = $request->get("description");

        $webinars = $request->get('webinar',[]);
        foreach ($webinars as $webinar_id){
            $course->webinars()->create([
                "webinar_id" => $webinar_id
            ]);
        }

        foreach (Language::all() as $lg){
            $course->infos()->create(
                [
                    'lg_id' => $lg->id,
                    'title' => $titles[$lg->id],
                    'description' => $descriptions[$lg->id],
                ]
            );
        }

        return redirect()->route('admin.course.index')
            ->with('success', 'Course has been created successfully.');
    }

    public function edit(Course $course)
    {
        $data['prices'] = Prices::all();
        $data['webinar'] = Webinar::all();
        $data['directions'] = Direction::all();
        return view('admin.courses.edit',compact('course','data'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title.*' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description.*' => 'required',
        ]);

        $course = Course::find($course->id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $course->image = $request->file('image')->store('public/course');
        }

        $webinars = $request->get('webinar',[]);
        $course->webinars()->delete();
        foreach ($webinars as $webinar_id){
            $course->webinars()->create([
                "webinar_id" => $webinar_id
            ]);
        }

        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->video = $request->video;
        $course->url_to_page = $request->url_to_page;
        $course->price_id = $request->price_id;
        $course->direction_id = $request->direction_id;

        foreach ($request->get("description",[]) as $lg_id => $desc){
            $course->infos()->where("lg_id",$lg_id)->update(['description' => $desc]);
        }

        foreach ($request->get("title",[]) as $lg_id => $title){
            $course->infos()->where("lg_id",$lg_id)->update(['title' => $title]);
        }

        $course->save();
        return redirect()->back()->with('success','Course has been updated successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.course.index')
            ->with('success','Course has been deleted successfully');
    }
}
