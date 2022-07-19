<?php

namespace App\Http\Controllers;


use App\Services\Interfaces\RoomTypeServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoomTypeController extends Controller
{
    protected $roomTypeService;
    public function __construct(RoomTypeServiceInterface $roomTypeService)
    {
        $this->roomTypeService = $roomTypeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roomtypes = $this->roomTypeService->getAll($request);
        $params = [
            "roomtypes" => $roomtypes,
        ];
        return view('admin.roomType.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roomType.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $roomtype = $this->roomTypeService->create($request);
            // dd($request);
            return redirect()->route('roomtype.index')->with('success', ' Thêm loại phòng ' . $request->name . ' thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('roomtype.index')->with('error', ' Thêm loại phòng ' . $request->name . ' không thành công ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomtype = $this->roomTypeService->findById($id);
        $params = [
            'roomtype' => $roomtype,
        ];
        return view('admin.roomType.edit',$params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->roomTypeService->update($request, $id);
            return redirect()->route('roomtype.index')->with('success', 'Sửa loại phòng' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('roomtype.index')->with('error', 'Sửa loại phòng' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $roomtype = $this->roomTypeService->destroy($id);
            return redirect()->route('roomtype.index')->with('success', ' Xóa loại phòng thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('roomtype.index')->with('error', 'Xóa loại phòng không thành công');
        }
    }

    public function trashedItems()
    {
        // dd($request);
        $roomtypes = $this->roomTypeService->trashedItems();
        // dd($items);
        $params = [
            'roomtypes' => $roomtypes,
        ];
        return view('admin.roomType.trash', $params);
    }

    public function restore($id)
    {
        try {
            $this->roomTypeService->restore($id);
            return redirect()->route('roomtype.trash')->with('success', 'Khôi phục thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('roomtype.trash')->with('success', 'Khôi phục thành công');
        }
    }

    public function force_destroy($id)
    {
        try {
            $roomtype = $this->roomTypeService->force_destroy($id);

            return redirect()->route('roomtype.trash')->with('success', 'Xóa' . ' ' . $roomtype->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('roomtype.trash')->with('error', 'Xóa' . ' ' . $roomtype->name . ' ' .  'không thành công');
        }
    }
}
