<?php

namespace App\Observers;
use App\Models\Cart;
use App\Traits\Application\CreatApplication;

class CartObserver
{
    use CreatApplication;

    public function created(Cart $cart)
    {

        // $this->create($cart, 'cart');
    }
}
