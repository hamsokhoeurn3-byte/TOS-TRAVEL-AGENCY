import { createClient } from '@supabase/supabase-js';

const supabaseUrl = import.meta.env.VITE_SUPABASE_URL as string;
const supabaseAnonKey = import.meta.env.VITE_SUPABASE_ANON_KEY as string;

export const supabase = createClient(supabaseUrl, supabaseAnonKey);

export type Tour = {
  id: string;
  slug: string;
  name: string;
  tagline: string;
  description: string;
  price: number;
  duration: string;
  category: 'temples' | 'nature' | 'culture' | 'transfer';
  group_size: number;
  image_url: string;
  highlights: string[];
  featured: boolean;
  sort_order: number;
};

export type Hotel = {
  id: string;
  slug: string;
  name: string;
  area: string;
  description: string;
  price_level: 'budget' | 'midrange' | 'luxury';
  price_from: number;
  rating: number;
  style: string;
  image_url: string;
  room_types: string[];
  website_url: string | null;
  sort_order: number;
};

export type BookingInput = {
  tour_id: string;
  tour_date: string;
  guests: number;
  full_name: string;
  email: string;
  phone: string;
  hotel_name: string | null;
  total_price: number;
};
