<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'category',
        'service_name',
        'service_date',
        'guests',
        'full_name',
        'email',
        'phone',
        'pickup_location',
        'message',
        'total_price',
        'status',
        'identity_document_paths',
    ];

    protected function casts(): array
    {
        return [
            'service_date' => 'date:Y-m-d',
            'guests' => 'integer',
            'total_price' => 'decimal:2',
            'identity_document_paths' => 'array',
        ];
    }
}
