<?php

namespace App\Http\Livewire\Front;

use App\Models\Course;
use App\Models\CourseDirection;
use App\Models\CourseWebinar;
use App\Models\Direction;
use App\Models\User;
use App\Models\Webinar;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesCatalog extends Component
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

    public $price;

    public $popular;

    public $name;

    protected $paginationTheme = 'bootstrap';

    function loadNext(){
        $this->perPage += 15;
    }

    public function render()
    {
        $course_ids = null;
        $courses_q = Course::query()->where('online',0);
        if(count($this->selectedDirections) > 0){
            $course_ids = CourseDirection::query()->whereIn("direction_id",$this->selectedDirections)
                ->get()->map(function ($course){
                    return $course->course_id;
                });
        }
        if(count($this->selectedLectors) > 0){
            $webinars_ids = Webinar::query()->whereIn("user_id",$this->selectedLectors)->get()->map(function ($webinar){
                return $webinar->id;
            });
            $courses_ids__ = CourseWebinar::query()->whereIn("webinar_id",$webinars_ids)->get()->map(function ($cw){
                return $cw->course_id;
            });
            if($course_ids){
                $course_ids = $course_ids->filter(function ($cid) use ($courses_ids__){
                     return $courses_ids__->contains($cid);
                });
            }else{
                $course_ids = $courses_ids__;
            }
        }
        if($course_ids){
            $courses_q = $courses_q->whereIn("id",$course_ids);
        }


        $data['courses'] = $courses_q->withSum('webinars_object','duration')
            ->withCount('webinars')->paginate($this->perPage);
        $data['lectors'] = User::query()->get();
        $data['directions'] = Direction::all();
        return view('livewire.front.courses-catalog',$data);
    }
}
