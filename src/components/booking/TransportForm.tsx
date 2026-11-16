import { useState, type FormEvent } from 'react';
import { CalendarDays, Users } from 'lucide-react';
import { todayIso } from '@/lib/dates';
import { API_URL } from '@/lib/api';
import {
  BookingField,
  ContactFields,
  ErrorNotice,
  inputClass,
  SubmitButton,
  SuccessCard,
  TotalBar,
  type ContactValues,
} from './BookingFormParts';


const PRICE_PER_VEHICLE = 25;
const GUESTS_PER_VEHICLE = 3;
const MAX_PASSENGERS = 12;
const SERVICE_NAME = 'Private airport & city transfer';

type Form = ContactValues & {
  service_date: string;
  passengers: number;
  pickup_location: string;
};

const emptyForm: Form = {
  service_date: '',
  passengers: 2,
  full_name: '',
  email: '',
  phone: '',
  pickup_location: '',
};

export default function TransportForm() {
  const [form, setForm] = useState<Form>(emptyForm);
  const [status, setStatus] = useState<
    'idle' | 'submitting' | 'done' | 'error'
  >('idle');
  const [errorMsg, setErrorMsg] = useState('');

  const vehicles = Math.max(
    1,
    Math.ceil(form.passengers / GUESTS_PER_VEHICLE)
  );

  const total = PRICE_PER_VEHICLE * vehicles;

  function setField<K extends keyof Form>(key: K, value: Form[K]) {
    setForm((f) => ({ ...f, [key]: value }));
  }

  function reset() {
    setForm(emptyForm);
    setErrorMsg('');
    setStatus('idle');
  }

  async function submit(e: FormEvent) {
    e.preventDefault();

    setStatus('submitting');
    setErrorMsg('');

    try {
      const response = await fetch(`${API_URL}/service-requests`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          Accept: 'application/json',
        },
        body: JSON.stringify({
          category: 'transportation',
          service_name: SERVICE_NAME,
          service_date: form.service_date,
          guests: form.passengers,
          full_name: form.full_name.trim(),
          email: form.email.trim(),
          phone: form.phone.trim(),
          pickup_location: form.pickup_location.trim(),
          message: `${vehicles} vehicle${vehicles > 1 ? 's' : ''}`,
          total_price: total,
        }),
      });

      const result = await response.json();

      if (!response.ok || !result.success) {
        if (result.errors) {
          const firstError = Object.values(result.errors)
            .flat()
            .find((message) => typeof message === 'string');

          throw new Error(
            typeof firstError === 'string'
              ? firstError
              : 'Please check your booking information.'
          );
        }

        throw new Error(
          result.message ||
            'We could not save your request. Please try again.'
        );
      }

      setStatus('done');
    } catch (error) {
      console.error('Transportation booking error:', error);

      setErrorMsg(
        error instanceof Error
          ? error.message
          : 'Unable to connect to the server. Please try again.'
      );

      setStatus('error');
    }
  }

  if (status === 'done') {
    return (
      <SuccessCard
        title="Transfer request received!"
        message={
          <>
            Thank you, {form.full_name.split(' ')[0] || 'traveler'}. We will
            confirm your pickup from{' '}
            <strong>{form.pickup_location.trim() || 'your location'}</strong>{' '}
            by email at {form.email} shortly.
          </>
        }
        onReset={reset}
        resetLabel="Make another request"
      />
    );
  }

  return (
    <form onSubmit={submit} className="space-y-5">
      <div className="grid gap-5 sm:grid-cols-2">
        <BookingField
          label={
            <span className="inline-flex items-center gap-1">
              <CalendarDays className="h-3.5 w-3.5" />
              Travel date
            </span>
          }
        >
          <input
            type="date"
            required
            min={todayIso()}
            value={form.service_date}
            onChange={(e) => setField('service_date', e.target.value)}
            className={inputClass}
          />
        </BookingField>

        <BookingField
          label={
            <span className="inline-flex items-center gap-1">
              <Users className="h-3.5 w-3.5" />
              Passengers (max {MAX_PASSENGERS})
            </span>
          }
        >
          <input
            type="number"
            required
            min={1}
            max={MAX_PASSENGERS}
            value={form.passengers}
            onChange={(e) => setField('passengers', Number(e.target.value))}
            className={inputClass}
          />
        </BookingField>
      </div>

      <ContactFields
        values={form}
        onChange={(key, value) => setField(key, value)}
      />

      <BookingField label="Pickup / drop-off location">
        <input
          type="text"
          required
          placeholder="Tell us your location"
          value={form.pickup_location}
          onChange={(e) => setField('pickup_location', e.target.value)}
          className={inputClass}
        />
      </BookingField>

      <TotalBar
        label={`$${PRICE_PER_VEHICLE} × ${vehicles} vehicle${vehicles > 1 ? 's' : ''} (up to ${GUESTS_PER_VEHICLE} guests each)`}
        amount={total}
      />

      {status === 'error' && <ErrorNotice message={errorMsg} />}

      <SubmitButton
        submitting={status === 'submitting'}
        label="Request Transfer — Pay Later"
        submittingLabel="Sending request..."
      />
    </form>
  );
}
