<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserStoreRequest;
use App\Models\Country;
use App\Models\Direction;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $order = $request->get("order","id");
        $sort = $request->get("sort","asc");
        $users = User::query()->with('userinfo')->orderBY($order,$sort)->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $data['countries'] = Country::all();
        $data['directions'] = Direction::all();
        return view('admin.users.create', $data);
    }

    public function store(AdminUserStoreRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->role = $request->get('role');
        $user->save();
        $directions = $request->get('direction',[]);
        foreach ($directions as $direction_id){
            $user->directions()->create([
                "direction_id" => $direction_id
            ]);
        }
        $user->userinfo()->saveMany([
            new UserInfo([
                "youtube_email" => $request->get('youtube_email'),
                "phone" => $request->get('phone'),
                "birth_date" => $request->get('birth_date'),
                "country_id" => $request->get('country_id'),
                "city" => $request->get('city'),
                "status" => $request->boolean('status'),
                "image" => $request->file('image')->store('public/userimages')
            ],),
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User has been created successfully.');
    }

    public function edit(User $user)
    {
        $data['countries'] = Country::all();
        $data['directions'] = Direction::all();
        return view('admin.users.edit',compact('user','data'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'youtube_email' => 'required',
            'phone' => 'required',
            'birth_date' => 'required',
            'country_id' => 'required',
            'city' => 'required',
        ]);

        $user = User::find($user->id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $user->userinfo->image = $request->file('image')->store('public/userimages');
        }

        $directions = $request->get('direction',[]);
        $user->directions()->delete();
        foreach ($directions as $direction_id){
            $user->directions()->create([
                "direction_id" => $direction_id
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;

        $user->userinfo->update([
            "youtube_email" => $request->youtube_email,
            "phone" => $request->phone,
            "birth_date" => $request->birth_date,
            "country_id" => $request->country_id,
            "city" => $request->city,
            "status" => $request->boolean('status'),
        ]);

        $user->save();
        return redirect()->route('users.index',$user)
            ->with('success','User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success','User has been deleted successfully');
    }
}
