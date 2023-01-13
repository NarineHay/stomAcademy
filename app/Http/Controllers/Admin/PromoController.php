<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Prices;
use App\Models\Promo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index(Request $request)
    {
        $order = $request->get("order","id");
        $sort = $request->get("sort","asc");
        $promos = Promo::query()->orderBY($order,$sort)->paginate(10);
        return view('admin.promo.index', compact('promos'));
    }


    public function create()
    {
        return view('admin.promo.create');
    }

    public function store(Request $request)
    {
        $promo = new Promo();
        $promo->code = $request->get("code");
        $promo->prc = $request->get("prc");
        $promo->min = $request->get("min");
        $promo->max = $request->get("max");
        $promo->status = $request->boolean("status");
        $promo->save();
        return response()->redirectToRoute("admin.promo.index");
    }


    public function edit(Promo $promo)
    {
        return view('admin.promo.edit',compact('promo'));
    }

    public function update(Request $request, Promo $promo)
    {
        $promo->code = $request->get("code");
        $promo->prc = $request->get("prc");
        $promo->min = $request->get("min");
        $promo->max = $request->get("max");
        $promo->status = $request->boolean("status");
        $promo->save();
        //return response()->redirectToRoute("admin.promo.index");
        return redirect()->back()->with('success','Promo has been updated successfully');
    }

    public function destroy(Promo $promo)
    {
        $promo->delete();
        return redirect()->route('admin.promo.index');
    }
}
