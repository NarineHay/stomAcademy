<?php
namespace App\Traits\Dashboard;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait Analitics {

    public function customers(){

        $all_customers = User::all()->count();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $per_mont_customers = User::where('created_at', '<=', $endOfMonth)
                         ->where('created_at', '>=', $startOfMonth)
                         ->count();


        return [
            'all_customers' => $all_customers,
            'per_mont_customers' => $per_mont_customers

        ];


    }

    public function cart(){

        $all_cart = Cart::all()->count();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $per_mont_cart = Cart::where('created_at', '<=', $endOfMonth)
                         ->where('created_at', '>=', $startOfMonth)
                         ->count();


        return [
            'all_cart' => $all_cart,
            'per_mont_cart' => $per_mont_cart

        ];
    }

    public function payment(){

        $all_payment = Order::where('status', 'succeeded')->get()->count();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $per_mont_payment = Order::where('status', 'succeeded')
                    ->where('created_at', '<=', $endOfMonth)
                    ->where('created_at', '>=', $startOfMonth)
                    ->count();


        return [
            'all_payment' => $all_payment,
            'per_mont_payment' => $per_mont_payment

        ];


    }

    public function paymentCurrency(){

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();

        $all_payment_currency = Order::where('status', 'succeeded')
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->select('cur', DB::raw('SUM(sum) as total'))
            ->groupBy('cur')
            ->get();

        // $all_payment_currency = $all_payment_currency->map(function ($payment) {
        //     return [
        //         'label' => $payment->cur,
        //         'y' => $payment->total,
        //     ];
        // })->toArray();

        // $all_payment_currency = json_encode($all_payment_currency);


        $per_mont_payment_currency = Order::where('status', 'succeeded')
        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->select('cur', DB::raw('SUM(sum) as total'))
        ->groupBy('cur')
        ->get();

        return [
            'all_payment_currency' => $all_payment_currency,
            'per_mont_payment_currency' => $per_mont_payment_currency,
        ];


    }

    public function paymentSystem(){

        $totalPayments = Order::where('status', 'succeeded')->get()->count();
        $types = ['yookass', 'bepaid', 'other'];

        // Group payments by payment_type and calculate counts
        $paymentCounts = Order::where('status', 'succeeded')->select('type', DB::raw('COUNT(*) as count'))
            ->groupBy('type')
            ->get();


        $paymentCounts = $paymentCounts->map(function ($payment) {
            return [
                'type' => $payment->type != null ? $payment->type : 'other',
                'count' => $payment->count,
            ];
        })
        ->keyBy('type')
        ->toArray();

        // Calculate percentages based on counts
        $paymentTypePercentages = [];

        foreach ($types as $key => $type) {
            $count = $paymentCounts[$type]['count'] ?? 0;
            $percentage = ($totalPayments > 0) ? ($count / $totalPayments) * 100 : 0;
            $paymentTypePercentages[$key]['label'] = $type;
            $paymentTypePercentages[$key]['y'] = round($percentage, 2);

        }


        return json_encode($paymentTypePercentages);

    }


    // public function(){
    //     $paymentsByCurrencyAndDay = Payment::select(
    //         'currency',
    //         DB::raw('DATE(created_at) as payment_day'),
    //         DB::raw('SUM(amount) as total_amount')
    //     )
    //     ->groupBy('currency', 'payment_day')
    //     ->get();
    // }
}
