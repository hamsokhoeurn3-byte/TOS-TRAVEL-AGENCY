import { useEffect, useState } from 'react';
import Header from './components/Header';
import Hero from './components/Hero';
import Tours from './components/Tours';
import Transportation from './components/Transportation';
import AboutUs from './components/AboutUs';
import WhyUs from './components/WhyUs';
import Reviews from './components/Reviews';
import Faq from './components/Faq';
import Stay from './components/Stay';
import TripPlanner from './components/TripPlanner';
import Booking, { type BookingCategory } from './components/Booking';
import Footer from './components/Footer';
import type { Tour, Hotel } from './lib/supabase';
import { API_URL } from './lib/api';
import { Loader2, AlertCircle } from 'lucide-react';


export default function App() {
  const [tours, setTours] = useState<Tour[]>([]);
  const [hotels, setHotels] = useState<Hotel[]>([]);
  const [selectedTour, setSelectedTour] = useState<Tour | null>(null);
  const [stayHotel, setStayHotel] = useState<Hotel | null>(null);
  const [bookingCategory, setBookingCategory] = useState<BookingCategory>('tours');
  const [loading, setLoading] = useState(true);
  const [failed, setFailed] = useState(false);

  useEffect(() => {
    async function load() {
      try {
        const [toursResponse, hotelsResponse] = await Promise.all([
          fetch(`${API_URL}/tours`),
          fetch(`${API_URL}/hotels`),
        ]);

        if (!toursResponse.ok || !hotelsResponse.ok) {
          throw new Error('Could not load data from Laravel API.');
        }

        const toursResult = await toursResponse.json();
        const hotelsResult = await hotelsResponse.json();

        if (
          !toursResult.success ||
          !Array.isArray(toursResult.data) ||
          !hotelsResult.success ||
          !Array.isArray(hotelsResult.data)
        ) {
          throw new Error('Invalid Laravel API response.');
        }

        setTours(toursResult.data as Tour[]);
        setHotels(hotelsResult.data as Hotel[]);
      } catch (error) {
        console.error('Loading error:', error);
        setFailed(true);
      } finally {
        setLoading(false);
      }
    }

    load();
  }, []);

  function scrollToBooking() {
    document.getElementById('booking')?.scrollIntoView({
      behavior: 'smooth',
    });
  }

  function bookTour(tour: Tour) {
    setSelectedTour(tour);
    setBookingCategory('tours');
    scrollToBooking();
  }

  function bookStay(hotel: Hotel) {
    setStayHotel(hotel);
    setBookingCategory('accommodation');
    scrollToBooking();
  }

  function changeTour(slug: string) {
    setSelectedTour(tours.find((tour) => tour.slug === slug) ?? null);
  }

  return (
    <div className="min-h-screen bg-white">
      <Header />
      <Hero />

      <main>
        {loading ? (
          <div className="flex items-center justify-center py-32 text-brand-700">
            <Loader2 className="h-8 w-8 animate-spin" />
          </div>
        ) : failed ? (
          <div
            className="mx-auto flex max-w-md items-center gap-3 rounded-2xl border border-red-200 bg-red-50 px-6 py-5 text-sm text-red-700"
            style={{ marginTop: '6rem' }}
          >
            <AlertCircle className="h-5 w-5 shrink-0" />
            Tours and hotels could not be loaded. Please refresh the page to try again.
          </div>
        ) : (
          <>
            <Stay hotels={hotels} onStay={bookStay} />
            <Tours tours={tours} onBook={bookTour} />
            <Transportation />
            <TripPlanner tours={tours} />
            <Reviews />
            <Faq />
            <AboutUs />
            <WhyUs />

            <Booking
              tours={tours}
              hotels={hotels}
              category={bookingCategory}
              onCategoryChange={setBookingCategory}
              selectedTour={selectedTour}
              onChangeTour={changeTour}
              selectedHotel={stayHotel}
              onChangeHotel={setStayHotel}
            />
          </>
        )}
      </main>

      <Footer />
    </div>
  );
}
