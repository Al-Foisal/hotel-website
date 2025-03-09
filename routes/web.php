<?php

use App\Http\Controllers\FrontendController;
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
});

Route::get('/rd', function () {
    session()->forget('data');

    return to_route('home');
});
