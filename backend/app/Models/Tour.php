<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tour extends Model
{
    use HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'slug',
        'name',
        'tagline',
        'description',
        'price',
        'duration',
        'category',
        'group_size',
        'tour_type',
        'price_basis',
        'capacity_note',
        'vehicle_options',
        'distance_km',
        'difficulty_level',
        'starting_time',
        'bicycle_type',
        'tour_guide',
        'hotel_pickup',
        'included_meals',
        'included_drinks',
        'meeting_point',
        'available_seats',
        'booking_requirements',
        'itinerary',
        'included_items',
        'excluded_items',
        'image_url',
        'highlights',
        'featured',
        'sort_order',
    ];

    protected $casts = [
        'highlights' => 'array',
        'featured' => 'boolean',
        'price' => 'integer',
        'group_size' => 'integer',
        'vehicle_options' => 'array',
        'distance_km' => 'decimal:2',
        'hotel_pickup' => 'boolean',
        'included_meals' => 'array',
        'included_drinks' => 'array',
        'itinerary' => 'array',
        'included_items' => 'array',
        'excluded_items' => 'array',
        'available_seats' => 'integer',
        'sort_order' => 'integer',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
