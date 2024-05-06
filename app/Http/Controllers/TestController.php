<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Traits\Access;
use App\Traits\Lector\AddLectorIncome as LectorAddLectorIncome;
use App\Traits\Payment\AddLectorIncome;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use LectorAddLectorIncome;
    public function index(){
        $data = Order::find(23);
        $this->addIncome($data);
    }
}
