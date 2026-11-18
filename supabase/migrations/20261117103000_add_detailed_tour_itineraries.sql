ALTER TABLE tours
  ADD COLUMN IF NOT EXISTS itinerary jsonb NOT NULL DEFAULT '[]'::jsonb,
  ADD COLUMN IF NOT EXISTS included_items text[] NOT NULL DEFAULT ARRAY[]::text[],
  ADD COLUMN IF NOT EXISTS excluded_items text[] NOT NULL DEFAULT ARRAY[]::text[];

WITH tour_details(slug, itinerary, excluded_items) AS (
  VALUES
    ('angkor-sunrise-tour', $json$[
      {"time":"4:20 AM","title":"Hotel pickup","detail":"Meet the guide and join the shared vehicle for the drive to Angkor Archaeological Park."},
      {"time":"Sunrise","title":"Angkor Wat","detail":"Watch dawn over the reflecting pools, then explore the galleries, courtyards, and central sanctuary."},
      {"time":"Morning","title":"Breakfast at Srah Srong","detail":"Pause near the reservoir for breakfast at your own cost before continuing to Angkor Thom."},
      {"time":null,"title":"Bayon Temple","detail":"Walk among the stone towers and carved faces at the center of Angkor Thom."},
      {"time":"Around 12:30 PM","title":"Ta Prohm and return","detail":"Explore the tree-covered temple before the shared ride returns guests to their hotels."}
    ]$json$::jsonb, ARRAY['Angkor temple pass','Breakfast at Srah Srong','Gratuities']::text[]),
    ('explore-angkor', $json$[
      {"time":"Morning","title":"Angkor Thom and Bayon","detail":"Enter the ancient walled city and visit Bayon’s carved face towers and nearby royal terraces."},
      {"time":"Late morning","title":"Ta Prohm","detail":"Explore the jungle temple’s galleries and stonework intertwined with large tree roots."},
      {"time":"Midday","title":"Lunch break","detail":"Take a break at a local restaurant near the temples; lunch is at your own cost."},
      {"time":"Afternoon","title":"Angkor Wat","detail":"Visit the temple galleries, bas-reliefs, and central towers with the guide."},
      {"time":"Late afternoon","title":"Phnom Bakheng sunset","detail":"Finish at the hilltop temple viewpoint when access and the daily visitor limit allow."}
    ]$json$::jsonb, ARRAY['Angkor temple pass','Lunch','Gratuities']::text[]),
    ('koh-ker-beng-mealea', $json$[
      {"time":"Morning","title":"Drive to Beng Mealea","detail":"Travel out of Siem Reap to the remote temple site, then explore its collapsed galleries and jungle-covered stone blocks."},
      {"time":"Midday","title":"Countryside lunch break","detail":"Pause for lunch at your own cost before continuing north."},
      {"time":"Afternoon","title":"Koh Ker temple complex","detail":"Visit the former Khmer capital, including Prasat Thom’s stepped pyramid and selected surrounding shrines."},
      {"time":null,"title":"Return to Siem Reap","detail":"Ride back to town after the temple visits."}
    ]$json$::jsonb, ARRAY['Koh Ker and Beng Mealea entry tickets','Lunch','Gratuities']::text[]),
    ('kompong-phluk-floating-villages', $json$[
      {"time":null,"title":"Drive to Kampong Phluk","detail":"Travel from Siem Reap through the countryside to the Tonle Sap lakeside community."},
      {"time":null,"title":"Village and pagoda","detail":"See the local pagoda and learn how daily life changes with the lake’s seasonal water levels."},
      {"time":null,"title":"Stilt-house community","detail":"Explore Kampong Phluk’s elevated homes and community areas with the guide."},
      {"time":null,"title":"Boat ride and flooded forest","detail":"Take the included village boat trip across the water and past the flooded forest. Small add-on boats may cost extra."},
      {"time":null,"title":"Return to Siem Reap","detail":"Drive back to town after the village visit."}
    ]$json$::jsonb, ARRAY['Meals','Optional small boat in the flooded forest','Gratuities']::text[]),
    ('banteay-srei-backcountry', $json$[
      {"time":"7:40–8:10 AM","title":"Hotel pickup","detail":"Join the shared group for the morning drive beyond Siem Reap."},
      {"time":"Morning","title":"Pre Rup","detail":"Walk through the brick and laterite temple complex and take in the surrounding countryside."},
      {"time":"Late morning","title":"Banteay Srei","detail":"See the pink sandstone carvings and detailed lintels at this tenth-century temple."},
      {"time":"Midday","title":"Lunch break","detail":"Stop for lunch at your own cost."},
      {"time":"Afternoon","title":"East Mebon, Ta Som, Neak Pean and Preah Khan","detail":"Continue through the eastern temples, including Ta Som’s tree-framed gate and the large complex of Preah Khan, before returning around 4 PM."}
    ]$json$::jsonb, ARRAY['Angkor temple pass','Lunch','Gratuities']::text[]),
    ('kulen-waterfall', $json$[
      {"time":"7:40–8:10 AM","title":"Hotel pickup and mountain drive","detail":"Meet the group and travel to Phnom Kulen National Park."},
      {"time":"Morning","title":"River of 1000 Lingas","detail":"Walk along the riverbed carvings and view the sacred watercourse."},
      {"time":"Late morning","title":"Wat Preah Ang Thom","detail":"Visit the pagoda and reclining Buddha carved into the sandstone plateau."},
      {"time":"Afternoon","title":"Kulen waterfall","detail":"Spend time at the waterfall and take a meal break. Park entry and meal arrangements can vary; confirm current inclusions before booking."},
      {"time":"Around 5 PM","title":"Return to Siem Reap","detail":"Ride back to your hotel after the mountain visit."}
    ]$json$::jsonb, ARRAY['Phnom Kulen park entry; confirm current ticket and meal inclusions','Gratuities']::text[]),
    ('preah-vihear-koh-ker', $json$[
      {"time":"Early morning","title":"Drive to Preah Vihear","detail":"Travel north from Siem Reap to the Dangrek escarpment; this is a long-distance day trip."},
      {"time":"Late morning","title":"Preah Vihear sanctuary","detail":"Explore the mountain sanctuary’s successive temple enclosures and cliff-edge viewpoints with your guide."},
      {"time":"Midday","title":"Lunch break","detail":"Pause for lunch at your own cost during the drive between sites."},
      {"time":"Afternoon","title":"Koh Ker","detail":"Visit the remote former capital and its distinctive stepped pyramid before the return journey."},
      {"time":"Evening","title":"Return to Siem Reap","detail":"Arrive back after the full-day trip; exact timing depends on road conditions."}
    ]$json$::jsonb, ARRAY['Temple and park entry tickets','Meals','Gratuities']::text[]),
    ('kulen-mountain-beng-mealea', $json$[
      {"time":"7:40–8:10 AM","title":"Hotel pickup","detail":"Meet the shared group and depart for Phnom Kulen."},
      {"time":"Morning","title":"Kulen plateau and River of 1000 Lingas","detail":"See the mountain scenery and carved riverbed before visiting the sacred pagoda."},
      {"time":"Late morning","title":"Reclining Buddha and waterfall","detail":"Visit Wat Preah Ang Thom, then spend time at the waterfall with a lunch break."},
      {"time":"Afternoon","title":"Beng Mealea","detail":"Explore the overgrown temple galleries and collapsed stonework on the way back toward Siem Reap."},
      {"time":"Around 5–5:30 PM","title":"Return to Siem Reap","detail":"Drop-off follows the visit to Beng Mealea."}
    ]$json$::jsonb, ARRAY['Phnom Kulen and Beng Mealea entry tickets','Lunch','Gratuities']::text[]),
    ('kulen-mountain-banteay-srei', $json$[
      {"time":"Morning","title":"Drive to Phnom Kulen","detail":"Leave Siem Reap for the mountain plateau and its forested landscapes."},
      {"time":"Morning","title":"River of 1000 Lingas and reclining Buddha","detail":"Visit the river carvings and Wat Preah Ang Thom on the summit."},
      {"time":"Midday","title":"Kulen waterfall and lunch break","detail":"Spend time at the waterfall and pause for lunch; meal and entry inclusions should be confirmed."},
      {"time":"Afternoon","title":"Banteay Srei","detail":"Visit the pink sandstone temple and its finely carved doorways and lintels."},
      {"time":"Late afternoon","title":"Return to Siem Reap","detail":"Drive back to town after the two destinations."}
    ]$json$::jsonb, ARRAY['Phnom Kulen and temple entry tickets','Lunch','Gratuities']::text[]),
    ('private-angkor-sunrise', $json$[
      {"time":"Before sunrise","title":"Private hotel pickup","detail":"Your vehicle and guide meet your group at the hotel for the early temple drive."},
      {"time":"Sunrise","title":"Angkor Wat","detail":"Watch sunrise near the reflecting pools, then explore the galleries and temple grounds."},
      {"time":"Morning","title":"Bayon","detail":"Walk among the face towers and bas-reliefs at the heart of Angkor Thom."},
      {"time":"Late morning","title":"Ta Prohm","detail":"Explore the atmospheric temple where tree roots grow across its stone galleries."},
      {"time":null,"title":"Return to your hotel","detail":"Your private vehicle returns your group to Siem Reap."}
    ]$json$::jsonb, ARRAY['Angkor temple pass','Breakfast','Gratuities']::text[]),
    ('private-angkor-temple-sunset', $json$[
      {"time":"Morning","title":"Bayon and Angkor Thom","detail":"Explore Bayon’s carved towers and the monumental gates and terraces of the ancient city."},
      {"time":"Late morning","title":"Ta Prohm","detail":"Walk through the tree-covered temple and its stone corridors."},
      {"time":"Afternoon","title":"Angkor Wat","detail":"Visit the galleries and central sanctuary at Cambodia’s best-known temple."},
      {"time":"Sunset","title":"Phnom Bakheng","detail":"Finish at the sunset viewpoint, subject to daily visitor limits and access conditions."},
      {"time":null,"title":"Private hotel drop-off","detail":"Return to your hotel after the temple circuit."}
    ]$json$::jsonb, ARRAY['Angkor temple pass','Meals','Gratuities']::text[]),
    ('private-angkor-sunset', $json$[
      {"time":"Afternoon","title":"Ta Prohm","detail":"Start at the atmospheric jungle temple and explore its galleries and root-covered stonework."},
      {"time":"Late afternoon","title":"Bayon","detail":"Visit the face towers and carved scenes at the center of Angkor Thom."},
      {"time":"Before closing","title":"Angkor Wat","detail":"Explore the temple grounds and galleries before the day ends."},
      {"time":"Evening","title":"Private hotel drop-off","detail":"Your vehicle returns your group to the hotel."}
    ]$json$::jsonb, ARRAY['Angkor temple pass','Meals','Gratuities']::text[]),
    ('private-bakong-floating-village', $json$[
      {"time":"Morning","title":"Rolous group","detail":"Drive to the early Khmer capital area and visit Bakong and nearby Rolous temples."},
      {"time":"Midday","title":"Countryside lunch break","detail":"Pause for lunch at your own cost before continuing to the lake community."},
      {"time":"Afternoon","title":"Kampong Phluk","detail":"Visit the stilt-house village and learn about life around Tonle Sap."},
      {"time":"Afternoon","title":"Village boat ride","detail":"Add a boat trip through the village and waterways; ticket costs should be confirmed when booking."},
      {"time":null,"title":"Private return to Siem Reap","detail":"Travel back to your hotel in your private vehicle."}
    ]$json$::jsonb, ARRAY['Temple passes','Village boat ticket unless confirmed','Meals','Gratuities']::text[]),
    ('private-banteay-srei-kulen', $json$[
      {"time":"Morning","title":"Banteay Srei","detail":"Explore the pink sandstone temple, famed for its detailed carvings and lintels."},
      {"time":"Midday","title":"Drive into Phnom Kulen","detail":"Continue into the national park and its forested plateau."},
      {"time":"Afternoon","title":"River of 1000 Lingas","detail":"Walk by the carved riverbed and learn about its historic religious use."},
      {"time":"Afternoon","title":"Wat Preah Ang Thom and waterfall","detail":"Visit the reclining Buddha and spend time at the waterfall; entry and meal costs should be confirmed."},
      {"time":null,"title":"Private hotel drop-off","detail":"Return to Siem Reap in your private vehicle."}
    ]$json$::jsonb, ARRAY['Temple and park entry tickets','Meals','Gratuities']::text[]),
    ('private-beng-mealea-floating-village', $json$[
      {"time":"Morning","title":"Beng Mealea","detail":"Explore the remote temple’s collapsed galleries and jungle-covered stone blocks."},
      {"time":"Midday","title":"Transfer and lunch break","detail":"Drive toward Tonle Sap and pause for lunch at your own cost."},
      {"time":"Afternoon","title":"Kampong Phluk","detail":"Visit the stilt-house community and see how the village adapts to seasonal lake levels."},
      {"time":"Afternoon","title":"Tonle Sap boat trip","detail":"A village boat ride can be arranged; its ticket is not included unless confirmed with the operator."},
      {"time":null,"title":"Private hotel drop-off","detail":"Return to your hotel in Siem Reap."}
    ]$json$::jsonb, ARRAY['Temple pass','Village boat ticket unless confirmed','Meals','Gratuities']::text[]),
    ('private-kulen-beng-mealea', $json$[
      {"time":"Morning","title":"Phnom Kulen","detail":"Drive to the mountain plateau and visit the River of 1000 Lingas and Wat Preah Ang Thom."},
      {"time":"Midday","title":"Kulen waterfall","detail":"Spend time at the falls and take a lunch break; park entry and meals should be confirmed."},
      {"time":"Afternoon","title":"Beng Mealea","detail":"Explore the jungle temple’s fallen stone galleries and overgrown courtyards."},
      {"time":"Late afternoon","title":"Private return to Siem Reap","detail":"Travel back to your hotel after the two sites."}
    ]$json$::jsonb, ARRAY['Park and temple entry tickets','Meals','Gratuities']::text[]),
    ('private-koh-ker-beng-mealea', $json$[
      {"time":"Morning","title":"Beng Mealea","detail":"Walk through the remote temple’s collapsed galleries and jungle-covered ruins."},
      {"time":"Midday","title":"Countryside lunch break","detail":"Stop for lunch at your own cost on the route north."},
      {"time":"Afternoon","title":"Koh Ker","detail":"Visit Prasat Thom’s stepped pyramid and selected temples from the former Khmer capital."},
      {"time":"Late afternoon","title":"Private return to Siem Reap","detail":"Ride back to your hotel after the remote temple visits."}
    ]$json$::jsonb, ARRAY['Temple entry tickets','Meals','Gratuities']::text[])
)
UPDATE tours AS t
SET itinerary = d.itinerary,
    excluded_items = d.excluded_items
FROM tour_details AS d
WHERE t.slug = d.slug;

UPDATE tours
SET included_items = ARRAY['Kampong Phluk village boat ticket']::text[]
WHERE slug = 'kompong-phluk-floating-villages';
