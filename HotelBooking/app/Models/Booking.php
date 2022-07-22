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

    public function roombooking()
    {
        return $this->hasMany(RoomBooking::class);
    }

    public function room()
    {
        return $this->belongsToMany(Room::class, 'room_bookings');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
