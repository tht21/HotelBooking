<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\Interfaces\UserGroupServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;
    protected $userGroupService;

    public function __construct(UserServiceInterface $userService, UserGroupServiceInterface $userGroupService)
    {
        $this->userService = $userService;
        $this->userGroupService = $userGroupService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);
        $users = $this->userService->getAll($request);
        $userGroups = $this->userGroupService->getAll($request);
        // dd(Auth::user()->user_group_id);
        return view('admin.user.index', compact('users', 'userGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\StoreUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        try {
            $this->userService->create($request);
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', User::class);
        $userGroups = $this->userGroupService->getAll($request);
        return view('admin.user.create', compact('userGroups'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userGroups = $this->userGroupService->getAll($id);
        $user = $this->userService->findById($id);
        $this->authorize('update', $user);
        return view('admin.user.edit', compact('userGroups', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {

        try {
            $this->userService->update($request, $id);
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->userService->destroy($id);
            return redirect()->route('users.index')->with('success', ' Xóa  phòng thành công ');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index')->with('error', 'Xóa  phòng không thành công');
        }
    }

    public function trashedItems()
    {
        // dd($request);
        $users = $this->userService->trashedItems();
        // dd($items);
        $params = [
            'users' => $users,
        ];
        return view('admin.user.trash', $params);
    }

    public function restore($id)
    {
        try {
            $this->userService->restore($id);
            return redirect()->route('users.trash')->with('success', 'Khôi phục thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.trash')->with('success', 'Khôi phục thành công');
        }
    }

    public function force_destroy($id)
    {
        try {
            $user = $this->userService->force_destroy($id);
            return redirect()->route('users.trash')->with('success' . 'Xóa thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.trash')->with('error', 'Xóa không thành công');
        }
    }
}
