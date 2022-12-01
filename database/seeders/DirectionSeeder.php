<?php

namespace Database\Seeders;

use App\Models\Direction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectionSeeder extends Seeder
{
    public function run()
    {
        $direction = [
            ['title' => 'Терапия', 'description'=>'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet'],
            ['title' => 'Ортопедия', 'description'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.'],
            ['title' => 'Ортодонтия', 'description'=>'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet'],
            ['title' => 'Хирургия', 'description'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.'],
            ['title' => 'Детская стоматология', 'description'=>'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet'],
            ['title' => 'Общая стоматология', 'description'=>'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet'],
            ['title' => 'Эндодонтия', 'description'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.'],
            ['title' => 'Эстетика и реставрация', 'description'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.'],
            ['title' => 'Пародонтология', 'description'=>'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet'],
            ['title' => 'Функциональная стоматология', 'description'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.'],
            ['title' => 'Имплантология', 'description'=>'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet'],
            ['title' => 'Протезирование на имплантах', 'description'=>'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet'],
            ['title' => 'Виниры', 'description'=>'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet'],
            ['title' => 'Остеопатия', 'description'=>'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet'],
            ['title' => 'Зубной техник', 'description'=>'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet'],
            ['title' => 'Цифровая стоматология', 'description'=>'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet'],
            ['title' => 'Прочее', 'description'=>'All the repeat predefined chunks as necessary, making this the first true generator on the Internet'],
        ];
        foreach ($direction as $dir){
            Direction::create($dir);
        }
    }
}
