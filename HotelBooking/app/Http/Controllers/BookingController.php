<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Http\Requests\UpdateBookingRequest;
use App\Services\Interfaces\BookingRoomServiceInterface;
use App\Services\Interfaces\CustomerServiceInterface;
use App\Services\Interfaces\RoomServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    protected $bookingRoomService;
    protected $roomService;
    protected $userService;
    protected $customerService;

    public function __construct(BookingRoomServiceInterface $bookingRoomService, RoomServiceInterface $roomService, UserServiceInterface $userService, CustomerServiceInterface $customerService)
    {
        $this->bookingRoomService = $bookingRoomService;
        $this->roomService = $roomService;
        $this->userService = $userService;
        $this->customerService = $customerService;

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
    public function create(Request $request)
    {

        $bookingrooms = $this->bookingRoomService->getAll($request);
        $rooms = $this->roomService->getAll($request);
        $users = $this->userService->getAll($request);
        $customers = $this->customerService->getAll($request);

        $param = [
            'bookingrooms' => $bookingrooms,
            'rooms' => $rooms,
            'users' => $users,
            'customers' => $customers
        ];
        return view("admin.bookingRoom.add", $param);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreBookingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->bookingRoomService->create($request);
            return redirect()->route('bookingrooms.list');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
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
//        print_r($bookingrooms);die;
        $rooms = $this->roomService->getAll($request);
        // dd($bookingrooms);
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
