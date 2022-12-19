<?php

namespace Database\Seeders;

use App\Models\Lector;
use App\Models\User;
use Illuminate\Database\Seeder;

class LectorSeeder extends Seeder
{
    public function run()
    {
        User::factory(100)->create([
            "role" => User::ROLE_LECTOR
        ]);

        $users = User::query()->where("role",User::ROLE_LECTOR)->get();
        $images = RandomImagesApi::getImages("human+face",count($users),"lector");
        foreach($users as $k => $user) {
            $user->lector()->update(Lector::factory(1)->make(['photo' => $images[$k]])->first()->toArray());
        }
    }
}
