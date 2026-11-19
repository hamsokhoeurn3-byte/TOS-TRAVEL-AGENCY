<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Tour;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TripPlannerChatController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'messages' => ['required', 'array', 'min:1', 'max:12'],
            'messages.*.role' => ['required', 'in:user,assistant'],
            'messages.*.content' => ['required', 'string', 'max:2000'],
            'preferences.days' => ['required', 'integer', 'min:1', 'max:30'],
            'preferences.guests' => ['required', 'integer', 'min:1', 'max:20'],
            'preferences.arrival_date' => ['nullable', 'date'],
            'preferences.stay_budget' => ['nullable', 'numeric', 'min:0', 'max:1000000'],
        ]);

        $apiKey = config('services.openai.key');
        if (!$apiKey) {
            return response()->json(['success' => false, 'message' => 'The trip assistant is not configured.'], 503);
        }

        $catalog = [
            'tours' => Tour::query()->orderByDesc('featured')->orderBy('sort_order')->limit(100)
                ->get(['slug', 'name', 'tagline', 'description', 'price', 'duration', 'category', 'price_basis', 'starting_time', 'hotel_pickup', 'highlights']),
            'stays' => Hotel::query()->orderBy('sort_order')->limit(100)
                ->get(['slug', 'name', 'area', 'description', 'price_level', 'price_from', 'rating', 'style', 'room_types']),
            'transportation' => [
                'tuk-tuk' => 'City rides $5–7 per short ride; Angkor Small Circuit $18–25 per tuk-tuk; Grand Circuit $25–30; airport transfer $20–25 each way.',
                'private-car' => 'Airport pickup and drop-off from $35 per car; Angkor temple transportation from $50 per vehicle; city and custom routes require a quote.',
                'bus-minivan' => 'Intercity booking includes route, date, departure, bus/minivan selection, and passenger details. Supplier confirms seat availability and final fare.',
                'bicycle' => 'City, mountain, road, tandem, and child-seat bicycle rentals are listed from $3 per day.',
                'motorcycle-scooter' => 'Automatic and semi-automatic motorcycles and scooters are listed from $10 per day.',
            ],
        ];

        try {
            $response = Http::withToken($apiKey)->acceptJson()->timeout(35)
                ->post('https://api.openai.com/v1/responses', [
                    'model' => config('services.openai.model', 'gpt-6-luna'),
                    'instructions' => implode("\n", [
                        'You are the TOS Travel Agency travel assistant for Siem Reap, Cambodia.',
                        'Help guests plan using only the supplied website catalog and facts. Be warm, concise, and practical.',
                        'Ask one relevant follow-up question when needed. Never invent prices, availability, hotel features, or booking confirmations.',
                        'Treat prices as indicative starting prices and tell guests TOS must confirm final fares and availability.',
                        'Do not ask for payment card numbers, passwords, or sensitive personal information.',
                        'Guest preferences: '.json_encode($validated['preferences'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                        'Website catalog: '.json_encode($catalog, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                    ]),
                    'input' => $validated['messages'],
                    'max_output_tokens' => 700,
                    'store' => false,
                ]);
        } catch (ConnectionException) {
            return response()->json(['success' => false, 'message' => 'The trip assistant could not connect.'], 504);
        }

        if (!$response->successful()) {
            report(new \RuntimeException('OpenAI trip planner request failed with status '.$response->status()));
            return response()->json(['success' => false, 'message' => 'The trip assistant is temporarily unavailable.'], 502);
        }

        $text = collect($response->json('output', []))
            ->flatMap(fn (array $item) => $item['content'] ?? [])
            ->first(fn (array $item) => ($item['type'] ?? null) === 'output_text');
        $reply = $text['text'] ?? null;

        if (!is_string($reply) || trim($reply) === '') {
            return response()->json(['success' => false, 'message' => 'The trip assistant did not return a reply.'], 502);
        }

        return response()->json(['success' => true, 'reply' => trim($reply)]);
    }
}
