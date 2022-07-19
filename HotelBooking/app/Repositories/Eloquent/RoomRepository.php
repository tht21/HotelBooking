<?php

namespace App\Repositories\Eloquent;


use App\Models\Room;
use App\Repositories\Interfaces\RoomInterface;

class RoomRepository extends EloquentRepository implements RoomInterface
{

    public function getModel()
    {
        return Room::class;
    }

    public function getAll($request)
    {
        $result = $this->model->paginate(10);
        return $result;
    }
}
