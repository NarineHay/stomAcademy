<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CRM;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentStoreRequest;
use App\Models\Course;
use App\Models\Currency;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Models\Webinar;
use App\Traits\Lector\AddLectorIncome;
use App\Traits\Payment\Payment as PaymentPayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    use PaymentPayment, AddLectorIncome;
    public function index(Request $request){

        $payments = $this->payment($request->all());
        $users = User::where('role', 'user')->get();
        $managers = User::whereIn('role', ['admin', 'moderator'])->get();
        $lectors = User::where('role', 'lector')->get();
        $courses = Course::all();

        return view('admin.payments.index',compact('payments','users', 'courses', 'lectors', 'managers'));
    }

    public function show(Request $request, $id){

        $payment = Order::find($id);
        return view('admin.payments.show', compact('payment'));
    }

    public function create(){
        $users = User::where('role', 'user')->get();
        $courses = Course::all();
        $webinars = Webinar::all();
        $currency = Currency::all();

        return view('admin.payments.create', compact('users', 'courses', 'webinars', 'currency'));
    }

    public function store(PaymentStoreRequest $request)
    {

        $course_ids = $request->course_ids;
        $webinar_ids = $request->webinar_ids;

        $order = Order::create([
            'user_id' => $request->user_id,
            'sum' => $request->sum,
            'cur' => $request->cur,
            'comment' => $request->comment,
            'status' => 'succeeded'
        ]);

        if(isset($course_ids) && count($course_ids) > 0){
            foreach ($course_ids as $course_id) {
                 $order->infos()->create(['item_id' => $course_id, 'type' => 'course']);
            }
            // $order->infos()->attach(['type'=> 'course','item_id'=>$course_ids]);
        }

        if (isset($webinar_ids) && count($webinar_ids) > 0) {
            foreach ($webinar_ids as $webinar_id) {
                $order->infos()->create(['item_id' => $webinar_id, 'type' => 'webinar']);
            }
        }

        $this->addIncome($order->id);
        CRM::payment($order);

        return redirect()->route('admin.payment.index');
    }
}
