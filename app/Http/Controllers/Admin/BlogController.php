<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Direction;
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

    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->get('title');
        $blog->text = $request->get('text');
        $blog->image = $request->file('image')->store('public/blog');
        $blog->category_id = $request->get('category_id');
        $blog->save();

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
            'title' => 'required',
            'text' => 'required',
        ]);

        $blog = Blog::find($blog->id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $blog->image = $request->file('image')->store('public/blog');
        }

        $blog->title = $request->title;
        $blog->text = $request->text;
        $blog->category_id = $request->category_id;

        $blog->save();
        return redirect()->route('admin.blogs.index',$blog)
            ->with('success','Blog has been updated successfully');
    }

    public function destroy(Blog $blog){
        $blog->delete();
        return redirect()->route('admin.blogs.index')
            ->with('success','Blog has been deleted successfully');
    }
}
