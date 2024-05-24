<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentStoreRequest;
use App\Mail\SendPaymentAccountEmail;
use App\Models\PaymentAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;

class PaymentStoreAccountController extends Controller
{
    public function __invoke(PaymentStoreRequest $request)
    {
        $course_ids = $request->course_ids;
        $webinar_ids = $request->webinar_ids;


        $token = strtotime(Carbon::now());
        $payment_account = PaymentAccount::create([
            'user_id' => $request->user_id ?? null,
            'token' => $token,
            'sum' => $request->sum,
            'cur' => $request->cur,
            'type' => $request->type,
            'manager_id' => Auth::id(),
            'comment' => $request->comment,
            'manager_comment' => $request->manager_comment,

        ]);

        if(isset($course_ids) && count($course_ids) > 0){
            foreach ($course_ids as $course_id) {
                 $payment_account->infos()->create(['item_id' => $course_id, 'type' => 'course']);
            }
        }

        if (isset($webinar_ids) && count($webinar_ids) > 0) {
            foreach ($webinar_ids as $webinar_id) {
                $payment_account->infos()->create(['item_id' => $webinar_id, 'type' => 'webinar']);
            }
        }
        // FacadesMail::to($recipientEmail)
        // ->cc('cc@example.com')
        // ->send(new YourMailable());

        if(!empty($request->user_id)){
            $user = User::find($request->user_id);
            $url = url('') . "/payment-account/$payment_account->token";

            Mail::send(new SendPaymentAccountEmail($payment_account, $user->email, $url));

            return redirect()->route('admin.payment.index')->with('success', 'Письмо отправлено пользователю');
        }
        else{
            $url = url('') . "/payment-link/$payment_account->token";
            return redirect()->back()->with(['payment_url' => $url]);
        }


    }
}
