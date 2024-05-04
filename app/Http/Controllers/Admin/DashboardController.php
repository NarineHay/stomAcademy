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
        $paymentDailyRUB = json_encode($this->paymentDaily()['rub']);
        $paymentDaily = json_encode($this->paymentDaily()['other']);
        $topSellingCources = $this->topSellingCources();

        return view('admin.dashboard.index', compact('allCourses', 'allWebinars', 'customers', 'cart', 'payment', 'paymentCurrency', 'paymentSystem', 'paymentDaily', 'paymentDailyRUB', 'topSellingCources'));
    }
}
