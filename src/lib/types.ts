export type Tour = {
  id: string;
  slug: string;
  name: string;
  tagline: string;
  description: string;
  price: number;
  duration: string;
  category: 'temples' | 'nature' | 'culture' | 'transfer' | 'cycling' | 'vehicle' | 'temple-culture' | 'outdoor' | 'water' | 'food' | 'handicrafts' | 'wellness' | 'sunset' | 'private' | 'group';
  group_size: number;
  tour_type: 'private' | 'group' | null;
  distance_km: number | string | null;
  difficulty_level: string | null;
  starting_time: string | null;
  bicycle_type: string | null;
  tour_guide: string | null;
  hotel_pickup: boolean | null;
  included_meals: string[] | null;
  included_drinks: string[] | null;
  meeting_point: string | null;
  available_seats: number | null;
  booking_requirements: string | null;
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
  room_types: Array<string | HotelRoomType>;
  website_url: string | null;
  sort_order: number;
};

export type HotelRoomType = {
  name: string;
  guests: number;
  price: number;
  category?: 'room' | 'villa';
};

export function roomTypeName(room: string | HotelRoomType): string {
  return typeof room === 'string' ? room : room.name;
}

export function roomTypePrice(room: string | HotelRoomType, fallback: number): number {
  return typeof room === 'string' ? fallback : room.price;
}

export function roomTypeGuests(room: string | HotelRoomType, fallback = 2): number {
  return typeof room === 'string' ? fallback : room.guests;
}

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
