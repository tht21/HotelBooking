<?php

namespace App\Http\Controllers\Webs;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Services\Interfaces\BookingRoomServiceInterface;
use App\Services\Interfaces\CheckoutServiceInterface;
use App\Services\Interfaces\CustomerServiceInterface;
use App\Services\Interfaces\RoomServiceInterface;
use App\Services\Interfaces\RoomTypeServiceInterface;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BookingRoomController extends Controller
{
    protected $roomService;
    protected $roomTypeService;
    protected $bookingRoomService;
    protected $checkoutService;
    protected $customerService;

    public function __construct(RoomServiceInterface     $roomService, RoomTypeServiceInterface $roomTypeService, BookingRoomServiceInterface $bookingRoomService,
                                CheckoutServiceInterface $checkoutService, CustomerServiceInterface $customerService)
    {
        $this->roomService = $roomService;
        $this->roomTypeService = $roomTypeService;
        $this->bookingRoomService = $bookingRoomService;
        $this->checkoutService = $checkoutService;
        $this->customerService = $customerService;
    }

    public function addRoom($id)
    {
        $rooms = $this->roomService->findById($id);

        Session::push("cart", $rooms);
        $data = Session::all();
        $param = [
            'datas' => $data,
            'rooms' => $rooms
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

    public function getpay(Request $request)
    {

        try {
            $this->bookingRoomService->addroom($request);
            return redirect()->route('homeweb');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
