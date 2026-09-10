<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');

