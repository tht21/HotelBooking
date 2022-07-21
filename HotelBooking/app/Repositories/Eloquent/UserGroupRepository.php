<?php
namespace App\Repositories\Eloquent;

use App\Models\UserGroup;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\UserGroupInterface;

class UserGroupRepository extends EloquentRepository implements UserGroupInterface
{

    public function getModel()
    {
        return UserGroup::class;
    }
    public function getAll($request)
    {
        $userGroup = $this->model->select('*');
        if (isset($request->name) && $request->name) {
            $name = $request->name;
            $userGroup->where('name', 'LIKE', '%' . $name . '%');

        }
        $userGroup->orderBy('id', 'desc');
        $userGroups = $userGroup->paginate(10);

        return $userGroups;
    }

    public function update($request, $userGroup)
    {
        parent::update($request, $userGroup);
        $userGroup->roles()->detach();
        //attach cập nhập các record của bảng trung gian hiện tại
        $userGroup->roles()->attach($request['roles']);
        return $userGroup;

    }

    public function trashedItems()
    {

        $query = $this->model->onlyTrashed();

        $query->orderBy('id', 'desc');
        $userGroups = $query->paginate(10);
        return $userGroups;
    }

    public function restore($id)
    {

        $userGroup = $this->model->withTrashed()->find($id);

        if ($userGroup) {
            $userGroup->restore();
            return true;
        } else {
            return false;
        }
        return $userGroup;
    }

    public function force_destroy($id)
    {
        $userGroup = $this->model->withTrashed()->find($id);
        if ($userGroup) {
            $userGroup->forceDelete();
            return $userGroup;
        } else {
            return false;
        }
    }



}