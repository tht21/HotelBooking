<?php

namespace App\Http\Controllers\Webs;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\RoomTypeRepositoryInterface;
use App\Services\Interfaces\FloorServiceInterface;
use App\Services\Interfaces\RoomServiceInterface;
use Illuminate\Http\Request;

class RoomDetailController extends Controller
{
    protected $roomService;
    protected $floorService;
    protected $roomTypeService;


    public function __construct(RoomServiceInterface $roomService, FloorServiceInterface $floorService, RoomTypeRepositoryInterface $roomTypeService)
    {
        $this->roomService = $roomService;
        $this->floorService = $floorService;
        $this->roomTypeService = $roomTypeService;
    }

    public function index($id)
    {
        $rooms = $this->roomService->findById($id);
        $id_room_type = $rooms->room_types_id;
        $roomTypes = $this->roomService->getAllByRoomType($id_room_type);
        $floors = $this->floorService->findById($id);
        $param = [
            'rooms' => $rooms,
            'roomTypes' => $roomTypes,
            'floors' => $floors,
        ];
        return view('web.roomDetail', $param);
    }
}
