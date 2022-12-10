<?php

namespace Database\Factories;

use App\Models\Direction;
use App\Models\Lector;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class LectorFactory extends Factory
{
    protected $model = Lector::class;
    public function definition()
    {
        $directions = Direction::all();
//        $client = new Client();
//        $page = $this->faker->numberBetween(1,50);
//        $response = $client->get('https://pixabay.com/api/?key=29073457-a05a39b854900b7729083083c&q=profile+avatar&per_page=3&page='.$page);
//        if($response->getHeader("X-RateLimit-Remaining")[0] == 1){
//            echo "sleep 10 second\n";
//            sleep(10);
//        }
//
//        $newArray = json_decode($response->getBody()->getContents(),true);
//        $image = $newArray['hits'][0]['previewURL'];
//
//        $contents = file_get_contents($image);
//        $name = substr($image, strrpos($image, '/') + 1);
//        Storage::put("public/lector/".$name, $contents);
        return [
            'direction_id' => $directions->random(1)->first()->id,
            'biography' => $this->faker->realText(),
//            'photo' => 'public/lector/'.$name,
            'per_of_sales' => $this->faker->numberBetween(1,50),
        ];
    }

    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
