<?php

namespace App\Helpers\Sendpulse;

use App\Helpers\Sendpulc\SendpulseClient;
use Sendpulse\RestApi\ApiClient;
use Sendpulse\RestApi\ApiClientException;

class Follow
{
    static function follow($data){
        // $apiUserId = env('API_USER_ID', '');
        // $apiSecret = env('API_SECRET', '');
        // define('API_USER_ID', 'sads');
        // define('API_SECRET', 'sasas');
        $apiClient = SendpulseClient::client();

        try {
            $addEmailsResult = $apiClient->post('addressbooks/33333/emails', [
                'emails' => [
                    [
                        'email' => $data['email'],
                        'variables' => [
                            'name' => $data['name'],
                            'my_var' => 'my_var_value'
                        ]
                    ]
                ]
            ]);

            var_dump($addEmailsResult);
        } catch (ApiClientException $e) {
            var_dump([
                'message' => $e->getMessage(),
                'http_code' => $e->getCode(),
                'response' => $e->getResponse(),
                'curl_errors' => $e->getCurlErrors(),
                'headers' => $e->getHeaders()
            ]);
        }
    }

}
