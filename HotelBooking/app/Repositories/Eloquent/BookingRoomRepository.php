<?php

namespace App\Repositories\Eloquent;

use App\Models\Booking;
use App\Models\Room;
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
            $dataBooking = [
                'customer_id' => $request->customer_id,
                'limit_people' => $request->limit_people,
                'total_room' => $request->total_room,
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'note' => $request->note,
                'user_id' => $request->user_id,
            ];
            $object = $object->create($dataBooking);
            // dd();

            // dd($request);
            $param = [
                'booking_id' => $object->id,
                'room_id' => $request->room_id,
            ];
            $object->roombooking()->create($param);
            DB::commit();
            Session::flash('success', 'Thêm khách đặt phòng thành công');
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
            return false;
        }
        return $object;
    }

}
