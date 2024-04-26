<?php

namespace App\Helpers\Sendpulse;

use Sendpulse\RestApi\ApiClient;

class SendpulseClient
{
    static function client(){
        $api_user_id = env('API_USER_ID');
        $api_secret = env('API_SECRET');
        $apiClient = new ApiClient($api_user_id, $api_secret);

        return $apiClient;
    }
}
