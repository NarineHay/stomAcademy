<?php

namespace App\Http\Livewire\Front;

use App\Models\Cart;
use App\Models\Course;
use App\Models\Promo;
use App\Models\Webinar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\Component;


class CartComponent extends Component
{
    public $promo = null;

    public $code;

    public function render()
    {
        $items = Auth::user()->cart;
        $total = 0;
        $data['items'] = $items->map(function ($item) use (&$total){
            if($item->type == "course"){
                $item['course'] = Course::query()->withCount("webinars")->withSum('webinars_object','duration')
                    ->where("id",$item->item_id)->with("info")->first();
                $total += $item['course']->price->pure();
            }elseif($item->type == "webinar"){
                $item['webinar'] = Webinar::query()->where("id",$item->item_id)->with("info")->first();
                $total += $item['webinar']->price->pure();
            }
            return $item;
        });
        if($this->promo){
            $promo = Promo::query()->where('code',$this->promo)->first();
            if($promo){
                $data['prc'] = $promo->prc;
            }
            $data['total'] = $total*(1 - $data['prc']/100);
            $data['sub_total'] = $total;
        }else{
            $data['total'] = $total;
        }

        return view('livewire.front.cart-component',$data);
    }

    function submit(Request $request){
        $this->promo = $this->code;
    }

    public function removeAllFromCart()
    {
        $user_id = Auth::user()->id;
        Cart::query()->where('user_id', $user_id)->delete();
        return redirect()->back();
    }
}
