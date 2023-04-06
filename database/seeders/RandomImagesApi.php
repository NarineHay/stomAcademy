<?php


namespace Database\Seeders;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class RandomImagesApi
{
    static function getImages($type,$count,$path,$w = null){
        $images = [];
        $client = new Client();
        if($w){
            $w = "&w=".$w;
        }
        $response = $client->get('https://pixabay.com/api/?key=29073457-a05a39b854900b7729083083c&q='.$type.'&per_page='.$count.'&page=1'.$w);
        if($response->getHeader("X-RateLimit-Remaining")[0] == 1){
            echo "sleep 10 second\n";
            sleep(10);
        }

        $newArray = json_decode($response->getBody()->getContents(),true);
//        $time_start = microtime(true);
        foreach ($newArray['hits'] as $hit){
            $image = $hit['previewURL'];
            $contents = file_get_contents($image);
            $name = substr($image, strrpos($image, '/') + 1);
            Storage::put("public/".$path."/".$name, $contents);
            $images[] = "public/".$path."/".$name;
        }
//        $time_end = microtime(true);
//        print_r($time_end - $time_start);
        return $images;
    }
}
