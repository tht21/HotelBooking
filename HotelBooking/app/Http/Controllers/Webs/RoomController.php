<?php

namespace App\Http\Controllers\Webs;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\BookingRoomServiceInterface;
use App\Services\Interfaces\RoomServiceInterface;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $roomService;
    public function __construct(RoomServiceInterface $roomService)
    {
        $this->roomService = $roomService;
    }
    public function index(Request $request){
        $rooms = $this->roomService->getAll($request);
        $param = [
            'rooms' => $rooms,
        ];
        return view('web.room',$param);
    }
}
