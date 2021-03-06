<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use App\Repositories\Interfaces\RoomTypeRepositoryInterface;
use App\Services\Interfaces\FloorServiceInterface;
use App\Services\Interfaces\RoomServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = $this->roomService->getAll($request);
        return view("admin.room.index", compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $floors = $this->floorService->getAll($request);
        $roomTypes = $this->roomTypeService->getAll($request);
        $param = [
            'floors' => $floors,
            'roomTypes' => $roomTypes,
        ];
        return view('admin.room.create', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreRoomRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        try {
            $this->roomService->create($request);
            return redirect()->route('rooms.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = $this->roomService->findById($id);
        $floors = $this->floorService->getAll($id);
        $roomTypes = $this->roomTypeService->getAll($id);
        $param = [
            'floors' => $floors,
            'roomTypes' => $roomTypes,
            'room' => $room,
        ];
        return view('admin.room.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateRoomRequest $request
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->roomService->update($request, $id);
            return redirect()->route('rooms.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('rooms.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->roomService->destroy($id);
            return redirect()->route('rooms.index')->with('success', ' X??a  ph??ng th??nh c??ng ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('rooms.index')->with('error', 'X??a  ph??ng kh??ng th??nh c??ng');
        }
    }

    public function trashedItems()
    {
        // dd($request);
        $rooms = $this->roomService->trashedItems();
        // dd($items);
        $params = [
            'rooms' => $rooms,
        ];
        return view('admin.room.trash', $params);
    }

    public function restore($id)
    {
        try {
            $this->roomService->restore($id);
            return redirect()->route('rooms.trash')->with('success', 'Kh??i ph???c th??nh c??ng');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('rooms.trash')->with('success', 'Kh??i ph???c th??nh c??ng');
        }
    }

    public function force_destroy($id)
    {
        //dd($this->roomService->force_destroy($id));
        try {
            $room = $this->roomService->force_destroy($id);
            return redirect()->route('rooms.trash')->with('success' . 'X??a th??nh c??ng');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('rooms.trash')->with('error', 'X??a kh??ng th??nh c??ng');
        }
    }
}
