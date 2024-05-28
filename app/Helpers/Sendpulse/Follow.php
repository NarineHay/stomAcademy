<?php

namespace App\Helpers\Sendpulse;

use App\Helpers\Sendpulse\SendpulseClient;
use Sendpulse\RestApi\ApiClient;
use Sendpulse\RestApi\ApiClientException;
use Illuminate\Support\Facades\Session;

class Follow
{
    static function follow($data){

        $base = ['ru' => '89436645', 'en' => '89312335', 'sp' => '89596009'];
        $lg = app()->getLocale();

        $send_pluse_base = $base[$lg];

        $apiClient = SendpulseClient::client();

        try {
            $addEmailsResult = $apiClient->post("addressbooks/$send_pluse_base/emails", [
                'emails' => [
                    [
                        'email' => $data['email'],
                        'variables' => [
                            'имя' => $data['name']
                        ]
                    ]
                ]
            ]);

            return true;
        } catch (ApiClientException $e) {
           return ([
                'message' => $e->getMessage(),
                'http_code' => $e->getCode(),
                'response' => $e->getResponse(),
                'curl_errors' => $e->getCurlErrors(),
                'headers' => $e->getHeaders()
            ]);
        }
    }

}
