<?php

namespace App\Http\Controllers\Webs;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\RoomServiceInterface;
use App\Services\Interfaces\RoomTypeServiceInterface;
use App\Services\RoomTypeService;
use Illuminate\Http\Request;

class RoomWebController extends Controller
{
    protected $roomService;
    protected $roomTypeService;
    public function __construct(RoomServiceInterface $roomService, RoomTypeServiceInterface $roomTypeService)
    {
        $this->roomService = $roomService;
        $this->roomTypeService = $roomTypeService;
    }
    public function index(Request $request){
        $rooms = $this->roomService->search($request);
        $roomTypes = $this->roomTypeService->getAll($request);
        $param = [
            'rooms' => $rooms,
            'roomtypes' => $roomTypes
        ];
        return view('web.room',$param);
    }

}
