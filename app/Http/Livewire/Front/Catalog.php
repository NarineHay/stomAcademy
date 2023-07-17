<?php

namespace App\Http\Livewire\Front;

use App\Models\Course;
use App\Models\CourseDirection;
use App\Models\CourseWebinar;
use App\Models\Direction;
use App\Models\User;
use App\Models\Webinar;
use App\Models\WebinarDirection;
use Livewire\Component;
use Livewire\WithPagination;

class Catalog extends Component
{
    public $type = "catalog";

    use WithPagination;

    public $selectedDirections = [];

    public $selectedLectors = [];

    public $perPage = 15;

    public $sortBy;

    public $count;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->sortBy = "default";
    }

    function loadNext(){
        $this->perPage += 15;
    }

    public function render()
    {
        switch ($this->type){
            case "courses":
                $data['courses'] = $this->getCourses();
                break;
            case "webinars":
                $data['courses'] = $this->getWebinars();
                break;
            case "conferences":
                $data['courses'] = $this->getOnline();
                break;
            case "catalog":
                $data['courses'] = $this->getAll();
                break;
        }

        $data['directions'] = Direction::all();
        $data['lectors'] = User::query()->where("role",User::ROLE_LECTOR)->get();
        return view('livewire.front.catalog',$data);
    }

    function getWebinars(){
        $webinars_q = Webinar::query();

        if(count($this->selectedDirections) > 0){
            $webinar_ids = WebinarDirection::query()->whereIn("direction_id",$this->selectedDirections)->get()
                ->map(function ($wd){
                    return $wd->webinar_id;
                });
            $webinars_q = $webinars_q->whereIn("id", $webinar_ids);
        }
        if(count($this->selectedLectors) > 0){
            $webinars_q = $webinars_q->whereIn("user_id", $this->selectedLectors);
        }

        if ($this->sortBy == 'price') {
//            dd("price");
        }
        else if ($this->sortBy == 'title') {
//            dd("title");
        } else if ($this->sortBy == 'popularity') {
//            dd("popularity");
        }
        else {
            $webinars_q = $webinars_q->paginate($this->perPage);
        }

        return $webinars_q;
    }

    function getCourses(){
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

        return $courses_q->withSum('webinars_object','duration')
            ->withCount('webinars')->paginate($this->perPage);
    }

    function getOnline(){
        $course_ids = null;
        $courses_q = Course::query()->where('online',1);
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

        $courses_q = $courses_q->withSum('webinars_object','duration')
            ->withCount('webinars');
        $this->count = $courses_q->count();
        return $courses_q->paginate($this->perPage);
    }

    function getAll(){
        $course_ids = null;
        $courses_q = Course::query();
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

        $courses_q = $courses_q->withSum('webinars_object','duration')
            ->withCount('webinars');
        $this->count = $courses_q->count();
        return $courses_q->paginate($this->perPage);
    }
}
