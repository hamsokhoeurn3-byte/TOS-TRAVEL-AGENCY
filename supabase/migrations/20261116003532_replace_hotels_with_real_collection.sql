/*
# Replace placeholder hotels with real hotel collection

1. Schema changes
- Add `room_types` (text[]) column to `hotels` — lists the room/suite categories available at each hotel.
- Add `website_url` (text) column to `hotels` — the hotel's own website for direct booking links.

2. Data changes
- Remove the 6 placeholder hotels that shipped with the seed migration.
- Insert 11 real Siem Reap hotels that the tour operator collects guests from:
  Golden Temple Residence, Viroth's Hotel, Jaya House River Park,
  Golden Temple Retreat, Golden Temple Villa, Eightfold Urban Resort,
  Shinta Mani Angkor, Khmer Mansion Boutique Hotel, Park Hyatt Siem Reap,
  Amansara, Raffles Grand Hotel d'Angkor.
- Each row includes area, price level, starting price, rating, style, room types,
  description, image, and the hotel's official website URL.

3. Security
- No policy changes — hotels remains public read-only (anon, authenticated).
- New columns are covered by the existing SELECT grant (column-level grants
  were not used, so the table-level grant extends automatically).
*/

ALTER TABLE hotels ADD COLUMN IF NOT EXISTS room_types text[] NOT NULL DEFAULT '{}';
ALTER TABLE hotels ADD COLUMN IF NOT EXISTS website_url text;

DELETE FROM hotels;

INSERT INTO hotels (slug, name, area, description, price_level, price_from, rating, style, image_url, room_types, website_url, sort_order) VALUES
(
  'golden-temple-residence',
  'Golden Temple Residence',
  'Wat Bo',
  'The most prestigious cultural residence in Siem Reap, blending timeless Cambodian heritage with contemporary sophistication. Meticulously designed suites, five-star personalized service, and a serene sanctuary minutes from Angkor Wat.',
  'luxury', 150, 4.9, 'Cultural Residence',
  'https://images.pexels.com/photos/2259226/pexels-photo-2259226.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Deluxe Suite', 'Luxury King', 'Luxury Twin', 'Pool Suite'],
  'https://goldentempleresidence.com/',
  1
),
(
  'viroths-hotel',
  'Viroth''s Hotel',
  'Wat Bo',
  'A 50s-inspired boutique hotel in the vibrant Wat Bo area, surrounded by lush green gardens. Consistently rated among Siem Reap''s very best, with elegant design, a large pool, and warm Cambodian hospitality.',
  'luxury', 120, 4.9, '50s-Inspired Boutique',
  'https://images.pexels.com/photos/28247932/pexels-photo-28247932.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Superior Room', 'Deluxe Room', 'Suite'],
  'https://viroth-hotel.com/',
  2
),
(
  'jaya-house-river-park',
  'Jaya House River Park',
  'River Park',
  'Siem Reap''s award-winning boutique hotel on the river, known for its sustainability initiatives and exceptional service. Features a spa, Trorkuon Khmer restaurant, tropical gardens, and organic cuisine.',
  'luxury', 130, 4.9, 'Award-Winning Boutique',
  'https://images.pexels.com/photos/6190475/pexels-photo-6190475.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Deluxe Room', 'Premier Room', 'Suite'],
  'https://www.jayahousehotels.com/',
  3
),
(
  'golden-temple-retreat',
  'Golden Temple Retreat',
  'City Centre',
  'An exclusive escape with 32 elegantly appointed rooms, each facing a pristine pool surrounded by verdant gardens. Enjoy Apsara Dance performances, exquisite Khmer cuisine, and personalized spa treatments.',
  'luxury', 120, 4.8, 'Poolside Retreat',
  'https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Luxury Suite Pool Access', 'Premier Suite Pool Access', 'Premier Suite Pool View'],
  'https://goldentempleretreat.com/',
  4
),
(
  'golden-temple-villa',
  'Golden Temple Villa',
  'Colonial Quarter',
  'A colonial-style villa just a 5-minute walk from the town centre. 28 contemporary guestrooms and suites, a tropical garden restaurant serving royal Khmer cuisine, plus a spa and wellness services.',
  'midrange', 80, 4.7, 'Colonial Villa',
  'https://images.pexels.com/photos/1001965/pexels-photo-1001965.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Deluxe Room', 'Suite'],
  'https://goldentemplevilla.com/',
  5
),
(
  'eightfold-urban-resort',
  'Eightfold Urban Resort',
  'Sala Kamreuk',
  'A peaceful boutique resort in Sala Kamreuk with 46 stylish rooms. Ground-floor rooms offer direct pool access from your private terrace. Features a serene pool, spa, and Sankya Cafe. Minutes from Angkor Wat.',
  'midrange', 65, 4.6, 'Urban Boutique Resort',
  'https://images.pexels.com/photos/271639/pexels-photo-271639.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Twin/Double', 'Triple', 'Family', 'Suite', 'Pool Access Room'],
  'https://eightfoldurban.com/',
  6
),
(
  'shintamani-angkor',
  'Shinta Mani Angkor',
  'Old Market',
  'A Bensley-designed luxury hotel within walking distance of the Old Market, lively cafes, and boutiques. Features the Kroya restaurant, Bensley''s Bar, and elegant rooms from 38 sqm with full breakfast included.',
  'luxury', 240, 4.8, 'Bensley-Designed Luxury',
  'https://images.pexels.com/photos/13813465/pexels-photo-13813465.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Deluxe Room', 'Bensley Suite', 'Pool Suite'],
  'https://shintamani.com/angkor/',
  7
),
(
  'khmer-mansion-boutique',
  'Khmer Mansion Boutique Hotel',
  'Svay Dangkum',
  'A trendy boutique hotel decorated with Cambodian artwork, a 3-minute walk from Angkor Night Market. 22 rooms, two inviting pools, and a fantastic location on Sok San Road near Pub Street.',
  'midrange', 86, 4.6, 'Boutique Hotel',
  'https://images.pexels.com/photos/40495419/pexels-photo-40495419.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Double/Twin Room', 'Deluxe Double Poolside'],
  'https://www.khmermansion.com/home.php',
  8
),
(
  'park-hyatt-siem-reap',
  'Park Hyatt Siem Reap',
  'City Centre',
  'A cosmopolitan 5-star hotel a 10-minute walk from Artisans Angkor. Features a classy Cambodian restaurant, full-service spa, indoor and outdoor pools, and The Living Room lounge. Elegant suites and park-view rooms.',
  'luxury', 230, 4.8, '5-Star Luxury',
  'https://images.pexels.com/photos/40411967/pexels-photo-40411967.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Park Twin', 'Park King', 'Park View King', 'Suite'],
  'https://www.hyatt.com/park-hyatt/en-US/repph-park-hyatt-siem-reap',
  9
),
(
  'amansara',
  'Amansara',
  'City Centre',
  'A former royal guesthouse transformed into an Aman ultra-luxury retreat. 24 zen-minimalist suites of 75 sqm with private plunge pools, personal remorks, and a 24-hour on-call doctor. No TVs — pure tranquility.',
  'luxury', 1500, 5.0, 'Aman Ultra-Luxury',
  'https://images.pexels.com/photos/6876832/pexels-photo-6876832.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Suite', 'Courtyard Suite', 'Pool Suite'],
  'https://www.aman.com/resorts/amansara',
  10
),
(
  'raffles-grand-hotel-angkor',
  'Raffles Grand Hotel d''Angkor',
  'City Centre',
  'A legendary historic grand hotel near Angkor Wat, open since 1932. Colonial grandeur with two restaurants, garden and pool views, a full spa with sauna and hot tub, tennis courts, and eco-certified luxury.',
  'luxury', 315, 4.9, 'Historic Grand Hotel',
  'https://images.pexels.com/photos/14011664/pexels-photo-14011664.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
  ARRAY['Personality Room', 'Landmark Room', 'Suite'],
  'https://www.raffles.com/siem-reap/',
  11
);
