<?php

namespace App\Http\Middleware;

use App\Helpers\LG;
use App\Models\Currency;
use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Stevebauman\Location\Facades\Location;
class SerCurrency
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userIp = $request->ip();
        $currentUserInfo = Location::get($userIp);

        // $client = new Client();
        // $response = $client->get('https://ipinfo.io/' . $userIp.'/json');
        // $data = json_decode($response->getBody(), true);

        $browserLanguage = 'us';
        if (isset($currentUserInfo->countryCode)) {
            $browserLanguage = strtolower($currentUserInfo->countryCode); // ISO country code (e.g., 'US', 'GB', 'CA')
        }

        $currencyName = $browserLanguage == 'ru' ? 'RUB' :
                        ($browserLanguage == 'uk' ? 'UAH' :
                        (in_array($browserLanguage, LG::getEuropeCountryCodes()) ? 'EUR' : 'USD'));

        $currency = Currency::where('currency_name', $currencyName)->first();

        if(!Cookie::get("currency_id",null)){
            return back()->withCookie("currency_id", $currency->id);
        }

        return $next($request);
    }
}
