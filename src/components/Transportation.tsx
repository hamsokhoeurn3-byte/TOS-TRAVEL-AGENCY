import { useState } from 'react';
import type { LucideIcon } from 'lucide-react';
import { ArrowRight, Bike, Bus, Car, Clock3, Plane, ShieldCheck, Users } from 'lucide-react';
import { Reveal } from './Reveal';

type TransportationFilter =
  | 'all'
  | 'tuk-tuk'
  | 'private-car'
  | 'minivan'
  | 'airport-transfer'
  | 'bicycle'
  | 'motorcycle'
  | 'group';

type TransportationService = {
  category: Exclude<TransportationFilter, 'all'>;
  label: string;
  title: string;
  description: string;
  details: string;
  icon: LucideIcon;
  accent: string;
};

const filterLabels: Record<TransportationFilter, string> = {
  all: 'All Transportation',
  'tuk-tuk': 'Tuk-Tuk',
  'private-car': 'Private Car',
  minivan: 'Minivan',
  'airport-transfer': 'Airport Transfer',
  bicycle: 'Bicycle Rental',
  motorcycle: 'Motorcycle & Scooter Rental',
  group: 'Group Transportation',
};

const services: TransportationService[] = [
  {
    category: 'tuk-tuk',
    label: 'Classic Siem Reap',
    title: 'Tuk-Tuk Rides',
    description: 'The easy, open-air way to move through town, visit nearby temples, and enjoy the evening breeze.',
    details: 'Up to 4 guests',
    icon: Car,
    accent: 'bg-gold-100 text-gold-800',
  },
  {
    category: 'private-car',
    label: 'Comfort & privacy',
    title: 'Private Car',
    description: 'Travel in cool comfort with a dedicated driver for temple days, city trips, and custom stops.',
    details: 'Up to 3 guests',
    icon: Car,
    accent: 'bg-brand-50 text-brand-700',
  },
  {
    category: 'minivan',
    label: 'Room for everyone',
    title: 'Minivan',
    description: 'A practical choice for families and small groups with room for luggage and a flexible itinerary.',
    details: 'Up to 10 guests',
    icon: Bus,
    accent: 'bg-clay-100 text-clay-800',
  },
  {
    category: 'airport-transfer',
    label: 'Arrive with ease',
    title: 'Airport Transfer',
    description: 'Meet your driver at Siem Reap Angkor International Airport and go directly to your hotel.',
    details: 'Flight tracking included',
    icon: Plane,
    accent: 'bg-brand-50 text-brand-700',
  },
  {
    category: 'bicycle',
    label: 'Slow travel',
    title: 'Bicycle Rental',
    description: 'Explore quiet lanes, local neighborhoods, and the countryside at your own pace.',
    details: 'Daily rental available',
    icon: Bike,
    accent: 'bg-gold-100 text-gold-800',
  },
  {
    category: 'motorcycle',
    label: 'Go further',
    title: 'Motorcycle & Scooter Rental',
    description: 'A flexible way for confident riders to discover the town and surrounding countryside.',
    details: 'Helmet included',
    icon: Bike,
    accent: 'bg-clay-100 text-clay-800',
  },
  {
    category: 'group',
    label: 'Travel together',
    title: 'Group Transportation',
    description: 'Coordinated vehicles, pickup times, and local support for weddings, retreats, and larger groups.',
    details: 'Custom group plans',
    icon: Users,
    accent: 'bg-brand-50 text-brand-700',
  },
];

export default function Transportation() {
  const [filter, setFilter] = useState<TransportationFilter>('all');
  const categories = Object.keys(filterLabels) as TransportationFilter[];
  const visible = filter === 'all' ? services : services.filter((service) => service.category === filter);

  return (
    <section id="transportation" className="bg-white py-24">
      <div className="mx-auto max-w-7xl px-4 sm:px-8">
        <Reveal className="mx-auto max-w-2xl text-center">
          <p className="text-xs font-bold uppercase tracking-[0.2em] text-gold-600">Transportation</p>
          <h2 className="mt-3 font-display text-3xl font-bold text-brand-950 sm:text-4xl">
            Every Way to Get Around Siem Reap
          </h2>
          <p className="mt-4 leading-relaxed text-clay-600">
            From a breezy tuk-tuk ride to a private airport pickup, choose the transport that fits your day.
            Every service is arranged with trusted local drivers and clear communication.
          </p>
        </Reveal>

        <Reveal delay={100} className="mt-10 flex flex-wrap justify-center gap-2">
          {categories.map((category) => (
            <button
              key={category}
              onClick={() => setFilter(category)}
              className={`rounded-full px-4 py-2 text-sm font-semibold transition-all sm:px-5 ${
                filter === category
                  ? 'bg-gold-500 text-brand-950 shadow-md'
                  : 'bg-clay-50 text-clay-700 hover:bg-brand-50'
              }`}
            >
              {filterLabels[category]}
            </button>
          ))}
        </Reveal>

        <div className="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
          {visible.map((service, index) => {
            const Icon = service.icon;
            return (
              <Reveal key={service.category} delay={(index % 3) * 80}>
                <article className="group flex h-full flex-col rounded-2xl border border-clay-100 bg-clay-50 p-6 transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:bg-white hover:shadow-xl">
                  <div className="flex items-start justify-between gap-4">
                    <span className={`flex h-12 w-12 items-center justify-center rounded-2xl ${service.accent}`}>
                      <Icon className="h-6 w-6" />
                    </span>
                    <span className="rounded-full border border-clay-200 px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-clay-600">
                      {service.label}
                    </span>
                  </div>
                  <h3 className="mt-6 font-display text-xl font-bold text-brand-900">{service.title}</h3>
                  <p className="mt-2 flex-1 text-sm leading-relaxed text-clay-600">{service.description}</p>
                  <div className="mt-5 flex items-center justify-between border-t border-clay-200 pt-4">
                    <span className="flex items-center gap-1.5 text-xs font-medium text-clay-500">
                      {service.category === 'airport-transfer' ? <Clock3 className="h-3.5 w-3.5" /> : <ShieldCheck className="h-3.5 w-3.5" />}
                      {service.details}
                    </span>
                    <a href="#contact" className="flex items-center gap-1 text-sm font-semibold text-gold-400 transition-all group-hover:gap-2">
                      Enquire <ArrowRight className="h-4 w-4" />
                    </a>
                  </div>
                </article>
              </Reveal>
            );
          })}
        </div>
      </div>
    </section>
  );
}
