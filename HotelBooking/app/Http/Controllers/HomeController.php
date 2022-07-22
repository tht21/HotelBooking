<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customers;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $room_count = Room::count();
        $roomtype_vip = RoomType::where('name', '=', 'vip')->count();
        $user_count = User::where('user_group_id', '!=', 1 )->count();
        $customer_count = Customers::count();
        $empty_room = Room::where('status','=','còn phòng')->count();
        $busy_room = Room::where('status','=','hết phòng')->count();
        $user_group_count = UserGroup::count();
        $roomtype_count= RoomType::where('name', '=', 'Thường')->count();
        $order_room = Booking::count();

        $param =[
            'room_count' => $room_count,
            'roomtype_count' => $roomtype_count,
            'user_count' => $user_count,
            'customer_count' => $customer_count,
            'user_group_count' => $user_group_count,
            'empty_room' => $empty_room,
            'busy_room'=>$busy_room,
            'roomtype_vip'=>$roomtype_vip,
            'order_room'=>$order_room,
        ];

        return view('admin.home.index',$param);
    }
}
