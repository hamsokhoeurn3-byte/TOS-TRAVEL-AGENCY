import { useEffect, useState } from 'react';
import Header from './components/Header';
import Hero from './components/Hero';
import Tours from './components/Tours';
import Transportation, { type BicycleRental, type PrivateCarService, type RentalBike, type TukTukService } from './components/Transportation';
import AboutUs from './components/AboutUs';
import WhyUs from './components/WhyUs';
import Reviews from './components/Reviews';
import Faq from './components/Faq';
import Stay from './components/Stay';
import TripPlanner from './components/TripPlanner';
import Booking, { type BookingCategory } from './components/Booking';
import Footer from './components/Footer';
import type { Tour, Hotel } from './lib/types';
import { API_URL } from './lib/api';
import { Loader2, AlertCircle } from 'lucide-react';


export default function App() {
  const [tours, setTours] = useState<Tour[]>([]);
  const [hotels, setHotels] = useState<Hotel[]>([]);
  const [selectedTour, setSelectedTour] = useState<Tour | null>(null);
  const [stayHotel, setStayHotel] = useState<Hotel | null>(null);
  const [stayRoomType, setStayRoomType] = useState('');
  const [selectedRental, setSelectedRental] = useState<RentalBike | null>(null);
  const [selectedBicycle, setSelectedBicycle] = useState<BicycleRental | null>(null);
  const [selectedTukTuk, setSelectedTukTuk] = useState<TukTukService | null>(null);
  const [selectedPrivateCar, setSelectedPrivateCar] = useState<PrivateCarService | null>(null);
  const [bookingCategory, setBookingCategory] = useState<BookingCategory>('tours');
  const [loading, setLoading] = useState(true);
  const [failed, setFailed] = useState(false);
  const activityTours = tours.filter((tour) => tour.category !== 'transfer');

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

  function bookStay(hotel: Hotel, roomType: string) {
    setStayHotel(hotel);
    setStayRoomType(roomType);
    setBookingCategory('accommodation');
    scrollToBooking();
  }

  function bookRental(rental: RentalBike) {
    setSelectedRental(rental);
    setSelectedBicycle(null);
    setSelectedTukTuk(null);
    setSelectedPrivateCar(null);
    setBookingCategory('transportation');
    scrollToBooking();
  }

  function bookBicycle(bicycle: BicycleRental) {
    setSelectedBicycle(bicycle);
    setSelectedRental(null);
    setSelectedTukTuk(null);
    setSelectedPrivateCar(null);
    setBookingCategory('transportation');
    scrollToBooking();
  }

  function bookTukTuk(service: TukTukService) {
    setSelectedTukTuk(service);
    setSelectedPrivateCar(null);
    setSelectedRental(null);
    setSelectedBicycle(null);
    setBookingCategory('transportation');
    scrollToBooking();
  }

  function requestPrivateCar(service: PrivateCarService) {
    setSelectedRental(null);
    setSelectedBicycle(null);
    setSelectedTukTuk(null);
    setSelectedPrivateCar(service);
    setBookingCategory('transportation');
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
            <Tours tours={activityTours} onBook={bookTour} />
            <Transportation onBookRental={bookRental} onBookBicycle={bookBicycle} onBookTukTuk={bookTukTuk} onRequestPrivateCar={requestPrivateCar} />
            <TripPlanner tours={activityTours} hotels={hotels} />
            <Reviews />
            <Faq />
            <AboutUs />
            <WhyUs />

            <Booking
              tours={activityTours}
              hotels={hotels}
              category={bookingCategory}
              onCategoryChange={setBookingCategory}
              selectedTour={selectedTour}
              onChangeTour={changeTour}
              selectedHotel={stayHotel}
              selectedRoomType={stayRoomType}
              onChangeHotel={setStayHotel}
              selectedRental={selectedRental}
              selectedBicycle={selectedBicycle}
              selectedTukTuk={selectedTukTuk}
              selectedPrivateCar={selectedPrivateCar}
            />

          </>
        )}
      </main>

      <Footer />
      <a
        href="https://wa.me/85587762902"
        target="_blank"
        rel="noreferrer"
        aria-label="Chat with us on WhatsApp"
        className="fixed bottom-5 right-5 z-[60] inline-flex items-center gap-2 rounded-full bg-[#25D366] px-4 py-3 text-sm font-semibold text-white shadow-lg transition-transform hover:scale-105 hover:bg-[#20bd5a] sm:bottom-6 sm:right-8"
      >
        <svg viewBox="0 0 24 24" aria-hidden="true" className="h-6 w-6 fill-current">
          <path d="M20.52 3.48A11.83 11.83 0 0 0 12.1 0C5.55 0 .22 5.33.22 11.88c0 2.1.55 4.15 1.6 5.96L.12 24l6.3-1.65a11.9 11.9 0 0 0 5.68 1.45h.01c6.55 0 11.88-5.33 11.88-11.88 0-3.17-1.23-6.15-3.47-8.44ZM12.1 21.78h-.01a9.88 9.88 0 0 1-5.03-1.38l-.36-.21-3.74.98 1-3.65-.24-.38a9.85 9.85 0 0 1-1.52-5.26c0-5.46 4.45-9.91 9.92-9.91a9.85 9.85 0 0 1 7.01 2.91 9.84 9.84 0 0 1 2.9 7.01c0 5.47-4.45 9.9-9.93 9.9Zm5.44-7.42c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.47-2.4-1.5-.89-.8-1.49-1.78-1.66-2.08-.18-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.38-.03-.53-.07-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.28.3-1.05 1.02-1.05 2.49s1.08 2.89 1.23 3.09c.15.2 2.12 3.23 5.13 4.53.72.31 1.28.5 1.72.63.72.23 1.37.2 1.89.12.58-.09 1.76-.72 2.01-1.42.25-.7.25-1.3.17-1.42-.08-.13-.28-.2-.58-.35Z" />
        </svg>
        <span>WhatsApp</span>
      </a>
    </div>
  );
}
