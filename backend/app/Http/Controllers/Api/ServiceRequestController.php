<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceRequestController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $serviceName = Str::lower((string) $request->input('service_name', ''));
        $isRental = $request->input('category') === 'transportation'
            && (Str::endsWith($serviceName, ' rental') || Str::endsWith($serviceName, ' bicycle hire'));

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
            'identity_documents' => [Rule::requiredIf($isRental), 'array', 'min:1', 'max:12'],
            'identity_documents.*' => ['file', 'mimes:jpg,jpeg,png,pdf', 'max:10240'],
        ]);

        $identityDocuments = $validated['identity_documents'] ?? [];
        unset($validated['identity_documents']);

        if ($isRental && count($identityDocuments) !== (int) $validated['guests']) {
            return response()->json([
                'success' => false,
                'message' => 'Please upload one passport or Cambodian ID card for each rider.',
            ], 422);
        }

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

        $identityDocumentPaths = [];
        foreach ($identityDocuments as $document) {
            $path = $document->store('rental-identification', 'local');
            if (! $path) {
                Storage::disk('local')->delete($identityDocumentPaths);

                return response()->json([
                    'success' => false,
                    'message' => 'We could not securely save the ID documents. Please try again.',
                ], 500);
            }
            $identityDocumentPaths[] = $path;
        }

        $serviceRequest = ServiceRequest::create([
            'id' => (string) Str::uuid(),
            ...$validated,
            'identity_document_paths' => $identityDocumentPaths ?: null,
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Service request received successfully.',
            'data' => [
                'id' => $serviceRequest->id,
                'status' => $serviceRequest->status,
            ],
        ], 201);
    }
}
