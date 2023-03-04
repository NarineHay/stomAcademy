<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideosSeeder extends Seeder
{
    public function run()
    {
        $images = RandomImagesApi::getImages("webinar",7,"webinar");
        $videos = [
            ['image' => $images[0],'url' => 'https://www.youtube.com/embed/X-kpSmXVuJw'],
            ['image' => $images[1],'url' => 'https://www.youtube.com/embed/5Ok9oDQgzxs'],
            ['image' => $images[2],'url' => 'https://www.youtube.com/embed/QPXue2tybcs'],
            ['image' => $images[3],'url' => 'https://www.youtube.com/embed/X-kpSmXVuJw'],
            ['image' => $images[4],'url' => 'https://www.youtube.com/embed/5Ok9oDQgzxs'],
            ['image' => $images[5],'url' => 'https://www.youtube.com/embed/QPXue2tybcs'],
            ['image' => $images[6],'url' => 'https://www.youtube.com/embed/X-kpSmXVuJw'],
        ];
        foreach ($videos as $video){
            Video::create($video);
        }
    }
}
