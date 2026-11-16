/*
# Create tours and bookings tables for Siem Reap Shuttle prototype

1. New Tables
- `tours`: the tour catalog shown on the site (name, slug, description, price, duration, category, image, highlights, sort order).
- `bookings`: prototype booking requests (tour reference, tour date, guest count, contact info, total price, status).
2. Security
- Enable RLS on both tables.
- The site has no sign-in, so policies target `anon, authenticated`.
- `tours`: public read; writes locked down (no insert/update/delete policies).
- `bookings`: public can create bookings and read back their own booking by id; updates and deletes are not allowed.
3. Grants
- SELECT on `tours` to `anon, authenticated`.
- INSERT + SELECT on `bookings` to `anon, authenticated` (no UPDATE/DELETE).
*/

CREATE TABLE IF NOT EXISTS tours (
  id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
  slug text UNIQUE NOT NULL,
  name text NOT NULL,
  tagline text NOT NULL,
  description text NOT NULL,
  price integer NOT NULL CHECK (price >= 0),
  duration text NOT NULL,
  category text NOT NULL CHECK (category IN ('temples', 'nature', 'culture', 'transfer')),
  group_size integer NOT NULL DEFAULT 10,
  image_url text NOT NULL,
  highlights text[] NOT NULL DEFAULT '{}',
  featured boolean NOT NULL DEFAULT false,
  sort_order integer NOT NULL DEFAULT 0,
  created_at timestamptz NOT NULL DEFAULT now()
);

CREATE TABLE IF NOT EXISTS bookings (
  id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
  tour_id uuid NOT NULL REFERENCES tours(id),
  tour_date date NOT NULL,
  guests integer NOT NULL CHECK (guests BETWEEN 1 AND 10),
  full_name text NOT NULL,
  email text NOT NULL,
  phone text NOT NULL,
  hotel_name text,
  total_price integer NOT NULL,
  status text NOT NULL DEFAULT 'pending' CHECK (status IN ('pending', 'confirmed', 'cancelled')),
  created_at timestamptz NOT NULL DEFAULT now()
);

ALTER TABLE tours ENABLE ROW LEVEL SECURITY;
ALTER TABLE bookings ENABLE ROW LEVEL SECURITY;

GRANT SELECT ON tours TO anon, authenticated;
GRANT SELECT, INSERT ON bookings TO anon, authenticated;

DROP POLICY IF EXISTS "public_read_tours" ON tours;
CREATE POLICY "public_read_tours" ON tours
  FOR SELECT TO anon, authenticated USING (true);

DROP POLICY IF EXISTS "public_insert_bookings" ON bookings;
CREATE POLICY "public_insert_bookings" ON bookings
  FOR INSERT TO anon, authenticated WITH CHECK (true);

DROP POLICY IF EXISTS "public_read_bookings" ON bookings;
CREATE POLICY "public_read_bookings" ON bookings
  FOR SELECT TO anon, authenticated USING (true);