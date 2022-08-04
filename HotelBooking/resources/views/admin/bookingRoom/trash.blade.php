@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=>'Danh sách đặt phòng','name'=>'Quản lý phòng','key'=>'Danh sách đặt phòng'])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Lịch sử đặt phòng</h4>
                            <button class="btn btn-primary btn-round ml-auto">
                                <a href="{{route('bookingrooms.create')}}"> <i class="fa fa-plus"></i>
                                    Thêm mới</a>
                            </button>
                        </div>
                        <ul class="nav nav-tabs card-header-tabs">
                            <div class="all">
                                <li class="nav-item1">
                                    <a class="nav-link active" href="{{route('bookingrooms.list')}}">Tất Cả</a>
                                </li>
                            </div>
                            <div class="trash">
                                <li class="nav-item2">
                                    <a class="nav-link active " href="{{route('bookingrooms.trash')}}">Thùng Rác</a>
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
                                    <th>Mã đơn hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tên phòng</th>
                                    <th>Tiền phòng</th>
                                    <th>Tổng phòng</th>
                                    <th>Số lượng người</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roomBooks as $bookingroom)
                                    <tr>
                                        <td>{{$bookingroom->id}}</td>
                                        <td>{{$bookingroom->bookings->customer->name}}</td>
                                        <td>{{$bookingroom->roomss->name}}</td>
                                        <td>{{$bookingroom->roomss->price}}</td>
                                        <td>{{$bookingroom->bookings->total_room}}</td>
                                        <td>{{$bookingroom->bookings->limit_people}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{route('bookingrooms.restore',$bookingroom->id)}}"
                                                   data-toggle="tooltip"
                                                   title="" class="btn btn-link btn-primary btn-lg"
                                                   data-original-title="Khôi Phục Loại Phòng">
                                                    <i class="fas fa-trash-restore"></i>
                                                </a>
                                                <form
                                                    action="{{ route('bookingrooms.force_destroy',$bookingroom->id)}}"
                                                    style="display:inline" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="return confirm('Xóa  ?')"
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
                            <nav aria-label="Page navigation example">
                                <div class='float-start'>
                                    <span aria-hidden="true">Showing{{''.$roomBooks->count().'  ' }} to {{$roomBooks->currentPage() }}of {{$roomBooks->lastPage()}}</span>
                                </div>
                                <div class='float-end'>
                                    <ul class="pagination">
                                        <span aria-hidden="true">{{ $roomBooks->links() }}</span>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
