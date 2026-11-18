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
            'guests' => ['required', 'integer', 'between:1,99'],
            'vehicle_option' => ['nullable', 'string', 'max:60'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'hotel_name' => ['nullable', 'string', 'max:255'],
        ]);

        $tour = Tour::query()->findOrFail($validated['tour_id']);
        $vehicleOption = null;
        if ($tour->vehicle_options) {
            $vehicleOption = collect($tour->vehicle_options)->firstWhere('id', $validated['vehicle_option'] ?? null);

            if (! $vehicleOption) {
                return response()->json([
                    'success' => false,
                    'message' => 'Choose a vehicle for this private tour.',
                    'errors' => ['vehicle_option' => ['Choose a vehicle for this private tour.']],
                ], 422);
            }

            if ($validated['guests'] > $vehicleOption['capacity']) {
                return response()->json([
                    'success' => false,
                    'message' => 'The selected vehicle does not have enough seats for your group.',
                    'errors' => ['guests' => ['Choose a larger vehicle or reduce the guest count.']],
                ], 422);
            }
        }

        if ($tour->group_size && $validated['guests'] > $tour->group_size) {
            return response()->json([
                'success' => false,
                'message' => 'This tour cannot accommodate that many guests.',
                'errors' => ['guests' => ['The requested group exceeds this tour capacity.']],
            ], 422);
        }

        $unitPrice = $vehicleOption['price'] ?? $tour->price;
        $totalPrice = $tour->price_basis === 'group'
            ? $unitPrice
            : $unitPrice * $validated['guests'];

        $booking = Booking::query()->create([
            'tour_id' => $tour->id,
            'tour_date' => $validated['tour_date'],
            'guests' => $validated['guests'],
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'hotel_name' => $validated['hotel_name'] ?? null,
            'vehicle_option' => $vehicleOption['name'] ?? null,
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
