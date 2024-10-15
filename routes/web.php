<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('top');
})->name('top');
Route::get('/checkout', function (Request $request) {
    $stripePriceId = 'price_1Q8fRsIBJvEHWL29H9X2Y95E';

    $quantity = 1;

    $user = User::find(1);

    return $user->checkout([$stripePriceId => $quantity], [
        'success_url' => route('checkout-success'),
        'cancel_url' => route('checkout-cancel'),
    ]);
})->name('checkout');

Route::view('checkout/success', 'checkout-success')->name('checkout-success');
Route::view('checkout/cancel', 'checkout-cancel')->name('checkout-cancel');

Route::get('/subscription-checkout', function (Request $request) {
    $user = User::find(1);
    $price_basic_monthly = 'price_1QA2CtIBJvEHWL295g2nqcZW';

    return $user->newSubscription('default', $price_basic_monthly)
        ->trialDays(5)
        ->allowPromotionCodes()
        ->checkout([
            'success_url' => route('checkout-success'),
            'cancel_url' => route('checkout-cancel'),
        ]);
});
