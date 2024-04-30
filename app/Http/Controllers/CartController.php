<?php

namespace App\Http\Controllers;

use App\Helpers\Bepaid;
use App\Helpers\YooKassa;
use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Course;
use App\Models\Currency;
use App\Models\Order;
use App\Models\Prices;
use App\Models\Promo;
use App\Models\Webinar;
use App\Traits\Application\CreatApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Stripe\BaseStripeClient;
use Stripe\Stripe;
use Stripe\StripeClient;

class CartController extends Controller
{

    use CreatApplication;
    public function index(){
        return view('front.personal.cart');
    }

    function getCurrency(){
        $id = intval(Cookie::get("currency_id",1));
        $cur = Currency::find($id);
        return Str::lower($cur->currency_name);
    }

    public function order(Request $request){
        $cur = Currency::find(Cookie::get("currency_id",1))->currency_name;

        if($cur == 'RUB'){
            $result = YooKassa::createOrder($request->get("promo"));
        }
        else{
            $result = Bepaid::createOrder($request->get("promo"));
        }

        $order = Order::find($result['order_id']);
        $this->creat($order, 'order');

        return response()->redirectTo($result['url']);
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
