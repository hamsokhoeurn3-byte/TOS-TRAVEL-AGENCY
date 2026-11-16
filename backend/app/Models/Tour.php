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
        'sort_order' => 'integer',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
