<?php

namespace Database\Seeders;

use App\Models\Prices;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Webinar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebinarSeeder extends Seeder
{
    public function run()
    {
        $price = Prices::all();
        $user = User::all();
        for($i = 0;$i < 20;$i++){
            $info = Webinar::factory(1)->make()->first();
            $info->price_id = $price->random(1)->first()->id;
            $info->user_id = $user->random(1)->first()->id;
            $info->save();
        }
    }
}
