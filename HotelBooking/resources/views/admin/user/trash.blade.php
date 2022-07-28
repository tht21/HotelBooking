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
                                    <th>Tên nhân viên</th>
                                    <th>Email</th>
                                    <th>Số ĐT</th>
                                    <th>Địa Chỉ</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $key => $user)

                                    <tr>
                                        <td>{{ $key = $key + 1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                @if(Auth::user()->hasPermission('User_restore'))
                                                    <a href="{{route('users.restore',$user->id)}}" data-toggle="tooltip"
                                                       title="" class="btn btn-link btn-primary btn-lg"
                                                       data-original-title="Khôi Phục Loại Phòng">
                                                        <i class="fas fa-trash-restore"></i>
                                                    </a>
                                                @endif
                                                @if(Auth::user()->hasPermission('User_forceDelete'))
                                                    <form action="{{ route('users.force_destroy',$user->id)}}"
                                                          style="display:inline" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Xóa {{$user->name}} ?')"
                                                                data-toggle="tooltip" title=""
                                                                class="btn btn-link btn-danger"
                                                                data-original-title="Xóa Vĩnh Viễn"><i
                                                                class="far fa-trash-alt"></i></button>
                                                    </form>
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
