<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
//         \App\Models\User::factory(10)->create();
//
//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'admin@gmail.com',
//         ]);

        $this->call(CountrySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DirectionSeeder::class);
        $this->call(LectorSeeder::class);
        $this->call(UserInfoSeeder::class);
        $this->call(PricesSeeder::class);
        $this->call(UserDirectionSeeder::class);
        $this->call(WebinarSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(CourseWebinarSeeder::class);
        $this->call(BalanceSeeder::class);
        $this->call(AccessSeeder::class);
        $this->call(PromoSeeder::class);
    }
}
