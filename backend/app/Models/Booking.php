<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasUuids;

    public $timestamps = false;

    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_CANCELLED = 'cancelled';

    protected $fillable = [
        'tour_id',
        'tour_date',
        'guests',
        'full_name',
        'email',
        'phone',
        'hotel_name',
        'total_price',
        'status',
    ];

    protected $casts = [
        'tour_date' => 'date',
        'guests' => 'integer',
        'total_price' => 'integer',
    ];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }
}
