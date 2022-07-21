<?php

namespace App\Repositories\Eloquent;


use App\Models\User;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\RoomTypeRepositoryInterface;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\Log;

class UserRepository extends EloquentRepository implements UserInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function getAll($request)
    {
        $result = $this->model->paginate(10);
        return $result;
    }

    public function destroy($id)
    {
        $users = $this->model->find($id);
        try {
            $users->delete();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $users;
    }

    public function create($request)
    {
        $users = $this->model;

        try {
            $users->save();

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
