<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPagesStoreRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $order = $request->get("order","id");
        $sort = $request->get("sort","asc");
        $pages = Page::query()->orderBY($order,$sort)->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }
    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(AdminPagesStoreRequest $request)
    {
        $page = new Page();
        $page->meta_title = $request->get('meta_title');
        $page->meta_description = $request->get('meta_description');
        $page->heading = $request->get('heading');

        $page->save();
        return redirect()->route('admin.pages.index');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit',compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'meta_title' => 'required',
            'meta_description' => 'required',
            'heading' => 'required',
        ]);

        $page = Page::find($page->id);
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->heading = $request->heading;

        $page->save();
        return redirect()->route('admin.pages.index',$page)
            ->with('success','Page updated successfully');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')
            ->with('success','page has been deleted successfully');
    }
}
