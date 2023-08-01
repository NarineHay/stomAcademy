<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCourseStoreRequest;
use App\Models\Course;
use App\Models\CourseDirection;
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
        $search_course = $request->integer("search_course", 0);
        $course_query = Course::query();
        if ($search_course > 0) {
            $course_query = $course_query->where("id", $search_course);
        }
        $all_courses = Course::all();
        $courses = $course_query->orderBY($order,$sort)->paginate(10);
        return view('admin.courses.index',compact('courses','search_course','all_courses'));
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
        $video = $request->get('video');
        //////
        $course->video = $request->get('video');
        $course->price_id = $request->get('price_id');
        $course->price_2_id = $request->get('price_2_id');
        //$course->direction_id = $request->get('direction_id');
        $course->url_to_page = $request->get('url_to_page');
        if($request->has('image')){
            $course->image = $request->file('image')->store('public/course');
        }
        if($request->has('bg_image')){
            $course->bg_image = $request->file('bg_image')->store('public/course');
        }
        $course->online = $request->boolean('online');


        $course->save();

        foreach ($request->get("direction_ids",[]) as $direction_id){
            $wb = new CourseDirection();
            $wb->course_id = $course->id;
            $wb->direction_id = $direction_id;
            $wb->save();
        }

        $titles = $request->get("title");

        $descriptions = $request->get("description");

        $webinars = $request->get('webinar',[]);
        foreach ($webinars as $webinar_id){
            $course->webinars()->create([
                "webinar_id" => $webinar_id
            ]);
        }
        if (!str_contains($video, "player")) {
            $video = str_replace("vimeo.com", "player.vimeo.com/video", $video);
        }
        $course->video = $video;
//        $course->video = $video ."&vq=hd1080";
        foreach (Language::all() as $lg){
//            if (!str_contains($video[$lg->id], "player")) {
//                $video[$lg->id] = str_replace("vimeo.com", "player.vimeo.com/video", $video[$lg->id]);
//            }
            $course->infos()->create(
                [
                    'enabled' => boolval($enables[$lg->id] ?? false),
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
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $course = Course::find($course->id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $course->image = $request->file('image')->store('public/course');
        }
        if($request->hasFile('bg_image')){
            $request->validate([
                'bg_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $course->bg_image = $request->file('bg_image')->store('public/course');
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

        $video = $request->video;

        if (!str_contains($video, "player")) {
            $video = str_replace("vimeo.com", "player.vimeo.com/video", $video);
        }
        $course->video = $video;
//        $course->video = $video ."&vq=hd1080";

        $course->url_to_page = $request->url_to_page;
        $course->price_id = $request->price_id;
        $course->price_2_id = $request->get('price_2_id',null);
//        $course->direction_id = $request->direction_id;
        $course->online = $request->boolean('online');

        CourseDirection::query()->where("course_id",$course->id)->delete();
        foreach ($request->get("direction_ids",[]) as $direction_id){
            $wb = new CourseDirection();
            $wb->course_id = $course->id;
            $wb->direction_id = $direction_id;
            $wb->save();
        }

        foreach ($request->get("description",[]) as $lg_id => $desc){
            $course->infos()->where("lg_id",$lg_id)->update(['description' => $desc]);
        }

        foreach ($request->get("title",[]) as $lg_id => $title){
            $course->infos()->where("lg_id",$lg_id)->update(['title' => $title]);
        }

        $course->infos()->update(['enabled' => false]);
        foreach ($request->get("enabled",[]) as $lg_id => $enabled){
            $course->infos()->where("lg_id",$lg_id)->update(['enabled' => true]);
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
