<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_groups extends Model
{
    use HasFactory;
    protected $table = 'user_groups';
    protected $fillable = [
        'id','name'
    ];
    public function User()
    {
        return $this->hasMany(User::class,'user_group_id','id');
    }
    public function roles() {
        return $this->belongsToMany(Role::class,'user_group_roles','user_groups_id','role_id');
    }
}