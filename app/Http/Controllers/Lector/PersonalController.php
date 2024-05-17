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

        $data = LectorIncome::where('user_id', Auth::id())
            ->groupBy('item_id', 'type')
            ->select('item_id', 'type',
            DB::raw('SUM(price_byn) as total_price_byn'),
            DB::raw('SUM(price_rub) as total_price_rub'),
            DB::raw('SUM(price_usd) as total_price_usd'),
            DB::raw('SUM(price_eur) as total_price_eur'),
            DB::raw('SUM(price_uah) as total_price_uah'),
            DB::raw('COUNT(*) as count'))
            ->get();

        return view('front.lector.information', compact('data'));
    }
}
