/*
# Create hotels and trip_plans tables

1. New Tables
- `hotels`: recommended places to stay (name, area, description, price range, rating, image, style category, sort order).
- `trip_plans`: itineraries saved from the AI Trip Planner (trip name, days as JSON, total cost estimate, traveler info).
2. Security
- Enable RLS on both tables; no sign-in so policies target `anon, authenticated`.
- `hotels`: public read only.
- `trip_plans`: public insert + read (prototype), no update/delete.
3. Grants
- SELECT on `hotels`; SELECT + INSERT on `trip_plans`.
*/

CREATE TABLE IF NOT EXISTS hotels (
  id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
  slug text UNIQUE NOT NULL,
  name text NOT NULL,
  area text NOT NULL,
  description text NOT NULL,
  price_level text NOT NULL CHECK (price_level IN ('budget', 'midrange', 'luxury')),
  price_from integer NOT NULL,
  rating numeric(2,1) NOT NULL CHECK (rating >= 0 AND rating <= 5),
  style text NOT NULL,
  image_url text NOT NULL,
  sort_order integer NOT NULL DEFAULT 0,
  created_at timestamptz NOT NULL DEFAULT now()
);

CREATE TABLE IF NOT EXISTS trip_plans (
  id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
  trip_name text NOT NULL,
  days jsonb NOT NULL,
  total_price integer NOT NULL DEFAULT 0,
  travelers integer NOT NULL DEFAULT 2,
  pace text NOT NULL DEFAULT 'relaxed' CHECK (pace IN ('relaxed', 'balanced', 'packed')),
  created_at timestamptz NOT NULL DEFAULT now()
);

ALTER TABLE hotels ENABLE ROW LEVEL SECURITY;
ALTER TABLE trip_plans ENABLE ROW LEVEL SECURITY;

GRANT SELECT ON hotels TO anon, authenticated;
GRANT SELECT, INSERT ON trip_plans TO anon, authenticated;

DROP POLICY IF EXISTS "public_read_hotels" ON hotels;
CREATE POLICY "public_read_hotels" ON hotels
  FOR SELECT TO anon, authenticated USING (true);

DROP POLICY IF EXISTS "public_insert_trip_plans" ON trip_plans;
CREATE POLICY "public_insert_trip_plans" ON trip_plans
  FOR INSERT TO anon, authenticated WITH CHECK (true);

DROP POLICY IF EXISTS "public_read_trip_plans" ON trip_plans;
CREATE POLICY "public_read_trip_plans" ON trip_plans
  FOR SELECT TO anon, authenticated USING (true);