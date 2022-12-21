<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LectorPageController extends Controller
{
    public function index(Request $request){
        $order = $request->get("order","id");
        $sort = $request->get("sort","asc");
        $lectors = User::query()->where("role",User::ROLE_LECTOR)->with("lector")->orderBY($order,$sort)->paginate(10);
        return view('admin.lectorpage.index', compact('lectors'));
    }
}
