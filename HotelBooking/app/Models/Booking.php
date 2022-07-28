<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

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

    public function getDateDifferenceWithPlural()
    {
        $day = Helper::getDateDifference($this->check_in, $this->check_out);
        $plural = Str::plural('Day', $day);
        return $day . ' ' . $plural;
    }
}
