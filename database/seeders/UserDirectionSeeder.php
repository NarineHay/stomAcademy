<?php

namespace Database\Seeders;

use App\Models\Direction;
use App\Models\User;
use App\Models\UserDirection;
use Illuminate\Database\Seeder;

class UserDirectionSeeder extends Seeder
{
    public function run()
    {
        $directions = Direction::all();
        $users = User::all();
        foreach ($users as $user){
            foreach ($directions->random(rand(1,5)) as $direction){
                UserDirection::create([
                    "user_id" => $user->id,
                    "direction_id" => $direction->id
                ]);
            }
        }
    }
}
