<?php

namespace App\Http\Controllers;

use App\Models\user_groups;
use App\Http\Requests\Storeuser_groupsRequest;
use App\Http\Requests\Updateuser_groupsRequest;

class UserGroupsController extends Controller
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
     * @param  \App\Http\Requests\Storeuser_groupsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeuser_groupsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_groups  $user_groups
     * @return \Illuminate\Http\Response
     */
    public function show(user_groups $user_groups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_groups  $user_groups
     * @return \Illuminate\Http\Response
     */
    public function edit(user_groups $user_groups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateuser_groupsRequest  $request
     * @param  \App\Models\user_groups  $user_groups
     * @return \Illuminate\Http\Response
     */
    public function update(Updateuser_groupsRequest $request, user_groups $user_groups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_groups  $user_groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_groups $user_groups)
    {
        //
    }
}
