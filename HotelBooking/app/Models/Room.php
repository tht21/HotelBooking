<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function room_type()
    {
        return $this->belongsTo(RoomType::class, 'room_types_id');
    }

    public function room_image()
    {
        return $this->hasMany(Room_image::class, 'room_id');
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }
}
