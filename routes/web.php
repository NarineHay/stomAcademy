<?php

use App\Http\Controllers\Admin\PaymentResultController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('refresh-captcha', [App\Http\Controllers\CaptchaController::class, 'refresh_captcha'])->name('refresh_captcha');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/lg/{lg_id}",[\App\Http\Controllers\HomeController::class,"change_lg"])->name('change_lg');
Route::get("/cur/{cur_id}",[\App\Http\Controllers\HomeController::class,"change_cur"])->name('change_cur');

Route::prefix("webinars")->group(function (){
    Route::get("/",[\App\Http\Controllers\WebinarsController::class,'index'])->name("webinar.index");
    Route::get("{id}",[\App\Http\Controllers\WebinarsController::class,'show'])->name("webinar.show");
});

Route::get("catalog",[\App\Http\Controllers\CourseController::class,"all"])->name("catalog");
Route::get("conf",[\App\Http\Controllers\HomeController::class,"conf"])->name("conf");
Route::get("payment",[\App\Http\Controllers\HomeController::class,"payment"])->name("payment");
Route::get("contract_offer",[\App\Http\Controllers\HomeController::class,"contract_offer"])->name("contract_offer");

Route::prefix("courses")->group(function (){
    Route::get("/",[\App\Http\Controllers\CourseController::class,'index'])->name("course.index");
    Route::get("{id}",[\App\Http\Controllers\CourseController::class,'show'])->name("course.show");
});

Route::prefix("conferences")->group(function (){
    Route::get("/",[\App\Http\Controllers\OnlineCoursesController::class,'index'])->name("conference");
    Route::get("{id}",[\App\Http\Controllers\OnlineCoursesController::class,'show'])->name("conference.show");
});

Route::get('about',[\App\Http\Controllers\AboutController::class,'index'])->name("about");
Route::group(["prefix" => "lectors","as" => "lectors."],function (){
    Route::get('/',[\App\Http\Controllers\LectorsController::class,'index'])->name("index");
    Route::get('{id}',[\App\Http\Controllers\LectorsController::class,'show'])->name("show");
});
Route::group(["prefix" => "blog","as" => "blog."],function (){
    Route::get('/',[\App\Http\Controllers\BlogController::class,'index'])->name("index");
    Route::get('{id}',[\App\Http\Controllers\BlogController::class,'show'])->name("show");
});
Route::prefix("contacts")->group(function (){
    Route::get("/",[\App\Http\Controllers\ContactsController::class,"index"])->name("contacts");
});

Route::group(['prefix' => "personal",'middleware' => 'auth','as' => 'personal.'],function () {
    Route::get("/",[\App\Http\Controllers\ProfileController::class,'index'])->name("index");
    Route::get("/information",[\App\Http\Controllers\InformationController::class,'index'])->name("information");
    Route::get("/certificate",[\App\Http\Controllers\CertificateController::class,'index'])->name("certificates");
    Route::get("/history",[\App\Http\Controllers\HistoryController::class,'index'])->name("history");
    Route::get("/help",[\App\Http\Controllers\HelpController::class,'index'])->name("help");
    Route::get("/courses",[\App\Http\Controllers\UserCoursesController::class,'index'])->name("courses");
    Route::get("/conferences",[\App\Http\Controllers\UserConferencesController::class,'index'])->name("conferences");
    Route::get("/courses/{id}",[\App\Http\Controllers\UserCoursesController::class,'show'])->name("courses.show");
    Route::get("/settings",[\App\Http\Controllers\SettingsController::class,'index'])->name("settings");
    Route::get("/cart",[\App\Http\Controllers\CartController::class,'index'])->name("cart");
    Route::post("/cart/order",[\App\Http\Controllers\CartController::class,'order'])->name("cart.order");
    Route::get("/deleteAccount/{id}", [\App\Http\Controllers\InformationController::class,'deleteAccount'])->name('deleteAccount');
});

Route::get('certificate-download/{image}/{type}', [\App\Http\Controllers\CertificateController::class, 'download'])->name('download');

Route::middleware("auth")->group(function (){
    Route::post('addToCart', [\App\Http\Controllers\CartController::class, 'add'])->name('addToCart');
    Route::post('addManyToCart', [\App\Http\Controllers\CartController::class, 'addMany'])->name('addManyToCart');
    Route::get('removeFromCart/{cart}', [\App\Http\Controllers\CartController::class, 'remove'])->name('removeFromCart');
    Route::get('removeAllFromCart', [\App\Http\Livewire\Front\CartComponent::class, 'removeAllFromCart'])->name('removeAllFromCart');
});


Route::group(['prefix' => "admin",'middleware' => 'isModer','as' => 'admin.'],function () {
    Route::resource("index",\App\Http\Controllers\Admin\IndexController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('lectors', \App\Http\Controllers\Admin\LectorController::class);
    Route::resource('prices', \App\Http\Controllers\Admin\PriceController::class);
    Route::resource('webinar', \App\Http\Controllers\Admin\WebinarController::class);
    Route::resource('course', \App\Http\Controllers\Admin\CourseController::class);
    Route::resource('certificates', \App\Http\Controllers\Admin\CertificateController::class);
    Route::resource('accesses', \App\Http\Controllers\Admin\AccessController::class);
    Route::resource('promo', \App\Http\Controllers\Admin\PromoController::class);
    Route::resource('payment', \App\Http\Controllers\Admin\PaymentController::class);
    Route::resource('pages', \App\Http\Controllers\Admin\PagesController::class);
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
    Route::resource('chats', \App\Http\Controllers\Admin\HelpController::class);
    Route::resource('videos', \App\Http\Controllers\Admin\VideoController::class);
});

Route::group(['prefix' => "lector",'middleware' => 'isLector','as' => 'lector.'],function () {
    Route::get("/personal",[\App\Http\Controllers\Lector\PersonalController::class,'index'])->name("personal");
    Route::get("/profile",[\App\Http\Controllers\Lector\ProfileController::class,'index'])->name("profile");
//    Route::get("/webinars",[\App\Http\Controllers\Lector\WebinarsController::class,'index'])->name("webinars");
//     Route::get("/courses",[\App\Http\Controllers\Lector\CoursesController::class,'index'])->name("courses");
//     Route::get("/chats",[\App\Http\Controllers\Lector\ChatsController::class,'index'])->name("chats");
});

Route::get("test",[TestController::class, 'index']);
Route::get('payment-result/{db_order_id}/{type}', PaymentResultController::class);



//Route::prefix('personal')->middleware("auth")->group(function (){
//    Route::get('/account', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('account');
//});
//
//Route::prefix('lector')->middleware("auth")->group(function (){
//    Route::get('lector', [App\Http\Controllers\HomeController::class, 'index'])->name('lector');
//});

//Route::get('/file-upload', [\App\Http\Controllers\CertificateController::class, 'index']);
//Route::post('/create', [\App\Http\Controllers\CertificateController::class, 'imageFileUpload'])->name('image.create');

//Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//
//Route::get('/test_for_video', function (){
//    return view('front.test_for_video');
//});
