<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about-us', 'about')->name('about');
    Route::get('/room-or-apartments', 'roomOrApartment')->name('roomOrApartment');
    Route::get('/room-or-apartments-details/{id}', 'roomOrApartmentDetails')->name('roomOrApartmentDetails');
    Route::get('/contact-us', 'contact')->name('contact');
    Route::post('/save-message', 'saveMessage')->name('saveMessage');

    Route::post('/check-room-availability', 'checkRoomAvailability')->name('checkRoomAvailability');
    Route::post('/apply-promo-code', 'applyPromoCode')->name('applyPromoCode');

    Route::post('/room-reservation', 'roomReservation')->name('roomReservation');
    Route::post('/check-customer-existence', 'checkCustomerExistence')->name('checkCustomerExistence');
    Route::get('/money-receipt', 'moneyReceipt')->name('moneyReceipt');

    Route::post('/suc', 'success');
    Route::post('/fail', 'fail');
    Route::post('/cancel', 'cancel');

    Route::post('/ipn', 'ipn');
});


// SSLCOMMERZ Start
// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

// Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
// Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

// Route::post('/success', [SslCommerzPaymentController::class, 'success']);
// Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
// Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

// Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


Route::get('/rd', function () {
    session()->forget('data');

    return to_route('home');
});
