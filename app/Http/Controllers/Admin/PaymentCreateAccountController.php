<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Currency;
use App\Models\User;
use App\Models\Webinar;
use Illuminate\Http\Request;

class PaymentCreateAccountController extends Controller
{
    public function __invoke()
    {
        $users = User::where('role', 'user')->get();
        $courses = Course::all();
        $webinars = Webinar::all();
        $currency = Currency::all();

        return view('admin.payments.create-account', compact('users', 'courses', 'webinars', 'currency'));
    }
}
