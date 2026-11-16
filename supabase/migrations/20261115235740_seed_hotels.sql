/*
# Seed hotel recommendations

1. Modified Tables
- `hotels`: inserts 6 recommended Siem Reap properties across budget, midrange and luxury, referenced by stable `slug` so re-runs do not duplicate.
*/

INSERT INTO hotels (slug, name, area, description, price_level, price_from, rating, style, image_url, sort_order)
VALUES
  ('angkor-palm-resort', 'Angkor Palm Resort & Spa',
   'Riverside',
   'A leafy riverside resort with a large free-form pool, spa, and shaded gardens — ten minutes from Pub Street but a world away in feel.',
   'luxury', 145, 4.9, 'Resort & Spa',
   'https://images.pexels.com/photos/14024794/pexels-photo-14024794.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
   1),
  ('sivutha-boutique', 'Sivutha Boutique House',
   'Sivutha Blvd',
   'A stylish boutique stay on the boulevard with warm wooden interiors, a rooftop breakfast terrace, and walking distance to the night market.',
   'midrange', 65, 4.8, 'Boutique',
   'https://images.pexels.com/photos/40756978/pexels-photo-40756978.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
   2),
  ('old-market-guesthouse', 'Old Market Guesthouse',
   'Old Market',
   'Simple, spotless rooms above a family cafe in the heart of town. The best-value base for early sunrise tours and evening street food.',
   'budget', 28, 4.7, 'Guesthouse',
   'https://images.pexels.com/photos/37591021/pexels-photo-37591021.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
   3),
  ('temple-garden-hotel', 'Temple Garden Hotel',
   'Wat Damnak',
   'A quiet garden hotel near Wat Damnak pagoda with a saltwater pool and elegant cream-toned rooms — a favorite of returning guests.',
   'midrange', 78, 4.9, 'Garden Hotel',
   'https://images.pexels.com/photos/7746092/pexels-photo-7746092.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
   4),
  ('pub-street-lofts', 'Pub Street Lofts',
   'Pub Street',
   'Modern loft-style rooms steps from the action. Soundproofed for sleep, with a cafe downstairs and every attraction on your doorstep.',
   'midrange', 55, 4.6, 'City Hotel',
   'https://images.pexels.com/photos/8134775/pexels-photo-8134775.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
   5),
  ('tonle-villa', 'Tonle Villa Retreat',
   'Outskirts of Siem Reap',
   'A peaceful villa retreat on the road to the lake, surrounded by rice fields. Daily shuttle to town and sunrise tour pickups from the gate.',
   'luxury', 180, 5.0, 'Private Villa',
   'https://images.pexels.com/photos/6466236/pexels-photo-6466236.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
   6)
ON CONFLICT (slug) DO NOTHING;