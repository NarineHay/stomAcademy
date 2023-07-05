<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Course;
use App\Models\Currency;
use App\Models\Promo;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Stripe\BaseStripeClient;
use Stripe\Stripe;
use Stripe\StripeClient;

class CartController extends Controller
{
    public function index(){
        return view('front.personal.cart');
    }

    function getCurrency(){
        $id = intval(Cookie::get("currency_id",1));
        $cur = Currency::find($id);
        return Str::lower($cur->currency_name);
    }

    public function order(Request $request){
        $stripe_prices = [];
        $stripe = new StripeClient(env("STRIPE_PRIVATE_KEY"));
        $card = Cart::query()->where("user_id",Auth::user()->id)->get();
        $prc = 0;
        if($request->get("promo"))
        {
            $promo = Promo::query()->where("code",$request->get("promo"))->first();
            $prc = $promo->prc;
        }
        $card->map(function ($item) use (&$total,$stripe,&$stripe_prices,$prc){
            if($item->type == "course"){
                $item['course'] = Course::query()->withCount("webinars")->withSum('webinars_object','duration')
                    ->where("id",$item->item_id)->with("info")->first();
                $product = $stripe->products->create(['name' => $item['course']->info->title]);
                $stripe_prices[] = [
                    "price" => $stripe->prices->create([
                        'product' => $product->id,
                        'unit_amount' => $item['course']->price->pure()*100*((100-$prc)/100),
                        'currency' => $this->getCurrency(),
                    ])->id,
                    "quantity" => 1
                ];
            }elseif($item->type == "webinar"){
                $item['webinar'] = Webinar::query()->where("id",$item->item_id)->with("info")->first();
                $product = $stripe->products->create(['name' => $item['webinar']->info->title]);
                $stripe_prices[] = [
                    "price" => $stripe->prices->create([
                        'product' => $product->id,
                        'unit_amount' => $item['webinar']->price->pure()*100*((100-$prc)/100),
                        'currency' => $this->getCurrency(),
                    ])->id,
                    "quantity" => 1
                ];
            }
        });


        Stripe::setApiKey(env("STRIPE_PRIVATE_KEY"));
        $YOUR_DOMAIN = url("/");
        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => $stripe_prices,
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN . '/success.html',
            'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
        ]);
        return response()->redirectTo($checkout_session['url']);
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
