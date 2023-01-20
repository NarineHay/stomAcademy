<?php

namespace App\Http\Livewire\Front;

use App\Models\Course;
use App\Models\Direction;
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

    public $sort = null;

    public $perPage = 15;

    protected $paginationTheme = 'bootstrap';

    function loadNext(){
        $this->perPage += 15;
    }

    public function render()
    {
        $courses_q = Course::query();
        if(count($this->selectedDirections) > 0){
            $courses_q = $courses_q->whereIn("direction_id",$this->selectedDirections);
        }
        $courses_ids = $courses_q->get()->map(function ($course){
            return $course->id;
        });
        $data['courses'] = Course::query()->withSum('webinars_object','duration')
            ->withCount('webinars')->whereIn("id",$courses_ids)->paginate($this->perPage);
        $data['directions'] = Direction::all();
        return view('livewire.front.courses-catalog',$data);
    }
}
