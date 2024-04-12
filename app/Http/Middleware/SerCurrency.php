<?php

namespace App\Http\Middleware;

use App\Helpers\LG;
use App\Models\Currency;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
        $browserLanguage = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

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
