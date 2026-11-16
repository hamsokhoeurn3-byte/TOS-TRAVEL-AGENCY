import { Phone, Mail, MapPin, Facebook, Instagram, Twitter, Youtube } from 'lucide-react';

const quickLinks = [
  { label: 'Angkor Sunrise Tour', href: '#tours' },
  { label: 'AI Trip Planner', href: '#planner' },
  { label: 'Transportation', href: '#transportation' },
  { label: 'About Us', href: '#about' },
  { label: 'Where to Stay', href: '#stay' },
  { label: 'Floating Village Tour', href: '#tours' },
  { label: 'Kulen Waterfall Tour', href: '#tours' },
];

const helpLinks = [
  { label: 'About Us', href: '#about' },
  { label: 'Why Choose Us', href: '#why-us' },
  { label: 'Traveler Reviews', href: '#reviews' },
  { label: 'FAQ', href: '#faq' },
  { label: 'Book Now', href: '#booking' },
];

export default function Footer() {
  return (
    <footer id="contact" className="bg-brand-950 text-brand-100">
      <div className="mx-auto max-w-7xl px-4 py-16 sm:px-8">
        <div className="grid gap-12 md:grid-cols-2 lg:grid-cols-4">
          <div>
            <div className="inline-flex rounded-xl bg-white p-2 shadow-md">
              <img
                src="/TOS_Travel_Agency_Logo.png?v=3"
                alt="TOS Travel Agency"
                className="h-16 w-auto object-contain"
              />
            </div>
            <p className="mt-5 flex items-start gap-2 text-sm leading-relaxed text-brand-200">
              <MapPin className="mt-0.5 h-4 w-4 shrink-0 text-gold-400" />
              Sivutha Blvd, Siem Reap, Cambodia 17250
            </p>
            <p className="mt-4 text-sm italic text-brand-300">
              For a memorable trip to Siem Reap, we are your best choice. We offer the best Siem Reap
              tours for a unique experience.
            </p>
          </div>

          <div>
            <h4 className="font-display text-base font-bold text-white">Popular Tours</h4>
            <ul className="mt-5 space-y-3">
              {quickLinks.map((l) => (
                <li key={l.label}>
                  <a href={l.href} className="text-sm text-brand-200 transition-colors hover:text-gold-400">
                    {l.label}
                  </a>
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h4 className="font-display text-base font-bold text-white">Quick Links</h4>
            <ul className="mt-5 space-y-3">
              {helpLinks.map((l) => (
                <li key={l.label}>
                  <a href={l.href} className="text-sm text-brand-200 transition-colors hover:text-gold-400">
                    {l.label}
                  </a>
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h4 className="font-display text-base font-bold text-white">Book Your Holiday</h4>
            <ul className="mt-5 space-y-3 text-sm">
              <li>
                <a href="tel:+85598555518" className="flex items-center gap-2 text-brand-200 hover:text-gold-400">
                  <Phone className="h-4 w-4 text-gold-400" /> +855 (0)98 55 55 18
                </a>
              </li>
              <li>
                <a href="tel:+85578555518" className="flex items-center gap-2 text-brand-200 hover:text-gold-400">
                  <Phone className="h-4 w-4 text-gold-400" /> +855 (0)78 55 55 18
                </a>
              </li>
              <li>
                <a
                  href="mailto:booking@siemreapshuttle.com"
                  className="flex items-center gap-2 text-brand-200 hover:text-gold-400"
                >
                  <Mail className="h-4 w-4 text-gold-400" /> booking@siemreapshuttle.com
                </a>
              </li>
            </ul>
            <h4 className="mt-6 font-display text-base font-bold text-white">Follow Us</h4>
            <div className="mt-3 flex gap-3">
              {[Facebook, Instagram, Twitter, Youtube].map((Icon, i) => (
                <a
                  key={i}
                  href="#top"
                  className="flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-gold-500 hover:text-brand-950"
                  aria-label="Social link"
                >
                  <Icon className="h-4 w-4" />
                </a>
              ))}
            </div>
          </div>
        </div>

        <div className="mt-14 flex flex-col items-center justify-between gap-4 border-t border-white/10 pt-8 text-xs text-brand-300 sm:flex-row">
          <p>Copyright © 2024-2027 System Tos Travel Agency — interactive prototype.</p>
          <p className="flex items-center gap-2">
            <span className="rounded bg-white/10 px-2 py-1 font-semibold text-white">VISA</span>
            <span className="rounded bg-white/10 px-2 py-1 font-semibold text-white">Mastercard</span>
            <span className="rounded bg-white/10 px-2 py-1 font-semibold text-white">ABA</span>
            <span className="rounded bg-white/10 px-2 py-1 font-semibold text-white">Cash</span>
          </p>
        </div>
      </div>
    </footer>
  );
}
