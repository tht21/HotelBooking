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
        //dd($request->all());

        try {
            DB::beginTransaction();
            $object = $this->model;

            // if($object){}
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
                // dd($a);
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

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $object = $this->model->find($id);
            foreach ($object->room as $i) {
                $i['status'] = 'còn phòng';
                $a = [
                    'status' => $i['status'],
                ];
                // dd($a);
            }
            $object->room()->update($a);
            $object->delete();
            $object->roombooking()->delete();
            DB::commit();
            Session::flash('success', 'Khách hàng hủy đặt hàng thành công');
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
            return false;
        }
        return $object;
    }

    public function trashedItems()
    {
        $query = $this->model->onlyTrashed();
        $query->orderBy('id', 'desc');
        $object = $query->paginate(5);
        return $object;
    }

    public function restore($id)
    {
        $object = $this->model->withTrashed()->find($id);
        try {
            $object->restore();
            $object->roombooking()->restore();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $object;

    }

    public function force_destroy($id)
    {
        $object = $this->model->withTrashed()->find($id);
        try {
//            dd($room);
            $object->roombooking()->forceDelete();
            $object->forceDelete();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }

    }

}
