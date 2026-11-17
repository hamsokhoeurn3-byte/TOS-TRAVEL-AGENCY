<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TripPlan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TripPlanController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'trip_name' => ['required', 'string', 'max:255'],
            'days' => ['required', 'array', 'min:1', 'max:30'],
            'days.*.day' => ['required', 'integer', 'min:1', 'max:30'],
            'days.*.label' => ['required', 'string', 'max:255'],
            'days.*.tours' => ['required', 'array'],
            'days.*.tours.*.name' => ['required', 'string', 'max:255'],
            'days.*.tours.*.slug' => ['required', 'string', 'max:255'],
            'days.*.tours.*.price' => ['required', 'integer', 'min:0'],
            'total_price' => ['required', 'integer', 'min:0'],
            'travelers' => ['required', 'integer', 'min:1', 'max:20'],
            'pace' => ['required', 'in:relaxed,balanced,packed'],
        ]);

        $plan = TripPlan::create([
            'id' => (string) Str::uuid(),
            ...$validated,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Trip plan saved successfully.',
            'data' => ['id' => $plan->id],
        ], 201);
    }
}
