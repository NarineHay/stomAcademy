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
        $bt_query = Blog::query()->take(4)->orderBy('id','desc');
        if($this->direction_id){
            $bt_query = $bt_query->where("category_id",$this->direction_id);
        }
        $data['blogs_top'] = $bt_query->get();
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
        $data['hasMore'] = $blog_query->orderBy('id','desc')->count() - $data['blogs']->count() > 0;
        return view('livewire.front.blogs-catalog',$data);
    }
}
