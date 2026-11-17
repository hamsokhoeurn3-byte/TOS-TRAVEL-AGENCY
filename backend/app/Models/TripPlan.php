<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class TripPlan extends Model
{
    use HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'trip_name',
        'days',
        'total_price',
        'travelers',
        'pace',
    ];

    protected function casts(): array
    {
        return [
            'days' => 'array',
            'total_price' => 'integer',
            'travelers' => 'integer',
        ];
    }
}
