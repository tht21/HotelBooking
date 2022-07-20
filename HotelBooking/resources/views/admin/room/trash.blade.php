@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=>'Danh sách phòng','name'=>'Quản lý phòng','key'=>'Danh sách phòng'])

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Danh Sách Phòng</h4>

                            <a href="{{route('rooms.create')}}" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Thêm Phòng
                            </a>

                        </div>
                        <ul class="nav nav-tabs card-header-tabs">
                            <div class="all">
                                <li class="nav-item1">
                                    <a class="nav-link active" href="{{route('rooms.index')}}">Tất Cả</a>
                                </li>
                            </div>
                            <div class="trash">
                                <li class="nav-item2">
                                    <a class="nav-link active " href="{{route('rooms.trash')}}">Thùng Rác</a>
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
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên phòng</th>
                                    <th>Giá phòng</th>
                                    <th>Loại phòng</th>
                                    <th>Trạng thái</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($rooms as $key => $room )

                                    <tr>
                                        <td>{{$key = $key + 1}}</td>
                                        <td>{{$room->name}}</td>
                                        <td>{{$room->price}}</td>
                                        <td>{{$room->room_type ? $room->room_type->name : ''}}</td>
                                        <td>{{$room->status}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{route('rooms.restore',$room->id)}}" data-toggle="tooltip"
                                                   title="" class="btn btn-link btn-primary btn-lg"
                                                   data-original-title="Khôi Phục Loại Phòng">
                                                    <i class="fas fa-trash-restore"></i>
                                                </a>
                                                <form action="{{ route('rooms.force_destroy',$room->id)}}"
                                                      style="display:inline" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="return confirm('Xóa {{$room->name}} ?')"
                                                            data-toggle="tooltip" title=""
                                                            class="btn btn-link btn-danger"
                                                            data-original-title="Xóa Vĩnh Viễn"><i
                                                            class="far fa-trash-alt"></i></button>

                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{$rooms->appends(request()->query())}}
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
