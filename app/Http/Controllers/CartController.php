<?php

namespace App\Http\Controllers;

use App\Helpers\Bepaid;
use App\Helpers\CRM;
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
    public function __construct(Request $request) {


        // Проверяем условие и устанавливаем куки
        // if (isset($request->cur) && $request->cur == 'UAH') {
        //     // Устанавливаем cookie с именем 'currency_id', значением '3' и сроком действия 60 минут
        //     Cookie::queue(Cookie::make('currency_id', 3, 60));
        // }
        // personal.cart.order

        // Cookie::queue(Cookie::make('currency_id', $request->cur_id, 60));

    }

    use CreatApplication;
    public function index(){
        return view('front.personal.cart');
    }

    function getCurrency(){
        $id = intval(Cookie::get("currency_id",1));
        $cur = Currency::find($id);
        return Str::lower($cur->currency_name);
    }
    public function setCookie()
    {
        $minutes = 30;
        $response = response('Cookie has been set');

        // Attach the cookie to the response
        $response->withCookie(cookie()->forever('currency_id', 3));

        return $response;
    }

    public function order(Request $request){
        $cur = Currency::find(Cookie::get("currency_id",1))->currency_name;

        if($cur == 'RUB'){
            $result = YooKassa::createOrder($request->get("promo"), 'cart', null);
        }
        else{


            // if (Currency::getCur() == 'UAH') {
            //     // $this->setCookie();
            //     // return $response;
            //     // Cookie::queue(Cookie::make('currency_id', 3, 60));
            //     // request()->cookie('currency_id',3,5);
            //     dd($request->cookie('currency_id'));
            // }
            $result = Bepaid::createOrder($request->get("promo"), 'cart', null);
        }

        if($result){
            $order = Order::find($result['order_id']);
            $this->creatApp($order, 'order');
            // CRM::payment($order);
            return response()->redirectTo($result['url']);
        }

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

        CRM::addToCart($cart);
        return redirect()->back();
    }

    public function remove(Cart $cart)
    {
        $cart->delete();
        return redirect()->back();
    }
}
