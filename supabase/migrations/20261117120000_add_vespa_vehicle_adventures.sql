INSERT INTO tours (
  slug, name, tagline, description, price, duration, category, group_size,
  tour_type, price_basis, capacity_note, vehicle_options, image_url, highlights,
  itinerary, included_items, excluded_items, featured, sort_order
)
VALUES
  (
    'vespa-angkor-grand-circuit', 'Angkor Grand Circuit by Vespa',
    'The quieter outer temples of Angkor, reached along forest roads and narrow park lanes.',
    'A private full-day ride through Angkor’s quieter Grand Circuit. Ride pillion behind a local Vespa driver with a licensed English-speaking guide, Khmer-house lunch, drinks, hotel pickup and drop-off. A vintage Jeep is also available at the same listed price.',
    95, 'About 8 hours', 'vehicle', NULL, 'private', 'person',
    'Private tour. One guest per Vespa and driver; confirm group arrangements when booking.', NULL,
    'https://adventurescambodia.com/wp-content/uploads/2024/01/vespa-tour-angkor-face-tower-gate-jungle-path-1024x576.jpg',
    ARRAY['Preah Khan, Neak Pean, Krol Ko, Ta Som and East Mebon', 'Private Vespa with local driver or vintage Jeep', 'Khmer-house lunch included', 'Water, drinks and hotel pickup included', 'Angkor Pass not included'],
    $json$[
      {"time":"7–9 AM","title":"Hotel pickup and Grand Circuit","detail":"Meet your guide and Vespa driver, then ride into the quieter outer loop of Angkor Archaeological Park."},
      {"time":"Morning","title":"Preah Khan and Neak Pean","detail":"Explore the forest-wrapped monastery at Preah Khan, then visit Neak Pean, the small island sanctuary set within a large reservoir."},
      {"time":"Late morning","title":"Krol Ko, Ta Som and East Mebon","detail":"Continue to smaller, less-crowded temples, including Ta Som’s tree-framed east gate and East Mebon’s stone elephants."},
      {"time":"Lunch","title":"Srah Srang and Khmer-house lunch","detail":"Pause by the royal bathing pool for the included sit-down Khmer lunch in a local house."},
      {"time":"Afternoon","title":"Handicraft village and Ta Ney","detail":"See local craftwork, then visit quiet forest temple Ta Ney before returning to your hotel around 3–4 PM."}
    ]$json$::jsonb,
    ARRAY['Classic Vespa with local driver, one per guest','Vintage Jeep available instead at the same listed price','Licensed English-speaking guide','Khmer-house lunch','Water and non-alcoholic drinks','Hotel pickup and drop-off','Photos taken by your guide'],
    ARRAY['Angkor Pass','Gratuities'], false, 30
  ),
  (
    'vespa-angkor-wat-sunrise', 'Angkor Wat Sunrise by Vespa',
    'Ride through the quiet pre-dawn lanes, watch sunrise at Angkor Wat, then continue to Bayon and Ta Prohm.',
    'A private pre-dawn temple tour, with sunrise at Angkor Wat followed by Angkor Thom and Ta Prohm. Ride pillion behind a local Vespa driver, with a licensed English-speaking guide, breakfast, drinks and hotel pickup included. A vintage Jeep is available at the same listed price.',
    110, 'About 7 hours 15 minutes', 'vehicle', NULL, 'private', 'person',
    'Fixed 4:45 AM pickup. One guest per Vespa and driver; confirm group arrangements when booking.', NULL,
    'https://adventurescambodia.com/wp-content/uploads/2026/04/akim-ly-angkor-wat-naga-sunrise-1024x576.jpg',
    ARRAY['4:45 AM hotel pickup', 'Angkor Wat sunrise and temple visit', 'Bayon, royal terraces and Ta Prohm', 'Breakfast included', 'Private Vespa or vintage Jeep', 'Angkor Pass not included'],
    $json$[
      {"time":"4:45 AM","title":"Hotel pickup","detail":"Your private Vespa driver and guide collect you for the pre-dawn ride to Angkor Wat."},
      {"time":"Around 5:15 AM","title":"Sunrise at Angkor Wat","detail":"Enter before the main tour buses and watch sunrise from a quieter spot chosen by your guide."},
      {"time":"6–7 AM","title":"Explore Angkor Wat","detail":"Walk the galleries and bas-reliefs and visit the central sanctuary when it is open."},
      {"time":"Around 8 AM","title":"Angkor Thom and breakfast","detail":"Ride through the South Gate, visit Bayon and the royal terraces, then stop for the included breakfast at a pagoda or Khmer house."},
      {"time":"10 AM–noon","title":"Death Gate and Ta Prohm","detail":"Continue through the quieter Death Gate to Ta Prohm, then return to your hotel around noon."}
    ]$json$::jsonb,
    ARRAY['Classic Vespa with local driver, one per guest','Vintage Jeep available instead at the same listed price','Licensed English-speaking guide','Breakfast','Water and non-alcoholic drinks','Hotel pickup and drop-off','Photos taken by your guide'],
    ARRAY['Angkor Pass','Gratuities'], false, 31
  ),
  (
    'vespa-angkor-small-circuit', 'Angkor Wat Small Circuit by Vespa',
    'See Angkor Wat, Bayon and Ta Prohm with a private guide and driver, using quieter lanes around the main circuit.',
    'A private day at Angkor’s best-known temples. Your guide and Vespa driver take you through the Small Circuit at your pace, with a Khmer-house lunch, drinks and hotel pickup included. Choose a Vespa or vintage Jeep at the same listed price.',
    95, 'About 7 hours', 'vehicle', NULL, 'private', 'person',
    'Start between 7 and 9 AM. One guest per Vespa and driver; confirm group arrangements when booking.', NULL,
    'https://adventurescambodia.com/wp-content/uploads/2023/11/akim-vespa-adventures-cambodiaour-angkor-wat-tour-2-711x533-1.jpeg',
    ARRAY['Angkor Wat, South Gate, Bayon and Ta Prohm', 'Terrace of the Elephants and Death Gate', 'Handicraft village stop', 'Khmer-house lunch included', 'Private Vespa or vintage Jeep', 'Angkor Pass not included'],
    $json$[
      {"time":"7–9 AM","title":"Hotel pickup and Angkor Wat","detail":"Start at your chosen time and explore Angkor Wat with your private guide."},
      {"time":"Mid-morning","title":"South Gate and Bayon","detail":"Ride through Angkor Thom’s South Gate to Bayon and its many carved stone faces."},
      {"time":"Late morning","title":"Royal terraces and Death Gate","detail":"Walk the Terrace of the Elephants, then exit through the quieter Death Gate and stop at a local handicraft village."},
      {"time":"Around 1 PM","title":"Khmer-house lunch","detail":"Take a shaded lunch break at a traditional wooden house inside the park."},
      {"time":"Afternoon","title":"Ta Prohm and return","detail":"Finish at the tree-covered Ta Prohm temple and return to your hotel around 2:30 PM."}
    ]$json$::jsonb,
    ARRAY['Classic Vespa with local driver, one per guest','Vintage Jeep available instead at the same listed price','Licensed English-speaking guide','Khmer-house lunch','Water and non-alcoholic drinks','Hotel pickup and drop-off','Photos taken by your guide'],
    ARRAY['Angkor Pass','Gratuities'], false, 32
  ),
  (
    'vespa-siem-reap-countryside', 'Siem Reap Countryside by Vespa',
    'A half-day private ride through rice fields, village lanes, local food stops and traditional crafts west of town.',
    'Spend four hours with a private guide and driver exploring village life west of Siem Reap. Ride pillion on a Vespa or choose a vintage Jeep, visit local families and artisans, and sample countryside snacks. The route changes with the season and daily village activity; no Angkor Pass is needed.',
    89, '4 hours', 'vehicle', NULL, 'private', 'person',
    'Morning start 7–9 AM or afternoon 1–2:30 PM. One guest per Vespa and driver; confirm group arrangements when booking.', NULL,
    'https://adventurescambodia.com/wp-content/uploads/2023/12/akim-vespa-adventures-cambodia-countryside.webp',
    ARRAY['Palm sugar and village market', 'Water-hyacinth and palm-leaf weaving', 'Local cakes, noodles and rice-wine making', 'Rice fields and West Baray', 'Local snacks and tastings included', 'Private Vespa or vintage Jeep'],
    $json$[
      {"time":"Morning or afternoon","title":"Ride west from Siem Reap","detail":"Follow village lanes and rice-field tracks with your private driver and guide. Stops can change with the season and what local families are doing that day."},
      {"time":null,"title":"Palm sugar and village market","detail":"See how palm sap is collected and visit a working village market with local produce and food."},
      {"time":null,"title":"Weaving, cakes and countryside life","detail":"Meet local weavers, sample village cakes, and see fishermen and water buffalo around West Baray."},
      {"time":null,"title":"Rice fields and local crafts","detail":"Depending on the day, continue by ox-cart lanes, see rice-noodle making, palm-leaf weaving or rice-wine production, then ride back to town."}
    ]$json$::jsonb,
    ARRAY['Classic Vespa with local driver, one per guest','Vintage Jeep available instead at the same listed price','Licensed English-speaking guide','Local snacks and tastings','Water and non-alcoholic drinks','Hotel pickup and drop-off','Photos taken by your guide'],
    ARRAY['Gratuities'], false, 33
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
