<?php

namespace App\Http\Controllers;

use App\Models\UserGroup;
use App\Http\Requests\Storeuser_groupsRequest;
use App\Http\Requests\StoreUserGroupRequest;
use App\Http\Requests\Updateuser_groupsRequest;
use App\Http\Requests\UpdateUserGroupRequest;
use App\Models\Role;
use App\Services\Interfaces\UserGroupServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $userGroupService;

    public function __construct(UserGroupServiceInterface $userGroupService)
    {
        $this->UserGroupService = $userGroupService;
    }
    public function index(Request $request)
    {
       $this->authorize('viewAny',UserGroup::class);
        $items = $this->UserGroupService->getAll($request);
        // dd($userGroups);
        // return response()->json($items, 200);
        // $userGroups = UserGroup::all();
        $params =[
            'items' => $items,
        ];
        return view('admin.usergroups.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', UserGroup::class);
        return view('admin.usergroups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeuser_groupsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserGroupRequest $request)
    {
        try {
            $item = $this->UserGroupService->create($request->all());
            return redirect()->route('usergroups.index')->with('success', 'Thêm nhóm' . ' ' . $item->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('usergroups.index')->with('error', 'Thêm nhóm' . ' ' . $item->name . ' ' .  'không thành công');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_groups  $user_groups
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->UserGroupService->findById($id);
        return response()->json($item, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_groups  $user_groups
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = UserGroup::find($id);
        // $this->authorize('update',  $userGroup);
        $current_user = Auth::user();
        $userRoles = $item->roles->pluck('id', 'name')->toArray();
        // dd($current_user->userGroup->roles->toArray());
        $roles = Role::all()->toArray();
        $group_names = [];
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'item' => $item,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        return view('admin.usergroups.edit',$params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateuser_groupsRequest  $request
     * @param  \App\Models\user_groups  $user_groups
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserGroupRequest $request, $id)
    {
        try {
            $item = $this->UserGroupService->update($request->all(), $id);
            return redirect()->route('usergroups.index')->with('success', 'Sửa nhóm' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('usergroups.index')->with('error', 'Sửa nhóm' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_groups  $user_groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        try {
            $item = $this->UserGroupService->destroy($id);
            return redirect()->route('usergroups.index')->with('success', 'Xóa nhóm' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('usergroups.index')->with('error', 'Xóa nhóm' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }

    public function trashedItems()
    {
        // dd($request);
        $items = $this->UserGroupService->trashedItems();
        // dd($items);
        $params = [
            'items' => $items,
            // 'userGroup'=>$userGroup
        ];
        return view('admin.usergroups.trash',$params);
    }

    public function restore($id)
    {
        try {
            $this->UserGroupService->restore($id);
            return redirect()->route('usergroups.trash')->with('success', 'Khôi phục thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('usergroups.trash')->with('success', 'Khôi phục thành công');
        }
    }

    public function force_destroy($id)
    {

        try {
            $userGroup = $this->UserGroupService->force_destroy($id);
            return redirect()->route('usergroups.trash')->with('success', 'Xóa' . ' ' . $userGroup->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('usergroups.trash')->with('error', 'Xóa' . ' ' . $userGroup->name . ' ' .  'không thành công');
        }
    }

}
