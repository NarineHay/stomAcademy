<?php

namespace Database\Seeders;

use App\Models\Lector;
use App\Models\User;
use Illuminate\Database\Seeder;

class LectorSeeder extends Seeder
{
    public function run()
    {
        User::factory(20)->create([
            "role" => User::ROLE_LECTOR
        ]);

        $users = User::query()->where("role",User::ROLE_LECTOR)->get();
        foreach($users as $user)
            $user->lector()->update(Lector::factory(1)->make()->first()->toArray());
    }
}
