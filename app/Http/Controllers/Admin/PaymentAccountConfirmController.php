<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Bepaid;
use App\Helpers\YooKassa;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentAccountConfirmRequest;
use App\Mail\SendAccessInfoEmail;
use App\Models\Order;
use App\Models\PaymentAccount;
use App\Models\User;
use App\Traits\Application\CreatApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;

class PaymentAccountConfirmController extends Controller
{
    use CreatApplication;

    public function __invoke(PaymentAccountConfirmRequest $request)
    {
        $token =  $request->token;
        $payment_account = PaymentAccount::where('token', $token)->first();
        $user = User::where("email", $request->email)->first();

        if(is_null($user)){
            $password = Str::random(8);
            $user['password'] = $password;
            $user['email'] = $request->email;

            $user = User::create($user);

            $data = [
                "password" => $password,
                "email" => $user->email
            ];

            $subject = 'Open account';
            mail::send(new SendAccessInfoEmail($data, $subject));

        }


        if ($payment_account->type == 'yookassa') {
            $result = YooKassa::createOrder(null, 'payment_account', $token, $user->id);

        }
        if ($payment_account->type == 'bepaid') {
            $result = Bepaid::createOrder(null, 'payment_account', $token, $user->id);
        }


        if ($result) {
            $order = Order::find($result['order_id']);
            $this->creatApp($order, 'order');

            return response()->redirectTo($result['url']);
        }

    }
}
