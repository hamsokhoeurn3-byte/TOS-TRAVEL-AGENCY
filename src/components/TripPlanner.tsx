import { useMemo, useState } from 'react';
import {
  Sparkles,
  MapPin,
  ArrowRight,
  RotateCcw,
  Loader2,
  CheckCircle2,
  AlertCircle,
  CalendarRange,
  Wallet,
  Sun,
  Moon,
} from 'lucide-react';
import type { Tour } from '../lib/types';
import { API_URL } from '../lib/api';
import { Reveal } from './Reveal';

type Preferences = {
  days: number;
  travelers: number;
  pace: 'relaxed' | 'balanced' | 'packed';
  interest: 'temples' | 'nature' | 'culture' | 'mixed';
};

type PlanDay = {
  day: number;
  label: string;
  tours: Tour[];
};

const paceLabels: Record<Preferences['pace'], string> = {
  relaxed: 'Relaxed — one activity per day',
  balanced: 'Balanced — main tour + evening free time',
  packed: 'Packed — see as much as possible',
};

const interestLabels: Record<Preferences['interest'], string> = {
  temples: 'Temples & ruins',
  nature: 'Nature & waterfalls',
  culture: 'Local life & villages',
  mixed: 'A bit of everything',
};

function scoreTour(tour: Tour, prefs: Preferences): number {
  let score = 0;
  if (prefs.interest === 'mixed') score += 2;
  if (tour.category === prefs.interest) score += 5;
  if (tour.category === 'transfer') score -= 4;
  if (prefs.pace === 'packed') score += tour.price >= 50 ? 2 : 0;
  if (prefs.pace === 'relaxed') score += tour.featured ? 2 : 0;
  return score;
}

function buildPlan(tours: Tour[], prefs: Preferences): PlanDay[] {
  const bookable = tours.filter((t) => t.category !== 'transfer');
  const ranked = [...bookable].sort((a, b) => scoreTour(b, prefs) - scoreTour(a, prefs));

  const perDay = prefs.pace === 'packed' ? 2 : 1;
  const days: PlanDay[] = [];
  const pool = [...ranked];

  for (let d = 1; d <= prefs.days; d++) {
    const picks: Tour[] = [];
    const fullDayUsed = d > 1 && picks.some((t) => t.duration.toLowerCase().includes('full'));

    if (d === 1) {
      const sunrise = pool.find((t) => t.slug === 'angkor-sunrise-tour') ?? pool[0];
      if (sunrise) {
        picks.push(sunrise);
        pool.splice(pool.indexOf(sunrise), 1);
      }
    }

    while (picks.length < perDay && pool.length > 0) {
      const next = pool.shift()!;
      picks.push(next);
    }

    if (picks.length === 0 && bookable.length > 0) {
      picks.push(bookable[(d - 1) % bookable.length]);
    }

    days.push({
      day: d,
      label: d === 1 ? 'Arrival & first taste of Angkor' : `Day ${d}`,
      tours: picks,
    });
  }

  return days;
}

const inputClass =
  'w-full rounded-xl border border-clay-200 bg-white px-4 py-3 text-sm text-clay-900 outline-none transition-all focus:border-brand-500 focus:ring-2 focus:ring-brand-200';

export default function TripPlanner({ tours }: { tours: Tour[] }) {
  const [step, setStep] = useState(0);
  const [prefs, setPrefs] = useState<Preferences>({ days: 2, travelers: 2, pace: 'balanced', interest: 'mixed' });
  const [saved, setSaved] = useState(false);
  const [saving, setSaving] = useState(false);
  const [error, setError] = useState('');

  const plan = useMemo(() => (step >= 2 ? buildPlan(tours, prefs) : []), [step, tours, prefs]);
  const totalPrice = useMemo(
    () => plan.reduce((sum, d) => sum + d.tours.reduce((s, t) => s + t.price, 0), 0),
    [plan]
  );

  function regenerate() {
    const shuffled: Preferences = {
      ...prefs,
      interest: prefs.interest === 'mixed' ? 'temples' : 'mixed',
    };
    setPrefs(shuffled);
  }

  async function savePlan() {
    setSaving(true);
    setError('');
    try {
      const response = await fetch(`${API_URL}/trip-plans`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
        body: JSON.stringify({
          trip_name: `${prefs.days}-day ${interestLabels[prefs.interest].toLowerCase()} trip`,
          days: plan.map((d) => ({
            day: d.day,
            label: d.label,
            tours: d.tours.map((t) => ({ name: t.name, slug: t.slug, price: t.price })),
          })),
          total_price: totalPrice,
          travelers: prefs.travelers,
          pace: prefs.pace,
        }),
      });

      if (!response.ok) {
        throw new Error('The server could not save your itinerary. Please try again.');
      }

      setSaved(true);
    } catch {
      setError('Your plan could not be saved just now. You can still use it on screen.');
    } finally {
      setSaving(false);
    }
  }

  function restart() {
    setStep(0);
    setSaved(false);
    setError('');
    setPrefs({ days: 2, travelers: 2, pace: 'balanced', interest: 'mixed' });
  }

  return (
    <section id="planner" className="relative overflow-hidden bg-brand-950 py-24">
      <div
        className="pointer-events-none absolute inset-0 opacity-10"
        style={{
          backgroundImage:
            'radial-gradient(circle at 15% 20%, #62a384 0%, transparent 45%), radial-gradient(circle at 85% 80%, #cd9524 0%, transparent 45%)',
        }}
      />
      <div className="relative mx-auto max-w-5xl px-4 sm:px-8">
        <Reveal className="mx-auto max-w-2xl text-center">
          <p className="inline-flex items-center gap-2 rounded-full bg-gold-500/15 px-4 py-1.5 text-xs font-bold tracking-widest text-gold-300">
            <Sparkles className="h-3.5 w-3.5" /> AI TRIP PLANNER
          </p>
          <h2 className="mt-4 font-display text-3xl font-bold text-white sm:text-4xl">
            Plan Your Perfect Siem Reap Trip
          </h2>
          <p className="mt-4 leading-relaxed text-brand-100">
            Answer three quick questions and we will build a day-by-day itinerary from our
            small-group tours — matched to your pace and interests.
          </p>
        </Reveal>

        <Reveal delay={120} className="mt-12">
          <div className="rounded-3xl bg-white p-6 shadow-2xl sm:p-10">
            {step === 0 && (
              <div className="animate-fade-in">
                <h3 className="font-display text-xl font-bold text-brand-900">How many days do you have?</h3>
                <div className="mt-6 grid grid-cols-2 gap-3 sm:grid-cols-4">
                  {[1, 2, 3, 4].map((d) => (
                    <button
                      key={d}
                      onClick={() => setPrefs({ ...prefs, days: d })}
                      className={`rounded-2xl border-2 py-6 text-center transition-all ${prefs.days === d
                          ? 'border-brand-600 bg-brand-50 text-brand-800 shadow-md'
                          : 'border-clay-100 text-clay-600 hover:border-brand-200'
                        }`}
                    >
                      <span className="block font-display text-3xl font-bold">{d}</span>
                      <span className="text-xs font-medium">{d === 1 ? 'day' : 'days'}</span>
                    </button>
                  ))}
                </div>
                <div className="mt-6">
                  <label className="mb-1.5 block text-xs font-semibold text-clay-700">
                    Traveling party
                  </label>
                  <select
                    value={prefs.travelers}
                    onChange={(e) => setPrefs({ ...prefs, travelers: Number(e.target.value) })}
                    className={inputClass}
                  >
                    {[1, 2, 3, 4, 5, 6, 7, 8, 9, 10].map((n) => (
                      <option key={n} value={n}>
                        {n} {n === 1 ? 'traveler' : 'travelers'}
                      </option>
                    ))}
                  </select>
                </div>
                <NextButton onClick={() => setStep(1)} label="Continue" />
              </div>
            )}

            {step === 1 && (
              <div className="animate-fade-in">
                <h3 className="font-display text-xl font-bold text-brand-900">What interests you most?</h3>
                <div className="mt-6 grid gap-3 sm:grid-cols-2">
                  {(Object.keys(interestLabels) as Array<keyof typeof interestLabels>).map((key) => (
                    <button
                      key={key}
                      onClick={() => setPrefs({ ...prefs, interest: key })}
                      className={`rounded-2xl border-2 px-5 py-4 text-left text-sm font-semibold transition-all ${prefs.interest === key
                          ? 'border-brand-600 bg-brand-50 text-brand-800 shadow-md'
                          : 'border-clay-100 text-clay-600 hover:border-brand-200'
                        }`}
                    >
                      {interestLabels[key]}
                    </button>
                  ))}
                </div>
                <div className="mt-6">
                  <label className="mb-1.5 block text-xs font-semibold text-clay-700">Your pace</label>
                  <select
                    value={prefs.pace}
                    onChange={(e) => setPrefs({ ...prefs, pace: e.target.value as Preferences['pace'] })}
                    className={inputClass}
                  >
                    {(Object.keys(paceLabels) as Array<keyof typeof paceLabels>).map((k) => (
                      <option key={k} value={k}>
                        {paceLabels[k]}
                      </option>
                    ))}
                  </select>
                </div>
                <NextButton onClick={() => setStep(2)} label="Build my itinerary" back={() => setStep(0)} />
              </div>
            )}

            {step === 2 && (
              <div className="animate-fade-in">
                {saved ? (
                  <div className="py-6 text-center">
                    <CheckCircle2 className="mx-auto h-14 w-14 text-brand-600" />
                    <h3 className="mt-4 font-display text-2xl font-bold text-brand-900">Your plan is saved!</h3>
                    <p className="mx-auto mt-2 max-w-md text-sm text-clay-600">
                      We noted your {prefs.days}-day itinerary. Ready to lock it in? Head to the booking
                      form and reserve each tour — or start over to try a different mix.
                    </p>
                    <div className="mt-6 flex flex-col justify-center gap-3 sm:flex-row">
                      <a
                        href="#booking"
                        className="rounded-full bg-gold-500 px-6 py-3 text-sm font-semibold text-brand-950 transition-colors hover:bg-gold-400"
                      >
                        Book these tours
                      </a>
                      <button
                        onClick={restart}
                        className="rounded-full border border-clay-200 px-6 py-3 text-sm font-semibold text-clay-700 transition-colors hover:bg-clay-50"
                      >
                        Plan another trip
                      </button>
                    </div>
                  </div>
                ) : (
                  <>
                    <div className="flex flex-wrap items-center justify-between gap-3">
                      <h3 className="flex items-center gap-2 font-display text-xl font-bold text-brand-900">
                        <Sparkles className="h-5 w-5 text-gold-500" />
                        Your {prefs.days}-day itinerary
                      </h3>
                      <div className="flex gap-2">
                        <button
                          onClick={regenerate}
                          className="flex items-center gap-1.5 rounded-full border border-clay-200 px-4 py-2 text-xs font-semibold text-clay-700 transition-colors hover:bg-clay-50"
                        >
                          <RotateCcw className="h-3.5 w-3.5" /> Remix
                        </button>
                        <button
                          onClick={() => setStep(1)}
                          className="rounded-full border border-clay-200 px-4 py-2 text-xs font-semibold text-clay-700 transition-colors hover:bg-clay-50"
                        >
                          Edit answers
                        </button>
                      </div>
                    </div>

                    <div className="mt-6 space-y-4">
                      {plan.map((d) => (
                        <div key={d.day} className="rounded-2xl border border-clay-100 bg-clay-50 p-5">
                          <p className="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-gold-700">
                            <CalendarRange className="h-3.5 w-3.5" /> {d.label}
                          </p>
                          <div className="mt-3 space-y-3">
                            {d.tours.map((t) => (
                              <div key={t.slug} className="flex items-center gap-4 rounded-xl bg-white p-3 shadow-sm">
                                <img
                                  src={t.image_url}
                                  alt={t.name}
                                  className="h-14 w-20 shrink-0 rounded-lg object-cover"
                                />
                                <div className="min-w-0 flex-1">
                                  <p className="truncate text-sm font-bold text-brand-900">{t.name}</p>
                                  <p className="flex flex-wrap items-center gap-x-3 text-xs text-clay-500">
                                    <span className="flex items-center gap-1">
                                      <Sun className="h-3 w-3" /> {t.duration.split('(')[0]}
                                    </span>
                                    <span className="flex items-center gap-1">
                                      <MapPin className="h-3 w-3" /> {t.category}
                                    </span>
                                  </p>
                                </div>
                                <span className="shrink-0 font-display text-lg font-bold text-brand-800">
                                  ${t.price}
                                </span>
                              </div>
                            ))}
                          </div>
                        </div>
                      ))}
                    </div>

                    <div className="mt-6 flex flex-wrap items-center justify-between gap-4 rounded-2xl bg-brand-900 px-6 py-4">
                      <div className="text-sm text-brand-100">
                        <p className="flex items-center gap-1.5">
                          <Wallet className="h-4 w-4 text-gold-400" />
                          Tour cost per traveler
                        </p>
                        <p className="mt-0.5 flex items-center gap-1.5 text-xs text-brand-300">
                          <Moon className="h-3 w-3" /> Evenings free — ask us for dinner tips
                        </p>
                      </div>
                      <span className="font-display text-3xl font-bold text-gold-400">${totalPrice}</span>
                    </div>

                    {error && (
                      <div className="mt-4 flex items-center gap-2 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        <AlertCircle className="h-4 w-4 shrink-0" /> {error}
                      </div>
                    )}

                    <button
                      onClick={savePlan}
                      disabled={saving}
                      className="mt-6 flex w-full items-center justify-center gap-2 rounded-full bg-gold-500 py-3.5 font-semibold text-brand-950 shadow-md transition-all hover:bg-gold-400 disabled:cursor-not-allowed disabled:opacity-60"
                    >
                      {saving && <Loader2 className="h-4 w-4 animate-spin" />}
                      {saving ? 'Saving your plan...' : 'Save this itinerary'}
                    </button>
                  </>
                )}
              </div>
            )}
          </div>
        </Reveal>
      </div>
    </section>
  );
}

function NextButton({ onClick, label, back }: { onClick: () => void; label: string; back?: () => void }) {
  return (
    <div className="mt-8 flex items-center justify-between">
      {back ? (
        <button
          onClick={back}
          className="text-sm font-semibold text-clay-500 transition-colors hover:text-clay-800"
        >
          Back
        </button>
      ) : (
        <span />
      )}
      <button
        onClick={onClick}
        className="flex items-center gap-2 rounded-full bg-brand-700 px-7 py-3 text-sm font-semibold text-white transition-all hover:bg-brand-600 hover:shadow-md"
      >
        {label} <ArrowRight className="h-4 w-4" />
      </button>
    </div>
  );
}
