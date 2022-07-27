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
        $rooms = $this->roomService->getAll($id);
        $roomTypes = $this->roomTypeService->getAll($id);
        $floors = $this->floorService->getAll($id);
        $param = [
            'rooms' => $rooms,
            'roomTypes' => $roomTypes,
            'floors' => $floors,
        ];
        return view('web.roomDetail', $param);
    }
}
