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


     static function addStatusesToPipeline($leadData, $data)
    {
        $bearerToken = App::getLocale() == 'ru' ? env('CRM_BEARER_TOKEN_RU') : env('CRM_BEARER_TOKEN_EN');
        // Адрес API amoCRM и путь для добавления сделки
        $apiUrl = App::getLocale() == 'ru' ? 'https://stomacademy.amocrm.ru/api/v4/leads' : 'https://engstom.amocrm.ru/api/v4/leads';

        $contact = self::searchContactByEmail($data['email']);

        if($contact){
            $contact_id = $contact;
        }
        else{
            $contact_id = self::addContact($data);
        }

        $leadData['_embedded']['contacts'][0]['id'] = $contact_id;

        try {
            $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $bearerToken,
                    'Content-Type' => 'application/json'
                ])->post($apiUrl, [
                    'json' => $leadData
                ]);
                // Получаем тело ответа
                $response = json_decode($response->getBody()->getContents(),256);

                return true;

            } catch (Exception $e) {
                // dd($e->getMessage());
                // Обработка ошибок при отправке запроса
                return false;
                // echo "Error adding deal: " . $e->getMessage();
            }


    }

    static function searchContactByEmail($email)
    {
        $bearerToken = App::getLocale() == 'ru' ? env('CRM_BEARER_TOKEN_RU') : env('CRM_BEARER_TOKEN_EN');
        $apiUrl = App::getLocale() == 'ru' ? 'https://stomacademy.amocrm.ru/api/v4/contacts' : 'https://engstom.amocrm.ru/api/v4/contacts';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Content-Type' => 'application/json'
        ])->get("$apiUrl?query=$email" );


        $contact = json_decode($response->getBody(), true);

        return $contact !=null ? $contact['_embedded']['contacts'][0]['id'] : false;
    }

    static function addContact($data)
    {
        $bearerToken = App::getLocale() == 'ru' ? env('CRM_BEARER_TOKEN_RU') : env('CRM_BEARER_TOKEN_EN');
        $apiUrl = App::getLocale() == 'ru' ? 'https://stomacademy.amocrm.ru/api/v4/contacts' : 'https://engstom.amocrm.ru/api/v4/contacts';
        $data = self::contactData($data);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Content-Type' => 'application/json'
        ])->post($apiUrl, [
            'json' => $data
        ]);

        $contact = json_decode($response->getBody()->getContents(),256);

        return $contact !=null && isset($contact['_embedded']) ? $contact['_embedded']['contacts'][0]['id'] : false;
    }

    static function becomeLector($data){

        $leadData = [
            'name' => "Заявк  стать лектором",
            'status_id' => self::getStatusId()['becomeLector'],
            'pipeline_id' => self::getPiplineId()
        ];

        self::addStatusesToPipeline($leadData, $data);

    }

    static function requestPayment($data){

        $leadData = [
            'name' => "Запрос  на выплату \n",
            'status_id' => self::getStatusId()['becomeLector'],
            'pipeline_id' => self::getPiplineId()
        ];

        self::addStatusesToPipeline($leadData, $data);

    }


    static function regOnlineCoureRu($data){
        $leadData = [

            'name' => "Регистрация на онлайн-курс",
            'price' => $data['price'],
            'custom_fields_values' => [
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

        self::addStatusesToPipeline($leadData, $data);
    }

    static function regOnlineCoureEN($data){
        $leadData = [

            'name' => "Регистрация на онлайн-курс",
            'price' => $data['price'],
            'custom_fields_values' => [

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

        self::addStatusesToPipeline($leadData, $data);
    }

    static function addToCart($data){
        $user = User::find($data->user_id);
        $item_name = $data->item->infos->where('lg_id', 1)->first()->title;
        $item_type = $data->type;

        $leadData = [
            'name' => "Добовление в корзину \n
                        $item_name  \n",

            'status_id' => self::getStatusId()['addToCart'],
            'pipeline_id' => self::getPiplineId()
        ];

        self::addStatusesToPipeline($leadData, $user);

    }

    static function payment($data){
        $user = User::find($data->user_id);

        $leadData = [
            'name' => "Оплата \n
                        Cумма: $data->sum  \n
                        Валюта: $data->cur   \n",
            'status_id' => self::getStatusId()['order'],
            'pipeline_id' => self::getPiplineId()
        ];

        self::addStatusesToPipeline($leadData, $user);

    }

    static function getPiplineId(){
        return App::getLocale() == 'ru' ? 7657865 : 7657918;

    }

    static function getStatusId(){

        if(App::getLocale() == 'ru'){
            return [
                "becomeLector" => 65470045,
                "addToCart" => 63300021,
                "order" => 63300025,
                "contact_email" => 135245,
                "contact_phone" => 135243

            ];
        }
        else{
            return [
                "becomeLector" => 65469342,
                "addToCart" => 63300122,
                "order" => 63300126,
                "contact_email" => 38191,
                "contact_phone" => 38189

            ];
        }

    }


    static function contactData($data){

        return [
            "first_name" => $data['name'] ?? '',
            "last_name" => $data['lname'] ?? '',
            "custom_fields_values" => [
                [
                    "field_id" => self::getStatusId()['contact_email'],
                    "values" => [
                        [
                            "value" => $data['email'] ?? ''
                        ]
                    ]
                ],
                [
                    "field_id" => self::getStatusId()['contact_phone'],
                    "values" => [
                        [
                            "value" => $data['phone'] ?? ''
                        ]
                    ]
                ]
            ]
        ];

    }

}
