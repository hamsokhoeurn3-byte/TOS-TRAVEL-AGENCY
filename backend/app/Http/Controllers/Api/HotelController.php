<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\JsonResponse;

class HotelController extends Controller
{
    public function index(): JsonResponse
    {
        $hotels = Hotel::query()
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $hotels,
        ]);
    }

    public function show(string $slug): JsonResponse
    {
        $hotel = Hotel::where('slug', $slug)->first();

        if (! $hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $hotel,
        ]);
    }
}
