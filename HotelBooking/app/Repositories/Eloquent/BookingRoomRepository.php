<?php

namespace App\Repositories\Eloquent;

use App\Models\Booking;
use App\Repositories\Interfaces\BookingRoomInterface;
use DateTime;
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
        $result = $this->model
            ->join('customers', 'bookings.customer_id', '=', 'customers.id')
            ->select('customers.*', 'bookings.*');
        if (isset($request->id) && $request->id) {
            $id = $request->name;
            $result->where('bookings.id', 'LIKE', '%' . $id . '%')->get();
        }
        if (isset($request->name) && $request->name) {
            $name = $request->name;
            $result->where('customers.name', 'LIKE', '%' . $name . '%')->get();
        }
        if (isset($request->status) && $request->status) {
            $status = $request->status;
            $result->where('bookings.status', 'LIKE', '%' . $status . '%')->get();
        }

        return $result->paginate(6);
    }

    public function getAllBookRoom($request)
    {
        // dd($category_id);
        $result = $this->model
            ->join('customers', 'bookings.customer_id', '=', 'customers.id')
            ->select('*');

        switch ($request) {
            case isset($request->id) && $request->id:
                $result->where('bookings.id', 'LIKE', '%' . $request->id . '%');
                break;
            case isset($request->name) && $request->name:
                $result->where('customers.name', 'LIKE', '%' . $request->name . '%');
                break;
            case isset($request->status) && $request->status:
                $result->where('bookings.status', 'LIKE', '%' . $request->status . '%');
                break;
            default:
                # code...
                break;
        }

        return $result->orderBy('id', 'desc')->paginate(6);
    }


    public function create($request)
    {
        //dd($request->all());

        try {
            DB::beginTransaction();
            $object = $this->model;
            $from = new DateTime($request->from_date);
            $to = new DateTime($request->to_date);
            $day = $from->diff($to);
            $days = $day->days;

            $dataBooking = [
                'customer_id' => $request->customer_id,
                'limit_people' => $request->limit_people,
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'total_room' => $days,
                'note' => $request->note,
                'status' => 0,
                'user_id' => $request->user_id,
            ];
            $object = $object->create($dataBooking);

            foreach ($request->room_id as $Item) {
                $object->roombooking()->create([
                    'booking_id' => $object->id,
                    'room_id' => $Item,
                ]);
                // $object->room()->create($status);
            }
            //check status
            foreach ($object->room as $i) {
                $i['status'] = '1';
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

            foreach ($request->room_id as $Item) {
                $roombooking = $object->roombooking()->create([
                    'booking_id' => $object->id,
                    'room_id' => $Item,
                ]);
            }
            //check status
            foreach ($object->room as $i) {
                $i['status'] = '1';
                $status = [
                    'status' => $i['status'],
                ];
            }
            $object->room()->update($status);
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
