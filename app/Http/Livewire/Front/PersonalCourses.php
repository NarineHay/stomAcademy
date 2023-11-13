<?php

namespace App\Http\Livewire\Front;

use App\Helpers\LG;
use App\Models\Access;
use App\Models\Course;
use App\Models\CourseDirection;
use App\Models\CourseInfo;
use App\Models\CourseWebinar;
use App\Models\Direction;
use App\Models\Webinar;
use App\Models\WebinarDirection;
use App\Models\WebinarInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PersonalCourses extends Component
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

    public $sort = null;

    public $perPage = 9;

    public $count;

    public $search = "";

    protected $paginationTheme = 'bootstrap';

    function loadNext(){
        $this->perPage += 9;
    }

    public function render()
    {
        $course_ids = Access::query()->whereNotNull("course_id")->where("user_id",Auth::user()->id)->get()->map(function ($c){
            return $c->course_id;
        });

        $webinar_ids = CourseWebinar::query()->whereIn("course_id",$course_ids)->get()
            ->map(function ($item){
                return $item->webinar_id;
            });

        Access::query()->whereNotNull("webinar_id")->where("user_id",Auth::user()->id)->get()->map(function ($c){
            return $c->webinar_id;
        })->map(function ($item) use (&$webinar_ids){
            $webinar_ids->push($item);
        })->unique();


        if (count($this->selectedDirections) > 0) {
            $webinar_ids = $webinar_ids->intersect(WebinarDirection::query()->whereIn("direction_id",$this->selectedDirections)->get()
                ->map(function ($d){
                    return $d->webinar_id;
                }));
        }

        if(!empty($this->search)){
            $lg_id = LG::get();
            $webinar_ids = $webinar_ids->intersect(WebinarInfo::query()->where("lg_id",$lg_id)->where("title","LIKE",$this->search."%")
                ->get()->map(function ($ci){ return $ci->webinar_id; }));
        }
        $webinar_q = Webinar::query()->whereIn("id",$webinar_ids);
        $this->count = $webinar_q->count();
        $data['webinars'] = $webinar_q->paginate($this->perPage);
        $data['directions'] = Direction::all();
        return view('livewire.front.personal-courses', $data);
    }
}
