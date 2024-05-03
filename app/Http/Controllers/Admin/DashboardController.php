<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\Dashboard\Analitics;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use Analitics;
    public function __invoke()
    {
        $customers = $this->customers();
        $cart = $this->cart();
        $payment = $this->payment();
        $paymentCurrency = $this->paymentCurrency();
        $paymentSystem = $this->paymentSystem();

        return view('admin.dashboard.index', compact('customers', 'cart', 'payment', 'paymentCurrency', 'paymentSystem'));
    }
}
