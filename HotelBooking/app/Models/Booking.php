<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $fillable = [
        'id', 'from_date', 'to_date', 'limit_people', 'total_room', 'note', 'customer_id', 'user_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function room()
    {
        return $this->belongsToMany(Room::class, 'room_bookings', 'room_id', 'booking_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function room_booking()
    {
        return $this->belongsTo(RoomBooking::class, 'booking_id', 'id');
    }
}
