<?php

namespace App\Http\Controllers;
use App\Exports\BookingExport;
use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Http\Requests\UpdateBookingRequest;
use App\Services\Interfaces\BookingRoomServiceInterface;
use App\Services\Interfaces\CustomerServiceInterface;
use App\Services\Interfaces\RoomServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

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
    public function store(StoreBookingRequest $request)
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
    public function edit($id)
    {
        $bookingrooms = $this->bookingRoomService->findById($id);
        $rooms = $this->roomService->getAll($id);
        $users = $this->userService->getAll($id);
        $customers = $this->customerService->getAll($id);

        $param = [
            'bookingrooms' => $bookingrooms,
            'rooms' => $rooms,
            'users' => $users,
            'customers' => $customers
        ];
        return view('admin.bookingRoom.edit', $param);
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
    public function destroy($id)
    {
        try {
            $this->bookingRoomService->destroy($id);
            // return response()->json(['data'=>'removed'],200);
            return redirect()->route('bookingrooms.list');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('bookingrooms.list');
        }
    }

    public function trashedItems()
    {
        $bookingrooms = $this->bookingRoomService->trashedItems();
        //   dd($bookingrooms);
        $params = [
            'bookingrooms' => $bookingrooms,
        ];
        return view('admin.bookingRoom.trash', $params);
    }

    public function restore($id)
    {
        try {
            $this->bookingRoomService->restore($id);
            return redirect()->route('bookingrooms.trash')->with('success', 'Khôi phục thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('bookingrooms.trash')->with('success', 'Khôi phục thành công');
        }
    }

    public function force_destroy($id)
    {
        //dd($this->roomService->force_destroy($id));
        try {
            $room = $this->bookingRoomService->force_destroy($id);
            return redirect()->route('bookingrooms.trash');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('bookingrooms.trash');
        }
    }

    public function export()
    {
        return FacadesExcel::download(new BookingExport, 'Booking.xlsx');
    }
//    public function available_room(Request $request,$checkin_date){
//        $rooms=DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");
//        return DB::table('customers')
//            ->join('bookings', 'bookings.customer_id', '=', 'customers.id')
//            ->join('room_bookings', 'bookings.id', '=', 'room_bookings.booking_id')
//            ->join('rooms', 'room_bookings.room_id', '=', 'rooms.id')
//            ->select('bookings.id','customers.name as customer_name', 'customers.phone', 'rooms.name', 'rooms.price', 'bookings.from_date', 'bookings.to_date', 'bookings.limit_people')
//            ->get();
//
//        return response()->json($checkin_date);
//    }
}
