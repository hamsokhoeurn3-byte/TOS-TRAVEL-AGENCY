/*
# Add 15 budget guesthouses and hostels

Inserts 15 budget stays ($15-$30/night) into the hotels table.
No schema changes, no policy changes — hotels remains public read-only.
sort_order continues after the existing 11 midrange/luxury hotels (12-26).
*/

INSERT INTO hotels (slug, name, area, description, price_level, price_from, rating, style, image_url, room_types, website_url, sort_order) VALUES
(
  'motherhome-guesthouse',
  'MotherHome Guesthouse',
  'Taphul Village',
  'A welcoming family-run guesthouse known for its warm hospitality, spotless rooms, and homemade Khmer breakfast. A short walk from Pub Street with a relaxing pool and rooftop terrace.',
  'budget', 20, 4.6, 'Family-Run Guesthouse',
  'https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Standard Double', 'Standard Twin', 'Deluxe Double'],
  'https://www.google.com/search?q=MotherHome+Guesthouse+Siem+Reap',
  12
),
(
  'le-nou-siemreap-guesthouse',
  'Le-nou Siemreap Guesthouse',
  'Taphul Village',
  'A charming budget guesthouse with clean, modern rooms and a friendly, helpful team. Conveniently located near the city centre with easy access to restaurants and night markets.',
  'budget', 22, 4.4, 'Modern Guesthouse',
  'https://images.pexels.com/photos/271639/pexels-photo-271639.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Double Room', 'Twin Room', 'Family Room'],
  'https://www.google.com/search?q=Le-nou+Siemreap+Guesthouse',
  13
),
(
  'golden-takeo-guesthouse',
  'Golden TaKeo Guesthouse',
  'Old Market',
  'A long-standing favourite just steps from the Old Market and Pub Street. Simple, comfortable rooms around a leafy courtyard pool — excellent value in the heart of Siem Reap.',
  'budget', 25, 4.3, 'Central Guesthouse',
  'https://images.pexels.com/photos/1001965/pexels-photo-1001965.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Standard Double', 'Standard Twin', 'Deluxe Room'],
  'https://www.google.com/search?q=Golden+TaKeo+Guesthouse+Siem+Reap',
  14
),
(
  'sweet-dreams-guesthouse',
  'Sweet Dreams Guesthouse',
  'Wat Bo',
  'A family-run guesthouse on Wat Bo Street with an outdoor pool, restaurant, and free Wi-Fi. Choose from air-conditioned double, twin, and triple rooms, a short walk from the Royal Residence and central Siem Reap.',
  'budget', 11, 4.5, 'Cozy Guesthouse',
  '/hotels/sweet-dreams-guesthouse/hotel/main.webp',
  ARRAY['Double Air Conditioning', 'Twin Air Conditioning', 'Triple Air Conditioning'],
  'https://www.google.com/maps/search/?api=1&query=Sweet+Dreams+Guesthouse+Siem+Reap',
  17
),
(
  'bokre-angkor-hostel',
  'Bokre Angkor Hostel',
  'Svay Dangkum',
  'A vibrant social hostel with dorm beds and private rooms, a rooftop bar, and an outdoor pool. Perfect for meeting fellow travelers while exploring Angkor on a budget.',
  'budget', 15, 4.3, 'Social Hostel',
  'https://images.pexels.com/photos/271639/pexels-photo-271639.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Dorm Bed', 'Private Double', 'Private Twin'],
  'https://bokreangkor.com/',
  18
),
(
  'bayon-garden-guesthouse',
  'Bayon Garden Guesthouse',
  'Wat Bo',
  'A tranquil guesthouse set in a lush garden across the river from the city centre. Comfortable rooms, a swimming pool, and a restaurant serving Khmer and Western dishes.',
  'budget', 25, 4.4, 'Garden Guesthouse',
  'https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Standard Double', 'Deluxe Double', 'Family Room'],
  'https://www.google.com/maps/search/?api=1&query=Bayon+Garden+Guesthouse+Siem+Reap',
  19
),
(
  'angkor-sun-siem-reap-hotel',
  'Angkor Sun Siem Reap Hotel',
  'National Road 6',
  'A budget-friendly hotel on the main road into Siem Reap, offering spacious rooms, a large pool, and a restaurant. Convenient for early Angkor Wat sunrise pickups.',
  'budget', 28, 4.3, 'Budget Hotel',
  'https://images.pexels.com/photos/271639/pexels-photo-271639.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Superior Double', 'Deluxe Twin', 'Family Room'],
  'https://www.google.com/maps/search/?api=1&query=Angkor+Sun+Siem+Reap+Hotel',
  20
),
(
  'siem-reap-pub-hostel',
  'Siem Reap Pub Hostel',
  'Old Market',
  'A lively hostel right in the heart of the action near Pub Street. Dorm beds and private rooms, a bar with nightly events, and a pool — the social hub for backpackers.',
  'budget', 15, 4.2, 'Party Hostel',
  'https://images.pexels.com/photos/1001965/pexels-photo-1001965.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Dorm Bed', 'Private Double', 'Private Twin'],
  'https://www.google.com/maps/search/?api=1&query=Siem+Reap+Pub+Hostel',
  21
),
(
  'hostel-goen',
  'Hostel Goen',
  'Svay Dangkum',
  'A relaxed, affordable hostel with clean dorms and private rooms, a small pool, and a communal kitchen. Walking distance to Pub Street and the Old Market.',
  'budget', 18, 4.3, 'Relaxed Hostel',
  'https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Dorm Bed', 'Private Double', 'Private Twin'],
  'https://www.google.com/maps/search/?api=1&query=Hostel+Goen+Siem+Reap',
  22
),
(
  'unity-hostel',
  'Unity Hostel',
  'Taphul Village',
  'A friendly, modern hostel with both dorms and private rooms, a rooftop terrace, and a pool. Great for meeting other travelers while staying close to the city centre.',
  'budget', 20, 4.4, 'Modern Hostel',
  'https://images.pexels.com/photos/271639/pexels-photo-271639.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Dorm Bed', 'Private Double', 'Private Twin'],
  'https://www.google.com/maps/search/?api=1&query=Unity+Hostel+Siem+Reap',
  23
),
(
  'siem-reap-chilled-backpacker',
  'The Siem Reap Chilled Backpacker',
  'Wat Bo',
  'A laid-back backpacker hostel across the river from the busy centre. Hammocks, a small pool, cheap drinks, and a relaxed vibe — ideal for unwinding after a day at the temples.',
  'budget', 15, 4.3, 'Chilled Backpacker Hostel',
  'https://images.pexels.com/photos/1001965/pexels-photo-1001965.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Dorm Bed', 'Private Double'],
  'https://www.google.com/maps/search/?api=1&query=The+Siem+Reap+Chilled+Backpacker',
  24
),
(
  'tanaya-guest-house',
  'Tanaya Guest House',
  'Old Market',
  'A budget gem just minutes from Pub Street, offering clean, air-conditioned rooms and a rooftop terrace. Family-run with genuine Khmer hospitality at an unbeatable price.',
  'budget', 18, 4.5, 'Family-Run Guesthouse',
  'https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Standard Double', 'Standard Twin', 'Deluxe Double'],
  'https://www.google.com/maps/search/?api=1&query=Tanaya+Guest+House+Siem+Reap',
  25
),
(
  'top-sky-hostel',
  'Top Sky Hostel',
  'Svay Dangkum',
  'A modern, affordable hostel with dorms and private rooms, a rooftop bar, and a pool. Social atmosphere with nightly events, close to Pub Street and the Angkor Night Market.',
  'budget', 18, 4.2, 'Modern Hostel',
  'https://images.pexels.com/photos/271639/pexels-photo-271639.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Dorm Bed', 'Private Double', 'Private Twin'],
  'https://www.google.com/maps/search/?api=1&query=Top+Sky+Hostel+Siem+Reap',
  26
);
