<?php

namespace App\Repositories\Eloquent;


use App\Models\User;
use App\Repositories\Interfaces\UserInterface;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserRepository extends EloquentRepository implements UserInterface
{
    use StorageImageTrait;

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
        try {
            DB::beginTransaction();
            $object = $this->model;
            $object->name = $request->name;
            $object->phone = $request->phone;
            $object->password = Hash::make($request->password);
            $object->birth_day = $request->birth_day;
            $object->email = $request->email;
            $object->gender = $request->gender;
            $object->address = $request->address;
            $object->user_group_id = $request->user_group_id;
            //     $object->avatar=$request->avatar;
            $dataUploadImage = $this->storageUpload($request, 'avatar', 'room');
            $object->avatar = $dataUploadImage['file_path'];
            $object->save();
            DB::commit();
            Session::flash('success', 'Thêm nhân viên' . ' ' . $request->name . ' ' . 'thành công');
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());

        }
        return $object;
    }


    public function update($request, $id)
    {
//        dd($request->all());
        try {
            //   DB::beginTransaction();
            $object = $this->model->find($id);
            $object->name = $request->name;
            $object->phone = $request->phone;
            if ($request->password) {
                $object->password = Hash::make($request->password);
            }
            $object->birth_day = $request->birth_day;
            $object->email = $request->email;
            $object->gender = $request->gender;
            $object->address = $request->address;
            $object->user_group_id = $request->user_group_id;
            //     $object->avatar=$request->avatar;
            $dataUploadImage = $this->storageUpload($request, 'avatar', 'room');
            $object->avatar = $dataUploadImage['file_path'];
            $object->save();
            // DB::commit();
            Session::flash('success', 'Chỉnh sửa nhân viên' . ' ' . $request->name . ' ' . 'thành công');
            return true;
        } catch (\Exception $e) {
            //DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());

        }
        return $object;
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
