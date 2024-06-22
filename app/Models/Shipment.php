<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipment extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'order_id',
        'tracking_number',
        'ship_date',
        'estimated_delivery',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
