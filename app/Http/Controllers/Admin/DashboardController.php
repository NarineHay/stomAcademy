<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Webinar;
use App\Traits\Dashboard\Analitics;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use Analitics;
    public function __invoke()
    {
        $allCourses = Course::all()->count();
        $allWebinars = Webinar::all()->count();
        $customers = $this->customers();
        $cart = $this->cart();
        $payment = $this->payment();
        $paymentCurrency = $this->paymentCurrency();
        $paymentSystem = $this->paymentSystem();
        $paymentDailyUSD = json_encode($this->paymentDaily()['usd']);
        $paymentDailyAll = json_encode($this->paymentDaily()['all']);
        $topSellingCources = $this->topSellingCources();

        return view('admin.dashboard.index', compact('allCourses', 'allWebinars', 'customers', 'cart', 'payment', 'paymentCurrency', 'paymentSystem', 'paymentDailyAll', 'paymentDailyUSD', 'topSellingCources'));
    }
}
