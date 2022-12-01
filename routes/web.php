<?php

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix("courses")->group(function (){
    Route::get("/",[\App\Http\Controllers\CourseController::class,'index'])->name("courses.index");
});
Route::get('about',[\App\Http\Controllers\AboutController::class,'index'])->name("about");
Route::group(["prefix" => "lectors","as" => "lectors."],function (){
    Route::get('/',[\App\Http\Controllers\LectorsController::class,'index'])->name("index");
    Route::get('{lector}',[\App\Http\Controllers\LectorsController::class,'show'])->name("show");
});
Route::group(["prefix" => "blog","as" => "blog."],function (){
    Route::get('/',[\App\Http\Controllers\BlogController::class,'index'])->name("index");
    Route::get('{blog}',[\App\Http\Controllers\BlogController::class,'show'])->name("show");
});
Route::prefix("contacts")->group(function (){
    Route::get("/",[\App\Http\Controllers\ContactsController::class,"index"])->name("contacts");
});

Route::group(['prefix' => "admin",'middleware' => 'isModer','as' => 'admin.'],function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('lectors', \App\Http\Controllers\Admin\LectorController::class);
    Route::resource('prices', \App\Http\Controllers\Admin\PriceController::class);
    Route::resource('webinars', \App\Http\Controllers\Admin\WebinarController::class);
    Route::resource('courses', \App\Http\Controllers\Admin\CourseController::class);
    Route::resource('certificates', \App\Http\Controllers\Admin\CertificateController::class);
});


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
