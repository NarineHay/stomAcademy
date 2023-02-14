<?php

namespace App\Http\Livewire\Front;

use App\Helpers\LG;
use App\Models\Course;
use App\Models\CourseInfo;
use App\Models\Direction;
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
        $courses_q = Course::query()->where('online', 1);
        if (count($this->selectedDirections) > 0) {
            $courses_q = $courses_q->whereIn("direction_id", $this->selectedDirections);
        }
        if(!empty($this->search)){
            $lg_id = LG::get();
            $ids = CourseInfo::query()->where("lg_id",$lg_id)->where("title","LIKE",$this->search."%")
                ->get()->map(function ($ci){ return $ci->course_id; });
            $courses_q = $courses_q->whereIn("id",$ids);
        }
        $data['courses'] = $courses_q->paginate($this->perPage);
        $data['directions'] = Direction::all();
        return view('livewire.front.personal-conferences', $data);
    }
}
