<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'tour_id' => ['required', 'uuid', 'exists:tours,id'],
            'tour_date' => ['required', 'date', 'after_or_equal:today'],
            'guests' => ['required', 'integer', 'between:1,10'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'hotel_name' => ['nullable', 'string', 'max:255'],
        ]);

        $tour = Tour::query()->findOrFail($validated['tour_id']);
        $totalPrice = $tour->price * $validated['guests'];

        $booking = Booking::query()->create([
            'tour_id' => $tour->id,
            'tour_date' => $validated['tour_date'],
            'guests' => $validated['guests'],
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'hotel_name' => $validated['hotel_name'] ?? null,
            'total_price' => $totalPrice,
            'status' => Booking::STATUS_PENDING,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking created successfully.',
            'data' => $booking,
        ], 201);
    }
}
