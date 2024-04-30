<?php

namespace App\Observers;
use App\Models\Application;
use App\Models\Order;
use App\Traits\Application\CreatApplication;

class OrderObserver
{
    use CreatApplication;

    public function created(Order $order)
    {

        // $this->creat($order, 'order');
    }

    public function updated(Order $order)
    {
        if($order->status != 'pending' && $order->status != null){

            $order->application()->update(['status', $order->status]);
        }
    }
}
