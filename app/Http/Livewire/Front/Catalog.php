<?php

namespace App\Http\Livewire\Front;

use App\Helpers\LG;
use App\Models\Course;
use App\Models\CourseDirection;
use App\Models\CourseWebinar;
use App\Models\Currency;
use App\Models\Direction;
use App\Models\User;
use App\Models\Webinar;
use App\Models\WebinarDirection;
use Illuminate\Support\Facades\Cookie;
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

    public $search;

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
// start
        $course_ids = null;
// end

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

//      start
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
//      end
        }

//        start
        if($course_ids){
            $webinars_q = $webinars_q->whereIn("id",$course_ids);
        }
//      end

        $cur = Currency::find(Cookie::get("currency_id",1))->currency_name;
        $webinars_q = $webinars_q
            ->select(["webinars.*","webinar_infos.title"])
            ->selectRaw("(SELECT count(*) from accesses where accesses.webinar_id = webinars.id ) as access_count")
            ->selectRaw("(SELECT prices.".$cur." from prices WHERE
                 CASE WHEN webinars.price_2_id > 0 THEN
                    prices.id = webinars.price_2_id
                  ELSE
                    prices.id = webinars.price_id
                  END
                 ) as price_")
            ->join("webinar_infos","webinar_infos.webinar_id","webinars.id")
            ->where("webinar_infos.lg_id",LG::get());


        if($this->sortBy == "price"){
            $webinars_q = $webinars_q->orderBy("price_");
        }elseif($this->sortBy == "default") {
            $webinars_q = $webinars_q->orderBy("start_date");
        }elseif($this->sortBy == "title") {
            $webinars_q = $webinars_q->orderBy("title");
        }elseif($this->sortBy == "popularity"){
            $webinars_q = $webinars_q->orderBy("access_count");
        }

        if($this->search){
            $webinars_q = $webinars_q->where("title","like","%".$this->search."%");
        }

        $this->count = $webinars_q->count();


        return $webinars_q->paginate($this->perPage);
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

        $cur = Currency::find(Cookie::get("currency_id",1))->currency_name;
        $courses_q = $courses_q
            ->select(["courses.*","course_infos.title"])
            ->selectRaw("(SELECT count(*) from accesses where accesses.course_id = courses.id ) as access_count")
            ->selectRaw("(SELECT prices.".$cur." from prices WHERE
                 CASE WHEN courses.price_2_id > 0 THEN
                    prices.id = courses.price_2_id
                  ELSE
                    prices.id = courses.price_id
                  END
                 ) as price_")
            ->join("course_infos","course_infos.course_id","courses.id")
            ->where("course_infos.lg_id",LG::get())
            ->withSum('webinars_object','duration')
            ->withCount('webinars');


        if($this->sortBy == "price"){
            $courses_q = $courses_q->orderBy("price_");
        }elseif($this->sortBy == "default") {
            $courses_q = $courses_q->orderBy("start_date");
        }elseif($this->sortBy == "title") {
            $courses_q = $courses_q->orderBy("title");
        }elseif($this->sortBy == "popularity"){
            $courses_q = $courses_q->orderBy("access_count");
        }

        if($this->search){
            $courses_q = $courses_q->where("title","like","%".$this->search."%");
        }


        $this->count = $courses_q->count();
        return $courses_q->paginate($this->perPage);
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

        $cur = Currency::find(Cookie::get("currency_id",1))->currency_name;
        $courses_q = $courses_q
            ->select(["courses.*","course_infos.title"])
            ->selectRaw("(SELECT count(*) from accesses where accesses.course_id = courses.id ) as access_count")
            ->selectRaw("(SELECT prices.".$cur." from prices WHERE
                 CASE WHEN courses.price_2_id > 0 THEN
                    prices.id = courses.price_2_id
                  ELSE
                    prices.id = courses.price_id
                  END
                 ) as price_")
            ->join("course_infos","course_infos.course_id","courses.id")
            ->where("course_infos.lg_id",LG::get())
            ->withSum('webinars_object','duration')
            ->withCount('webinars');


        if($this->sortBy == "price"){
            $courses_q = $courses_q->orderBy("price_");
        }elseif($this->sortBy == "default") {
            $courses_q = $courses_q->orderBy("start_date");
        }elseif($this->sortBy == "title") {
            $courses_q = $courses_q->orderBy("title");
        }elseif($this->sortBy == "popularity"){
            $courses_q = $courses_q->orderBy("access_count");
        }

        if($this->search){
            $courses_q = $courses_q->where("title","like","%".$this->search."%");
        }


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

        $cur = Currency::find(Cookie::get("currency_id",1))->currency_name;
        $courses_q = $courses_q
            ->select(["courses.*","course_infos.title"])
            ->selectRaw("(SELECT count(*) from accesses where accesses.course_id = courses.id ) as access_count")
            ->selectRaw("(SELECT prices.".$cur." from prices WHERE
                 CASE WHEN courses.price_2_id > 0 THEN
                    prices.id = courses.price_2_id
                  ELSE
                    prices.id = courses.price_id
                  END
                 ) as price_")
            ->join("course_infos","course_infos.course_id","courses.id")
            ->where("course_infos.lg_id",LG::get())
            ->withSum('webinars_object','duration')
            ->withCount('webinars');


        if($this->sortBy == "price"){
            $courses_q = $courses_q->orderBy("price_");
        }elseif($this->sortBy == "default") {
            $courses_q = $courses_q->orderBy("start_date");
        }elseif($this->sortBy == "title") {
            $courses_q = $courses_q->orderBy("title");
        }elseif($this->sortBy == "popularity"){
            $courses_q = $courses_q->orderBy("access_count");
        }

        if($this->search){
            $courses_q = $courses_q->where("title","like","%".$this->search."%");
        }

        $this->count = $courses_q->count();
        return $courses_q->paginate($this->perPage);
    }

}
