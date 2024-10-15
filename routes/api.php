<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StripeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//login
Route::post('/login', [UsersController::class, 'login'])->name('login');

//认证
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => '/subscription/'], function () {
        Route::get('show-subscription', [StripeController::class, 'showSubscription']);
        Route::post('create-checkout-session', [StripeController::class, 'createSubscription']);
        Route::get('billing-portal', [StripeController::class, 'billingPortal']);
    });
});

