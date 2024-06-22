<?php

namespace App;

enum OrderStatus: string
{
    case Pending = 'pending';
    case Shipped = 'shipped';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';

    public static function toArray(): array
    {
        return array_column(OrderStatus::cases(), 'value');
    }
}
