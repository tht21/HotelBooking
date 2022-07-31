<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Models\Room;
use App\Repositories\Interfaces\RoomTypeRepositoryInterface;
use App\Services\Interfaces\FloorServiceInterface;
use App\Services\Interfaces\RoomServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
        $this->authorize('viewAny', Room::class);
        $rooms = $this->roomService->getAll($request);
        $param = [
            'rooms' => $rooms
        ];
        return view("admin.room.index",$param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Room::class);
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
        $this->authorize('update', $room);
//        foreach ($room->room_booking as $item){
//            dd($item->room_id);
//        }


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
            $room = $this->roomService->findById($id);
            if ($room->status === '1') {
                Session::flash('success', 'Không thể xóa phòng khách đã đặt');
            } else {
                $this->roomService->destroy($id);
            }
            return redirect()->route('rooms.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('rooms.index')->with('error', 'Xóa  phòng không thành công');
        }
    }

    public function trashedItems()
    {
        // dd($request);
        $rooms = $this->roomService->trashedItems();
        //    dd($rooms);
        $params = [
            'rooms' => $rooms,
        ];
        return view('admin.room.trash', $params);
    }

    public function restore($id)
    {
        try {
            $this->roomService->restore($id);
            return redirect()->route('rooms.trash')->with('success', 'Khôi phục thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('rooms.trash')->with('success', 'Khôi phục thành công');
        }
    }

    public function force_destroy($id)
    {
        //dd($this->roomService->force_destroy($id));
        try {
            $room = $this->roomService->force_destroy($id);
            return redirect()->route('rooms.trash')->with('success' . 'Xóa thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('rooms.trash')->with('error', 'Xóa không thành công');
        }
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $rooms = $this->roomService->getAll($request);
            if ($rooms) {
                foreach ($rooms as $key => $room) {
                    $output .= '<tr>
                    <td>' . $room->id . '</td>
                    <td>' . $room->image_path . '</td>
                    <td>' . $room->price . '</td>
                    <td>' . $room->room_type->name . '</td>
                      <td>' . $room->status . '</td>
                    </tr>';
                }
            }
            return Response($output);
        }
    }
}
