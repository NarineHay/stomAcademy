<?php

namespace App\Http\Controllers\Lector;

use App\Helpers\CRM;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestPaymentController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $req = CRM::requestPayment($user);

        return back()->with('success','request_payent_sent');

    }
}
