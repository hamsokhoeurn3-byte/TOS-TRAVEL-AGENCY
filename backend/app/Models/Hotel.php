<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'slug',
        'name',
        'area',
        'description',
        'price_level',
        'price_from',
        'rating',
        'style',
        'image_url',
        'room_types',
        'website_url',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'room_types' => 'array',
            'rating' => 'float',
            'price_from' => 'integer',
            'sort_order' => 'integer',
        ];
    }

    public function stayBookings(): HasMany
    {
        return $this->hasMany(StayBooking::class);
    }
}
