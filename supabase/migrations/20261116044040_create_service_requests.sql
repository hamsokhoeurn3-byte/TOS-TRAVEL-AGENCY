/*
# Create service_requests table

Plain-English summary: stores booking requests for airport and city transfers and for other experiences (such as the hot air balloon ride) submitted from the Book Now section.

1. New Tables
- `service_requests`
  - `id` (uuid, primary key)
  - `category` (text, either 'transportation' or 'other_service')
  - `service_name` (text, the option the guest picked)
  - `service_date` (date, preferred date)
  - `guests` (integer, number of guests or vehicles requested)
  - `full_name`, `email`, `phone` (text, contact details)
  - `pickup_location` (text, optional, used for transfers)
  - `message` (text, optional special requests)
  - `total_price` (numeric, price shown to the guest)
  - `created_at` (timestamptz, defaults to now)

2. Security
- Row level security is enabled.
- Anonymous visitors can only insert requests. They cannot read, change, or delete existing requests.
- Only the INSERT verb is granted to the anon and authenticated roles.

3. Notes
- No existing data is changed or removed.
*/

CREATE TABLE IF NOT EXISTS service_requests (
  id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
  category text NOT NULL CHECK (category IN ('transportation', 'other_service')),
  service_name text NOT NULL,
  service_date date NOT NULL,
  guests integer NOT NULL CHECK (guests > 0),
  full_name text NOT NULL,
  email text NOT NULL,
  phone text NOT NULL,
  pickup_location text,
  message text,
  total_price numeric NOT NULL,
  created_at timestamptz NOT NULL DEFAULT now()
);

ALTER TABLE service_requests ENABLE ROW LEVEL SECURITY;

GRANT INSERT ON service_requests TO anon, authenticated;

DROP POLICY IF EXISTS "anon_insert_service_requests" ON service_requests;
CREATE POLICY "anon_insert_service_requests" ON service_requests FOR INSERT
  TO anon, authenticated WITH CHECK (true);
