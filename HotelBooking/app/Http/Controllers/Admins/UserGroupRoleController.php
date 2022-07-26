<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser_group_roleRequest;
use App\Http\Requests\UpdateUser_group_roleRequest;
use App\Models\User_group_role;

class UserGroupRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser_group_roleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_group_roleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_group_role  $user_group_role
     * @return \Illuminate\Http\Response
     */
    public function show(User_group_role $user_group_role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_group_role  $user_group_role
     * @return \Illuminate\Http\Response
     */
    public function edit(User_group_role $user_group_role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_group_roleRequest  $request
     * @param  \App\Models\User_group_role  $user_group_role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_group_roleRequest $request, User_group_role $user_group_role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_group_role  $user_group_role
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_group_role $user_group_role)
    {
        //
    }
}
