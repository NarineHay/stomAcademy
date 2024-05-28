<?php

namespace Database\Seeders;

use App\Models\ExchangeRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExchangeRatesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            ['cur' => 'BYN', 'value'=>'0.3152'],
            ['cur' => 'RUB', 'value'=>'0.0113'],
            ['cur' => 'USD', 'value'=>'1'],
            ['cur' => 'EUR', 'value'=>'1.086'],
            ['cur' => 'UAH', 'value'=>'0.0249'],
        ];

        foreach ($arr as $item){
            ExchangeRate::updateOrCreate(['cur' => $item['cur']], $item);
        }
    }
}
