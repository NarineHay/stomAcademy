<?php

namespace App\Http\Controllers\Lector;

use App\Http\Controllers\Controller;
use App\Models\LectorIncome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    public function index(){

    //    $data = LectorIncome::where('user_id', Auth::id())
    //    ->select('per_of_sales', 'webinar_id', DB::raw('SUM(total_price) as total_price'), DB::raw('SUM(webinar_price) as webinat_total_price'), DB::raw('COUNT(*) as count'))
    //    ->groupBy('webinar_id', 'per_of_sales')
    //    ->get();
    $data = LectorIncome::where('user_id', Auth::id())->get();
        $data = $data->pluck('lector_income_currency')->flatten();
        dd($data);
        $data = LectorIncome::where('user_id', Auth::id())
            ->select('per_of_sales', 'item_id', 'type', DB::raw('SUM(total_price) as total_price'), DB::raw('SUM(webinar_price) as webinat_total_price'), DB::raw('COUNT(*) as count'))
            ->groupBy('item_id', 'type', 'per_of_sales')
            ->get();

        return view('front.lector.information', compact('data'));
    }
}
