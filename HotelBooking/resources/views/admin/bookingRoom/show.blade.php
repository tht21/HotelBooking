@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=>'Danh sách phòng','name'=>'Quản lý phòng','key'=>'Danh sách phòng'])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Thông tin phòng {{$bookingrooms->room->name}}</h4>
                            <button class="btn btn-primary btn-round ml-auto"
                            >
                                <a href="{{route('rooms.create')}}"> <i class="fa fa-plus"></i>
                                    Thêm khách đặt phòng</a>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên khách hàng</th>
                                    <th>Giá phòng</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>{{$bookingrooms->id}}</th>
                                    <td>{{$bookingrooms->customer->name}}</td>
                                    <td>{{$bookingrooms->room->price}}</td>
                                    <td>Hủy đặt</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
