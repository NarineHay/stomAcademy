<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        $currencies = [
            ['currency_name' => 'BYN'],
            ['currency_name' => 'RUB'],
            ['currency_name' => 'USD'],
            ['currency_name' => 'EUR'],
            ['currency_name' => 'UAH'],
        ];
        foreach ($currencies as $currency){
            Currency::create($currency);
        }
    }
}
