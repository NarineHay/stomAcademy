<?php

namespace App\Http\Livewire\Front;

use App\Helpers\LG;
use App\Models\Access;
use App\Models\Course;
use App\Models\CourseDirection;
use App\Models\CourseInfo;
use App\Models\Direction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PersonalConferences extends Component
{
    use WithPagination;

    public function __construct($id = null)
    {
        parent::__construct($id);
        if ($direction_id = request()->get("direction_id", null)) {
            $this->selectedDirections[] = $direction_id;
        }
    }

    public $selectedDirections = [];

    public $sort = null;

    public $perPage = 9;

    public $search = "";

    protected $paginationTheme = 'bootstrap';

    function loadNext()
    {
        $this->perPage += 9;
    }

    public function render()
    {
        $ids = Access::query()->whereNotNull("course_id")->where("user_id",Auth::user()->id)->get()->map(function ($c){
            return $c->course_id;
        });

        if (count($this->selectedDirections) > 0) {
            $ids = $ids->intersect(CourseDirection::query()->whereIn("direction_id",$this->selectedDirections)->get()
                ->map(function ($d){
                    return $d->course_id;
                }));
        }

        if(!empty($this->search)){
            $lg_id = LG::get();
            $ids = $ids->intersect(CourseInfo::query()->where("lg_id",$lg_id)->where("title","LIKE",$this->search."%")
                ->get()->map(function ($ci){ return $ci->course_id; }));
        }
        $courses_q = Course::query()->whereIn("id",$ids)->where('online', 1);
        $data['courses'] = $courses_q->paginate($this->perPage);
        $data['directions'] = Direction::all();
        return view('livewire.front.personal-conferences', $data);
    }
}
