<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceRequestController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'category' => [
                'required',
                'string',
                Rule::in(['transportation', 'other_service']),
            ],
            'service_name' => ['required', 'string', 'max:255'],
            'service_date' => ['required', 'date', 'after_or_equal:today'],
            'guests' => ['required', 'integer', 'min:1', 'max:20'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'pickup_location' => ['nullable', 'string', 'max:2000'],
            'message' => ['nullable', 'string', 'max:5000'],
            'total_price' => ['required', 'numeric', 'min:0'],
        ]);

        if (
            $validated['category'] === 'transportation' &&
            (
                $validated['guests'] > 12 ||
                empty($validated['pickup_location'])
            )
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Transportation requests require a pickup location and no more than 12 passengers.',
            ], 422);
        }

        $serviceRequest = ServiceRequest::create([
            'id' => (string) Str::uuid(),
            ...$validated,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Service request received successfully.',
            'data' => [
                'id' => $serviceRequest->id,
            ],
        ], 201);
    }
}
