<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLectorStoreRequest;
use App\Models\Country;
use App\Models\Direction;
use App\Models\Lector;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class LectorController extends Controller
{
    public function index(Request $request){
        $order = $request->get("order","id");
        $sort = $request->get("sort","asc");
        $lectors = User::query()->where("role",User::ROLE_LECTOR)->with("lector")->orderBY($order,$sort)->paginate(10);
//        dd($lectors[0]->lector->direction);
        return view('admin.lectors.index', compact('lectors'));
    }

    public function create()
    {
        $data['countries'] =  Country::all();
        $data['directions'] =  Direction::all();
        return view('admin.lectors.create', $data);
    }

    public function store(AdminLectorStoreRequest $request)
    {
        $lector = new Lector();
        $lector->biography = $request->get('biography');
        $lector->direction_id = $request->get('direction_id');
        $lector->per_of_sales = $request->get('per_of_sales');
        $lector->avatar = $request->file('avatar')->store('public/lector');
        $lector->photo = $request->file('photo')->store('public/lector');

        $lector->save();
        $lector->user()->saveMany([
            new User([
                "name" => $request->get('name'),],),
            ]);
        $lector->direction()->saveMany([
            new Direction([
                "direction_id" => $request->get('direction|_id'),],),
        ]);
        $lector->user()->userinfo()->saveMany([
            new UserInfo([
                "country_id" => $request->get('country_id'),],),
        ]);
        return redirect()->route('admin.lectors.index')
            ->with('success', 'Lector has been created successfully.');
    }

    public function edit(User $lector)
    {
        if(!$lector->lector){
            $lector['lector'] = new Lector();
        }
        $data['countries'] = Country::all();
        $data['directions'] =  Direction::all();
        $data['user'] = $lector;
        return view('admin.lectors.edit',$data);
    }

    public function update(Request $request, Lector $lector)
    {
        $request->validate([
            'biography' => 'required',
            'per_of_sales' => 'required',
        ]);


        $lector = Lector::find($lector->id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $lector->user->userinfo->image = $request->file('image')->store('public/lector');
        }
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $lector->photo = $request->file('photo')->store('public/lector');
        }

        $lector->biography = $request->biography;
        $lector->per_of_sales = $request->per_of_sales;
        $lector->direction_id = $request->direction_id;
        $lector->user->update([
            "name" => $request->name,
        ]);
        $lector->user->userinfo->update([
            "country_id" => $request->country_id,
        ]);

        $lector->save();
        return redirect()->route('admin.lectors.index',$lector)
            ->with('success','Lector updated successfully');
    }

    public function destroy(Lector $lector)
    {
        $lector->delete();
        return redirect()->route('admin.lectors.index')
            ->with('success','Lector has been deleted successfully');
    }
}
