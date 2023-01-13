<?php

namespace App\Http\Livewire\Front;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogsCatalog extends Component
{
    use WithPagination;

    public $perPage = 8;

    protected $paginationTheme = 'bootstrap';

    function loadNext(){
        $this->perPage += 8;
    }

    public function render()
    {
        $data['blogs'] = Blog::query()->orderBy('id','desc')->paginate($this->perPage);
        $data['blog'] = Blog::query()->take(3)->orderBy('id','desc')->get();
        return view('livewire.front.blogs-catalog',compact('data'));
    }
}
