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
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
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
                                @foreach($rooms as $key=>$room)

                                    <tr>
                                        <td>{{$key++}}</td>
                                        <td>{{$room->name}}</td>
                                        <td>{{$room->price}}</td>
                                        <td>{{$room->room_type->name}}</td>
                                        <td>{{$room->status}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </button>
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
