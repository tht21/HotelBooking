<?php

namespace App\Repositories\Eloquent;

use App\Models\Booking;
use App\Repositories\Interfaces\BookingRoomInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class BookingRoomRepository extends EloquentRepository implements BookingRoomInterface
{
    public function getModel()
    {
        return Booking::class;
    }

    public function getAll($request)
    {
        $result = $this->model->paginate(10);
        return $result;
    }

    public function create($request)
    {

        try {
            DB::beginTransaction();
            $object = $this->model;
            $dataCustomer = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'cmnd' => $request->cmnd,
                'address' => $request->address
            ];
            $customer = $object->customer()->create($dataCustomer);
            // $object->customer_id = $customer->id;

            $databooking = [
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'limit_people' => $request->limit_people,
                'total_room' => $request->total_room,
                'note' => $request->note,
                'user_id' => $request->user_id,
                'customer_id' => $customer->id,
            ];
//            dd($databooking);
            //  dd( $object);
            $booking = $object->create($databooking);
            // dd($booking->id);
            $dataBookingRoom = [
                'room_id' => $request->room_id,
                'booking_id' => $booking->id,
            ];
            //    dd($dataBookingRoom['booking_id']);
            $object->room_booking()->create($dataBookingRoom);

            DB::commit();
            Session::flash('success', 'Thêm khách hàng ' . ' ' . $request->name . ' ' . 'đặt phòng thành công');
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
            return false;
        }

        return $object;
    }

}
