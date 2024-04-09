<?php

namespace App\Http\Middleware;

use App\Helpers\LG;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class SetLocale
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
        $lngs = LG::getAllCode();
        $browserLanguage = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $browserLanguage = $browserLanguage == 'es' ? 'sp' : $browserLanguage;

        if( !Session::has('lg' )){
            if ( in_array($browserLanguage, $lngs) ) {

                $lng = $browserLanguage;
                $lg = array_search($browserLanguage, $lngs);
            } else {
                $lng = 'en';
                $lg = LG::getId($lng);

            }
        }
        else{

            $lg = Session::get('lg');
            $lng = strtolower(LG::getCode());

        }

        Session::put('lg', $lg);
        App::setLocale($lng);
        Carbon::setLocale(App::getLocale());

        return $next($request);
    }
}
