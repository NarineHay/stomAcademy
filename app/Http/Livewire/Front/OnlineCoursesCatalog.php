<?php

namespace App\Http\Livewire\Front;

use App\Models\Course;
use App\Models\CourseWebinar;
use App\Models\Direction;
use App\Models\User;
use App\Models\Webinar;
use Livewire\Component;
use Livewire\WithPagination;

class OnlineCoursesCatalog extends Component
{
    use WithPagination;

    public function __construct($id = null)
    {
        parent::__construct($id);
        if($direction_id = request()->get("direction_id",null)){
            $this->selectedDirections[] = $direction_id;
        }
    }

    public $selectedDirections = [];

    public $selectedLectors = [];

    public $sort = null;

    public $perPage = 15;

    protected $paginationTheme = 'bootstrap';

    function loadNext(){
        $this->perPage += 15;
    }

    public function render()
    {
        $courses_q = Course::query()->where('online',1);
        $courses_ids = Course::all()->map(function ($course){
            return $course->id;
        });
        if(count($this->selectedDirections) > 0){
            $courses_q = $courses_q->whereIn("direction_id",$this->selectedDirections);
        }
        if(count($this->selectedLectors) > 0){
            $webinars_ids = Webinar::query()->whereIn("user_id",$this->selectedLectors)->get()->map(function ($webinar){
                return $webinar->id;
            });
            $courses_ids = CourseWebinar::query()->whereIn("webinar_id",$webinars_ids)->get()->map(function ($cw){
                return $cw->course_id;
            });
            $courses_q = $courses_q->whereIn("id",$courses_ids);
        }

        $courses = $courses_q->withSum('webinars_object','duration')->with("price")
            ->with("info")->with("directions")
            ->withCount('webinars')->paginate($this->perPage);
//        $courses_ids = [];
//        foreach ($courses->items() as $course){
//            $courses_ids[] = $course['id'];
//        }
//        $webinars_ids = CourseWebinar::query()->whereIn("course_id",$courses_ids)->get()->map(function ($cw){
//            return $cw['webinar_id'];
//        })->unique();

        $data['courses'] = $courses;
        $data['lectors'] = User::query()->get();
        $data['directions'] = Direction::all();
        return view('livewire.front.online-courses-catalog',$data);
    }
}
