<?php

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\ServiceRequestController;
use App\Http\Controllers\Api\StayBookingController;
use App\Http\Controllers\Api\TourController;
use App\Http\Controllers\Api\TripPlanController;
use Illuminate\Support\Facades\Route;

Route::get('/tours', [TourController::class, 'index']);
Route::get('/tours/{slug}', [TourController::class, 'show']);
Route::post('/bookings', [BookingController::class, 'store']);

// Hotels
Route::get('/hotels', [HotelController::class, 'index']);
Route::get('/hotels/{slug}', [HotelController::class, 'show']);

// Accommodation bookings
Route::post('/stay-bookings', [StayBookingController::class, 'store']);

// Transportation and other service requests
Route::post('/service-requests', [ServiceRequestController::class, 'store']);

// Trip plans
Route::post('/trip-plans', [TripPlanController::class, 'store']);
