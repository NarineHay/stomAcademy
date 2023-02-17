<?php

namespace App\Http\Livewire\Front;

use App\Helpers\LG;
use App\Models\Access;
use App\Models\Course;
use App\Models\CourseInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PurchaseHistory extends Component
{
    public $search = "";
    public function render()
    {
        $user_id = Auth::user()->id;
        $ids = [];
        if(!empty($this->search)){
            $lg_id = LG::get();
            $ids = CourseInfo::query()->where("lg_id",$lg_id)->where("title","LIKE",$this->search."%")
                ->get()->map(function ($ci){ return $ci->course_id; });
//            $courses_q = $courses_q->whereIn("id",$ids);
        }
        $data['accesses'] = Access::query()->where('user_id',$user_id)
            ->whereIn('course_id',$ids)->orWhere('webinar_id',$ids)->get();
        return view('livewire.front.purchase-history',$data);
    }
}
