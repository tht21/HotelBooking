@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=>'Danh sách đặt phòng','name'=>'Quản lý phòng','key'=>'Danh sách đặt phòng'])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Thông tin phòng </h4>
                            <button class="btn btn-primary btn-round ml-auto">
                                <a href="{{route('bookingrooms.create')}}"> <i class="fa fa-plus"></i>
                                    Thêm khách đặt phòng</a>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class=" table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tổng phòng</th>
                                    <th>Tên phòng</th>
                                    <th>Giá phòng</th>
                                    <th>Tình trạng phòng</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($bookingrooms as $key=> $bookingroom )
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$bookingroom->customer->name}}</td>
                                        <td>{{$bookingroom->total_room}}</td>
                                        @foreach($bookingroom->room as  $room )
                                            <td>{{$room->name}}</td>
                                            <td>{{$room->price}}</td>
                                            <td>{{$room->status}}</td>
                                        @endforeach
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{route('bookingrooms.edit',$bookingroom->id)}}"
                                                   data-toggle="tooltip" title=""
                                                   class="btn btn-link btn-primary btn-lg"
                                                   data-original-title="Chỉnh Sửa Loại Phòng">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('bookingrooms.destroy',$bookingroom->id)}}"
                                                      style="display:inline" method="post">
                                                    <button
                                                        onclick="return confirm('Hủy đặt phòng {{$bookingroom->name}} ?')"
                                                        data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                                        data-original-title="Xóa"><i class="far fa-trash-alt"></i>
                                                    </button>
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
