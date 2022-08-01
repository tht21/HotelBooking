<?php

namespace App\Repositories\Eloquent;


use App\Models\RoomBooking;
use App\Repositories\Interfaces\RoomBookInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class RoomBookRepository extends EloquentRepository implements RoomBookInterface
{

    public function getModel()
    {
        return RoomBooking::class;
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $object = $this->model->find($id);

            foreach ($object as $key) {
                $key->roomss->update(['status' => '0']);
                $key->delete();
            }
            // $object->roomss->update(['status' => '0']);

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
            $object->bookings->restore();
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
            $object->forceDelete();
            $object->bookings->forceDelete();

            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }

    }
}
