<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run()
    {
        Page::factory(10)->state(new Sequence(
            ['meta_title' => 'Контакты', 'heading'=>'Контакты'],
        ))->create();

        Page::factory(10)->create();
    }
}
