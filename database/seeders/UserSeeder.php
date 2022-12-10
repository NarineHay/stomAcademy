<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;


class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory(4)->state(new Sequence(
            ['email' => 'admin@gmail.com','role' => User::ROLE_ADMIN],
            ['email' => 'moder@gmail.com','role' => User::ROLE_MODER],
            ['email' => 'users@gmail.com','role' => User::ROLE_USER],
            ['email' => 'lector@gmail.com','role' => User::ROLE_LECTOR],
        ))->create();

        User::factory(10)->create();
    }
}

