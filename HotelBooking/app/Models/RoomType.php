<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomType extends Model
{

    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'id','name','limit_people','created_at','updated_at'
    ];

    protected $table = 'room_types';
}
