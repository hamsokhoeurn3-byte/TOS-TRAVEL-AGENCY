import { useState } from 'react';
import { Clock, Users, ArrowRight, Check, X as CloseIcon } from 'lucide-react';
import type { Tour } from '../lib/types';
import { Reveal } from './Reveal';

type TourFilter = string;
type TourFilterCategory = {
  id: string;
  label: string;
  activities: string[];
  slugs: string[];
  subcategories?: string[];
  privateDescription: string | null;
  groupDescription: string | null;
};

const tourCategories: TourFilterCategory[] = [
  {
    id: 'cycling',
    label: 'Cycling & Group Rides',
    activities: ['Angkor Sunrise Cycling', 'Angkor Temple Cycling Tour', 'Siem Reap Countryside Cycling', 'E-Bike Countryside Adventure', 'Mountain Biking Adventure'],
    slugs: [],
    subcategories: ['All Cycling Tours', 'Private Cycling Tours', 'Group Cycling Tours', 'Sunrise Cycling', 'Countryside Cycling', 'Sunset Cycling', 'E-Bike Tours', 'Multi-Day Cycling Adventures'],
    privateDescription: 'Enjoy a personalized cycling experience with a private guide, flexible departure time, and a route tailored to your interests.',
    groupDescription: 'Join scheduled cycling trips with other travelers, following a shared route and departure time.',
  },
  {
    id: 'vehicle',
    label: 'Motorbike & Vehicle Adventures',
    activities: ['Guided Vespa Countryside Tour', 'Vintage Jeep Countryside Tour', 'ATV / Quad Biking Adventure', 'Guided Motorbike Adventure', 'Sunset Countryside Jeep Tour'],
    slugs: [],
    privateDescription: 'Explore Siem Reap by vehicle with a private guide, flexible schedule, and personalized route.',
    groupDescription: 'Join scheduled vehicle adventures with other travelers and enjoy the journey together.',
  },
  {
    id: 'temple-culture',
    label: 'Temple & Cultural Tours',
    activities: ['Angkor Wat Sunrise Tour', 'Angkor Small Circuit Tour', 'Angkor Grand Circuit Tour', 'Banteay Srei Temple Tour', 'Khmer Cultural Experience', 'Apsara Dance Show'],
    slugs: ['angkor-sunrise-tour', 'explore-angkor', 'koh-ker-beng-mealea', 'banteay-srei-backcountry', 'preah-vihear-koh-ker'],
    privateDescription: "Discover Angkor's temples and Khmer culture with a private guide and flexible itinerary.",
    groupDescription: 'Explore famous temples and cultural attractions with other travelers on a scheduled tour.',
  },
  {
    id: 'outdoor',
    label: 'Outdoor & Adventure',
    activities: ['Angkor Zipline Adventure', 'Horse Riding Experience', 'Countryside Hiking', 'Nature & Jungle Trails', 'Countryside Adventure'],
    slugs: ['kulen-waterfall', 'koh-ker-beng-mealea', 'preah-vihear-koh-ker'],
    privateDescription: 'Enjoy outdoor activities with personalized arrangements and a private guide where available.',
    groupDescription: "Join scheduled outdoor adventures with other travelers, following the activity provider's safety requirements.",
  },
  {
    id: 'water',
    label: 'Water & Boat Activities',
    activities: ['Tonle Sap Floating Village Tour', 'Kampong Phluk Floating Village', 'Tonle Sap Sunset Boat Cruise', 'Sunset River & Lake Experience', 'Kayaking Adventure'],
    slugs: ['kompong-phluk-floating-villages'],
    privateDescription: 'Enjoy a private boat trip or water experience with a flexible schedule and personalized arrangements.',
    groupDescription: 'Join a shared boat cruise or scheduled water activity with other travelers.',
  },
  {
    id: 'food',
    label: 'Food & Local Experiences',
    activities: ['Cambodian Street Food Tour', 'Khmer Cooking Class', 'Siem Reap Night Food Tour', 'Old Market Food Walk', 'Local Village Food Experience'],
    slugs: [],
    privateDescription: 'Discover Cambodian cuisine through a personalized food tour or private cooking experience.',
    groupDescription: 'Join other travelers for a scheduled food walk, cooking class, or local dining experience.',
  },
  {
    id: 'handicrafts',
    label: 'Handicrafts & Workshops',
    activities: ['Khmer Pottery Workshop', 'Silk Weaving Experience', 'Traditional Cambodian Art Workshop', 'Khmer Handicraft Making', 'Local Artisan Village Visit'],
    slugs: [],
    privateDescription: 'Enjoy individual guidance and a more personal introduction to Cambodian crafts.',
    groupDescription: 'Join a scheduled workshop and learn traditional crafts with other participants.',
  },
  {
    id: 'wellness',
    label: 'Wellness & Relaxation',
    activities: ['Traditional Khmer Massage', 'Spa & Relaxation Experience', 'Yoga Session', 'Meditation Experience', 'Wellness Retreat'],
    slugs: [],
    privateDescription: 'Enjoy a personal wellness session with flexible arrangements where available.',
    groupDescription: 'Join scheduled yoga, meditation, or wellness sessions with other participants.',
  },
  {
    id: 'sunset',
    label: 'Sunset & Evening Experiences',
    activities: ['Phnom Krom Sunset View', 'Tonle Sap Sunset Boat Cruise', 'Countryside Golden Hour Jeep Tour', 'Sunset Photography Experience', 'Siem Reap Night Market Experience', 'Evening Food & Street Culture Tour'],
    slugs: ['explore-angkor', 'kompong-phluk-floating-villages'],
    privateDescription: 'Enjoy a relaxing evening with a private guide, flexible departure time, and selected sunset viewing locations.',
    groupDescription: 'Join scheduled sunset trips, boat cruises, photography experiences, or evening food tours with other travelers.',
  },
  {
    id: 'private',
    label: 'Private Tours',
    activities: ['Private Angkor Wat Sunrise Tour', 'Private Temple Discovery Tour', 'Private Countryside Jeep Tour', 'Private Tonle Sap Sunset Cruise', 'Private Food & Cultural Tour', 'Private Custom Full-Day Experience'],
    slugs: [],
    privateDescription: 'Enjoy an exclusive experience for yourself, your family, or your travel companions, with a flexible itinerary and personalized arrangements.',
    groupDescription: null,
  },
  {
    id: 'group',
    label: 'Group Tours',
    activities: ['Angkor Wat Sunrise Group Tour', 'Angkor Temple Group Tour', 'Group Cycling Adventure', 'Group Countryside Jeep Tour', 'Tonle Sap Sunset Group Cruise', 'Group Food & Cultural Tour'],
    slugs: [
      'angkor-sunrise-tour',
      'explore-angkor',
      'koh-ker-beng-mealea',
      'kompong-phluk-floating-villages',
      'banteay-srei-backcountry',
      'kulen-waterfall',
      'preah-vihear-koh-ker',
    ],
    privateDescription: null,
    groupDescription: 'Join scheduled experiences with other travelers. Departure times, meeting points, group size, available seats, and booking requirements will be shown on group listings as they are added.',
  },
];

function tourCategoryLabel(tour: Tour): string {
  const category = tourCategories.find((item) => item.id === tour.category || item.slugs.includes(tour.slug));
  if (category) {
    return category.label;
  }

  return tour.category === 'transfer' ? 'Transfers' : 'Tours & Activities';
}

function TourModal({ tour, onClose, onBook }: { tour: Tour; onClose: () => void; onBook: (tour: Tour) => void }) {
  const tourDetails = [
    { label: 'Tour type', value: tour.tour_type ? `${tour.tour_type[0].toUpperCase()}${tour.tour_type.slice(1)}` : null },
    { label: 'Distance', value: tour.distance_km ? `${tour.distance_km} km` : null },
    { label: 'Difficulty', value: tour.difficulty_level },
    { label: 'Starting time', value: tour.starting_time?.slice(0, 5) ?? null },
    { label: 'Bicycle type', value: tour.bicycle_type },
    { label: 'Tour guide', value: tour.tour_guide },
    { label: 'Hotel pickup', value: tour.hotel_pickup === null ? null : tour.hotel_pickup ? 'Included' : 'Not included' },
    { label: 'Meeting point', value: tour.meeting_point },
    { label: 'Available seats', value: tour.available_seats === null ? null : String(tour.available_seats) },
    { label: 'Meals included', value: tour.included_meals?.length ? tour.included_meals.join(', ') : null },
    { label: 'Drinks included', value: tour.included_drinks?.length ? tour.included_drinks.join(', ') : null },
    { label: 'Booking requirements', value: tour.booking_requirements },
  ].filter((item): item is { label: string; value: string } => item.value !== null);

  return (
    <div className="fixed inset-0 z-[60] flex items-end justify-center sm:items-center" role="dialog" aria-modal="true">
      <div className="absolute inset-0 bg-brand-950/70 backdrop-blur-sm" onClick={onClose} />
      <div className="relative z-10 max-h-[90vh] w-full max-w-2xl animate-scale-in overflow-y-auto rounded-t-3xl bg-white shadow-2xl sm:rounded-3xl">
        <div className="relative h-56 sm:h-64">
          <img src={tour.image_url} alt={tour.name} className="h-full w-full rounded-t-3xl object-cover" />
          <button
            onClick={onClose}
            className="absolute right-4 top-4 rounded-full bg-black/40 p-2 text-white backdrop-blur transition-colors hover:bg-black/60"
            aria-label="Close"
          >
            <CloseIcon className="h-5 w-5" />
          </button>
          <span className="absolute bottom-4 left-4 rounded-full bg-gold-500 px-3 py-1 text-xs font-bold text-brand-950">
            From ${tour.price} per person
          </span>
        </div>
        <div className="p-6 sm:p-8">
          <div className="mb-3 flex flex-wrap items-center gap-3 text-xs text-clay-500">
            <span className="rounded-full bg-brand-50 px-3 py-1 font-semibold text-brand-700">
              {tourCategoryLabel(tour)}
            </span>
            <span className="flex items-center gap-1">
              <Clock className="h-3.5 w-3.5" /> {tour.duration}
            </span>
            <span className="flex items-center gap-1">
              <Users className="h-3.5 w-3.5" /> Max {tour.group_size} guests
            </span>
          </div>
          <h3 className="font-display text-2xl font-bold text-brand-900">{tour.name}</h3>
          <p className="mt-4 leading-relaxed text-clay-700">{tour.description}</p>
          {tourDetails.length > 0 && (
            <dl className="mt-5 grid gap-3 rounded-2xl bg-clay-50 p-4 sm:grid-cols-2">
              {tourDetails.map((detail) => (
                <div key={detail.label}>
                  <dt className="text-[11px] font-semibold uppercase tracking-wide text-clay-500">{detail.label}</dt>
                  <dd className="mt-0.5 text-sm font-medium text-brand-900">{detail.value}</dd>
                </div>
              ))}
            </dl>
          )}
          <h4 className="mt-6 text-sm font-bold uppercase tracking-wider text-clay-500">Tour highlights</h4>
          <ul className="mt-3 space-y-2">
            {tour.highlights.map((h) => (
              <li key={h} className="flex items-start gap-2.5 text-sm text-clay-800">
                <Check className="mt-0.5 h-4 w-4 shrink-0 text-brand-600" />
                {h}
              </li>
            ))}
          </ul>
          <button
            onClick={() => {
              onClose();
              onBook(tour);
            }}
            className="mt-8 flex w-full items-center justify-center gap-2 rounded-full bg-brand-700 py-3.5 font-semibold text-white transition-all hover:bg-brand-600"
          >
            Book this tour <ArrowRight className="h-4 w-4" />
          </button>
        </div>
      </div>
    </div>
  );
}

export default function Tours({ tours, onBook }: { tours: Tour[]; onBook: (tour: Tour) => void }) {
  const [filter, setFilter] = useState<TourFilter>('all');
  const [cyclingFilter, setCyclingFilter] = useState('All Cycling Tours');
  const [selected, setSelected] = useState<Tour | null>(null);
  const selectedCategory = tourCategories.find((category) => category.id === filter);

  const visible = tours.filter((tour) => {
    const inCategory = filter === 'all'
      || tour.category === filter
      || Boolean(selectedCategory?.slugs.includes(tour.slug));

    if (!inCategory || filter !== 'cycling' || cyclingFilter === 'All Cycling Tours') {
      return inCategory;
    }

    const searchable = `${tour.name} ${tour.tagline} ${tour.description}`.toLowerCase();
    switch (cyclingFilter) {
      case 'Private Cycling Tours':
        return tour.tour_type === 'private';
      case 'Group Cycling Tours':
        return tour.tour_type === 'group';
      case 'Sunrise Cycling':
        return /sunrise|morning/.test(searchable);
      case 'Countryside Cycling':
        return /countryside/.test(searchable);
      case 'Sunset Cycling':
        return /sunset|evening/.test(searchable);
      case 'E-Bike Tours':
        return /e-?bike/.test(`${searchable} ${tour.bicycle_type ?? ''}`.toLowerCase());
      case 'Multi-Day Cycling Adventures':
        return /multi.?day|[2-9]\s*days?/.test(`${searchable} ${tour.duration}`.toLowerCase());
      default:
        return true;
    }
  });

  return (
    <section id="tours" className="bg-clay-50 py-20">
      <div className="mx-auto max-w-7xl px-4 sm:px-8">
        <Reveal className="mx-auto max-w-2xl text-center">
          <p className="text-xs font-bold uppercase tracking-[0.2em] text-gold-600">Tours & Activities</p>
          <h2 className="mt-3 font-display text-3xl font-bold text-brand-950 sm:text-4xl">Featured Siem Reap Tours</h2>
          <p className="mt-4 leading-relaxed text-clay-600">Explore temples, countryside, water, food, and local culture. Choose a private experience or join a scheduled group outing.</p>
        </Reveal>

        <Reveal delay={100} className="mt-10 flex flex-wrap justify-center gap-2">
          <button onClick={() => setFilter('all')} className={`rounded-full px-5 py-2 text-sm font-semibold transition-all ${filter === 'all' ? 'bg-brand-700 text-white shadow-md' : 'bg-white text-clay-700 hover:bg-brand-50'}`}>All Tours</button>
          {tourCategories.map((category) => (
            <button key={category.id} onClick={() => { setFilter(category.id); setCyclingFilter('All Cycling Tours'); }} className={`rounded-full px-5 py-2 text-sm font-semibold transition-all ${filter === category.id ? 'bg-brand-700 text-white shadow-md' : 'bg-white text-clay-700 hover:bg-brand-50'}`}>{category.label}</button>
          ))}
        </Reveal>

        {selectedCategory?.subcategories && (
          <Reveal delay={120} className="mt-5 flex flex-wrap justify-center gap-2">
            {selectedCategory.subcategories.map((subcategory) => (
              <button key={subcategory} onClick={() => setCyclingFilter(subcategory)} className={`rounded-full border px-4 py-1.5 text-xs font-semibold transition ${cyclingFilter === subcategory ? 'border-brand-700 bg-brand-700 text-white' : 'border-clay-200 bg-white text-clay-700 hover:border-brand-300'}`}>
                {subcategory}
              </button>
            ))}
          </Reveal>
        )}

        <p className="mt-10 text-sm text-clay-500">{visible.length} {visible.length === 1 ? 'tour' : 'tours'} found</p>
        {visible.length === 0 && <div className="mt-4 rounded-2xl border border-clay-200 bg-white px-6 py-12 text-center"><h3 className="font-display text-xl font-bold text-brand-900">{selectedCategory?.label ?? 'No tours'} are coming soon</h3><p className="mx-auto mt-2 max-w-md text-sm leading-relaxed text-clay-600">We don’t have a bookable listing in this category yet. Contact us to ask about availability or choose another category.</p></div>}

        <div id="tour-results" className="mt-6 grid scroll-mt-24 gap-8 sm:grid-cols-2 lg:grid-cols-3">
          {visible.map((tour, index) => (
            <Reveal key={tour.slug} delay={(index % 3) * 70}>
              <article onClick={() => setSelected(tour)} className="group flex h-full cursor-pointer flex-col overflow-hidden rounded-2xl bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div className="relative h-52 overflow-hidden"><img src={tour.image_url} alt={tour.name} className="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" /><span className="absolute left-4 top-4 rounded-full bg-white/95 px-3 py-1 text-xs font-bold text-brand-800">{tourCategoryLabel(tour)}</span>{tour.featured && <span className="absolute right-4 top-4 rounded-full bg-gold-500 px-3 py-1 text-xs font-bold text-brand-950">Popular</span>}</div>
                <div className="flex flex-1 flex-col p-6"><h3 className="font-display text-xl font-bold text-brand-900">{tour.name}</h3><p className="mt-2 line-clamp-3 flex-1 text-sm leading-relaxed text-clay-600">{tour.tagline}</p><div className="mt-4 flex items-center gap-4 text-xs text-clay-500"><span className="flex items-center gap-1"><Clock className="h-3.5 w-3.5" /> {tour.duration}</span><span className="flex items-center gap-1"><Users className="h-3.5 w-3.5" /> Max {tour.group_size}</span></div><div className="mt-5 flex items-center justify-between border-t border-clay-100 pt-4"><div><span className="font-display text-2xl font-bold text-brand-800">${tour.price}</span><span className="text-xs text-clay-500"> / person</span></div><span className="flex items-center gap-1 text-sm font-semibold text-gold-600 transition-all group-hover:gap-2">Details <ArrowRight className="h-4 w-4" /></span></div></div>
              </article>
            </Reveal>
          ))}
        </div>
      </div>
      {selected && <TourModal tour={selected} onClose={() => setSelected(null)} onBook={onBook} />}
    </section>
  );
}
