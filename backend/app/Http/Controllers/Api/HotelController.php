<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\JsonResponse;

class HotelController extends Controller
{
    private const KEPT_BUDGET_SLUGS = [
        'motherhome-guesthouse',
        'le-nou-siemreap-guesthouse',
        'golden-takeo-guesthouse',
        'prohm-roth-guesthouse',
        'sam-so-guesthouse',
        'sweet-dreams-guesthouse',
    ];

    public function index(): JsonResponse
    {
        $hotels = Hotel::query()
            ->where(function ($query) {
                $query->where('price_level', '!=', 'budget')
                    ->orWhereIn('slug', self::KEPT_BUDGET_SLUGS);
            })
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $hotels,
        ]);
    }

    public function show(string $slug): JsonResponse
    {
        $hotel = Hotel::query()
            ->where('slug', $slug)
            ->where(function ($query) {
                $query->where('price_level', '!=', 'budget')
                    ->orWhereIn('slug', self::KEPT_BUDGET_SLUGS);
            })
            ->first();

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
