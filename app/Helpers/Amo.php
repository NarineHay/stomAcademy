<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
class Amo
{


    protected $clientId;
    protected $clientSecret;
    protected $redirectUri;
    protected $subdomain;
    protected $httpClient;

    public function __construct()
    {

        $this->clientId = config('services.amocrm.client_id');
        $this->clientSecret = config('services.amocrm.client_secret');
        $this->redirectUri = config('services.amocrm.redirect_uri');
        $this->subdomain = config('services.amocrm.subdomain');
        $this->httpClient = new Client();
    }

    public function getAccessToken($authorizationCode)
    {

        try {
            $response = $this->httpClient->post('https://www.amocrm.com/oauth2/access_token', [
                'form_params' => [
                    'client_id' => $this->clientId,
                    'client_secret' => $this->clientSecret,
                    'grant_type' => 'authorization_code',
                    'code' => $authorizationCode,
                    'redirect_uri' => $this->redirectUri,
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            Cache::put('amocrm_access_token', $data['access_token'], $data['expires_in']);
            Cache::put('amocrm_refresh_token', $data['refresh_token']);

            return $data['access_token'];
        } catch (\Exception $e) {
            Log::error('Error obtaining access token from AmoCRM: ' . $e->getMessage());
            throw new \Exception('Unable to obtain access token from AmoCRM.');
        }
    }

    public function refreshAccessToken()
    {
        try {
            $refreshToken = Cache::get('amocrm_refresh_token');

            $response = $this->httpClient->post('https://www.amocrm.com/oauth2/access_token', [
                'form_params' => [
                    'client_id' => $this->clientId,
                    'client_secret' => $this->clientSecret,
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $refreshToken,
                    'redirect_uri' => $this->redirectUri,
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            Cache::put('amocrm_access_token', $data['access_token'], $data['expires_in']);
            Cache::put('amocrm_refresh_token', $data['refresh_token']);

            return $data['access_token'];
        } catch (\Exception $e) {
            Log::error('Error refreshing access token from AmoCRM: ' . $e->getMessage());
            throw new \Exception('Unable to refresh access token from AmoCRM.');
        }
    }

    public function getAccessTokenFromCache()
    {
        if (!Cache::has('amocrm_access_token')) {
            return $this->refreshAccessToken();
        }

        return Cache::get('amocrm_access_token');
    }

    public function searchContactByEmail($email)
    {
        $accessToken = $this->getAccessTokenFromCache();

        $response = $this->httpClient->get("https://stomacademy.amocrm.ru/api/v4/contacts", [
            'headers' => [
                'Authorization' => "Bearer {$accessToken}",
                'Content-Type' => 'application/json',
            ],
            'query' => [
                'query' => $email,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
