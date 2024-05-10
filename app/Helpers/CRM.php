<?php

namespace App\Helpers;

use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Collections\CustomFieldsValuesCollection;
use AmoCRM\Collections\Leads\LeadsCollection;
use AmoCRM\Exceptions\AmoCRMApiException;
use AmoCRM\Exceptions\AmoCRMMissedTokenException;
use AmoCRM\Models\CustomFieldsValues\TextCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\TextCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueModels\TextCustomFieldValueModel;
use AmoCRM\Models\LeadModel;
use AmoCRM\OAuth2\Client\Provider\AmoCRM;
use App\Models\User;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Token\AccessTokenInterface;

class CRM
{


     static function addStatusesToPipeline($data)
    {
        $bearerToken = App::getLocale() == 'ru' ? env('CRM_BEARER_TOKEN_RU') : env('CRM_BEARER_TOKEN_EN');
        // $bearerToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImJmNjlhODA4OGIyYWFlYzY2Mjg5MjI3Y2QxMmU1MTQ3YWQyZmUxYzJkNGIzYWJjMTM2MTY2Y2RjMWI5YzdiYzAyNDIwNmZmY2VlZmQxNzYyIn0.eyJhdWQiOiJkOTk0YzAwZC1lYTcyLTQyYjctYThlNy05YjhmZjhiODM3ZGUiLCJqdGkiOiJiZjY5YTgwODhiMmFhZWM2NjI4OTIyN2NkMTJlNTE0N2FkMmZlMWMyZDRiM2FiYzEzNjE2NmNkYzFiOWM3YmMwMjQyMDZmZmNlZWZkMTc2MiIsImlhdCI6MTcxNTA0MTk1OCwibmJmIjoxNzE1MDQxOTU4LCJleHAiOjE4NDA3NTIwMDAsInN1YiI6IjE3ODMxMjYiLCJncmFudF90eXBlIjoiIiwiYWNjb3VudF9pZCI6MTkwNjM5NjAsImJhc2VfZG9tYWluIjoiYW1vY3JtLnJ1IiwidmVyc2lvbiI6Miwic2NvcGVzIjpbImNybSIsImZpbGVzIiwiZmlsZXNfZGVsZXRlIiwibm90aWZpY2F0aW9ucyIsInB1c2hfbm90aWZpY2F0aW9ucyJdLCJoYXNoX3V1aWQiOiJhYzdhZDE5NC1lYmIyLTQ5YTQtYTNlZS01MWJjYjQxYzlhNTUifQ.b93EpYCSe38_sXd_5q0nIFDzVpgFItvxsNqbcuZoHvJrpiId1xG1uMkL82g5Log0mPymytmER00hFmxyB4tjRzNzfhdE6KJthOPQSTBudKlbiBIEvipOvgYc4_vSsS76Mf3KfeZ7P9MZgxHGC66dEbTrB27XK4K7pJ0l32yampqnud-a8QbEWh5F8HcBuTf0agu-0bY7kS4AZx3d8l8WnyCiTjX7K95zJP4nr0oBBsZ8BxVF5NvI1OFVBniZH0pT5p3QipVRigt2UpaD-RFkni5udREZn2tnaDfmaFoJdIX8kuMWIU_Z9pPfHPvYWQ_d1huq24B1expUKjcRqPlm7A';
        // Адрес API amoCRM и путь для добавления сделки
        $apiUrl = App::getLocale() == 'ru' ? 'https://stomacademy.amocrm.ru/api/v4/leads' : 'https://engstom.amocrm.ru/api/v4/leads';

        try {
            $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $bearerToken,
                    'Content-Type' => 'application/json'
                ])->post($apiUrl, [
                    'json' => $data
                ]);
                // Получаем тело ответа
                $response = json_decode($response->getBody()->getContents(),256);
                // dd($response);
                return true;

            } catch (Exception $e) {
                // dd($e->getMessage());
                // Обработка ошибок при отправке запроса
                return false;
                // echo "Error adding deal: " . $e->getMessage();
            }


    }

    static function becomeLector($data){

        $leadData = [
            'name' => "Заявк  стать лектором \n
                        имя: $data[name] \n
                        эл. почта: $data[email] \n
                        телефон: $data[phone]",
            'status_id' => self::getStatusId()['becomeLector'],
            'pipeline_id' => self::getPiplineId()
        ];

        self::addStatusesToPipeline($leadData);

    }

    static function requestPayment($data){

        $leadData = [
            'name' => "Запрос  на выплату \n
                        ID: $data[id]
                        имя: $data[name] \n
                        эл. почта: $data[email] \n
                        телефон: $data[phone]",
            'status_id' => self::getStatusId()['becomeLector'],
            'pipeline_id' => self::getPiplineId()
        ];

        self::addStatusesToPipeline($leadData);

    }


    static function regOnlineCoureRu($data){
        $leadData = [

            'name' => "Регистрация на онлайн-курс",
            'price' => $data['price'],
            'custom_fields_values' => [
                [
                    "field_id" => 603044,
                    "values" => [
                       [
                          "value" => $data['email']
                       ]

                    ]
                ],
                [
                    "field_id" => 603046,
                    "values" => [
                       [
                          "value" => $data['phone']
                       ]
                    ]
                ],
                [
                    "field_id" => 603048,
                    "values" => [
                       [
                          "value" => " Названия курса: $data[course_name] \n Тип: $data[type] \n Стоимость: $data[price]  $data[cur]"
                       ]
                    ]
                ]
            ],
            'status_id' => 63299725,
            'pipeline_id' => 7657865
        ];

        self::addStatusesToPipeline($leadData);
    }

    static function regOnlineCoureEN($data){
        $leadData = [

            'name' => "Регистрация на онлайн-курс",
            'price' => $data['price'],
            'custom_fields_values' => [
                [
                    "field_id" => 606981,
                    "values" => [
                       [
                          "value" => $data['email']
                       ]

                    ]
                ],
                [
                    "field_id" => 606267,
                    "values" => [
                       [
                          "value" => $data['phone']
                       ]
                    ]
                ],
                [
                    "field_id" => 610869,
                    "values" => [
                       [
                          "value" => " Названия курса: $data[course_name] \n Тип: $data[type] \n Стоимость: $data[price]  $data[cur]"
                       ]
                    ]
                ]
            ],
            'status_id' => 63300046,
            'pipeline_id' => 7657918
        ];

        self::addStatusesToPipeline($leadData);
    }

    static function addToCart($data){
        // $user = User::find($data->user_id);
        $item_name = $data->item->infos->where('lg_id', 1)->first()->title;
        $item_type = $data->type;

        $leadData = [
            'name' => "Добовление в корзину \n
                        названия: $item_name  \n
                        тип: $item_type   \n",
            'status_id' => self::getStatusId()['addToCart'],
            'pipeline_id' => self::getPiplineId()
        ];

        self::addStatusesToPipeline($leadData);

    }

    static function payment($data){
        $user = User::find($data->user_id);

        $leadData = [
            'name' => "Оплата \n
                        эл. почта: $user->email \n
                        Cумма: $data->sum  \n
                        Валюта: $data->cur   \n",
            'status_id' => self::getStatusId()['order'],
            'pipeline_id' => self::getPiplineId()
        ];

        self::addStatusesToPipeline($leadData);

    }

    static function getPiplineId(){
        return App::getLocale() == 'ru' ? 7657865 : 7657918;

    }

    static function getStatusId(){

        if(App::getLocale() == 'ru'){
            return [
                "becomeLector" => 65470045,
                "addToCart" => 63300021,
                "order" => 63300025
            ];
        }
        else{
            return [
                "becomeLector" => 65469342,
                "addToCart" => 63300046,
                "order" => 63300126
            ];
        }

    }

}
