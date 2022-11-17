<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at', 'status'];

    // order status
    const   PENDING = 1,
            RECEIVED = 2,
            SHIPPED = 3,
            DELIVERED = 4,
            CANCELED = 5;

    // shipping types
    const   DELIVERY = 1,
            PICKUP = 2;

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
