<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function room()
    {
        return $this->belongsToMany(Room::class, 'room_bookings', 'room_id', 'booking_id')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

}
