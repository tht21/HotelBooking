@extends('layouts.admin.app')
@section('content')
<div class="page-inner">
    @include('layouts.admin.includes.content',['key'=> 'Khách Hàng','name'=> 'Quản Lý Khách Hàng ','key'=> 'Khách Hàng
    '])

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">Quản Lý Nhân Viên</h4>
                    <ul class="nav nav-tabs card-header-tabs">
                        <div class="all">
                            <li class="nav-item1">
                                <a class="nav-link active" href="{{route('users.index')}}">Tất Cả</a>
                            </li>
                        </div>
                        <div class="trash">
                            <li class="nav-item2">
                                <a class="nav-link active " href="{{route('users.trash')}}">Thùng Rác</a>
                            </li>
                        </div>
                    </ul>
                </div>

                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="text text-success"><b>{{session::get('success')}}</b></div>
                    @endif
                    @if (Session::has('error'))
                    <div class="text text-danger"><b>{{session::get('error')}}</b></div>
                    @endif
                    <div class="d-flex align-items-center">
                        @if(Auth::user()->hasPermission('User_create'))
                        <a href="{{route('users.create')}}" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Thêm nhân viên
                        </a>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Tên nhân viên</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Nhóm nhân viên</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)

                                <tr>
                                    <td>{{ $key = $key + 1}}</td>
                                    <td><img src="{{asset($user->avatar)}}" height="70" width="80"></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->userGroup->name}}</td>
                                    <td>
                                        <div class="form-button-action">
                                            @if(Auth::user()->hasPermission('User_update'))
                                            <a href="{{route('users.edit',$user->id)}}" data-toggle="tooltip" title=""
                                                class="btn btn-link btn-primary btn-lg"
                                                data-original-title="Chỉnh Sửa Thông Tin Nhân viên">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @endif
                                            @if($user->userGroup->id != 1)
                                            @if(Auth::user()->hasPermission('User_delete'))
                                            <form action="{{ route('users.destroy',$user->id)}}" style="display:inline"
                                                method="post">
                                                <button onclick="return confirm('Xóa {{$user->name}} ?')"
                                                    data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                                    data-original-title="Xóa"><i class="far fa-trash-alt"></i></button>
                                                @csrf
                                                @method('delete')
                                            </form>
                                            @endif
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection