<?php

namespace App\Helpers;
use GuzzleHttp\Client;
class CRM
{
    private $amoAuthUrl = 'https://www.amocrm.com/oauth';
    private $amoTokenUrl = 'https://www.amocrm.com/oauth2/access_token';
    private $clientId = '19063960';
    private $clientSecret = 'your_client_secret';
    private $redirectUri = 'https://yourapp.com/oauth/callback';

    // public function redirectToAmoCRM()
    // {
    //     $query = http_build_query([
    //         'client_id' => $this->clientId,
    //         'redirect_uri' => $this->redirectUri,
    //         'response_type' => 'code',
    //     ]);

    //     return redirect("$this->amoAuthUrl?$query");
    // }

    public function handleCallback()
    {
        // $code = $request->query('code');

        $client = new Client();
        $response = $client->post($this->amoTokenUrl, [
            'form_params' => [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'grant_type' => 'authorization_code',
                // 'code' => $code,
                'redirect_uri' => $this->redirectUri,
            ]
        ]);

        $accessToken = json_decode($response->getBody())->access_token;

        // Store the access token in session or database for later use
        session(['amo_access_token' => $accessToken]);

        // return redirect()->route('dashboard');
    }

    public function addStatusesToPipeline()
    {
        // Получение токена доступа из сессии или другого места, где он был сохранен
        $accessToken = session('amo_access_token');

        // Создание клиента Guzzle для отправки запросов
        $client = new Client([
            'headers' => [
                'Authorization' => "Bearer $accessToken",
                'Content-Type' => 'application/json',
            ]
        ]);

        // Данные для создания статусов
        $statusesData = [
            [
                'name' => 'Новый', // Название статуса

            ],
            [
                'name' => 'В работе',

            ],
            // Добавьте больше статусов по мере необходимости
        ];

        // ID воронки, в которую вы хотите добавить статусы
        $pipelineId = '7657865';

        // Отправка POST-запроса на эндпоинт API amoCRM для создания статусов
        $response = $client->post("https://api.amocrm.com/v4/leads/pipelines/$pipelineId/statuses", [
            'json' => ['_embedded' => ['statuses' => $statusesData]],
        ]);

        // Проверка успешности запроса
        if ($response->getStatusCode() === 200) {
            return "Статусы успешно добавлены!";
        } else {
            return "Не удалось добавить статусы.";
        }
    }

}
