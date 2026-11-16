<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StayBooking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StayBookingController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'hotel_id' => ['required', 'uuid', 'exists:hotels,id'],
            'room_type' => ['nullable', 'string', 'max:255'],
            'check_in' => ['required', 'date', 'after_or_equal:today'],
            'check_out' => ['required', 'date', 'after:check_in'],
            'guests' => ['required', 'integer', 'min:1', 'max:20'],
            'rooms' => ['required', 'integer', 'min:1', 'max:10'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'message' => ['nullable', 'string', 'max:5000'],
        ]);

        $booking = StayBooking::create([
            'id' => (string) Str::uuid(),
            'hotel_id' => $validated['hotel_id'],
            'room_type' => $validated['room_type'] ?? null,
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'guests' => $validated['guests'],
            'rooms' => $validated['rooms'],
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'message' => $validated['message'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Accommodation booking request received successfully.',
            'data' => [
                'id' => $booking->id,
            ],
        ], 201);
    }
}
