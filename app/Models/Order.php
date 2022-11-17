<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // order status
    const   PENDING = 1,
            RECEIVED = 2,
            SHIPPED = 3,
            DELIVERED = 4,
            CANCELED = 5;

    // shipping types
    const   DELIVERY = 1,
            PICKUP = 2;
}
