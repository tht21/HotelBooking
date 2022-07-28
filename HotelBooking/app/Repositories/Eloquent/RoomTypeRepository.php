<?php

namespace App\Repositories\Eloquent;

use App\Models\RoomType;
use App\Repositories\Interfaces\RoomTypeRepositoryInterface;
use Illuminate\Support\Facades\Log;

class RoomTyperepository extends EloquentRepository implements RoomTypeRepositoryInterface
{
    public function getModel()
    {
        return RoomType::class;
    }

    public function getAll($request)
    {
        $roomtypes = $this->model->select('*');
        if (isset($request->name) && $request->name) {
            $name = $request->name;
            $roomtypes->where('name', 'LIKE', '%' . $name . '%');
        }
        return $roomtypes->orderBy('id', 'desc')->paginate(5);
    }

    public function destroy($id)
    {
        $roomtypes = $this->model->find($id);
        try {
            $roomtypes->delete();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $roomtypes;
    }

    public function create($request)
    {
        $roomtypes = $this->model;
        $roomtypes->name = $request->name;
        $roomtypes->limit_people = $request->limit_people;
        try {
            $roomtypes->save();

            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $roomtypes;
    }


    public function update($request, $id)
    {
        $roomtypes = $this->model->find($id);
        // dd($roomtypes);
        $roomtypes->name = $request->name;
        $roomtypes->limit_people = $request->limit_people;
        try {
            $roomtypes->save();

            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $roomtypes;
    }

    public function trashedItems()
    {
        $query = $this->model->onlyTrashed();
        $query->orderBy('id', 'desc');
        $roomtypes = $query->paginate(5);
        return $roomtypes;
    }

    public function restore($id)
    {
        $roomtype = $this->model->withTrashed()->find($id);
        try {
            $roomtype->restore();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $roomtype;

    }

    public function force_destroy($id)
    {
        $roomtype = $this->model->withTrashed()->find($id);
        try {
            $roomtype->forceDelete();
            //  dd(  $roomtype);
            return $roomtype;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }

    }
}
