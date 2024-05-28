<?php


namespace App\Helpers;

use App\Models\ExchangeRate;

class ExchangeRates
{
    static function exchange($cur){
        return ExchangeRate::where('cur', $cur)->first()->value;
    }



}
