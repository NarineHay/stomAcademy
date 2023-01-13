<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminBlogStoreRequest;
use App\Models\Blog;
use App\Models\Direction;
use App\Models\Language;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $order = $request->get("order","id");
        $sort = $request->get("sort","asc");
        $blogs = Blog::query()->orderBY($order,$sort)->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $data['directions'] = Direction::all();
        return view('admin.blogs.create',compact('data'));
    }

    public function store(AdminBlogStoreRequest $request)
    {
        $request->validate([
            'title.*' => 'required',
            'text.*' => 'required',
            'image.*' => 'required',
        ]);

        $blog = new Blog();
        $blog->category_id = $request->get('category_id');
        $blog->save();

        $titles = $request->get("title");
        $texts = $request->get("text");
        $images = $request->file("image");

        foreach (Language::all() as $lg){
            $blog->infos()->create(
                [
                    'lg_id' => $lg->id,
                    'title' => $titles[$lg->id],
                    'text' => $texts[$lg->id],
                    'image' => $images[$lg->id]->store('public/blog'),
                ]
            );
        }

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog has been created successfully.');
    }

    public function edit(Blog $blog)
    {
        $directions  = Direction::all();
        return view('admin.blogs.edit',compact('blog','directions'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title.*' => 'required',
            'text.*' => 'required',
            'image.*' => 'required',
        ]);

        $blog = Blog::find($blog->id);

        $blog->category_id = $request->category_id;
        foreach ($request->get("title",[]) as $lg_id => $title){
            $blog->infos()->where("lg_id",$lg_id)->update(['title' => $title]);
        }

        foreach ($request->get("text",[]) as $lg_id => $text){
            $blog->infos()->where("lg_id",$lg_id)->update(['text' => $text]);
        }

        foreach ($request->file("image",[]) as $lg_id => $image){
            $blog->infos()->where("lg_id",$lg_id)->update([
                'image' => $image->store('public/blog')
            ]);
        }

        $blog->save();
        return redirect()->back()->with('success','Blog has been updated successfully');
    }

    public function destroy(Blog $blog){
        $blog->delete();
        return redirect()->route('admin.blogs.index')
            ->with('success','Blog has been deleted successfully');
    }
}
