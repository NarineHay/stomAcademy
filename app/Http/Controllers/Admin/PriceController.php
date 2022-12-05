<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPriceStoreRequest;
use App\Models\Prices;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index(Request $request)
    {
        $order = $request->get("order","id");
        $sort = $request->get("sort","asc");
        $prices = Prices::query()->orderBY($order,$sort)->paginate(10);
        return view('admin.prices.index', compact('prices'));
    }

    public function create()
    {
        return view('admin.prices.create');
    }

    public function store(AdminPriceStoreRequest $request)
    {
        $price = new Prices();
        $price->name = $request->get('name');
        $price->byn = $request->get('byn');
        $price->rub = $request->get('rub');
        $price->usd = $request->get('usd');
        $price->eur = $request->get('eur');
        $price->uah = $request->get('uah');

        $price->save();
        return redirect()->route('admin.prices.index')
            ->with('success', 'Price has been created successfully.');
    }

    public function edit(Prices $price)
    {
        return view('admin.prices.edit',compact('price'));
    }

    public function update(Request $request, Prices $price)
    {
        $request->validate([
            'name' => 'required',
            'byn' => 'required',
            'rub' => 'required',
            'usd' => 'required',
            'eur' => 'required',
            'uah' => 'required',
        ]);

        $price = Prices::find($price->id);
        $price->name = $request->name;
        $price->byn = $request->byn;
        $price->rub = $request->rub;
        $price->usd = $request->usd;
        $price->eur = $request->eur;
        $price->uah = $request->uah;
        $price->save();
        return redirect()->route('admin.prices.index',$price)
            ->with('success','Price updated successfully');
    }

    public function destroy(Prices $price)
    {
        $price->delete();
        return redirect()->route('admin.prices.index')
            ->with('success','Price has been deleted successfully');
    }
}
