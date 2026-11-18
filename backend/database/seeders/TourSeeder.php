<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tour;

class TourSeeder extends Seeder
{
    public function run(): void
    {
        $tours = [
            [
                'slug' => 'angkor-sunrise-tour',
                'name' => 'Angkor Sunrise Tour',
                'tagline' => "Capture Angkor Wat's sunrise, decode Bayon's faces, and explore Ta Prohm's movie-famous ruins.",
                'description' => 'Begin before dawn at the famous reflecting pools of Angkor Wat as the temple silhouettes against the rising sun. After breakfast, continue to the ancient city of Angkor Thom to decode the 200 serene faces of Bayon, then wind through the jungle-choked corridors of Ta Prohm, the "Tomb Raider" temple where massive tree roots embrace the ruins.',
                'price' => 15,
                'duration' => 'Half day (approx. 6 hours)',
                'category' => 'temples',
                'group_size' => 10,
                'image_url' => 'https://images.pexels.com/photos/15890568/pexels-photo-15890568.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
                'highlights' => [
                    'Sunrise at Angkor Wat reflecting pools',
                    'Bayon temple with 200 giant faces',
                    'Ta Prohm jungle temple',
                    'Licensed English-speaking guide',
                    'Cold water and cold towels',
                ],
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'slug' => 'explore-angkor',
                'name' => 'Explore Angkor Tour with Sunset',
                'tagline' => "Mysterious Bayon, Ta Prohm's cinematic charm, majestic Angkor Wat, and a stunning sunset in one epic day.",
                'description' => "The complete Angkor experience in a single day. Explore the terraces of Angkor Thom and the smiling faces of Bayon in the morning, wander Ta Prohm's vine-strangled halls after lunch, and finish inside Angkor Wat itself before climbing Phnom Bakheng for a golden sunset over the archaeological park.",
                'price' => 20,
                'duration' => 'Full day (approx. 9 hours)',
                'category' => 'temples',
                'group_size' => 10,
                'image_url' => 'https://images.pexels.com/photos/1089302/pexels-photo-1089302.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
                'highlights' => [
                    'Angkor Thom and Bayon',
                    'Ta Prohm (Tomb Raider temple)',
                    'Full Angkor Wat interior visit',
                    'Sunset viewpoint finish',
                    'Small group of 10 guests max',
                ],
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'slug' => 'koh-ker-beng-mealea',
                'name' => 'Koh Ker and Beng Mealea Tour',
                'tagline' => "Uncover hidden gems: Beng Mealea's jungle embrace and Koh Ker's forgotten grandeur.",
                'description' => 'Leave the crowds behind and journey two hours into the countryside to two remote wonders in one extraordinary day. Climb the seven-tiered pyramid of Prasat Thom at Koh Ker, a forgotten 10th-century capital, then scramble over the fallen moss-covered blocks of Beng Mealea, a temple still embraced by the jungle.',
                'price' => 50,
                'duration' => 'Full day (approx. 10 hours)',
                'category' => 'temples',
                'group_size' => 10,
                'image_url' => 'https://images.pexels.com/photos/15928763/pexels-photo-15928763.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
                'highlights' => [
                    'Koh Ker pyramid, a forgotten capital',
                    'Jungle-invaded Beng Mealea',
                    'Off-the-beaten-path adventure',
                    'Rural Cambodian countryside drive',
                    'Lunch included',
                ],
                'featured' => true,
                'sort_order' => 3,
            ],
            [
                'slug' => 'kompong-phluk-floating-villages',
                'name' => 'Floating Village Tour',
                'tagline' => "Glide through Tonle Sap's floating wonders of Kompong Phluk: stilt houses, sunken forests, and vibrant village life.",
                'description' => 'Travel to the edge of Tonle Sap, Southeast Asia\'s largest lake, and board a traditional boat through the stilted village of Kompong Phluk. Cruise beneath the flooded forest canopy, watch daily village life unfold on the water, and, on the afternoon departure, enjoy the sunset over the lake.',
                'price' => 24,
                'duration' => 'Half day morning or afternoon',
                'category' => 'culture',
                'group_size' => 10,
                'image_url' => 'https://images.pexels.com/photos/32978026/pexels-photo-32978026.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
                'highlights' => [
                    'Boat cruise through Kompong Phluk',
                    'Tall stilt houses rising from the water',
                    'Flooded forest canoe ride',
                    'Village life on Tonle Sap lake',
                    'Optional sunset departure',
                ],
                'featured' => false,
                'sort_order' => 4,
            ],
            [
                'slug' => 'banteay-srei-backcountry',
                'name' => 'Banteay Srei Backcountry Tour',
                'tagline' => "Uncover Angkor's secrets: Banteay Srei's pink splendor and hidden temples off the beaten path.",
                'description' => 'Head into the backcountry to the exquisite "Citadel of Women" — Banteay Srei, carved in pink sandstone so fine it looks like lace. On the way back, stop at a local family-run rice paper workshop, the pre-Angkorian temple of Prasat Prei, and Banteay Samre, a quiet gem most visitors never see.',
                'price' => 20,
                'duration' => 'Full day (approx. 8 hours)',
                'category' => 'temples',
                'group_size' => 10,
                'image_url' => 'https://images.pexels.com/photos/4300967/pexels-photo-4300967.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
                'highlights' => [
                    'Banteay Srei pink sandstone carvings',
                    'Quiet Banteay Samre temple',
                    'Local rice paper workshop visit',
                    'Countryside villages and rice fields',
                    'Small group of 10 guests max',
                ],
                'featured' => false,
                'sort_order' => 5,
            ],
            [
                'slug' => 'kulen-waterfall',
                'name' => 'Kulen Waterfall and 1000 Lingas Tour',
                'tagline' => 'Ascend to sacred Kulen: cascading waterfalls, ancient river carvings, and a mountain-top Buddha.',
                'description' => 'Climb the forested plateau of Phnom Kulen, Cambodia\'s most sacred mountain. Walk the River of a Thousand Lingas carved into the riverbed, visit the giant reclining Buddha on the mountaintop, and swim beneath the Kulen waterfall. A traditional Khmer lunch by the falls is included.',
                'price' => 28,
                'duration' => 'Full day (approx. 9 hours)',
                'category' => 'nature',
                'group_size' => 10,
                'image_url' => 'https://images.pexels.com/photos/19143429/pexels-photo-19143429.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
                'highlights' => [
                    'Swim at Kulen waterfall',
                    'River of 1000 Lingas carvings',
                    'Mountain-top reclining Buddha',
                    'Khmer lunch included',
                    'Sacred mountain national park',
                ],
                'featured' => false,
                'sort_order' => 6,
            ],
            [
                'slug' => 'preah-vihear-koh-ker',
                'name' => 'Preah Vihear and Koh Ker Temple Tour',
                'tagline' => 'An epic day to a cliff-edge temple with views over Cambodia\'s northern plains and the jungle pyramid of Koh Ker.',
                'description' => 'A long but unforgettable day to the mountaintop sanctuary of Preah Vihear, perched on the edge of the Dangrek escarpment with views stretching 30 kilometers across the plains of Cambodia and Thailand. Descend for a late lunch, then visit the remote pyramid of Koh Ker on the return journey.',
                'price' => 65,
                'duration' => 'Full day (approx. 12 hours)',
                'category' => 'temples',
                'group_size' => 10,
                'image_url' => 'https://images.pexels.com/photos/19142378/pexels-photo-19142378.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
                'highlights' => [
                    'Cliff-edge Preah Vihear sanctuary',
                    'Sweeping views over two countries',
                    'UNESCO World Heritage site',
                    'Remote Koh Ker pyramid return stop',
                    '4WD transfer up the mountain',
                ],
                'featured' => false,
                'sort_order' => 7,
            ],
            [
                'slug' => 'airport-transfer',
                'name' => 'Private EV Airport Transfer',
                'tagline' => 'Private airport transfer for 1 to 3 guests. One vehicle, one fixed price, no stops for other passengers.',
                'description' => 'Leave the shared shuttle and taxi line behind. Meet your private electric car at Siem Reap Angkor International Airport and travel directly to your Siem Reap hotel in cool, quiet comfort. Your booking includes one vehicle, one fixed price, a private driver, and no stops for other passengers.',
                'price' => 25,
                'duration' => 'Approx. 45 minutes',
                'category' => 'transfer',
                'group_size' => 3,
                'image_url' => 'https://images.pexels.com/photos/39015366/pexels-photo-39015366.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
                'highlights' => [
                    'Private new electric vehicle',
                    'Fixed price per car, 1-3 guests',
                    'Direct to your hotel, no stops',
                    'Flight tracking for delays',
                    'Meet-and-greet at arrivals',
                ],
                'featured' => false,
                'sort_order' => 8,
            ],
        ];

        $sharedUpdates = [
            'angkor-sunrise-tour' => [
                'name' => 'Angkor Sunrise Tour', 'price' => 15, 'duration' => '8 hours', 'group_size' => 12,
                'capacity_note' => 'Usually up to 10 guests; some listings say 12. Confirm the exact capacity when booking.',
                'starting_time' => '04:20:00',
                'tagline' => 'Share an early Angkor sunrise, then visit Bayon and Ta Prohm with a small group.',
                'description' => 'Scheduled shared tour with hotel pickup around 4:20 AM. Watch sunrise at Angkor Wat, stop for breakfast at Srah Srong at your own cost, then visit Bayon and Ta Prohm before returning around 12:30 PM. The Angkor temple pass is not included.',
                'highlights' => ['Hotel pickup and drop-off', 'Sunrise at Angkor Wat', 'Breakfast stop at Srah Srong (meal not included)', 'Bayon and Ta Prohm', 'Shared transport, English-speaking guide, drinking water, and cold towels', 'Angkor temple pass not included'],
            ],
            'explore-angkor' => [
                'name' => 'Explore Angkor Tour', 'price' => 20, 'duration' => 'Full day', 'group_size' => 10,
                'capacity_note' => 'Up to 10 guests; confirm the departure capacity when booking.',
                'tagline' => 'Visit Bayon, Ta Prohm, and Angkor Wat on a scheduled full-day shared tour.',
                'description' => 'Join other travelers for a full day among Angkor’s best-known temples: Bayon, Ta Prohm, and Angkor Wat. Hotel pickup and drop-off, shared transport, an English-speaking guide, drinking water, and cold towels are included. The temple pass and meals are not included.',
                'highlights' => ['Bayon Temple', 'Ta Prohm Temple', 'Angkor Wat', 'Hotel pickup and drop-off', 'Shared transport and English-speaking guide', 'Temple pass and meals not included'],
            ],
            'koh-ker-beng-mealea' => [
                'name' => 'Koh Ker & Beng Mealea', 'price' => 50, 'duration' => 'Full day', 'group_size' => 10,
                'capacity_note' => 'Up to 10 guests; confirm the departure capacity when booking.',
                'tagline' => 'Explore Koh Ker and jungle-covered Beng Mealea with a shared group.',
                'description' => 'Spend a full day traveling with other visitors to Koh Ker and Beng Mealea. Hotel pickup and drop-off, shared transport, an English-speaking guide, drinking water, and cold towels are included; temple passes and meals are not included.',
                'highlights' => ['Koh Ker temple complex', 'Beng Mealea jungle temple', 'Hotel pickup and drop-off', 'Shared transport and English-speaking guide', 'Drinking water and cold towels', 'Temple passes and meals not included'],
            ],
            'kompong-phluk-floating-villages' => [
                'name' => 'Floating Village Tour', 'price' => 24, 'duration' => 'Half day', 'group_size' => 10,
                'capacity_note' => 'Up to 10 guests; confirm the departure capacity when booking.',
                'tagline' => 'Travel to Kampong Phluk and cruise Tonle Sap on a scheduled shared tour.',
                'description' => 'Travel from Siem Reap to Kampong Phluk, explore the stilt-house village, and take a boat on Tonle Sap. The half-day shared tour includes hotel pickup and drop-off, shared transport, the village boat ticket, an English-speaking guide, drinking water, and cold towels. Meals are not included.',
                'highlights' => ['Siem Reap–Kampong Phluk transport', 'Kampong Phluk village visit', 'Shared boat ticket included', 'Hotel pickup and drop-off', 'English-speaking guide, drinking water, and cold towels', 'Meals not included'],
            ],
            'banteay-srei-backcountry' => [
                'name' => 'Banteay Srei Backcountry', 'price' => 20, 'duration' => 'Full day', 'group_size' => 10,
                'capacity_note' => 'Up to 10 guests; confirm the departure capacity when booking.',
                'tagline' => 'Visit Banteay Srei and countryside temples on a full-day shared trip.',
                'description' => 'Join a scheduled full-day group tour to Banteay Srei and nearby countryside temples. Hotel pickup and drop-off, shared transport, an English-speaking guide, drinking water, and cold towels are included. The temple pass and meals are not included.',
                'highlights' => ['Banteay Srei temple', 'Countryside temples and villages', 'Hotel pickup and drop-off', 'Shared transport and English-speaking guide', 'Drinking water and cold towels', 'Temple pass and meals not included'],
            ],
            'kulen-waterfall' => [
                'name' => 'Kulen Waterfall Tour', 'price' => 28, 'duration' => 'Full day', 'group_size' => 10,
                'capacity_note' => 'Up to 10 guests; confirm the departure capacity when booking.',
                'tagline' => 'See Phnom Kulen’s waterfall and River of 1000 Lingas on a shared day tour.',
                'description' => 'Travel with a scheduled group to Phnom Kulen to visit the waterfall and River of 1000 Lingas. Hotel pickup and drop-off, shared transport, an English-speaking guide, drinking water, and cold towels are included. Park entry and meals are not included.',
                'highlights' => ['Phnom Kulen waterfall', 'River of 1000 Lingas', 'Hotel pickup and drop-off', 'Shared transport and English-speaking guide', 'Drinking water and cold towels', 'Park entry and meals not included'],
            ],
            'preah-vihear-koh-ker' => [
                'name' => 'Preah Vihear & Koh Ker', 'price' => 100, 'duration' => 'Full day', 'group_size' => null,
                'capacity_note' => 'The operator does not publish a group maximum. Confirm capacity when booking.',
                'tagline' => 'Take a full-day shared journey to Preah Vihear and Koh Ker.',
                'description' => 'Visit Preah Vihear and Koh Ker on a scheduled full-day shared tour. The published group maximum is not specified, so confirm capacity when booking. Hotel pickup and drop-off, shared transport, an English-speaking guide, drinking water, and cold towels are included; temple passes and meals are not included.',
                'highlights' => ['Preah Vihear temple', 'Koh Ker temple complex', 'Hotel pickup and drop-off', 'Shared transport and English-speaking guide', 'Drinking water and cold towels', 'Temple passes and meals not included'],
            ],
        ];

        foreach ($tours as &$tour) {
            $tour = array_merge($tour, $sharedUpdates[$tour['slug']] ?? [], [
                'category' => 'group', 'tour_type' => 'group', 'price_basis' => 'person',
                'capacity_note' => $sharedUpdates[$tour['slug']]['capacity_note'] ?? 'Up to 10 guests; confirm the departure capacity when booking.',
                'vehicle_options' => null, 'hotel_pickup' => true, 'tour_guide' => 'English-speaking guide',
                'included_drinks' => ['Drinking water', 'Cold towels'], 'included_meals' => [],
                'available_seats' => null, 'booking_requirements' => 'Scheduled shared departure. Confirm available seats when booking. Temple passes and meals are not included unless stated.',
            ]);
        }
        unset($tour);

        $sharedAdditions = [
            ['kulen-mountain-beng-mealea', 'Kulen Mountain & Beng Mealea', 30, 'Full day', 10, 'Kulen Mountain and Beng Mealea', 'https://images.pexels.com/photos/19143429/pexels-photo-19143429.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'],
            ['kulen-mountain-banteay-srei', 'Kulen Mountain & Banteay Srei', 30, 'Full day', 10, 'Kulen Mountain, its waterfall, and Banteay Srei', 'https://images.pexels.com/photos/4300967/pexels-photo-4300967.jpeg?auto=compress&cs=tinysrgb&h=650&w=940'],
        ];
        foreach ($sharedAdditions as $index => [$slug, $name, $price, $duration, $capacity, $route, $image]) {
            $tours[] = [
                'slug' => $slug, 'name' => $name, 'tagline' => "Join a scheduled shared tour to {$route}.",
                'description' => "Spend a full day with other travelers visiting {$route}. Shared transport, hotel pickup and drop-off, an English-speaking guide, drinking water, and cold towels are included. Park and temple passes and meals are not included.",
                'price' => $price, 'duration' => $duration, 'category' => 'group', 'group_size' => $capacity,
                'tour_type' => 'group', 'price_basis' => 'person', 'capacity_note' => 'Up to 10 guests; confirm the departure capacity when booking.',
                'image_url' => $image, 'highlights' => [$route, 'Hotel pickup and drop-off', 'Shared transport and English-speaking guide', 'Drinking water and cold towels', 'Passes and meals not included'],
                'hotel_pickup' => true, 'tour_guide' => 'English-speaking guide', 'included_drinks' => ['Drinking water', 'Cold towels'],
                'included_meals' => [], 'vehicle_options' => null, 'available_seats' => null, 'featured' => false, 'sort_order' => 9 + $index,
            ];
        }

        $privateTours = [
            ['private-angkor-sunrise', 'Private Angkor Sunrise', 'Angkor Wat, Bayon, and Ta Prohm', 110, '7–8 hours', 9, 'Listed vehicles seat 1–9 guests; confirm larger group requests directly.', 'https://images.pexels.com/photos/15890568/pexels-photo-15890568.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', [['id' => 'suv', 'name' => 'SUV', 'capacity' => 2, 'price' => 110], ['id' => 'sienna', 'name' => 'Sienna', 'capacity' => 4, 'price' => 115], ['id' => 'minivan', 'name' => 'Minivan', 'capacity' => 6, 'price' => 125], ['id' => 'van', 'name' => 'Van', 'capacity' => 9, 'price' => 130]]],
            ['private-angkor-temple-sunset', 'Private Angkor Temple with Sunset', 'Bayon, Ta Prohm, Angkor Wat, and Phnom Bakheng', 90, '10 hours', 12, 'Up to 12 guests; confirm vehicle availability when booking.', 'https://images.pexels.com/photos/1089302/pexels-photo-1089302.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', null],
            ['private-angkor-sunset', 'Private Angkor Sunset', 'Ta Prohm, Bayon, and Angkor Wat', 90, '7 hours', null, 'Maximum group size is not specified. Confirm vehicle capacity when booking.', 'https://images.pexels.com/photos/1089302/pexels-photo-1089302.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', null],
            ['private-bakong-floating-village', 'Private Bakong & Floating Village', 'Bakong, Rolous temples, and Kampong Phluk', 55, 'Full day', null, 'Maximum group size is not specified. Confirm vehicle capacity when booking.', 'https://images.pexels.com/photos/32978026/pexels-photo-32978026.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', null],
            ['private-banteay-srei-kulen', 'Private Banteay Srei & Kulen', 'Banteay Srei and Kulen Mountain', 70, 'Full day', null, 'Maximum group size is not specified. Confirm vehicle capacity when booking.', 'https://images.pexels.com/photos/4300967/pexels-photo-4300967.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', null],
            ['private-beng-mealea-floating-village', 'Private Beng Mealea & Floating Village', 'Beng Mealea and Kampong Phluk', 75, 'Full day', null, 'Maximum group size is not specified. Confirm vehicle capacity when booking.', 'https://images.pexels.com/photos/15928763/pexels-photo-15928763.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', null],
            ['private-kulen-beng-mealea', 'Private Kulen & Beng Mealea', 'Kulen Mountain, waterfall, and Beng Mealea', 80, 'Full day', null, 'Maximum group size is not specified. Confirm vehicle capacity when booking.', 'https://images.pexels.com/photos/19143429/pexels-photo-19143429.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', null],
            ['private-koh-ker-beng-mealea', 'Private Koh Ker & Beng Mealea', 'Koh Ker and Beng Mealea', 115, 'Full day', null, 'Maximum group size is not specified. Confirm vehicle capacity when booking.', 'https://images.pexels.com/photos/15928763/pexels-photo-15928763.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', null],
        ];

        foreach ($privateTours as $index => [$slug, $name, $route, $price, $duration, $capacity, $capacityNote, $image, $vehicles]) {
            $tours[] = [
                'slug' => $slug, 'name' => $name, 'tagline' => "Book a private vehicle and guide for your own group to {$route}.",
                'description' => "A private tour for your group to {$route}. The listed starting price is for the group/vehicle, not per person. Hotel pickup and drop-off, private transport, an English-speaking guide on guided tours, drinking water, and cold towels are included. Temple passes and meals are not included. Floating-village boat tickets are not included unless purchased through the operator.",
                'price' => $price, 'duration' => $duration, 'category' => 'private', 'group_size' => $capacity,
                'tour_type' => 'private', 'price_basis' => 'group', 'capacity_note' => $capacityNote,
                'image_url' => $image, 'vehicle_options' => $vehicles,
                'highlights' => [$route, 'Private vehicle and hotel pickup/drop-off', 'English-speaking guide on guided tours', 'Drinking water and cold towels', 'Temple passes and meals not included'],
                'hotel_pickup' => true, 'tour_guide' => 'English-speaking guide on guided tours',
                'included_drinks' => ['Drinking water', 'Cold towels'], 'included_meals' => [], 'available_seats' => null,
                'booking_requirements' => $capacityNote . ' Confirm pickup details and exclusions when booking.',
                'featured' => false, 'sort_order' => 20 + $index,
            ];
        }

        $vespaTours = [
            ['vespa-angkor-grand-circuit', 'Angkor Grand Circuit by Vespa', 'The quieter outer temples of Angkor, reached along forest roads and narrow park lanes.', 95, 'About 8 hours', 'Preah Khan, Neak Pean, Krol Ko, Ta Som, East Mebon, Srah Srang and Ta Ney', 'https://adventurescambodia.com/wp-content/uploads/2024/01/vespa-tour-angkor-face-tower-gate-jungle-path-1024x576.jpg', 'Start between 7 and 9 AM; private tour.'],
            ['vespa-angkor-wat-sunrise', 'Angkor Wat Sunrise by Vespa', 'Ride through the quiet pre-dawn lanes, watch sunrise at Angkor Wat, then continue to Bayon and Ta Prohm.', 110, 'About 7 hours 15 minutes', 'Angkor Wat at sunrise, South Gate, Bayon, the royal terraces, Death Gate and Ta Prohm', 'https://adventurescambodia.com/wp-content/uploads/2026/04/akim-ly-angkor-wat-naga-sunrise-1024x576.jpg', 'Fixed 4:45 AM hotel pickup; private tour.'],
            ['vespa-angkor-small-circuit', 'Angkor Wat Small Circuit by Vespa', 'See Angkor Wat, Bayon and Ta Prohm with a private guide and driver, using quieter lanes around the main temple circuit.', 95, 'About 7 hours', 'Angkor Wat, South Gate, Bayon, Terrace of the Elephants, Death Gate, handicraft village and Ta Prohm', 'https://adventurescambodia.com/wp-content/uploads/2023/11/akim-vespa-adventures-cambodiaour-angkor-wat-tour-2-711x533-1.jpeg', 'Choose a start between 7 and 9 AM; private tour.'],
            ['vespa-siem-reap-countryside', 'Siem Reap Countryside by Vespa', 'A half-day private ride through rice fields, village lanes, local food stops and traditional crafts west of town.', 89, '4 hours', 'Palm sugar, a working village market, water-hyacinth weaving, local cakes, West Baray and rice-field lanes', 'https://adventurescambodia.com/wp-content/uploads/2023/12/akim-vespa-adventures-cambodia-countryside.webp', 'Morning start 7–9 AM or afternoon 1–2:30 PM; private tour.'],
        ];

        foreach ($vespaTours as $index => [$slug, $name, $description, $price, $duration, $route, $image, $schedule]) {
            $breakfastTour = $slug === 'vespa-angkor-wat-sunrise';
            $countrysideTour = $slug === 'vespa-siem-reap-countryside';
            $tours[] = [
                'slug' => $slug,
                'name' => $name,
                'tagline' => $route,
                'description' => $description . ' Ride pillion behind a local Vespa driver, with a licensed English-speaking guide accompanying your private party. Choose a Vespa or vintage Jeep at the same listed price. Hotel pickup and drop-off in Siem Reap are included.',
                'price' => $price,
                'duration' => $duration,
                'category' => 'vehicle',
                'group_size' => null,
                'tour_type' => 'private',
                'price_basis' => 'person',
                'capacity_note' => 'Private tour. One guest per Vespa and driver; extra Vespa drivers are added for your party. Confirm group arrangements when booking.',
                'vehicle_options' => null,
                'starting_time' => $breakfastTour ? '04:45:00' : null,
                'image_url' => $image,
                'highlights' => [$route, 'Private Vespa with local driver or vintage Jeep', 'Licensed English-speaking guide', $breakfastTour ? 'Breakfast included' : ($countrysideTour ? 'Local snacks and tastings included' : 'Khmer-house lunch included'), 'Hotel pickup and drop-off', 'Angkor Pass not included'],
                'featured' => false,
                'sort_order' => 30 + $index,
                'hotel_pickup' => true,
                'tour_guide' => 'Licensed English-speaking guide',
                'included_drinks' => ['Water', 'Non-alcoholic drinks'],
                'included_meals' => $breakfastTour ? ['Breakfast'] : ($countrysideTour ? [] : ['Khmer-house lunch']),
                'meeting_point' => null,
                'available_seats' => null,
                'booking_requirements' => $schedule . ' Vespa passengers ride pillion behind a local driver; no self-driving. A vintage Jeep is available at the same listed price. Angkor Pass and gratuities are not included.',
            ];
        }

        $cyclingTours = [
            [
                'slug' => 'elephant-angkor-sunrise-bike', 'name' => 'Angkor Sunrise Bike Tour',
                'tagline' => 'Watch sunrise at Angkor Wat, then cycle quiet park trails to Bayon and Ta Prohm.',
                'description' => 'A guided full-day Angkor ride on mountain bikes and quiet park trails. Start before dawn for Angkor Wat sunrise, enjoy a picnic breakfast, visit Bayon and Ta Prohm, and stop for a Khmer lunch. E-bike option is available; confirm its price when booking.',
                'price' => 85, 'duration' => 'About 9 hours', 'group_size' => 8, 'distance_km' => 20,
                'starting_time' => '04:45:00', 'difficulty_level' => 'Easy',
                'image_url' => 'https://elephantbiketours.com/wp-content/uploads/2025/05/Angkor-Wat-sunrise-view-from-norther-pond.jpg',
                'highlights' => ['Angkor Wat sunrise', 'Bayon and Ta Prohm', 'Quiet cycling trails in Angkor Park', 'Picnic breakfast and local Khmer lunch', 'Mountain bike and helmet included', 'Angkor Pass not included'],
                'included_meals' => ['Picnic breakfast', 'Khmer lunch'],
                'included_drinks' => ['Drinking water', 'Snacks and seasonal fruit'],
                'included_items' => ['Quality mountain bike and helmet', 'English-speaking cycling guide'],
                'excluded_items' => ['Angkor Pass (listed at $37 per person)', 'Travel insurance', 'Personal expenses'],
                'itinerary' => [
                    ['time' => '4:45 AM', 'title' => 'Hotel pickup and bike ride to Angkor Wat', 'detail' => 'Meet the guide and ride from Siem Reap toward Angkor before dawn.'],
                    ['time' => 'Sunrise', 'title' => 'Angkor Wat and picnic breakfast', 'detail' => 'Watch sunrise at the temple, explore its grounds with the guide, and enjoy the included picnic breakfast.'],
                    ['time' => 'Morning', 'title' => 'Angkor Thom and Bayon', 'detail' => 'Cycle along quieter park paths, visit the South Gate, then explore Bayon and its carved faces.'],
                    ['time' => 'Midday', 'title' => 'Khmer lunch', 'detail' => 'Pause for the included local lunch before continuing the ride through the park.'],
                    ['time' => 'Afternoon', 'title' => 'Ta Prohm and return', 'detail' => 'Visit the tree-covered Ta Prohm temple and finish the cycling route before returning to your hotel.'],
                ],
                'booking_requirements' => 'Easy ride; group size 1–8. Pickup is listed at 4:45 AM; exact pickup details are confirmed after booking. E-bike option is available; ask the operator to confirm the added fare.',
            ],
            [
                'slug' => 'elephant-siem-reap-countryside-bike', 'name' => 'Siem Reap Countryside and Village Bike Tour',
                'tagline' => 'Cycle farm roads and village lanes, meet local families, and see everyday countryside life.',
                'description' => 'A four-hour guided mountain-bike trip through Siem Reap’s countryside, vegetable farms, rice fields, market and monastery. Meet local people, learn about farming, and taste local snacks along the way. Easy terrain; recommended for ages five and up.',
                'price' => 35, 'duration' => '4 hours', 'group_size' => 15, 'distance_km' => 25,
                'starting_time' => '07:45:00', 'difficulty_level' => 'Easy',
                'image_url' => 'https://elephantbiketours.com/wp-content/uploads/2025/05/Great-ride-on-the-countryside-of-Siem-Reap.jpg',
                'highlights' => ['Village and rice-field backroads', 'Vegetable farms and local market', 'Buddhist monastery and lotus farm', 'Local snacks and farming activities', 'Mountain bike, helmet, guide and tuk-tuk pickup included'],
                'included_meals' => [],
                'included_drinks' => ['Drinking water', 'Local tasting snacks'],
                'included_items' => ['Quality mountain bike and helmet', 'English-speaking cycling guide', 'Community donations'],
                'excluded_items' => ['Travel insurance', 'Personal expenses'],
                'itinerary' => [
                    ['time' => '7:45 AM', 'title' => 'Tuk-tuk pickup and bike fitting', 'detail' => 'Ride from your hotel to the bike shop, meet the guide, and get fitted to your mountain bike.'],
                    ['time' => '8:00 AM', 'title' => 'Vegetable farms and village roads', 'detail' => 'Begin cycling through the city edge and countryside, visit local farms, and learn about seasonal produce and farming.'],
                    ['time' => '9:15 AM', 'title' => 'Local market and village life', 'detail' => 'Explore a working market and learn how fresh ingredients are bought and used in Khmer cooking.'],
                    ['time' => '10:30 AM', 'title' => 'Buddhist monastery', 'detail' => 'Visit a local monastery, see its murals and Buddha images, and hear about everyday spiritual life.'],
                    ['time' => '11:15 AM–noon', 'title' => 'Lotus farm and return', 'detail' => 'Stop at a lotus farm, then cycle back to the shop to finish the half-day tour.'],
                ],
                'booking_requirements' => 'Easy ride of about 20–25 km; recommended age 5+. Hotel pickup is by local tuk-tuk. Confirm the pickup time and location when booking.',
            ],
            [
                'slug' => 'elephant-siem-reap-twilight-bike', 'name' => 'Siem Reap Twilight Bike Tour',
                'tagline' => 'Ride countryside lanes at sunset, meet local vendors, and enjoy a drink by the lotus fields.',
                'description' => 'A four-hour afternoon cycling tour through farms, village roads and rice fields south of Siem Reap. Visit local markets and farms, see a monastery and finish at a lotus farm with a sunset drink. Snacks, water, bike, helmet and guide are included.',
                'price' => 39, 'duration' => '4 hours', 'group_size' => 15, 'distance_km' => 25,
                'starting_time' => null, 'difficulty_level' => 'Easy',
                'image_url' => 'https://elephantbiketours.com/wp-content/uploads/2025/05/sunset-ride-at-the-countryside.jpg',
                'highlights' => ['Afternoon countryside bike ride', 'Local market and farm visits', 'Monastery and village culture', 'Lotus-farm sunset stop with local drink', 'Mountain bike, helmet, snacks and water included'],
                'included_meals' => [],
                'included_drinks' => ['Drinking water', 'Sunset drink', 'Tasting snacks'],
                'included_items' => ['Quality mountain bike and helmet', 'English-speaking cycling guide', 'Community donations'],
                'excluded_items' => ['Travel insurance', 'Personal expenses'],
                'itinerary' => [
                    ['time' => 'Afternoon', 'title' => 'Pickup and ride south', 'detail' => 'Meet the guide and ride from the shop along quiet roads toward the southern countryside.'],
                    ['time' => null, 'title' => 'Markets, farms and local life', 'detail' => 'Visit an afternoon market and local farms, and learn about the work and daily routines of village families.'],
                    ['time' => null, 'title' => 'Monastery and village roads', 'detail' => 'Cycle through rural lanes and visit a Buddhist monastery to learn about local beliefs and community life.'],
                    ['time' => 'Sunset', 'title' => 'Lotus farm and local drink', 'detail' => 'Finish at a lotus farm overlooking the rice fields, enjoy an included drink and snacks, then return to Siem Reap.'],
                ],
                'booking_requirements' => 'Easy ride of about 20–25 km; group size 1–15. The tour runs in the afternoon and includes hotel pickup to the start point; confirm exact departure time when booking.',
            ],
            [
                'slug' => 'elephant-angkor-temples-bike', 'name' => 'Angkor Temples and History Bike Tour',
                'tagline' => 'Cycle quiet Angkor trails between Angkor Wat, Bayon and Ta Prohm with a local guide.',
                'description' => 'A full-day guided ride through Angkor’s major temples and quiet park trails. Visit Angkor Wat, Angkor Thom’s South Gate and Bayon, stop for local Khmer lunch, then continue by bike to Ta Prohm. E-mountain bike pedal assist is available at a separately listed price.',
                'price' => 49, 'duration' => 'About 9 hours', 'group_size' => 12, 'distance_km' => 45,
                'starting_time' => '07:30:00', 'difficulty_level' => 'Easy',
                'image_url' => 'https://elephantbiketours.com/wp-content/uploads/2025/05/Cycling-on-the-single-trails-in-the-Angkor-park.jpg',
                'highlights' => ['Angkor Wat, Angkor Thom and Bayon', 'Ta Prohm jungle temple', 'Over 80% of the route on park backroads and trails', 'Local Khmer lunch included', 'E-mountain bike option available', 'Angkor entrance ticket not included'],
                'included_meals' => ['Local Khmer lunch'],
                'included_drinks' => ['Drinking water', 'Snacks and seasonal fruit'],
                'included_items' => ['Quality mountain bike and helmet', 'English-speaking cycling guide'],
                'excluded_items' => ['Angkor Pass (listed at $37 per person)', 'Travel insurance', 'Personal expenses'],
                'itinerary' => [
                    ['time' => '7:30 AM', 'title' => 'Tuk-tuk pickup and bike fitting', 'detail' => 'Transfer to the bike shop, meet your cycling guide, and prepare for the day’s ride.'],
                    ['time' => 'Morning', 'title' => 'Ride to Angkor Wat', 'detail' => 'Cycle on park backroads to Angkor Wat, then walk through the temple and learn its history and architecture.'],
                    ['time' => 'Late morning', 'title' => 'South Gate and Bayon', 'detail' => 'Continue to Angkor Thom’s South Gate and Bayon, known for its carved towers and faces.'],
                    ['time' => 'Midday', 'title' => 'Local Khmer lunch', 'detail' => 'Take a lunch break at a local restaurant; the meal is included.'],
                    ['time' => 'Afternoon', 'title' => 'Ta Prohm and return', 'detail' => 'Ride scenic single-track through the park to Ta Prohm, then cycle back toward the hotel.'],
                ],
                'booking_requirements' => 'Easy ride of about 40–45 km; group size 1–12. Daily departure is listed at 7:30 AM. E-mountain bike pedal assist is available for an additional published price; confirm when booking.',
            ],
            [
                'slug' => 'elephant-countryside-bike-boat', 'name' => 'Countryside Bike and Floating Village Boat Tour',
                'tagline' => 'Cycle village backroads, share lunch with a local family, and take a boat to the floating community.',
                'description' => 'A full-day bike, boat and countryside experience. Ride village roads and flat trails, visit a local market and monastery, enjoy a hosted lunch with a local family, then travel by boat to the floating community on Tonle Sap. A support vehicle accompanies the boat portion.',
                'price' => 45, 'duration' => 'Full day (about 9 hours)', 'group_size' => 12, 'distance_km' => null,
                'starting_time' => null, 'difficulty_level' => 'Easy',
                'image_url' => 'https://www.pelago.com/img/products/KH-Cambodia/floating-village-bike-boat-inclusive-lunch-boat-ticket/6c450e58-5f15-42dd-a4f7-94d5109d0c0b_floating-village-bike-boat-inclusive-lunch-boat-ticket.jpg',
                'highlights' => ['Cycling through countryside villages and rice fields', 'Local market and monastery', 'Hosted Khmer lunch with a local family', 'Boat ride to the Tonle Sap floating community', 'Support vehicle, bike and helmet included'],
                'included_meals' => ['Hosted local-family lunch'],
                'included_drinks' => ['Drinking water', 'Snacks'],
                'included_items' => ['Quality mountain bike and helmet', 'English-speaking cycling guide', 'Boat trip and floating-community entry', 'Community donations'],
                'excluded_items' => ['Travel insurance', 'Personal expenses'],
                'itinerary' => [
                    ['time' => 'Morning', 'title' => 'Hotel pickup and bike fitting', 'detail' => 'Transfer by local tuk-tuk to the bike shop, meet the guide, and get fitted to your bike.'],
                    ['time' => 'Morning', 'title' => 'Village roads and local market', 'detail' => 'Cycle through countryside trails and visit a lively market to see the foods and produce used in local homes.'],
                    ['time' => 'Late morning', 'title' => 'Monastery and local community', 'detail' => 'Visit a Buddhist monastery and learn about local traditions and daily village life.'],
                    ['time' => 'Midday', 'title' => 'Hosted lunch with a local family', 'detail' => 'Enjoy an included Khmer meal prepared by a local family; dietary requests can be shared when booking.'],
                    ['time' => 'Afternoon', 'title' => 'Boat to the floating community', 'detail' => 'Continue by support vehicle to the lake, then take the included boat trip to the floating community on Tonle Sap.'],
                ],
                'booking_requirements' => 'Easy full-day trip; group size 1–12. The operator lists a tuk-tuk pickup, support vehicle for the lake portion, boat and community entry. Confirm pickup time and dietary needs when booking.',
            ],
        ];

        foreach ($cyclingTours as $index => $cyclingTour) {
            $cyclingTour = array_merge($cyclingTour, [
                'category' => 'cycling', 'tour_type' => 'group', 'price_basis' => 'person',
                'capacity_note' => 'Scheduled cycling experience; confirm availability and final group size when booking.',
                'vehicle_options' => null, 'bicycle_type' => 'Quality mountain bike',
                'tour_guide' => 'English-speaking cycling guide', 'hotel_pickup' => true,
                'meeting_point' => 'Hotel pickup or Elephant Bike Tours shop; confirm for your selected tour.',
                'available_seats' => null, 'featured' => false, 'sort_order' => 40 + $index,
            ]);
            $tours[] = $cyclingTour;
        }

        $itineraries = [
            'angkor-sunrise-tour' => [
                ['time' => '4:20 AM', 'title' => 'Hotel pickup', 'detail' => 'Meet the guide and join the shared vehicle for the drive to Angkor Archaeological Park.'],
                ['time' => 'Sunrise', 'title' => 'Angkor Wat', 'detail' => 'Watch dawn over the reflecting pools, then explore the galleries, courtyards, and central sanctuary.'],
                ['time' => 'Morning', 'title' => 'Breakfast at Srah Srong', 'detail' => 'Pause near the reservoir for breakfast at your own cost before continuing to Angkor Thom.'],
                ['time' => null, 'title' => 'Bayon Temple', 'detail' => 'Walk among the stone towers and carved faces at the center of Angkor Thom.'],
                ['time' => 'Around 12:30 PM', 'title' => 'Ta Prohm and return', 'detail' => 'Explore the tree-covered temple before the shared ride returns guests to their hotels.'],
            ],
            'explore-angkor' => [
                ['time' => 'Morning', 'title' => 'Angkor Thom and Bayon', 'detail' => 'Enter the ancient walled city and visit Bayon’s carved face towers and nearby royal terraces.'],
                ['time' => 'Late morning', 'title' => 'Ta Prohm', 'detail' => 'Explore the jungle temple’s galleries and stonework intertwined with large tree roots.'],
                ['time' => 'Midday', 'title' => 'Lunch break', 'detail' => 'Take a break at a local restaurant near the temples; lunch is at your own cost.'],
                ['time' => 'Afternoon', 'title' => 'Angkor Wat', 'detail' => 'Visit the temple galleries, bas-reliefs, and central towers with the guide.'],
                ['time' => 'Late afternoon', 'title' => 'Phnom Bakheng sunset', 'detail' => 'Finish at the hilltop temple viewpoint when access and the daily visitor limit allow.'],
            ],
            'koh-ker-beng-mealea' => [
                ['time' => 'Morning', 'title' => 'Drive to Beng Mealea', 'detail' => 'Travel out of Siem Reap to the remote temple site, then explore its collapsed galleries and jungle-covered stone blocks.'],
                ['time' => 'Midday', 'title' => 'Countryside lunch break', 'detail' => 'Pause for lunch at your own cost before continuing north.'],
                ['time' => 'Afternoon', 'title' => 'Koh Ker temple complex', 'detail' => 'Visit the former Khmer capital, including Prasat Thom’s stepped pyramid and selected surrounding shrines.'],
                ['time' => null, 'title' => 'Return to Siem Reap', 'detail' => 'Ride back to town after the temple visits.'],
            ],
            'kompong-phluk-floating-villages' => [
                ['time' => null, 'title' => 'Drive to Kampong Phluk', 'detail' => 'Travel from Siem Reap through the countryside to the Tonle Sap lakeside community.'],
                ['time' => null, 'title' => 'Village and pagoda', 'detail' => 'See the local pagoda and learn how daily life changes with the lake’s seasonal water levels.'],
                ['time' => null, 'title' => 'Stilt-house community', 'detail' => 'Explore Kampong Phluk’s elevated homes and community areas with the guide.'],
                ['time' => null, 'title' => 'Boat ride and flooded forest', 'detail' => 'Take the included village boat trip across the water and past the flooded forest. Small add-on boats may cost extra.'],
                ['time' => null, 'title' => 'Return to Siem Reap', 'detail' => 'Drive back to town after the village visit.'],
            ],
            'banteay-srei-backcountry' => [
                ['time' => '7:40–8:10 AM', 'title' => 'Hotel pickup', 'detail' => 'Join the shared group for the morning drive beyond Siem Reap.'],
                ['time' => 'Morning', 'title' => 'Pre Rup', 'detail' => 'Walk through the brick and laterite temple complex and take in the surrounding countryside.'],
                ['time' => 'Late morning', 'title' => 'Banteay Srei', 'detail' => 'See the pink sandstone carvings and detailed lintels at this tenth-century temple.'],
                ['time' => 'Midday', 'title' => 'Lunch break', 'detail' => 'Stop for lunch at your own cost.'],
                ['time' => 'Afternoon', 'title' => 'East Mebon, Ta Som, Neak Pean and Preah Khan', 'detail' => 'Continue through the eastern temples, including Ta Som’s tree-framed gate and the large complex of Preah Khan, before returning around 4 PM.'],
            ],
            'kulen-waterfall' => [
                ['time' => '7:40–8:10 AM', 'title' => 'Hotel pickup and mountain drive', 'detail' => 'Meet the group and travel to Phnom Kulen National Park.'],
                ['time' => 'Morning', 'title' => 'River of 1000 Lingas', 'detail' => 'Walk along the riverbed carvings and view the sacred watercourse.'],
                ['time' => 'Late morning', 'title' => 'Wat Preah Ang Thom', 'detail' => 'Visit the pagoda and reclining Buddha carved into the sandstone plateau.'],
                ['time' => 'Afternoon', 'title' => 'Kulen waterfall', 'detail' => 'Spend time at the waterfall and take a meal break. Park entry and meal arrangements can vary; confirm current inclusions before booking.'],
                ['time' => 'Around 5 PM', 'title' => 'Return to Siem Reap', 'detail' => 'Ride back to your hotel after the mountain visit.'],
            ],
            'preah-vihear-koh-ker' => [
                ['time' => 'Early morning', 'title' => 'Drive to Preah Vihear', 'detail' => 'Travel north from Siem Reap to the Dangrek escarpment; this is a long-distance day trip.'],
                ['time' => 'Late morning', 'title' => 'Preah Vihear sanctuary', 'detail' => 'Explore the mountain sanctuary’s successive temple enclosures and cliff-edge viewpoints with your guide.'],
                ['time' => 'Midday', 'title' => 'Lunch break', 'detail' => 'Pause for lunch at your own cost during the drive between sites.'],
                ['time' => 'Afternoon', 'title' => 'Koh Ker', 'detail' => 'Visit the remote former capital and its distinctive stepped pyramid before the return journey.'],
                ['time' => 'Evening', 'title' => 'Return to Siem Reap', 'detail' => 'Arrive back after the full-day trip; exact timing depends on road conditions.'],
            ],
            'kulen-mountain-beng-mealea' => [
                ['time' => '7:40–8:10 AM', 'title' => 'Hotel pickup', 'detail' => 'Meet the shared group and depart for Phnom Kulen.'],
                ['time' => 'Morning', 'title' => 'Kulen plateau and River of 1000 Lingas', 'detail' => 'See the mountain scenery and carved riverbed before visiting the sacred pagoda.'],
                ['time' => 'Late morning', 'title' => 'Reclining Buddha and waterfall', 'detail' => 'Visit Wat Preah Ang Thom, then spend time at the waterfall with a lunch break.'],
                ['time' => 'Afternoon', 'title' => 'Beng Mealea', 'detail' => 'Explore the overgrown temple galleries and collapsed stonework on the way back toward Siem Reap.'],
                ['time' => 'Around 5–5:30 PM', 'title' => 'Return to Siem Reap', 'detail' => 'Drop-off follows the visit to Beng Mealea.'],
            ],
            'kulen-mountain-banteay-srei' => [
                ['time' => 'Morning', 'title' => 'Drive to Phnom Kulen', 'detail' => 'Leave Siem Reap for the mountain plateau and its forested landscapes.'],
                ['time' => 'Morning', 'title' => 'River of 1000 Lingas and reclining Buddha', 'detail' => 'Visit the river carvings and Wat Preah Ang Thom on the summit.'],
                ['time' => 'Midday', 'title' => 'Kulen waterfall and lunch break', 'detail' => 'Spend time at the waterfall and pause for lunch; meal and entry inclusions should be confirmed.'],
                ['time' => 'Afternoon', 'title' => 'Banteay Srei', 'detail' => 'Visit the pink sandstone temple and its finely carved doorways and lintels.'],
                ['time' => 'Late afternoon', 'title' => 'Return to Siem Reap', 'detail' => 'Drive back to town after the two destinations.'],
            ],
            'private-angkor-sunrise' => [
                ['time' => 'Before sunrise', 'title' => 'Private hotel pickup', 'detail' => 'Your vehicle and guide meet your group at the hotel for the early temple drive.'],
                ['time' => 'Sunrise', 'title' => 'Angkor Wat', 'detail' => 'Watch sunrise near the reflecting pools, then explore the galleries and temple grounds.'],
                ['time' => 'Morning', 'title' => 'Bayon', 'detail' => 'Walk among the face towers and bas-reliefs at the heart of Angkor Thom.'],
                ['time' => 'Late morning', 'title' => 'Ta Prohm', 'detail' => 'Explore the atmospheric temple where tree roots grow across its stone galleries.'],
                ['time' => null, 'title' => 'Return to your hotel', 'detail' => 'Your private vehicle returns your group to Siem Reap.'],
            ],
            'private-angkor-temple-sunset' => [
                ['time' => 'Morning', 'title' => 'Bayon and Angkor Thom', 'detail' => 'Explore Bayon’s carved towers and the monumental gates and terraces of the ancient city.'],
                ['time' => 'Late morning', 'title' => 'Ta Prohm', 'detail' => 'Walk through the tree-covered temple and its stone corridors.'],
                ['time' => 'Afternoon', 'title' => 'Angkor Wat', 'detail' => 'Visit the galleries and central sanctuary at Cambodia’s best-known temple.'],
                ['time' => 'Sunset', 'title' => 'Phnom Bakheng', 'detail' => 'Finish at the sunset viewpoint, subject to daily visitor limits and access conditions.'],
                ['time' => null, 'title' => 'Private hotel drop-off', 'detail' => 'Return to your hotel after the temple circuit.'],
            ],
            'private-angkor-sunset' => [
                ['time' => 'Afternoon', 'title' => 'Ta Prohm', 'detail' => 'Start at the atmospheric jungle temple and explore its galleries and root-covered stonework.'],
                ['time' => 'Late afternoon', 'title' => 'Bayon', 'detail' => 'Visit the face towers and carved scenes at the center of Angkor Thom.'],
                ['time' => 'Before closing', 'title' => 'Angkor Wat', 'detail' => 'Explore the temple grounds and galleries before the day ends.'],
                ['time' => 'Evening', 'title' => 'Private hotel drop-off', 'detail' => 'Your vehicle returns your group to the hotel.'],
            ],
            'private-bakong-floating-village' => [
                ['time' => 'Morning', 'title' => 'Rolous group', 'detail' => 'Drive to the early Khmer capital area and visit Bakong and nearby Rolous temples.'],
                ['time' => 'Midday', 'title' => 'Countryside lunch break', 'detail' => 'Pause for lunch at your own cost before continuing to the lake community.'],
                ['time' => 'Afternoon', 'title' => 'Kampong Phluk', 'detail' => 'Visit the stilt-house village and learn about life around Tonle Sap.'],
                ['time' => 'Afternoon', 'title' => 'Village boat ride', 'detail' => 'Add a boat trip through the village and waterways; ticket costs should be confirmed when booking.'],
                ['time' => null, 'title' => 'Private return to Siem Reap', 'detail' => 'Travel back to your hotel in your private vehicle.'],
            ],
            'private-banteay-srei-kulen' => [
                ['time' => 'Morning', 'title' => 'Banteay Srei', 'detail' => 'Explore the pink sandstone temple, famed for its detailed carvings and lintels.'],
                ['time' => 'Midday', 'title' => 'Drive into Phnom Kulen', 'detail' => 'Continue into the national park and its forested plateau.'],
                ['time' => 'Afternoon', 'title' => 'River of 1000 Lingas', 'detail' => 'Walk by the carved riverbed and learn about its historic religious use.'],
                ['time' => 'Afternoon', 'title' => 'Wat Preah Ang Thom and waterfall', 'detail' => 'Visit the reclining Buddha and spend time at the waterfall; entry and meal costs should be confirmed.'],
                ['time' => null, 'title' => 'Private hotel drop-off', 'detail' => 'Return to Siem Reap in your private vehicle.'],
            ],
            'private-beng-mealea-floating-village' => [
                ['time' => 'Morning', 'title' => 'Beng Mealea', 'detail' => 'Explore the remote temple’s collapsed galleries and jungle-covered stone blocks.'],
                ['time' => 'Midday', 'title' => 'Transfer and lunch break', 'detail' => 'Drive toward Tonle Sap and pause for lunch at your own cost.'],
                ['time' => 'Afternoon', 'title' => 'Kampong Phluk', 'detail' => 'Visit the stilt-house community and see how the village adapts to seasonal lake levels.'],
                ['time' => 'Afternoon', 'title' => 'Tonle Sap boat trip', 'detail' => 'A village boat ride can be arranged; its ticket is not included unless confirmed with the operator.'],
                ['time' => null, 'title' => 'Private hotel drop-off', 'detail' => 'Return to your hotel in Siem Reap.'],
            ],
            'private-kulen-beng-mealea' => [
                ['time' => 'Morning', 'title' => 'Phnom Kulen', 'detail' => 'Drive to the mountain plateau and visit the River of 1000 Lingas and Wat Preah Ang Thom.'],
                ['time' => 'Midday', 'title' => 'Kulen waterfall', 'detail' => 'Spend time at the falls and take a lunch break; park entry and meals should be confirmed.'],
                ['time' => 'Afternoon', 'title' => 'Beng Mealea', 'detail' => 'Explore the jungle temple’s fallen stone galleries and overgrown courtyards.'],
                ['time' => 'Late afternoon', 'title' => 'Private return to Siem Reap', 'detail' => 'Travel back to your hotel after the two sites.'],
            ],
            'private-koh-ker-beng-mealea' => [
                ['time' => 'Morning', 'title' => 'Beng Mealea', 'detail' => 'Walk through the remote temple’s collapsed galleries and jungle-covered ruins.'],
                ['time' => 'Midday', 'title' => 'Countryside lunch break', 'detail' => 'Stop for lunch at your own cost on the route north.'],
                ['time' => 'Afternoon', 'title' => 'Koh Ker', 'detail' => 'Visit Prasat Thom’s stepped pyramid and selected temples from the former Khmer capital.'],
                ['time' => 'Late afternoon', 'title' => 'Private return to Siem Reap', 'detail' => 'Ride back to your hotel after the remote temple visits.'],
            ],
            'vespa-angkor-grand-circuit' => [
                ['time' => '7–9 AM', 'title' => 'Hotel pickup and Grand Circuit', 'detail' => 'Meet your guide and Vespa driver, then ride into the quieter outer loop of Angkor Archaeological Park.'],
                ['time' => 'Morning', 'title' => 'Preah Khan and Neak Pean', 'detail' => 'Explore the forest-wrapped monastery at Preah Khan, then visit Neak Pean, the small island sanctuary set within a large reservoir.'],
                ['time' => 'Late morning', 'title' => 'Krol Ko, Ta Som and East Mebon', 'detail' => 'Continue to smaller, less-crowded temples, including Ta Som’s tree-framed east gate and East Mebon’s stone elephants.'],
                ['time' => 'Lunch', 'title' => 'Srah Srang and Khmer-house lunch', 'detail' => 'Pause by the royal bathing pool for the included sit-down Khmer lunch in a local house.'],
                ['time' => 'Afternoon', 'title' => 'Handicraft village and Ta Ney', 'detail' => 'See local craftwork, then visit quiet forest temple Ta Ney before returning to your hotel around 3–4 PM.'],
            ],
            'vespa-angkor-wat-sunrise' => [
                ['time' => '4:45 AM', 'title' => 'Hotel pickup', 'detail' => 'Your private Vespa driver and guide collect you for the pre-dawn ride to Angkor Wat.'],
                ['time' => 'Around 5:15 AM', 'title' => 'Sunrise at Angkor Wat', 'detail' => 'Enter before the main tour buses and watch sunrise from a quieter spot chosen by your guide.'],
                ['time' => '6–7 AM', 'title' => 'Explore Angkor Wat', 'detail' => 'Walk the galleries and bas-reliefs and visit the central sanctuary when it is open.'],
                ['time' => 'Around 8 AM', 'title' => 'Angkor Thom and breakfast', 'detail' => 'Ride through the South Gate, visit Bayon and the royal terraces, then stop for the included breakfast at a pagoda or Khmer house.'],
                ['time' => '10–noon', 'title' => 'Death Gate and Ta Prohm', 'detail' => 'Continue through the quieter Death Gate to Ta Prohm, then return to your hotel around noon.'],
            ],
            'vespa-angkor-small-circuit' => [
                ['time' => '7–9 AM', 'title' => 'Hotel pickup and Angkor Wat', 'detail' => 'Start at your chosen time and explore Angkor Wat with your private guide.'],
                ['time' => 'Mid-morning', 'title' => 'South Gate and Bayon', 'detail' => 'Ride through Angkor Thom’s South Gate to Bayon and its many carved stone faces.'],
                ['time' => 'Late morning', 'title' => 'Royal terraces and Death Gate', 'detail' => 'Walk the Terrace of the Elephants, then exit through the quieter Death Gate and stop at a local handicraft village.'],
                ['time' => 'Around 1 PM', 'title' => 'Khmer-house lunch', 'detail' => 'Take a shaded lunch break at a traditional wooden house inside the park.'],
                ['time' => 'Afternoon', 'title' => 'Ta Prohm and return', 'detail' => 'Finish at the tree-covered Ta Prohm temple and return to your hotel around 2:30 PM.'],
            ],
            'vespa-siem-reap-countryside' => [
                ['time' => 'Morning or afternoon', 'title' => 'Ride west from Siem Reap', 'detail' => 'Follow village lanes and rice-field tracks with your private driver and guide. Stops can change with the season and what local families are doing that day.'],
                ['time' => null, 'title' => 'Palm sugar and village market', 'detail' => 'See how palm sap is collected and visit a working village market with local produce and food.'],
                ['time' => null, 'title' => 'Weaving, cakes and countryside life', 'detail' => 'Meet local weavers, sample village cakes, and see fishermen and water buffalo around West Baray.'],
                ['time' => null, 'title' => 'Rice fields and local crafts', 'detail' => 'Depending on the day, continue by ox-cart lanes, see rice-noodle making, palm-leaf weaving or rice-wine production, then ride back to town.'],
            ],
        ];

        $excludedItems = [
            'angkor-sunrise-tour' => ['Angkor temple pass', 'Breakfast at Srah Srong'],
            'explore-angkor' => ['Angkor temple pass', 'Lunch', 'Gratuities'],
            'koh-ker-beng-mealea' => ['Koh Ker and Beng Mealea entry tickets', 'Lunch', 'Gratuities'],
            'kompong-phluk-floating-villages' => ['Meals', 'Optional small boat in the flooded forest', 'Gratuities'],
            'banteay-srei-backcountry' => ['Angkor temple pass', 'Lunch', 'Gratuities'],
            'kulen-waterfall' => ['Phnom Kulen park entry; confirm current ticket and meal inclusions', 'Gratuities'],
            'preah-vihear-koh-ker' => ['Temple and park entry tickets', 'Meals', 'Gratuities'],
            'kulen-mountain-beng-mealea' => ['Phnom Kulen and Beng Mealea entry tickets', 'Lunch', 'Gratuities'],
            'kulen-mountain-banteay-srei' => ['Phnom Kulen and temple entry tickets', 'Lunch', 'Gratuities'],
            'private-angkor-sunrise' => ['Angkor temple pass', 'Breakfast', 'Gratuities'],
            'private-angkor-temple-sunset' => ['Angkor temple pass', 'Meals', 'Gratuities'],
            'private-angkor-sunset' => ['Angkor temple pass', 'Meals', 'Gratuities'],
            'private-bakong-floating-village' => ['Temple passes', 'Village boat ticket unless confirmed', 'Meals', 'Gratuities'],
            'private-banteay-srei-kulen' => ['Temple and park entry tickets', 'Meals', 'Gratuities'],
            'private-beng-mealea-floating-village' => ['Temple pass', 'Village boat ticket unless confirmed', 'Meals', 'Gratuities'],
            'private-kulen-beng-mealea' => ['Park and temple entry tickets', 'Meals', 'Gratuities'],
            'private-koh-ker-beng-mealea' => ['Temple entry tickets', 'Meals', 'Gratuities'],
            'vespa-angkor-grand-circuit' => ['Angkor Pass', 'Gratuities'],
            'vespa-angkor-wat-sunrise' => ['Angkor Pass', 'Gratuities'],
            'vespa-angkor-small-circuit' => ['Angkor Pass', 'Gratuities'],
            'vespa-siem-reap-countryside' => ['Gratuities'],
        ];
        $includedItems = [
            'kompong-phluk-floating-villages' => ['Kampong Phluk village boat ticket'],
            'vespa-angkor-grand-circuit' => ['Photos taken by your guide'],
            'vespa-angkor-wat-sunrise' => ['Photos taken by your guide'],
            'vespa-angkor-small-circuit' => ['Photos taken by your guide'],
            'vespa-siem-reap-countryside' => ['Local snacks and tastings', 'Photos taken by your guide'],
        ];
        $transportInclusions = [
            'angkor-sunrise-tour' => 'Transportation: Shared air-conditioned minivan with hotel pickup and drop-off.',
            'explore-angkor' => 'Transportation: Shared air-conditioned minivan with hotel pickup and drop-off.',
            'koh-ker-beng-mealea' => 'Transportation: Shared air-conditioned minivan for the remote temple transfers, with hotel pickup and drop-off.',
            'kompong-phluk-floating-villages' => 'Transportation: Shared minivan transfer to Kampong Phluk with hotel pickup and drop-off.',
            'banteay-srei-backcountry' => 'Transportation: Shared air-conditioned minivan with hotel pickup and drop-off.',
            'kulen-waterfall' => 'Transportation: Shared minivan transfer to Phnom Kulen with hotel pickup and drop-off.',
            'preah-vihear-koh-ker' => 'Transportation: Shared minivan for the long-distance route; mountain access vehicle details are confirmed when booking.',
            'kulen-mountain-beng-mealea' => 'Transportation: Shared minivan for the mountain and temple route with hotel pickup and drop-off.',
            'kulen-mountain-banteay-srei' => 'Transportation: Shared minivan for the mountain and temple route with hotel pickup and drop-off.',
            'private-angkor-sunrise' => 'Transportation: Private vehicle selected at booking: SUV, Sienna, minivan or van; price depends on vehicle size.',
            'private-angkor-temple-sunset' => 'Transportation: Private car or van for your party; exact vehicle size is confirmed when booking.',
            'private-angkor-sunset' => 'Transportation: Private car or van for your party; exact vehicle size is confirmed when booking.',
            'private-bakong-floating-village' => 'Transportation: Private car or van for your party; confirm whether the village boat ticket is included.',
            'private-banteay-srei-kulen' => 'Transportation: Private car or van for your party; exact vehicle size is confirmed when booking.',
            'private-beng-mealea-floating-village' => 'Transportation: Private car or van for your party; village boat ticket is not included unless confirmed.',
            'private-kulen-beng-mealea' => 'Transportation: Private car or van for your party; exact vehicle size is confirmed when booking.',
            'private-koh-ker-beng-mealea' => 'Transportation: Private car or van for your party; exact vehicle size is confirmed when booking.',
            'vespa-angkor-grand-circuit' => 'Transportation: Classic Vespa with a dedicated local driver, one per guest; vintage Jeep is an alternative.',
            'vespa-angkor-wat-sunrise' => 'Transportation: Classic Vespa with a dedicated local driver, one per guest; vintage Jeep is an alternative.',
            'vespa-angkor-small-circuit' => 'Transportation: Classic Vespa with a dedicated local driver, one per guest; vintage Jeep is an alternative.',
            'vespa-siem-reap-countryside' => 'Transportation: Classic Vespa with a dedicated local driver, one per guest; vintage Jeep is an alternative.',
            'elephant-angkor-sunrise-bike' => 'Transportation: Mountain bike for the route, hotel pickup and drop-off, plus a support vehicle with professional driver.',
            'elephant-siem-reap-countryside-bike' => 'Transportation: Tuk-tuk pickup to the bike shop; countryside route and return to the shop are by mountain bike.',
            'elephant-siem-reap-twilight-bike' => 'Transportation: Hotel pickup to the starting point; countryside route and return to the shop are by mountain bike.',
            'elephant-angkor-temples-bike' => 'Transportation: Tuk-tuk pickup to the bike shop; Angkor route is by mountain bike, with no on-route vehicle support listed.',
            'elephant-countryside-bike-boat' => 'Transportation: Tuk-tuk pickup, mountain bike for village roads, support air-conditioned vehicle for the lake transfer, and boat to the floating community.',
        ];

        foreach ($tours as $tour) {
            if ($tour['slug'] === 'airport-transfer') {
                $tour['category'] = 'transfer';
                $tour['tour_type'] = 'private';
                $tour['price_basis'] = 'group';
                $tour['capacity_note'] = 'Private EV for up to 3 guests.';
                $tour['vehicle_options'] = null;
            }

            $tour['itinerary'] = $itineraries[$tour['slug']] ?? $tour['itinerary'] ?? [];
            $tour['included_items'] = array_values(array_unique(array_merge(
                $tour['included_items'] ?? [],
                $includedItems[$tour['slug']] ?? [],
                isset($transportInclusions[$tour['slug']]) ? [$transportInclusions[$tour['slug']]] : [],
            )));
            $tour['excluded_items'] = $excludedItems[$tour['slug']] ?? $tour['excluded_items'] ?? [];

            Tour::query()->updateOrCreate(['slug' => $tour['slug']], $tour);
        }
    }
}
