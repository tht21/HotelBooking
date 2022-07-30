<?php

namespace App\Http\Controllers\Webs;

use App\Models\Booking;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Services\Interfaces\BookingRoomServiceInterface;
use App\Services\Interfaces\CheckoutServiceInterface;
use App\Services\Interfaces\RoomServiceInterface;
use App\Services\Interfaces\RoomTypeServiceInterface;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Log;

class BookingRoomController extends Controller
{
    protected $roomService;
    protected $roomTypeService;
    protected $bookingRoomService;
    protected $checkoutService;
    public function __construct(RoomServiceInterface $roomService, RoomTypeServiceInterface $roomTypeService, BookingRoomServiceInterface $bookingRoomService, CheckoutServiceInterface $checkoutService)
    {
        $this->roomService = $roomService;
        $this->roomTypeService = $roomTypeService;
        $this->bookingRoomService = $bookingRoomService;
        $this->checkoutService = $checkoutService;
    }
    public function index($id)
    {
        $bookings = $this->roomService->findById($id);
        $param = [
            'bookings' => $bookings
        ];
        return view('web.booking.checkout', $param);
    }

    public function checkout(CheckoutRequest $request, $id)
    {
        $rooms = $this->roomService->findById($id);
        $checks = $request->all();
        $from = new DateTime($request->booking_checkin);
        $to = new DateTime($request->booking_checkout);
        $day = $from->diff($to);
        $days = $day->days;
        // dd($days);
        $param = [
            'checks' => $checks,
            'rooms' => $rooms,
            'total' => $days
        ];
        return view('web.booking.pay', $param);
    }

    public function getpay($id)
    {
        $pays = $this->roomService->findById($id);
        $param = [
            'pays' => $pays
        ];
        return view('web.booking.pay', $param);
    }
}
