<?php

namespace App\Repositories\Eloquent;


use App\Models\Room;
use App\Repositories\Interfaces\RoomInterface;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class RoomRepository extends EloquentRepository implements RoomInterface
{
    use StorageImageTrait;

    public function getModel()
    {
        return Room::class;
    }

    public function getAll($request)
    {
        $rooms = $this->model->select('*');
        $search = $request->search;
        if ($search) {
            $rooms = $rooms->where('name', 'like', '%' . $search . '%');
        }
        return $rooms->orderBy('id', 'desc')->paginate(6);
    }

    public function search($request)
    {
        $search = $request->search;
        $rooms = $this->model->join('room_types', 'room_types.id', '=', 'rooms.room_types_id')
            ->select('rooms.*', 'room_types.name as name_roomType');
        if ($search) {
            $rooms->where('room_types.name', 'like', '%' . $search . '%');
        }
        return $rooms->orderBy('id', 'desc')->paginate(6);
    }


    public function getAllByRoomType($id)
    {
        // dd($category_id);
        $result = $this->model->select('*');
        $result->where('room_types_id', $id)
            ->where('status', '0')->get();
        return $result->orderBy('id', 'desc')->paginate(6);
    }

    public function create($request)
    {
        try {
            DB::beginTransaction();
            $object = $this->model;
            $object->name = $request->name;
            $object->price = $request->price;
            $object->room_types_id = $request->room_types;
            $object->floor_id = $request->floor;
            $object->convenient = $request->convenient;
            $object->description = $request->description;
            $object->status = $request->status;
//       $object->image_path = $request->image;

            $dataUploadImage = $this->storageUpload($request, 'image_path', 'room');

            $object->image_path = $dataUploadImage['file_path'];

            $object->save();
            if ($request->hasFile('room_image_path')) {
                foreach ($request->room_image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageUploadDetail($fileItem, 'room');
                    $dataProductImageDetailCreate = [
                        'name' => $dataProductImageDetail['file_path'],
                    ];
                    $object->room_image()->create($dataProductImageDetailCreate);
                }
            }
            DB::commit();
            Session::flash('success', 'Thêm phòng' . ' ' . $request->name . ' ' . 'thành công');
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
            $object->name = $request->name;
            $object->price = $request->price;
            $object->room_types_id = $request->room_types;
            $object->floor_id = $request->floor;
            $object->convenient = $request->convenient;
            $object->description = $request->description;
            $object->status = $request->status;
            //  dd(  $dataUploadImage['file_path']);
            if ($request->image_path) {
                $dataUploadImage = $this->storageUpload($request, 'image_path', 'room');
                $object->image_path = $dataUploadImage['file_path'];
            } else {
                $object->image_path = $object->image_path;
            }
            $object->save();
            if ($request->hasFile('room_image_path')) {
                foreach ($request->room_image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageUploadDetail($fileItem, 'room');
                    $dataProductImageDetailCreate = [
                        'name' => $dataProductImageDetail['file_path'],
                    ];
                    $object->room_image()->create($dataProductImageDetailCreate);
                }
            }
            DB::commit();
            Session::flash('success', 'Chỉnh sửa phòng' . ' ' . $request->name . ' ' . 'thành công');
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('success', 'Chỉnh sửa phòng' . ' ' . $request->name . ' ' . 'không thành công');
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
            return false;
        }

        return $object;
    }

    public function destroy($id)
    {
        $object = $this->model->find($id);

        try {
            $object->delete();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
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
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $object;

    }

    public function force_destroy($id)
    {
        $room = $this->model->withTrashed()->find($id);
        try {
//            dd($room);
            $room->forceDelete();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }

    }
}
