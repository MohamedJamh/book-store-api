-- Active: 1678879556210@@127.0.0.1@3306@book_store_api
<?php

use App\Http\Controllers\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::get('profile',[ProfileController::class,'index']);
Route::patch('profile/details',[ProfileController::class,'updateDetails']);
Route::put('profile/password',[ProfileController::class,'updatePassword']);

Route::apiResource('genres',GenreController::class);
Route::apiResource('books',BookController::class);

Route::post('request-password',[AccountController::class,'requestPassword']);
Route::post('reset-password',[AccountController::class,'resetPassword'])->name('password.reset');
Route::post('/email/verification-notification',[AccountController::class,'verificationSent'])->middleware(['auth', 'throttle:6,1']);
Route::get('/email/verify/{id}/{hash}',[AccountController::class,'verificationVerify'])->middleware(['auth', 'signed'])->name('verification.verify');