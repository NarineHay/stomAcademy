<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    public function run()
    {
        $languages = [
            ['name' => 'English'],
            ['name' => 'Русский'],
            ['name' => 'Español'],
        ];
        foreach ($languages as $language){
            Language::create($language);
        }
    }
}
