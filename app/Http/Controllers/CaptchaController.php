<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function refresh_captcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
