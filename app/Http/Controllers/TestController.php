<?php

namespace App\Http\Controllers;

use App\Helpers\Amo;
use App\Helpers\CRM;
use App\Models\Order;
use App\Traits\Access;
use App\Traits\Lector\AddLectorIncome as LectorAddLectorIncome;
use App\Traits\Payment\AddLectorIncome;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Http as FacadesHttp;

class TestController extends Controller
{
    use LectorAddLectorIncome;

    protected $amoCRMService;

    public function __construct(Amo $amoCRMService)
    {
        $this->amoCRMService = $amoCRMService;
    }

    public function index(){
        // $crm = new CRM();
        // $crm->addStatusesToPipeline();
        $bearerToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImJmNjlhODA4OGIyYWFlYzY2Mjg5MjI3Y2QxMmU1MTQ3YWQyZmUxYzJkNGIzYWJjMTM2MTY2Y2RjMWI5YzdiYzAyNDIwNmZmY2VlZmQxNzYyIn0.eyJhdWQiOiJkOTk0YzAwZC1lYTcyLTQyYjctYThlNy05YjhmZjhiODM3ZGUiLCJqdGkiOiJiZjY5YTgwODhiMmFhZWM2NjI4OTIyN2NkMTJlNTE0N2FkMmZlMWMyZDRiM2FiYzEzNjE2NmNkYzFiOWM3YmMwMjQyMDZmZmNlZWZkMTc2MiIsImlhdCI6MTcxNTA0MTk1OCwibmJmIjoxNzE1MDQxOTU4LCJleHAiOjE4NDA3NTIwMDAsInN1YiI6IjE3ODMxMjYiLCJncmFudF90eXBlIjoiIiwiYWNjb3VudF9pZCI6MTkwNjM5NjAsImJhc2VfZG9tYWluIjoiYW1vY3JtLnJ1IiwidmVyc2lvbiI6Miwic2NvcGVzIjpbImNybSIsImZpbGVzIiwiZmlsZXNfZGVsZXRlIiwibm90aWZpY2F0aW9ucyIsInB1c2hfbm90aWZpY2F0aW9ucyJdLCJoYXNoX3V1aWQiOiJhYzdhZDE5NC1lYmIyLTQ5YTQtYTNlZS01MWJjYjQxYzlhNTUifQ.b93EpYCSe38_sXd_5q0nIFDzVpgFItvxsNqbcuZoHvJrpiId1xG1uMkL82g5Log0mPymytmER00hFmxyB4tjRzNzfhdE6KJthOPQSTBudKlbiBIEvipOvgYc4_vSsS76Mf3KfeZ7P9MZgxHGC66dEbTrB27XK4K7pJ0l32yampqnud-a8QbEWh5F8HcBuTf0agu-0bY7kS4AZx3d8l8WnyCiTjX7K95zJP4nr0oBBsZ8BxVF5NvI1OFVBniZH0pT5p3QipVRigt2UpaD-RFkni5udREZn2tnaDfmaFoJdIX8kuMWIU_Z9pPfHPvYWQ_d1huq24B1expUKjcRqPlm7A';
        // Адрес API amoCRM и путь для добавления сделки
$apiUrl = 'https://stomacademy.amocrm.ru/api/v4/leads';

// Ваш долгосрочный Bearer Token

// Данные для новой сделки
$leadData = [
    'name' => 'New Deal',
    'status_id' => 65470045,
    'price' => 1000,
    'pipeline_id' => 7657865
];

// Создаем HTTP клиент с помощью Guzzle
$httpClient = new Client();

try {
    // Отправляем POST запрос к API amoCRM для добавления сделки
    // $response = $httpClient->post($apiUrl, [
    //     'headers' => [
    //         'Authorization' => 'Bearer ' . $bearerToken,
    //         'Content-Type' => 'application/json'
    //     ],
    //     'json' => json_encode($leadData)
    // ]);
    $response =FacadesHttp::withHeaders([
        'Authorization' => 'Bearer ' . $bearerToken,
        'Content-Type' => 'application/json'
    ])->post($apiUrl, [

        'json' => $leadData
    ]);
    // Получаем тело ответа
    $response = json_decode($response->getBody()->getContents(),256);
    dd($response);
    // Обработка успешного добавления сделки
    echo "Deal added successfully! Response: ";
} catch (Exception $e) {
    // Обработка ошибок при отправке запроса
    echo "Error adding deal: " . $e->getMessage();
}
        dd(12);
        $data = Order::find(23);
        $this->addIncome($data);
    }


    public function getAuthorizationCode(Request $request)
    {
        // Redirect the user to AmoCRM's authorization URL
        $url = "https://www.amocrm.com/oauth?client_id=" . config('services.amocrm.client_id') .
            "&redirect_uri=" . config('services.amocrm.redirect_uri') .
            "&response_type=code";
        return redirect($url);
    }

    public function handleAuthorizationCallback(Request $request)
    {
        $authorizationCode = $request->get('code');
        $this->amoCRMService->getAccessToken($authorizationCode);

        return redirect()->route('search.contact');
    }

    public function searchContact(Request $request)
    {
        // $email = $request->input('email');
        $email = 'abs@mail.ru';

        // $contact = $this->amoCRMService->searchContactByEmail($email);
        $contact = CRM::searchContactByEmail($email);

dd( $contact);
        return response()->json($contact);
    }
}
