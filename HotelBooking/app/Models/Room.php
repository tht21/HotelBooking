<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = [
        'id', 'name', 'price', 'convenient', 'image_path', 'description', 'status', 'room_types_id', 'floor_id'
    ];

    public function room_image()
    {
        return $this->hasMany(Room_image::class, 'room_id', 'id');
    }

    public function room_type()
    {
        return $this->belongsTo(RoomType::class, 'room_types_id');
    }
}
