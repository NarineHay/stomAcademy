<?php
namespace App\Traits\Dashboard;

use App\Models\Cart;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait Analitics {

    public function customers(){

        $all_customers = User::where('role', 'user')->get()->count();

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
        $today = Carbon::today();

        $per_mont_cart = Cart::where('created_at', '<=', $endOfMonth)
                         ->where('created_at', '>=', $startOfMonth)
                         ->count();

        $per_day_cart = Cart::whereDate('created_at', $today)->count();


        return [
            'all_cart' => $all_cart,
            'per_mont_cart' => $per_mont_cart,
            'per_day_cart' => $per_day_cart

        ];
    }

    public function payment(){

        $all_payment = Order::where('status', 'succeeded')->get()->count();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $today = Carbon::today();

        $per_mont_payment = Order::where('status', 'succeeded')
                    ->where('created_at', '<=', $endOfMonth)
                    ->where('created_at', '>=', $startOfMonth)
                    ->count();

        $per_day_payment = Order::where('status', 'succeeded')->whereDate('created_at', $today)->count();

        return [
            'all_payment' => $all_payment,
            'per_mont_payment' => $per_mont_payment,
            'per_day_payment' => $per_day_payment

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


    public function paymentDaily(){
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $paymentsByCurrencyAndDay = order::where('status', 'succeeded')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->select(
            'cur',
            DB::raw('DATE(created_at) as payment_day'),
            DB::raw('SUM(sum) as total_amount')
        )
        ->groupBy('cur', 'payment_day')
        ->get()->toArray();


        $byGroup = $this->group_by("cur", $paymentsByCurrencyAndDay);



        // Output the current month currency totals


        $result = $this->dailyData($byGroup);

        return $result;

    }

    public function group_by($key, $data)
    {
        $result = array();

        foreach ($data as $val) {
            if (array_key_exists($key, $val)) {
                $result[$val[$key]][] = $val;
            } else {
                $result[""][] = $val;
            }
        }

        return $result;
    }

    public function dailyData($byGroup){
        $currentYear = date('Y');
        $currentMonth = date('m');

        // Calculate the number of days in the current month
        $daysInMonth = date('t', strtotime("$currentYear-$currentMonth-01"));

        // Initialize an array to store results
        $result = [];
        $result_rub = [];
        // Loop through each currency
        $i = 0;
        foreach ($byGroup as $currency => $payments) {
            $i++;
            // Initialize an array for the currency with daily totals
            $currencyData = [];

            // Initialize daily totals array for the currency with default values (0)
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $currentDay = sprintf('%04d-%02d-%02d', $currentYear, $currentMonth, $day);
                // $currencyData[$currentDay] = 0;

                $currencyDataAll[$day]['x'] = date('d', strtotime($currentDay)) * 1;
                $currencyDataAll[$day]['y'] = 0;

                $currencyData[$day]['x'] = date('Y-m-d', strtotime($currentDay));
                $currencyData[$day]['y'] = 0;

            }

            // ;Populate daily totals for the currency based on payments
            foreach ($payments as $p => $payment) {
                $paymentDay = $payment['payment_day'];
                $totalAmount = (float) $payment['total_amount'];
                $j = ++$p;

                // Check if the payment day is within the current month
                if (substr($paymentDay, 0, 7) === "$currentYear-$currentMonth") {

                    $number_day = date('d', strtotime($paymentDay)) * 1;
                    $currencyDataAll[$number_day]['x'] = date('d', strtotime($paymentDay)) * 1;
                    $currencyDataAll[$number_day]['y'] = $totalAmount;

                    $currencyData[$number_day]['x'] = date('Y-m-d', strtotime($paymentDay));
                    $currencyData[$number_day]['y'] = $totalAmount;

                }
            }

            // Store the currency data in the result array


            if($currency == 'USD'){
                $result_usd[$i]['xValueFormatString'] = $currency;
                $result_usd[$i]['type'] = "spline";
                $result_usd[$i]['dataPoints'] = array_values($currencyData);

            }

            $result[$i]['xValueFormatString'] = $currency;
            $result[$i]['type'] = "spline";
            $result[$i]['dataPoints'] = array_values($currencyDataAll);


        }
// dd(array_values($result));
        return [
            'usd' => array_values($result_usd),
            'all' => array_values($result)
        ];


    }





    public function topSellingCources(){

        $orders = Order::where('status','succeeded')->get();
        $orders = $orders->pluck('infos')->flatten()->where('type', 'course')->pluck('id');

        $order_infos = OrderInfo::whereIn('id',$orders)->select('item_id', DB::raw('COUNT(*) as count'))
        ->where('type', 'course')
        ->groupBy('item_id')
        ->orderByDesc('count')
        ->limit(5)
        ->pluck('item_id')->toArray();

        $courses = Course::whereIn('id', $order_infos)
                 ->orderByRaw(DB::raw("FIELD(id, " . implode(',', $order_infos) . ")")) // Preserve the sequence
                 ->get();


       return $courses;

    }
}
