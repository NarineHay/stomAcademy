<?php
namespace App\Traits;

use App\Mail\SendAccessInfoEmail;
use App\Models\Access as ModelsAccess;
use App\Models\Cart;
use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use App\Models\Webinar;

trait Access {

    public function setAccess($order_id){

        $order = Order::find($order_id);
        $order->success();


    }

    public function admin(){
        return User::where('role', 'admin')->first();
    }
}
