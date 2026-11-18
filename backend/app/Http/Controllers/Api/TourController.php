<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\JsonResponse;

class TourController extends Controller
{
    public function index(): JsonResponse
    {
        $tours = Tour::query()
            ->where('category', '!=', 'transfer')
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $tours,
        ]);
    }

    public function show(string $slug): JsonResponse
    {
        $tour = Tour::query()
            ->where('slug', $slug)
            ->where('category', '!=', 'transfer')
            ->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => $tour,
        ]);
    }
}
