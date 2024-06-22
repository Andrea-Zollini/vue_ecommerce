<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'user_id',
        'product_id',
        'shipment_method_id',
        'order_date',
        'delivery_date',
        'total',
        'status',
    ];

    protected $casts = [
        'total' => 'float',
        'status' => 'string',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function shipmentMethod(): BelongsTo
    {
        return $this->belongsTo(Shipment::class);
    }
}
