<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Services\Interfaces\BookingRoomServiceInterface;
use App\Services\Interfaces\RoomServiceInterface;
use Illuminate\Support\Facades\Request;

class BookingController extends Controller
{
    protected $bookingRoomService;
    protected $roomService;

    public function __construct(BookingRoomServiceInterface $bookingRoomService, RoomServiceInterface $roomService)
    {
        $this->bookingRoomService = $bookingRoomService;
        $this->roomService = $roomService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bookingrooms = $this->bookingRoomService->getAll($request);

        $rooms = $this->roomService->getAll($request);
        $param = [
            'bookingrooms' => $bookingrooms,
            'rooms' => $rooms,
        ];
        return view("admin.bookingRoom.index", $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreBookingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $bookingrooms = $this->bookingRoomService->getAll($request);
        $rooms = $this->roomService->getAll($request);
        $param = [
            'bookingrooms' => $bookingrooms,
            'rooms' => $rooms,
        ];
        return view("admin.bookingRoom.list", $param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBookingRequest $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
