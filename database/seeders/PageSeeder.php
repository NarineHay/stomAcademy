<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run()
    {
        $lgs = Language::all();

        for($i = 0;$i < 10;$i++){
            $page = Page::factory(1)->make()->first();
            $page->save();
            foreach ($lgs as $lg) {
                $page->infos()->create([
                    'lg_id' => $lg->id,
                    'meta_title' => fake()->jobTitle,
                    'meta_description' => fake()->realText(),
                    'heading' => fake()->word()
                ]);
            }
        }
    }
}
