<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trip extends Model
{
    protected $fillable = [
        'user_id', 'driver_id', 'is_started', 'is_complete', 'origin', 'destination', 'destination_name',
        'driver_location'
    ];

    protected function casts(): array
    {
        return [
            'origin' => 'array',
            'destination' => 'array',
            'driver_location' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
}
