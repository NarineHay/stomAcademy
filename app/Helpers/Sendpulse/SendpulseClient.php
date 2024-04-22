<?php

namespace App\Helpers\Sendpulc;

use Sendpulse\RestApi\ApiClient;

class SendpulseClient
{
    static function client(){
        define('API_USER_ID', 'sads');
        define('API_SECRET', 'sasas');
        $apiClient = new ApiClient(API_USER_ID, API_SECRET);

        return $apiClient;
    }
}
