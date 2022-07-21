<?php

namespace App\Http\Controllers;

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
        $users = $this->userService->getAll($request);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userGroups = $this->userGroupService->getAll($request);
        return view('admin.user.create', compact('userGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->userService->create($request);
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        dd($request->all());
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
        return view('admin.user.edit', compact('userGroups', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        //
    }

    public function trashedItems()
    {
        // dd($request);
        $rooms = $this->roomService->trashedItems();
        // dd($items);
        $params = [
            'rooms' => $rooms,
        ];
        return view('admin.room.trash', $params);
    }

    public function restore($id)
    {
        try {
            $this->roomService->restore($id);
            return redirect()->route('rooms.trash')->with('success', 'Khôi phục thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('rooms.trash')->with('success', 'Khôi phục thành công');
        }
    }

    public function force_destroy($id)
    {
        //dd($this->roomService->force_destroy($id));
        try {
            $room = $this->roomService->force_destroy($id);
            return redirect()->route('rooms.trash')->with('success' . 'Xóa thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('rooms.trash')->with('error', 'Xóa không thành công');
        }
    }
}
