<?php

namespace App\Repositories\Eloquent;


use App\Models\Floor;
use App\Repositories\Interfaces\FloorInterface;

class FloorRepository extends EloquentRepository implements FloorInterface
{

    public function getModel()
    {
        return Floor::class;
    }

    public function getAll($request)
    {
        $result = $this->model->paginate(10);
        return $result;
    }
}
