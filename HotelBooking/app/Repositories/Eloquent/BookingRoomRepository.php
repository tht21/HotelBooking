<?php

namespace App\Repositories\Eloquent;

use App\Models\Booking;
use App\Models\RoomBooking;
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
        //dd($request->all());

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
            $status = [
                'status' => 'hết phòng'
            ];
            foreach ($request->room_id as $Item) {
                $roombooking = $object->roombooking()->create([
                    'booking_id' => $object->id,
                    'room_id' => $Item,
                ]);
                // $object->room()->create($status);
            }
            //check status
            foreach ($object->room as $i) {
                $i['status'] = 'hết phòng';
                $a = [
                    'status' => $i['status'],
                ];
            }
            $object->room()->update($a);
            //   $object->room()->create($status);
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

    public function update($request, $id)
    {
        //dd($request);
        try {
            DB::beginTransaction();
            $object = $this->model->find($id);

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
            $status = [
                'status' => 'hết phòng'
            ];
            foreach ($request->room_id as $Item) {
                $roombooking = $object->roombooking()->create([
                    'booking_id' => $object->id,
                    'room_id' => $Item,
                ]);
            }
            //check status
            foreach ($object->room as $i) {
                $i['status'] = 'hết phòng';
                $a = [
                    'status' => $i['status'],
                ];
            }
            $object->room()->update($a);
            //   $object->room()->create($status);
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
