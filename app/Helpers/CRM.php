<?php

namespace App\Helpers;

use AmoCRM\OAuth2\Client\Provider\AmoCRM;
use GuzzleHttp\Client;
use League\OAuth2\Client\Token\AccessToken;

class CRM
{


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
         $amoAuthUrl = 'https://www.amocrm.com/oauth';
         $amoTokenUrl = 'https://www.amocrm.com/oauth2/access_token';
        $clientId = '19063960';
         $clientSecret = '1d324bcb8a02112f93b66377100dbc2c';
         $redirectUri = 'https://google.com';

        $apiClient = new \AmoCRM\Client\AmoCRMApiClient($clientId, $clientSecret, $redirectUri);
        $leadsService = $apiClient->leads();
        // $code = $request->query('code');
        // $apiClient = new \AmoCRM\Client\AmoCRMApiClient(env("AMO_ID"), env("AMO_SECRET"), "https://stom.mawcompany.com/api/amo");
        // $apiClient->setAccessToken(new AccessToken(['access_token' => env("AMO_TOKEN"),'expires_in' => '1893459600']));
        dd($leadsService);
        $client = new Client();
        $response = $client->post($this->amoTokenUrl, [
            'form_params' => [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'grant_type' => 'authorization_code',
                'code' => '222',
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
        // $apiClient = new \AmoCRM\Client\AmoCRMApiClient(
        //   '19063960',
        //    '1d324bcb8a02112f93b66377100dbc2c',
        //     'https://stom.mawcompany.com/api/amo',
        // );
        $apiClient = new \AmoCRM\Client\AmoCRMApiClient(
            'stomacademy',
             'hot-marketing-moss@yandex.ru',
              '1d324bcb8a02112f93b66377100dbc2c',
          );
        $leadsService = $apiClient->leads();
        dd($leadsService);
        $lead = $apiClient->lead;
        $lead['name'] = $_POST['product_name'];
        $lead['responsible_user_id'] = 2462338;
        $lead['pipeline_id'] = 1207249;
        // dd($apiClient);
        // dd($apiClient->getOAuthClient()->getAccessTokenByCode($_GET['code']));
        // if (isset($_GET['code']) && $_GET['code']) {
        //     //Вызов функции setBaseDomain требуется для установки контектс аккаунта.
        //     if (isset($_GET['referer'])) {
        //         $provider->setBaseDomain($_GET['referer']);
        //     }

        //     $token = $provider->getAccessToken('authorization_code', [
        //         'code' => $_GET['code']
        //     ]);
        // dd($token);
        //     //todo сохраняем access, refresh токены и привязку к аккаунту и возможно пользователю

        //     /** @var \AmoCRM\OAuth2\Client\Provider\AmoCRMResourceOwner $ownerDetails */
        //     $ownerDetails = $provider->getResourceOwner($token);

        //     printf('Hello, %s!', $ownerDetails->getName());
        // }

        // $response = $client->post($this->amoTokenUrl, [
        //     'form_params' => [
        //         'client_id' => $this->clientId,
        //         'client_secret' => $this->clientSecret,
        //         'grant_type' => 'authorization_code',
        //         // 'code' => $code,
        //         'redirect_uri' => $this->redirectUri,
        //     ]
        // ]);

//         $leadsService = $apiClient->leads();
//         // $leads = $leadsService->get();
//         dd($leadsService);
//         $accessToken = json_decode($response->getBody())->access_token;
// dd($accessToken);
//         // Store the access token in session or database for later use
//         session(['amo_access_token' => $accessToken]);
//         dump(12);

//         // Получение токена доступа из сессии или другого места, где он был сохранен
//         $accessToken = session('amo_access_token');
// dd($accessToken);
//         // Создание клиента Guzzle для отправки запросов
//         $client = new Client([
//             'headers' => [
//                 'Authorization' => "Bearer $accessToken",
//                 'Content-Type' => 'application/json',
//             ]
//         ]);

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
        // $apiClient->statuses(7657865);

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
