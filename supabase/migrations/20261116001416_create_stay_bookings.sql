/*
# Create stay_bookings table

1. New Tables
- `stay_bookings`: guest requests to book a hotel stay through the website.
  - `id` (uuid, primary key, auto-generated)
  - `hotel_id` (uuid, references hotels, which stay is requested)
  - `check_in` (date, required)
  - `check_out` (date, required)
  - `guests` (integer, required, default 2)
  - `rooms` (integer, default 1)
  - `full_name` (text, required)
  - `email` (text, required)
  - `phone` (text, required)
  - `message` (text, optional note from the guest)
  - `created_at` (timestamp, defaults to now)

2. Security
- Enable RLS on `stay_bookings`.
- Grant INSERT to `anon` and `authenticated` only — the public booking form
  submits new requests; no one can read or change requests through the website.
- Insert policy allows anyone (anon, authenticated) to submit a request.
*/

CREATE TABLE IF NOT EXISTS stay_bookings (
  id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
  hotel_id uuid NOT NULL REFERENCES hotels(id),
  check_in date NOT NULL,
  check_out date NOT NULL,
  guests integer NOT NULL DEFAULT 2,
  rooms integer NOT NULL DEFAULT 1,
  full_name text NOT NULL,
  email text NOT NULL,
  phone text NOT NULL,
  message text,
  created_at timestamptz NOT NULL DEFAULT now()
);

ALTER TABLE stay_bookings ENABLE ROW LEVEL SECURITY;

GRANT INSERT ON stay_bookings TO anon, authenticated;

DROP POLICY IF EXISTS "anon_insert_stay_bookings" ON stay_bookings;
CREATE POLICY "anon_insert_stay_bookings" ON stay_bookings
FOR INSERT
TO anon, authenticated
WITH CHECK (true);
