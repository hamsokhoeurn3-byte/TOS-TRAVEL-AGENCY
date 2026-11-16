<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StayBooking extends Model
{
    use HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'hotel_id',
        'room_type',
        'check_in',
        'check_out',
        'guests',
        'rooms',
        'full_name',
        'email',
        'phone',
        'message',
    ];

    protected function casts(): array
    {
        return [
            'check_in' => 'date:Y-m-d',
            'check_out' => 'date:Y-m-d',
            'guests' => 'integer',
            'rooms' => 'integer',
        ];
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
}
