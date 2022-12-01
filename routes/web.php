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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('isModer')->group(function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('lectors', \App\Http\Controllers\Admin\LectorController::class);
    Route::resource('prices', \App\Http\Controllers\Admin\PriceController::class);
    Route::resource('webinars', \App\Http\Controllers\Admin\WebinarController::class);
    Route::resource('courses', \App\Http\Controllers\Admin\CourseController::class);
});

Route::prefix('personal')->middleware("auth")->group(function (){
    Route::get('/account', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('account');
});

Route::prefix('lector')->middleware("auth")->group(function (){
    Route::get('lector', [App\Http\Controllers\HomeController::class, 'index'])->name('lector');
});

Route::get('/file-upload', [\App\Http\Controllers\CertificateController::class, 'index']);
Route::post('/create', [\App\Http\Controllers\CertificateController::class, 'imageFileUpload'])->name('image.create');

Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
