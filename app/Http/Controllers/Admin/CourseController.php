<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCourseStoreRequest;
use App\Models\Course;
use App\Models\Lector;
use App\Models\Prices;
use App\Models\Webinar;
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
        return view('admin.courses.create', $data);
    }

    public function store(AdminCourseStoreRequest $request)
    {
        $course = new Course();
        $course->title = $request->get('title');
        $course->start_date = $request->get('start_date');
        $course->end_date = $request->get('end_date');
        $course->description = $request->get('description');
        $course->video = $request->get('video');
        $course->price_id = $request->get('price_id');

        $course->save();
        $webinars = $request->get('webinar',[]);
        foreach ($webinars as $webinar_id){
            $course->webinars()->create([
                "webinar_id" => $webinar_id
            ]);
        }

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course has been created successfully.');
    }

    public function edit(Course $course)
    {
        $data['prices'] = Prices::all();
        $data['courses'] = Course::all();
        $data['webinars'] = Webinar::all();
        return view('admin.courses.edit',compact('course','data'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
            'video' => 'required',
        ]);

        $course = Course::find($course->id);

        $webinars = $request->get('webinar',[]);
        $course->webinars()->delete();
        foreach ($webinars as $webinar_id){
            $course->webinars()->create([
                "webinar_id" => $webinar_id
            ]);
        }

        $course->title = $request->title;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->description = $request->description;
        $course->video = $request->video;
        $course->price_id = $request->price_id;

        $course->save();
        return redirect()->route('admin.courses.index',$course)
            ->with('success','Course has been updated successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')
            ->with('success','Course has been deleted successfully');
    }
}
