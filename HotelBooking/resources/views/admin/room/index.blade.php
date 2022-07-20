@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=>'Danh sách phòng','name'=>'Quản lý phòng','key'=>'Danh sách phòng'])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Danh sách phòng</h4>
                            <button class="btn btn-primary btn-round ml-auto"
                            >
                                <a href="{{route('rooms.create')}}"> <i class="fa fa-plus"></i>
                                    Add Room</a>
                            </button>
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
                                    <th>Ảnh phòng</th>
                                    <th>Tên phòng</th>
                                    <th>Giá phòng</th>
                                    <th>Loại phòng</th>
                                    <th>Trạng thái</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rooms as $key=>$room)

                                    <tr>
                                        <td>{{$key++}}</td>
                                        <td><img src="{{$room->image_path}}" height="70" width="80"></td>
                                        <td>{{$room->name}}</td>
                                        <td>{{$room->price}}</td>
                                        <td>{{$room->room_type ? $room->room_type->name : ''}}</td>
                                        <td>{{$room->status}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{route('rooms.edit',$room->id)}}" data-toggle="tooltip"
                                                   title="" class="btn btn-link btn-primary btn-lg"
                                                   data-original-title="Chỉnh Sửa Loại Phòng">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                {{-- <a href="{{route('roomtype.destroy',$roomtype->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa" onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                                   <i class="fa fa-trash"></i>
                                                </a> --}}
                                                <form action="{{ route('rooms.destroy',$room->id)}}"
                                                      style="display:inline" method="post">
                                                    <button onclick="return confirm('Xóa {{$room->name}} ?')"
                                                            data-toggle="tooltip" title=""
                                                            class="btn btn-link btn-danger" data-original-title="Xóa"><i
                                                            class="far fa-trash-alt"></i></button>
                                                    @csrf
                                                    @method('delete')
                                                </form>
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
    </div>
@endsection
