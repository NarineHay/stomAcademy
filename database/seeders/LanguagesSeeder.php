<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    public function run()
    {
        $languages = [
            ['name' => 'Русский',"code" => "RU"],
            ['name' => 'English',"code" => "EN"],
            ['name' => 'Español',"code" => "SP"],
        ];
        foreach ($languages as $language){
            Language::create($language);
        }
    }
}
