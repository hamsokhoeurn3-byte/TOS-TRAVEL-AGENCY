import { useState } from 'react';
import { Clock, Users, ArrowRight, Check, X as CloseIcon } from 'lucide-react';
import type { Tour } from '../lib/supabase';
import { Reveal } from './Reveal';

type TourFilter =
  | 'all'
  | 'angkor'
  | 'sunrise'
  | 'countryside'
  | 'hidden'
  | 'private'
  | 'multi-day';

const filterLabels: Record<TourFilter, string> = {
  all: 'All Tours',
  angkor: 'Angkor Wat Tours',
  sunrise: 'Sunrise Tours',
  countryside: 'Countryside Tours',
  hidden: 'Hidden Temples Tours',
  private: 'Private Tours',
  'multi-day': 'Multi-Day Tours',
};

const tourFilterSlugs: Record<Exclude<TourFilter, 'all'>, string[]> = {
  angkor: ['angkor-sunrise-tour', 'explore-angkor'],
  sunrise: ['angkor-sunrise-tour'],
  countryside: ['koh-ker-beng-mealea', 'banteay-srei-backcountry', 'kulen-waterfall', 'preah-vihear-koh-ker'],
  hidden: ['koh-ker-beng-mealea', 'banteay-srei-backcountry', 'preah-vihear-koh-ker'],
  private: ['airport-transfer'],
  'multi-day': [],
};

function tourCategoryLabel(tour: Tour): string {
  const match = (Object.keys(tourFilterSlugs) as Array<Exclude<TourFilter, 'all'>>).find((key) =>
    tourFilterSlugs[key].includes(tour.slug)
  );
  return match ? filterLabels[match] : 'Tours';
}

function TourModal({ tour, onClose, onBook }: { tour: Tour; onClose: () => void; onBook: (tour: Tour) => void }) {
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
  const [selected, setSelected] = useState<Tour | null>(null);

  const categories: Array<{ key: TourFilter; label: string }> = (Object.keys(filterLabels) as TourFilter[]).map((key) => ({
    key,
    label: filterLabels[key],
  }));

  const visible = filter === 'all'
    ? tours
    : tours.filter((tour) => tourFilterSlugs[filter].includes(tour.slug));

  return (
    <section id="tours" className="bg-clay-50 py-24">
      <div className="mx-auto max-w-7xl px-4 sm:px-8">
        <Reveal className="mx-auto max-w-2xl text-center">
          <p className="text-xs font-bold uppercase tracking-[0.2em] text-gold-600">Tours</p>
          <h2 className="mt-3 font-display text-3xl font-bold text-brand-950 sm:text-4xl">
            Featured Siem Reap Tours
          </h2>
          <p className="mt-4 leading-relaxed text-clay-600">
            The original and exclusive small group Siem Reap tours — no more than 10 guests per
            group, expertly organized for every traveler.
          </p>
        </Reveal>

        <Reveal delay={100} className="mt-10 flex flex-wrap justify-center gap-2">
          {categories.map((c) => (
            <button
              key={c.key}
              onClick={() => setFilter(c.key)}
              className={`rounded-full px-5 py-2 text-sm font-semibold transition-all ${
                filter === c.key
                  ? 'bg-brand-700 text-white shadow-md'
                  : 'bg-white text-clay-700 hover:bg-brand-50'
              }`}
            >
              {c.label}
            </button>
          ))}
        </Reveal>

        {visible.length === 0 && (
          <div className="mt-12 rounded-2xl border border-clay-200 bg-white px-6 py-12 text-center">
            <h3 className="font-display text-xl font-bold text-brand-900">More journeys are on the way</h3>
            <p className="mx-auto mt-2 max-w-md text-sm leading-relaxed text-clay-600">
              Our multi-day itineraries are being carefully prepared. Choose another tour category or contact us to plan a longer stay.
            </p>
          </div>
        )}

        <div className="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
          {visible.map((t, i) => (
            <Reveal key={t.slug} delay={(i % 3) * 80}>
              <article
                onClick={() => setSelected(t)}
                className="group flex h-full cursor-pointer flex-col overflow-hidden rounded-2xl bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
              >
                <div className="relative h-52 overflow-hidden">
                  <img
                    src={t.image_url}
                    alt={t.name}
                    className="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                  />
                  <span className="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-bold text-brand-800 backdrop-blur">
                    {tourCategoryLabel(t)}
                  </span>
                  {t.featured && (
                    <span className="absolute right-4 top-4 rounded-full bg-gold-500 px-3 py-1 text-xs font-bold text-brand-950">
                      Popular
                    </span>
                  )}
                </div>
                <div className="flex flex-1 flex-col p-6">
                  <h3 className="font-display text-xl font-bold text-brand-900">{t.name}</h3>
                  <p className="mt-2 line-clamp-3 flex-1 text-sm leading-relaxed text-clay-600">{t.tagline}</p>
                  <div className="mt-4 flex items-center gap-4 text-xs text-clay-500">
                    <span className="flex items-center gap-1">
                      <Clock className="h-3.5 w-3.5" /> {t.duration}
                    </span>
                    <span className="flex items-center gap-1">
                      <Users className="h-3.5 w-3.5" /> Max {t.group_size}
                    </span>
                  </div>
                  <div className="mt-5 flex items-center justify-between border-t border-clay-100 pt-4">
                    <div>
                      <span className="font-display text-2xl font-bold text-brand-800">${t.price}</span>
                      <span className="text-xs text-clay-500"> / person</span>
                    </div>
                    <span className="flex items-center gap-1 text-sm font-semibold text-gold-600 transition-all group-hover:gap-2">
                      Details <ArrowRight className="h-4 w-4" />
                    </span>
                  </div>
                </div>
              </article>
            </Reveal>
          ))}
        </div>
      </div>

      {selected && <TourModal tour={selected} onClose={() => setSelected(null)} onBook={onBook} />}
    </section>
  );
}
