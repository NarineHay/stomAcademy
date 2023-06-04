<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Course;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        return view('front.personal.cart');
    }

    function addMany(Request $request){
        foreach ($request->get("item_id",[]) as $item_id){
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->item_id = $item_id;
            $cart->type = "webinar";
            $cart->save();
        }
        return response()->redirectToRoute("personal.cart");
    }

    public function add(Request $request)
    {
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->item_id = $request->get('id');
        $cart->type = $request->get('type');
        $cart->save();
        return redirect()->back();
    }

    public function remove(Cart $cart)
    {
        $cart->delete();
        return redirect()->back();
    }
}
