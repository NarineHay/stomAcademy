<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        return view('admin.promo.edit',compact('promo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        $promo->code = $request->get("code");
        $promo->prc = $request->get("prc");
        $promo->min = $request->get("min");
        $promo->max = $request->get("max");
        $promo->status = $request->boolean("status");
        $promo->save();
        return response()->redirectToRoute("admin.promo.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
