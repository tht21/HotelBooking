<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_groups extends Model
{
    use HasFactory;
    protected $table = 'user_groups';
    public function User()
    {
        return $this->hasMany(User::class,'user_group_id','id');
    }
}