<?php

namespace App\Http\Livewire\Front;

use App\Models\Blog;
use App\Models\Direction;
use Livewire\Component;
use Livewire\WithPagination;

class BlogsCatalog extends Component
{
    use WithPagination;

    public $perPage = 8;

    public $direction_id = null;

    protected $paginationTheme = 'bootstrap';

    function loadNext(){
        $this->perPage += 8;
    }

    function setDirectionId($id){
        $this->direction_id = $id;
    }

    public function render()
    {
        $data['blogs_top'] = Blog::query()->take(4)->orderBy('id','desc')->get();
        $ids = $data['blogs_top']->map(function ($blog){
            return $blog->id;
        });
        $data['blog_top'] = $data['blogs_top']->shift(1);
        $data['directions'] = Direction::all();

        $blog_query = Blog::query()->whereNotIn("id",$ids);
        if($this->direction_id){
            $blog_query = $blog_query->where("category_id",$this->direction_id);
        }
        $data['blogs'] = $blog_query->orderBy('id','desc')->paginate($this->perPage);

        return view('livewire.front.blogs-catalog',$data);
    }
}
