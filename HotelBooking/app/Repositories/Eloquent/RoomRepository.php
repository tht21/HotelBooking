<?php

namespace App\Repositories\Eloquent;


use App\Models\Room;
use App\Models\Room_image;
use App\Repositories\Interfaces\RoomInterface;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;

class RoomRepository extends EloquentRepository implements RoomInterface
{
    use StorageImageTrait;

    public function getModel()
    {
        return Room::class;
    }

    public function getAll($request)
    {
        $result = $this->model->paginate(10);
        return $result;
    }

    public function create($request)
    {

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


        try {
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
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }

        return $object;
    }
}
