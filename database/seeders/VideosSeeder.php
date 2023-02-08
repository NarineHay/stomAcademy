<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideosSeeder extends Seeder
{
    public function run()
    {
        $videos = [
            ['url' => 'https://www.youtube.com/embed/X-kpSmXVuJw'],
            ['url' => 'https://www.youtube.com/embed/5Ok9oDQgzxs'],
            ['url' => 'https://www.youtube.com/embed/QPXue2tybcs'],

        ];
        foreach ($videos as $video){
            Video::create($video);
        }
    }
}
