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
        $user = $this->model->select('*');
        if (isset($request->name) && $request->name) {
            $name = $request->name;
            $user->where('name', 'LIKE', '%' . $name . '%');
        }
        if (isset($request->phone) && $request->phone) {
            $phone = $request->phone;
            $user->where('phone', 'LIKE', '%' . $phone . '%');
        }
        if (isset($request->address) && $request->address) {
            $address = $request->address;
            $user->where('address', 'LIKE', '%' . $address . '%');
        }
        if (isset($request->user_group_id) && $request->user_group_id) {
            $user_group_id = $request->user_group_id;
            $user->where('user_group_id', 'LIKE', '%' . $user_group_id . '%');
        }


        $user->orderBy('id', 'desc');
        $users = $user->paginate(5);

        return $users;
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

        try {
            DB::beginTransaction();
            $object = $this->model->find($id);
            // dd(  $object);
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
            if ($request->avatar) {
                $dataUploadImage = $this->storageUpload($request, 'avatar', 'room');
                $object->avatar = $dataUploadImage['file_path'];
            } else {
                $object->avatar = $object->avatar;
            }

            // dd($object);
            $object->save();
            DB::commit();
            Session::flash('success', 'Chỉnh sửa nhân viên' . ' ' . $request->name . ' ' . 'thành công');
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
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
