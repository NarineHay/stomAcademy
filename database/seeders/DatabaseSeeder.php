<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
//         \App\Models\User::factory(30)->create();
//
//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'admin@gmail.com',
//         ]);

        $this->call(LanguagesSeeder::class);
        $this->call(CountrySeeder::class);

        // dev

//        $this->call(PricesSeeder::class);
//        $this->call(PromoSeeder::class);

        // end dev

        $this->call(CurrencySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DirectionSeeder::class);

        // dev

//        $this->call(LectorSeeder::class);
//        $this->call(UserInfoSeeder::class);
//        $this->call(UserDirectionSeeder::class);
//        $this->call(WebinarSeeder::class);
//        $this->call(CourseSeeder::class);
//        $this->call(CourseWebinarSeeder::class);
//        $this->call(AccessSeeder::class);
//        $this->call(PageSeeder::class);
//        $this->call(BlogSeeder::class);
//        $this->call(ChatSeeder::class);
//        $this->call(ChatMessageSeeder::class);

        // end dev

        $this->call(VideosSeeder::class);
    }
}
