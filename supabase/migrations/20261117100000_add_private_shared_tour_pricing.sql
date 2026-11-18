ALTER TABLE tours
  ADD COLUMN IF NOT EXISTS tour_type text,
  ADD COLUMN IF NOT EXISTS price_basis text NOT NULL DEFAULT 'person',
  ADD COLUMN IF NOT EXISTS capacity_note text,
  ADD COLUMN IF NOT EXISTS vehicle_options jsonb;

ALTER TABLE tours
  ALTER COLUMN group_size DROP NOT NULL,
  ALTER COLUMN group_size DROP DEFAULT;

ALTER TABLE tours DROP CONSTRAINT IF EXISTS tours_category_check;
ALTER TABLE tours
  ADD CONSTRAINT tours_category_check
  CHECK (category IN (
    'temples', 'nature', 'culture', 'transfer', 'cycling', 'vehicle',
    'temple-culture', 'outdoor', 'water', 'food', 'handicrafts', 'wellness', 'sunset',
    'private', 'group'
  ));

ALTER TABLE bookings
  ADD COLUMN IF NOT EXISTS vehicle_option text;

ALTER TABLE bookings DROP CONSTRAINT IF EXISTS bookings_guests_check;
ALTER TABLE bookings
  ADD CONSTRAINT bookings_guests_check CHECK (guests BETWEEN 1 AND 99);

UPDATE tours
SET category = 'group', tour_type = 'group', price_basis = 'person',
    capacity_note = 'Usually up to 10 guests; confirm the exact capacity when booking.'
WHERE slug = 'angkor-sunrise-tour';

UPDATE tours
SET name = 'Angkor Sunrise Tour',
    tagline = 'Share an early Angkor sunrise, then visit Bayon and Ta Prohm with a small group.',
    description = 'Scheduled shared tour with hotel pickup around 4:20 AM. Watch sunrise at Angkor Wat, stop for breakfast at Srah Srong at your own cost, then visit Bayon and Ta Prohm before returning around 12:30 PM. The Angkor temple pass is not included.',
    price = 15, duration = '8 hours', group_size = 12,
    capacity_note = 'Usually up to 10 guests; some listings say 12. Confirm the exact capacity when booking.'
WHERE slug = 'angkor-sunrise-tour';

UPDATE tours SET name = 'Explore Angkor Tour', price = 20, duration = 'Full day', category = 'group',
    tour_type = 'group', price_basis = 'person', group_size = 10,
    capacity_note = 'Up to 10 guests; confirm the departure capacity when booking.',
    tagline = 'Visit Bayon, Ta Prohm, and Angkor Wat on a scheduled full-day shared tour.',
    description = 'Join other travelers for a full day among Angkor’s best-known temples: Bayon, Ta Prohm, and Angkor Wat. Hotel pickup and drop-off, shared transport, an English-speaking guide, drinking water, and cold towels are included. The temple pass and meals are not included.'
WHERE slug = 'explore-angkor';

UPDATE tours SET name = 'Koh Ker & Beng Mealea', price = 50, duration = 'Full day', category = 'group',
    tour_type = 'group', price_basis = 'person', group_size = 10,
    capacity_note = 'Up to 10 guests; confirm the departure capacity when booking.',
    tagline = 'Explore Koh Ker and jungle-covered Beng Mealea with a shared group.',
    description = 'Spend a full day traveling with other visitors to Koh Ker and Beng Mealea. Hotel pickup and drop-off, shared transport, an English-speaking guide, drinking water, and cold towels are included; temple passes and meals are not included.'
WHERE slug = 'koh-ker-beng-mealea';

UPDATE tours SET name = 'Floating Village Tour', price = 24, duration = 'Half day', category = 'group',
    tour_type = 'group', price_basis = 'person', group_size = 10,
    capacity_note = 'Up to 10 guests; confirm the departure capacity when booking.',
    tagline = 'Travel to Kampong Phluk and cruise Tonle Sap on a scheduled shared tour.',
    description = 'Travel from Siem Reap to Kampong Phluk, explore the stilt-house village, and take a boat on Tonle Sap. The half-day shared tour includes hotel pickup and drop-off, shared transport, the village boat ticket, an English-speaking guide, drinking water, and cold towels. Meals are not included.'
WHERE slug = 'kompong-phluk-floating-villages';

UPDATE tours SET name = 'Banteay Srei Backcountry', price = 20, duration = 'Full day', category = 'group',
    tour_type = 'group', price_basis = 'person', group_size = 10,
    capacity_note = 'Up to 10 guests; confirm the departure capacity when booking.'
WHERE slug = 'banteay-srei-backcountry';

UPDATE tours SET name = 'Kulen Waterfall Tour', price = 28, duration = 'Full day', category = 'group',
    tour_type = 'group', price_basis = 'person', group_size = 10,
    capacity_note = 'Up to 10 guests; confirm the departure capacity when booking.'
WHERE slug = 'kulen-waterfall';

UPDATE tours SET name = 'Preah Vihear & Koh Ker', price = 100, duration = 'Full day', category = 'group',
    tour_type = 'group', price_basis = 'person', group_size = NULL,
    capacity_note = 'The operator does not publish a group maximum. Confirm capacity when booking.'
WHERE slug = 'preah-vihear-koh-ker';

UPDATE tours SET category = 'transfer', tour_type = 'private', price_basis = 'group',
    capacity_note = 'Private EV for up to 3 guests.'
WHERE slug = 'airport-transfer';

INSERT INTO tours (slug, name, tagline, description, price, duration, category, group_size, tour_type, price_basis, capacity_note, vehicle_options, image_url, highlights, featured, sort_order)
VALUES
  ('kulen-mountain-beng-mealea', 'Kulen Mountain & Beng Mealea', 'Join a scheduled shared tour to Kulen Mountain and Beng Mealea.', 'Spend a full day with other travelers visiting Kulen Mountain and Beng Mealea. Shared transport, hotel pickup and drop-off, an English-speaking guide, drinking water, and cold towels are included. Park and temple passes and meals are not included.', 30, 'Full day', 'group', 10, 'group', 'person', 'Up to 10 guests; confirm the departure capacity when booking.', NULL, 'https://images.pexels.com/photos/19143429/pexels-photo-19143429.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', ARRAY['Kulen Mountain and waterfall', 'Beng Mealea jungle temple', 'Hotel pickup and drop-off', 'Shared transport and English-speaking guide', 'Drinking water and cold towels', 'Passes and meals not included'], false, 9),
  ('kulen-mountain-banteay-srei', 'Kulen Mountain & Banteay Srei', 'Join a scheduled shared tour to Kulen Mountain and Banteay Srei.', 'Spend a full day with other travelers visiting Kulen Mountain, its waterfall, and Banteay Srei. Shared transport, hotel pickup and drop-off, an English-speaking guide, drinking water, and cold towels are included. Park and temple passes and meals are not included.', 30, 'Full day', 'group', 10, 'group', 'person', 'Up to 10 guests; confirm the departure capacity when booking.', NULL, 'https://images.pexels.com/photos/4300967/pexels-photo-4300967.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', ARRAY['Kulen Mountain and waterfall', 'Banteay Srei temple', 'Hotel pickup and drop-off', 'Shared transport and English-speaking guide', 'Drinking water and cold towels', 'Passes and meals not included'], false, 10),
  ('private-angkor-sunrise', 'Private Angkor Sunrise', 'Book a private vehicle and guide for your group to Angkor Wat, Bayon, and Ta Prohm.', 'Private Angkor sunrise tour for your group. The vehicle price is for the group, not per person. Hotel pickup and drop-off, private transport, an English-speaking guide, drinking water, and cold towels are included. Breakfast and the Angkor temple pass are not included.', 110, '7–8 hours', 'private', 9, 'private', 'group', 'Listed vehicles seat 1–9 guests; confirm larger groups directly.', '[{"id":"suv","name":"SUV","capacity":2,"price":110},{"id":"sienna","name":"Sienna","capacity":4,"price":115},{"id":"minivan","name":"Minivan","capacity":6,"price":125},{"id":"van","name":"Van","capacity":9,"price":130}]'::jsonb, 'https://images.pexels.com/photos/15890568/pexels-photo-15890568.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', ARRAY['Angkor Wat sunrise, Bayon, and Ta Prohm', 'Private vehicle and hotel pickup/drop-off', 'English-speaking guide, drinking water, and cold towels', 'Breakfast and temple pass not included'], false, 20),
  ('private-angkor-temple-sunset', 'Private Angkor Temple with Sunset', 'Private visit to Bayon, Ta Prohm, Angkor Wat, and Phnom Bakheng.', 'A private full-day temple trip visiting Bayon, Ta Prohm, Angkor Wat, and Phnom Bakheng for sunset. Private transport, hotel pickup and drop-off, an English-speaking guide, drinking water, and cold towels are included. Temple pass and meals are not included.', 90, '10 hours', 'private', 12, 'private', 'group', 'Up to 12 guests; confirm vehicle availability when booking.', NULL, 'https://images.pexels.com/photos/1089302/pexels-photo-1089302.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', ARRAY['Bayon, Ta Prohm, Angkor Wat, and Phnom Bakheng', 'Private vehicle and hotel pickup/drop-off', 'Temple pass and meals not included'], false, 21),
  ('private-angkor-sunset', 'Private Angkor Sunset', 'Private temple route through Ta Prohm, Bayon, and Angkor Wat.', 'Take a private temple route through Ta Prohm, Bayon, and Angkor Wat. Private vehicle, hotel pickup and drop-off, an English-speaking guide, drinking water, and cold towels are included. Temple pass and meals are not included.', 90, '7 hours', 'private', NULL, 'private', 'group', 'Maximum group size is not specified. Confirm vehicle capacity when booking.', NULL, 'https://images.pexels.com/photos/1089302/pexels-photo-1089302.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', ARRAY['Ta Prohm, Bayon, and Angkor Wat', 'Private vehicle and hotel pickup/drop-off', 'Temple pass and meals not included'], false, 22),
  ('private-bakong-floating-village', 'Private Bakong & Floating Village', 'Private visit to Bakong, the Rolous temples, and Kampong Phluk.', 'Explore Bakong and the Rolous temples, then continue to Kampong Phluk on a private full-day tour. Private transport, hotel pickup and drop-off, an English-speaking guide, drinking water, and cold towels are included. Boat tickets, temple passes, and meals are not included unless added during booking.', 55, 'Full day', 'private', NULL, 'private', 'group', 'Maximum group size is not specified. Confirm vehicle capacity when booking.', NULL, 'https://images.pexels.com/photos/32978026/pexels-photo-32978026.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', ARRAY['Bakong and Rolous temples', 'Kampong Phluk', 'Private vehicle and hotel pickup/drop-off', 'Boat tickets, temple passes, and meals not included'], false, 23),
  ('private-banteay-srei-kulen', 'Private Banteay Srei & Kulen', 'Private full-day visit to Banteay Srei and Kulen Mountain.', 'Visit Banteay Srei and Phnom Kulen on a private full-day outing. Private transport, hotel pickup and drop-off, an English-speaking guide, drinking water, and cold towels are included. Park and temple passes and meals are not included.', 70, 'Full day', 'private', NULL, 'private', 'group', 'Maximum group size is not specified. Confirm vehicle capacity when booking.', NULL, 'https://images.pexels.com/photos/4300967/pexels-photo-4300967.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', ARRAY['Banteay Srei and Kulen Mountain', 'Private vehicle and hotel pickup/drop-off', 'Passes and meals not included'], false, 24),
  ('private-beng-mealea-floating-village', 'Private Beng Mealea & Floating Village', 'Private visit to Beng Mealea and Kampong Phluk.', 'Combine Beng Mealea and Kampong Phluk on a private full-day trip. Private transport, hotel pickup and drop-off, an English-speaking guide, drinking water, and cold towels are included. The floating-village boat ticket, temple pass, and meals are not included unless purchased through the operator.', 75, 'Full day', 'private', NULL, 'private', 'group', 'Maximum group size is not specified. Confirm vehicle capacity when booking.', NULL, 'https://images.pexels.com/photos/15928763/pexels-photo-15928763.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', ARRAY['Beng Mealea and Kampong Phluk', 'Private vehicle and hotel pickup/drop-off', 'Boat ticket, temple pass, and meals not included'], false, 25),
  ('private-kulen-beng-mealea', 'Private Kulen & Beng Mealea', 'Private full-day visit to Kulen Mountain, its waterfall, and Beng Mealea.', 'Spend a full day at Kulen Mountain and Beng Mealea in a private vehicle. Hotel pickup and drop-off, an English-speaking guide, drinking water, and cold towels are included. Park and temple passes and meals are not included.', 80, 'Full day', 'private', NULL, 'private', 'group', 'Maximum group size is not specified. Confirm vehicle capacity when booking.', NULL, 'https://images.pexels.com/photos/19143429/pexels-photo-19143429.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', ARRAY['Kulen Mountain, waterfall, and Beng Mealea', 'Private vehicle and hotel pickup/drop-off', 'Park and temple passes and meals not included'], false, 26),
  ('private-koh-ker-beng-mealea', 'Private Koh Ker & Beng Mealea', 'Private full-day trip to Koh Ker and Beng Mealea for your group.', 'Visit Koh Ker and Beng Mealea on a private full-day trip for your group. Private transport, hotel pickup and drop-off, an English-speaking guide, drinking water, and cold towels are included. Temple passes and meals are not included.', 115, 'Full day', 'private', NULL, 'private', 'group', 'Maximum group size is not specified. Confirm vehicle capacity when booking.', NULL, 'https://images.pexels.com/photos/15928763/pexels-photo-15928763.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', ARRAY['Koh Ker and Beng Mealea', 'Private vehicle and hotel pickup/drop-off', 'Temple passes and meals not included'], false, 27)
ON CONFLICT (slug) DO UPDATE SET
  name = EXCLUDED.name, tagline = EXCLUDED.tagline, description = EXCLUDED.description,
  price = EXCLUDED.price, duration = EXCLUDED.duration, category = EXCLUDED.category,
  group_size = EXCLUDED.group_size, tour_type = EXCLUDED.tour_type, price_basis = EXCLUDED.price_basis,
  capacity_note = EXCLUDED.capacity_note, vehicle_options = EXCLUDED.vehicle_options,
  image_url = EXCLUDED.image_url, highlights = EXCLUDED.highlights,
  featured = EXCLUDED.featured, sort_order = EXCLUDED.sort_order;
