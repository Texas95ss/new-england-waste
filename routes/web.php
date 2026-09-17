<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

// Redirect root ke booking wizard
Route::get('/', [BookingController::class, 'index'])->name('home');
Route::get('/bin-guide', [BookingController::class, 'guide'])->name('bin-guide');
Route::get('/service-areas', [BookingController::class, 'serviceAreas'])->name('service-areas');

// Alur Booking New England Waste
Route::prefix('order/skipbin')->name('booking.')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::post('/calculate', [BookingController::class, 'calculateAjax'])->name('calculate');
    Route::post('/store', [BookingController::class, 'store'])->name('store');
    Route::get('/confirmation/{ref}', [BookingController::class, 'success'])->name('success');
});