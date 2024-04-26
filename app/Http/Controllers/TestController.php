<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Traits\Access;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use Access;
    public function index(){
        $data = Order::find(5);
        $this->setAccess($data);
    }
}
