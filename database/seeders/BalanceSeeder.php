<?php

namespace Database\Seeders;

use App\Models\Balance;
use Illuminate\Database\Seeder;

class BalanceSeeder extends Seeder
{
    public function run()
    {
        $balances = [
            ['title' => "1000$"],
            ['title' => "500$"],
            ['title' => "300$"],
            ['title' => "1500$"],
            ['title' => "2100$"],
            ['title' => "900$"],
            ['title' => "160$"],
            ['title' => "180$"],
            ['title' => "270$"],
            ['title' => "4500$"],
            ['title' => "10000$"],
            ['title' => "2200$"],
        ];
        foreach ($balances as $balance)
            Balance::create($balance);
    }
}
