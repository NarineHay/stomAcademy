<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPagesStoreRequest;
use App\Models\Language;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $order = $request->get("order","id");
        $sort = $request->get("sort","asc");
        $data['pages'] = Page::query()->orderBY($order,$sort)->paginate(10);
        return view('admin.pages.index', $data);
    }
    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $page = new Page();
        $page->url = $request->get('url');

        $page->save();
        $meta_titles = $request->get("meta_title");
        $meta_descriptions = $request->get("meta_description");
        $headings = $request->get("heading");
        foreach (Language::all() as $lg){
            $page->infos()->create(
                [
                    'enabled' => boolval($enables[$lg->id] ?? false),
                    'lg_id' => $lg->id,
                    'meta_title' => $meta_titles[$lg->id],
                    'meta_description' => $meta_descriptions[$lg->id],
                    'heading' => $headings[$lg->id],
                ]
            );
        }
        return redirect()->route('admin.pages.index')
            ->with('success', 'Page has been created successfully.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit',compact('page'));
    }

    public function update(Request $request, Page $page)
    {
//        $request->validate([
//            'meta_title.*' => 'required',
//            'meta_description.*' => 'required',
//            'heading.*' => 'required',
//            'url' => 'required'
//        ]);

        $page = Page::find($page->id);

        $page->url = $request->url;

        foreach ($request->get("meta_title",[]) as $lg_id => $meta_title){
            $page->infos()->where("lg_id",$lg_id)->update(['meta_title' => $meta_title]);
        }
        foreach ($request->get("meta_description",[]) as $lg_id => $meta_description){
            $page->infos()->where("lg_id",$lg_id)->update(['meta_description' => $meta_description]);
        }
        foreach ($request->get("heading",[]) as $lg_id => $heading){
            $page->infos()->where("lg_id",$lg_id)->update(['heading' => $heading]);
        }

        $page->infos()->update(['enabled' => false]);

        foreach ($request->get("enabled",[]) as $lg_id => $enabled){
            $page->infos()->where("lg_id",$lg_id)->update(['enabled' => true]);
        }

        $page->save();
        return redirect()->back()->with('success','Page has been updated successfully');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')
            ->with('success','Page has been deleted successfully');
    }
}
