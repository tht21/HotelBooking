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
}
