<?php

namespace Database\Seeders;

use App\Models\Direction;
use App\Models\DirectionTitle;
use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectionSeeder extends Seeder
{
    public function run()
    {
        $direction = [
            [
                "RU" => 'Терапия',
                "EN" => 'Therapy',
                "SP" => 'Terapia',
            ],
            [
                "RU" => 'Ортопедия',
                "EN" => 'Orthopaedics',
                "SP" => 'Ortopedia',
            ],
            [
                "RU" => 'Ортодонтия',
                "EN" => 'Orthodontics',
                "SP" => 'Ortodoncia',
            ],
            [
                "RU" => 'Хирургия',
                "EN" => 'Surgery',
                "SP" => 'Cirugía',
            ],
            [
                "RU" => 'Детская стоматология',
                "EN" => 'Paediatric dentistry',
                "SP" => 'Odontopediatría',
            ],
            [
                "RU" => 'Общая стоматология',
                "EN" => 'General dentistry',
                "SP" => 'Odontología general',
            ],
            [
                "RU" => 'Эндодонтия',
                "EN" => 'Endodontics',
                "SP" => 'Endodoncia',
            ],
            [
                "RU" => 'Эстетика и реставрация',
                "EN" => 'Aesthetics and restoration',
                "SP" => 'Estética y restauración',
            ],
            [
                "RU" => 'Пародонтология',
                "EN" => 'Periodontology',
                "SP" => 'Periodoncia',
            ],
            [
                "RU" => 'Функциональная стоматология',
                "EN" => 'Functional dentistry',
                "SP" => 'Odontología funcional',
            ],
            [
                "RU" => 'Имплантология',
                "EN" => 'Implantology',
                "SP" => 'Implantología',
            ],
            [
                "RU" => 'Протезирование на имплантах',
                "EN" => 'Implant prosthetics',
                "SP" => 'Prótesis sobre implantes',
            ],
            [
                "RU" => 'Виниры',
                "EN" => 'Veneers',
                "SP" => 'Carillas',
            ],
            [
                "RU" => 'Остеопатия',
                "EN" => 'Osteopathy',
                "SP" => 'Osteopatía',
            ],
            [
                "RU" => 'Зубной техник',
                "EN" => 'Dental technician',
                "SP" => 'Técnico dental',
            ],
            [
                "RU" => 'Цифровая стоматология',
                "EN" => 'Digital dentistry',
                "SP" => 'Odontología digital',
            ],
            [
                "RU" => 'Прочее',
                "EN" => 'Other',
                "SP" => 'Otros',
            ]
        ];
        foreach ($direction as $dir){

        }

        foreach ($direction as $dir){
            $d = Direction::create();
            foreach (Language::all() as $lg){
                DirectionTitle::create([
                    "direction_id" => $d->id,
                    "lg_id" => $lg->id,
                    "title" => $dir[$lg->code]
                ]);
            }
        }
    }
}
