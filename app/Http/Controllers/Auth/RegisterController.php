<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendRegisterInfoEmail;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {

        $this->middleware('guest');
    }

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'regex:/^(\+?\d{1,3}|\(\+?\d{1,3}\))?\s?\d{10}$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'captcha' => 'required|captcha',
            'g-recaptcha-response' => 'required',


        ]);
    }

    private function getRecaptchaResponse()
    {
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => config('services.recaptcha.secret'),
                'response' => $this->input('g-recaptcha-response'),
            ],
        ]);

        $body = json_decode((string)$response->getBody());
        return $body->success ? true : null;


    }


    protected function create(array $data)
    {
        if ($this->getRecaptchaResponse()) {

            $name = $data['name'] . ' ' . $data['lname'];

            $user = User::create([
                'name' => $name,
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            $user->userinfo()->update([
                "fname" => $data['name'],
                "lname" => $data['lname'],
                "phone" => $data['phone']

            ]);

            $subject = 'Вы успешно зарегистрировались на платформе Stom Academy';

            mail::send(new SendRegisterInfoEmail($this->all(), $subject));

            // return $this->login();
            return response()->redirectTo($this->redirectPath());
        } else {
            return redirect()->back()->with('status', 'Please Complete the Recaptcha Again to proceed');
        }
        // return $user;

    }



    function redirectPath(){

        return route('account');
    }
}
