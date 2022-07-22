<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    use HasFactory;

    protected $table = 'room_bookings';
    protected $fillable = [
        'id', 'room_id', 'booking_id'
    ];

    function bookings()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'id');
    }

    function roomss()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
