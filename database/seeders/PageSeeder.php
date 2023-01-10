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

        $urls = [
            "/",
            "contacts",
            "about",
            "webinar",
            "lectors",
            "webinar"
        ];


        foreach ($urls as $url){
            $page = Page::create(['url' => $url]);
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
