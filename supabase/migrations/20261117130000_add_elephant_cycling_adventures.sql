INSERT INTO tours (
  slug, name, tagline, description, price, duration, category, group_size,
  tour_type, price_basis, capacity_note, vehicle_options, image_url, highlights,
  itinerary, included_items, excluded_items, featured, sort_order
)
VALUES
  (
    'elephant-angkor-sunrise-bike', 'Angkor Sunrise Bike Tour',
    'Watch sunrise at Angkor Wat, then cycle quiet park trails to Bayon and Ta Prohm.',
    'A guided full-day Angkor ride on mountain bikes and quiet park trails. Start before dawn for Angkor Wat sunrise, enjoy a picnic breakfast, visit Bayon and Ta Prohm, and stop for a Khmer lunch. E-bike option is available; confirm its price when booking.',
    85, 'About 9 hours', 'cycling', 8, 'group', 'person',
    'Easy ride; group size 1–8. Pickup listed at 4:45 AM. Confirm exact pickup details when booking.', NULL,
    'https://elephantbiketours.com/wp-content/uploads/2025/05/Angkor-Wat-sunrise-view-from-norther-pond.jpg',
    ARRAY['Angkor Wat sunrise','Bayon and Ta Prohm','Quiet cycling trails in Angkor Park','Picnic breakfast and local Khmer lunch','Mountain bike and helmet included','Angkor Pass not included'],
    $json$[
      {"time":"4:45 AM","title":"Hotel pickup and bike ride to Angkor Wat","detail":"Meet the guide and ride from Siem Reap toward Angkor before dawn."},
      {"time":"Sunrise","title":"Angkor Wat and picnic breakfast","detail":"Watch sunrise at the temple, explore its grounds with the guide, and enjoy the included picnic breakfast."},
      {"time":"Morning","title":"Angkor Thom and Bayon","detail":"Cycle along quieter park paths, visit the South Gate, then explore Bayon and its carved faces."},
      {"time":"Midday","title":"Khmer lunch","detail":"Pause for the included local lunch before continuing the ride through the park."},
      {"time":"Afternoon","title":"Ta Prohm and return","detail":"Visit the tree-covered Ta Prohm temple and finish the cycling route before returning to your hotel."}
    ]$json$::jsonb,
    ARRAY['Quality mountain bike and helmet','English-speaking cycling guide','Support vehicle and professional driver','Picnic breakfast','Khmer lunch','Drinking water, snacks and seasonal fruit','Hotel pickup and drop-off'],
    ARRAY['Angkor Pass (listed at $37 per person)','Travel insurance','Personal expenses'], false, 40
  ),
  (
    'elephant-siem-reap-countryside-bike', 'Siem Reap Countryside and Village Bike Tour',
    'Cycle farm roads and village lanes, meet local families, and see everyday countryside life.',
    'A four-hour guided mountain-bike trip through Siem Reap’s countryside, vegetable farms, rice fields, market and monastery. Meet local people, learn about farming, and taste local snacks along the way. Easy terrain; recommended for ages five and up.',
    35, '4 hours', 'cycling', 15, 'group', 'person',
    'Easy ride of about 20–25 km; group size 1–15; recommended age 5+. Confirm the pickup time and location when booking.', NULL,
    'https://elephantbiketours.com/wp-content/uploads/2025/05/Great-ride-on-the-countryside-of-Siem-Reap.jpg',
    ARRAY['Village and rice-field backroads','Vegetable farms and local market','Buddhist monastery and lotus farm','Local snacks and farming activities','Mountain bike, helmet, guide and tuk-tuk pickup included'],
    $json$[
      {"time":"7:45 AM","title":"Tuk-tuk pickup and bike fitting","detail":"Ride from your hotel to the bike shop, meet the guide, and get fitted to your mountain bike."},
      {"time":"8:00 AM","title":"Vegetable farms and village roads","detail":"Begin cycling through the city edge and countryside, visit local farms, and learn about seasonal produce and farming."},
      {"time":"9:15 AM","title":"Local market and village life","detail":"Explore a working market and learn how fresh ingredients are bought and used in Khmer cooking."},
      {"time":"10:30 AM","title":"Buddhist monastery","detail":"Visit a local monastery, see its murals and Buddha images, and hear about everyday spiritual life."},
      {"time":"11:15 AM–noon","title":"Lotus farm and return","detail":"Stop at a lotus farm, then cycle back to the shop to finish the half-day tour."}
    ]$json$::jsonb,
    ARRAY['Quality mountain bike and helmet','English-speaking cycling guide','Hotel pickup by local tuk-tuk','Drinking water and local tasting snacks','Community donations'],
    ARRAY['Travel insurance','Personal expenses'], false, 41
  ),
  (
    'elephant-siem-reap-twilight-bike', 'Siem Reap Twilight Bike Tour',
    'Ride countryside lanes at sunset, meet local vendors, and enjoy a drink by the lotus fields.',
    'A four-hour afternoon cycling tour through farms, village roads and rice fields south of Siem Reap. Visit local markets and farms, see a monastery and finish at a lotus farm with a sunset drink. Snacks, water, bike, helmet and guide are included.',
    39, '4 hours', 'cycling', 15, 'group', 'person',
    'Easy ride of about 20–25 km; group size 1–15. Afternoon departure; confirm the exact time when booking.', NULL,
    'https://elephantbiketours.com/wp-content/uploads/2025/05/sunset-ride-at-the-countryside.jpg',
    ARRAY['Afternoon countryside bike ride','Local market and farm visits','Monastery and village culture','Lotus-farm sunset stop with local drink','Mountain bike, helmet, snacks and water included'],
    $json$[
      {"time":"Afternoon","title":"Pickup and ride south","detail":"Meet the guide and ride from the shop along quiet roads toward the southern countryside."},
      {"time":null,"title":"Markets, farms and local life","detail":"Visit an afternoon market and local farms, and learn about the work and daily routines of village families."},
      {"time":null,"title":"Monastery and village roads","detail":"Cycle through rural lanes and visit a Buddhist monastery to learn about local beliefs and community life."},
      {"time":"Sunset","title":"Lotus farm and local drink","detail":"Finish at a lotus farm overlooking the rice fields, enjoy an included drink and snacks, then return to Siem Reap."}
    ]$json$::jsonb,
    ARRAY['Quality mountain bike and helmet','English-speaking cycling guide','Hotel pickup to the starting point','Sunset drink, water and tasting snacks','Community donations'],
    ARRAY['Travel insurance','Personal expenses'], false, 42
  ),
  (
    'elephant-angkor-temples-bike', 'Angkor Temples and History Bike Tour',
    'Cycle quiet Angkor trails between Angkor Wat, Bayon and Ta Prohm with a local guide.',
    'A full-day guided ride through Angkor’s major temples and quiet park trails. Visit Angkor Wat, Angkor Thom’s South Gate and Bayon, stop for local Khmer lunch, then continue by bike to Ta Prohm. E-mountain bike pedal assist is available at a separately listed price.',
    49, 'About 9 hours', 'cycling', 12, 'group', 'person',
    'Easy ride of about 40–45 km; group size 1–12. Daily departure listed at 7:30 AM. Confirm e-bike pricing when booking.', NULL,
    'https://elephantbiketours.com/wp-content/uploads/2025/05/Cycling-on-the-single-trails-in-the-Angkor-park.jpg',
    ARRAY['Angkor Wat, Angkor Thom and Bayon','Ta Prohm jungle temple','Park backroads and cycling trails','Local Khmer lunch included','E-mountain bike option available','Angkor entrance ticket not included'],
    $json$[
      {"time":"7:30 AM","title":"Tuk-tuk pickup and bike fitting","detail":"Transfer to the bike shop, meet your cycling guide, and prepare for the day’s ride."},
      {"time":"Morning","title":"Ride to Angkor Wat","detail":"Cycle on park backroads to Angkor Wat, then walk through the temple and learn its history and architecture."},
      {"time":"Late morning","title":"South Gate and Bayon","detail":"Continue to Angkor Thom’s South Gate and Bayon, known for its carved towers and faces."},
      {"time":"Midday","title":"Local Khmer lunch","detail":"Take a lunch break at a local restaurant; the meal is included."},
      {"time":"Afternoon","title":"Ta Prohm and return","detail":"Ride scenic single-track through the park to Ta Prohm, then cycle back toward the hotel."}
    ]$json$::jsonb,
    ARRAY['Quality mountain bike and helmet','English-speaking cycling guide','Tuk-tuk pickup to the bike shop','Local Khmer lunch','Drinking water, snacks and seasonal fruit'],
    ARRAY['Angkor Pass (listed at $37 per person)','Travel insurance','Personal expenses'], false, 43
  ),
  (
    'elephant-countryside-bike-boat', 'Countryside Bike and Floating Village Boat Tour',
    'Cycle village backroads, share lunch with a local family, and take a boat to the floating community.',
    'A full-day bike, boat and countryside experience. Ride village roads and flat trails, visit a local market and monastery, enjoy a hosted lunch with a local family, then travel by boat to the floating community on Tonle Sap. A support vehicle accompanies the boat portion.',
    45, 'Full day (about 9 hours)', 'cycling', 12, 'group', 'person',
    'Easy full-day trip; group size 1–12. Confirm pickup time and dietary needs when booking.', NULL,
    'https://www.pelago.com/img/products/KH-Cambodia/floating-village-bike-boat-inclusive-lunch-boat-ticket/6c450e58-5f15-42dd-a4f7-94d5109d0c0b_floating-village-bike-boat-inclusive-lunch-boat-ticket.jpg',
    ARRAY['Countryside villages and rice fields by bike','Local market and monastery','Hosted Khmer lunch with a local family','Boat to Tonle Sap floating community','Support vehicle, bike and helmet included'],
    $json$[
      {"time":"Morning","title":"Hotel pickup and bike fitting","detail":"Transfer by local tuk-tuk to the bike shop, meet the guide, and get fitted to your bike."},
      {"time":"Morning","title":"Village roads and local market","detail":"Cycle through countryside trails and visit a lively market to see the foods and produce used in local homes."},
      {"time":"Late morning","title":"Monastery and local community","detail":"Visit a Buddhist monastery and learn about local traditions and daily village life."},
      {"time":"Midday","title":"Hosted lunch with a local family","detail":"Enjoy an included Khmer meal prepared by a local family; dietary requests can be shared when booking."},
      {"time":"Afternoon","title":"Boat to the floating community","detail":"Continue by support vehicle to the lake, then take the included boat trip to the floating community on Tonle Sap."}
    ]$json$::jsonb,
    ARRAY['Quality mountain bike and helmet','English-speaking cycling guide','Support air-conditioned vehicle and driver','Boat trip and floating-community entry','Hotel pickup by local tuk-tuk','Hosted local-family lunch','Drinking water and snacks','Community donations'],
    ARRAY['Travel insurance','Personal expenses'], false, 44
  )
ON CONFLICT (slug) DO UPDATE SET
  name = EXCLUDED.name,
  tagline = EXCLUDED.tagline,
  description = EXCLUDED.description,
  price = EXCLUDED.price,
  duration = EXCLUDED.duration,
  category = EXCLUDED.category,
  group_size = EXCLUDED.group_size,
  tour_type = EXCLUDED.tour_type,
  price_basis = EXCLUDED.price_basis,
  capacity_note = EXCLUDED.capacity_note,
  vehicle_options = EXCLUDED.vehicle_options,
  image_url = EXCLUDED.image_url,
  highlights = EXCLUDED.highlights,
  itinerary = EXCLUDED.itinerary,
  included_items = EXCLUDED.included_items,
  excluded_items = EXCLUDED.excluded_items,
  featured = EXCLUDED.featured,
  sort_order = EXCLUDED.sort_order;
