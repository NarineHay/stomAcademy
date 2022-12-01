<?php

namespace Database\Seeders;

use App\Models\Prices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricesSeeder extends Seeder
{
    public function run()
    {
        $prices = [
            ['name' => 'Test1', 'byn'=>'1000', 'rub'=>'150', 'usd'=>'140', 'eur'=>'400', 'uah'=>'350'],
            ['name' => 'Test2', 'byn'=>'2500', 'rub'=>'250', 'usd'=>'300', 'eur'=>'600', 'uah'=>'700'],
            ['name' => 'Test3', 'byn'=>'2000', 'rub'=>'400', 'usd'=>'400', 'eur'=>'200', 'uah'=>'500']
        ];
        foreach ($prices as $price){
            Prices::create($price);
        }
    }
}
