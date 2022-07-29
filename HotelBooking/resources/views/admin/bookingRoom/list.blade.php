@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=>'Danh sách đặt phòng','name'=>'Quản lý phòng','key'=>'Danh sách đặt phòng'])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Danh sách đặt phòng</h4>
                        </div>
                        <div class="row" style="padding-bottom: 40px ; padding-top: 40px">
                            <div class="col-lg-4">
                                <form action="" method="GET" id="form-search" class="form-dark">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="myInput"
                                               placeholder="Tìm kiếm theo mã đặt phòng"
                                               aria-label="Recipient's username" onkeyup="myFunction()"
                                               aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button type="button" class="input-group-text" id="basic-addon2"
                                                    data-toggle="modal" data-target="#exampleModalLong">
                                                Tìm kiếm nhanh
                                            </button>
                                        </div>
                                        @include('admin.bookingRoom.modals.modalSearch')
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-5">
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class=" col-lg-5">
                                        <a href="{{route('bookingrooms.create')}}"
                                           class="btn btn-primary btn-round ml-auto"> <i class="fa fa-plus"></i>Thêm mới</a>
                                    </div>
                                    <div class=" col-lg-5">
                                        <a href="{{route('bookingrooms.export')}}"
                                           class="btn btn-primary btn-round ml-auto"> <i class="fas fa-file"></i></i>
                                            Xuất file
                                            excel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs card-header-tabs ">
                            <div class="all">
                                <li class="nav-item1">
                                    <a class="nav-link active" href="{{route('bookingrooms.index')}}">Tất Cả</a>
                                </li>
                            </div>
                            <div class="trash">
                                <li class="nav-item2">
                                    <a class="nav-link active " href="{{route('bookingrooms.trash')}}">Thùng rác</a>
                                </li>
                            </div>
                        </ul>
                        <br>
                        <div class="card-body">
                            @if (Session::has('success'))
                                <div class="text text-success"><b>{{session::get('success')}}</b></div>
                            @endif
                            @if (Session::has('error'))
                                <div class="text text-danger"><b>{{session::get('error')}}</b></div>
                            @endif
                            <div class="table-responsive">
                                <table id="datatable" class="display table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Nhân viên phụ trách</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tên phòng</th>
                                        <th>Ngày nhận phòng</th>
                                        <th>Ngày trả phòng</th>
                                        <th>Tổng phòng</th>
                                        <th>Số lượng người</th>
                                        <th>Trạng thái</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookingrooms as $key=> $bookingroom )
                                        @foreach($bookingroom->roombooking as $key1=> $booking )
                                            @if($bookingroom->id===$booking->booking_id)

                                                <tr>
                                                    <td>{{$booking->id}}</td>
                                                    <td>{{$bookingroom->user->name}}</td>
                                                    <td>{{$bookingroom->customer->name}}</td>
                                                    <td>{{$booking->roomss->name}}</td>
                                                    <td>{{Helper::dateFormat($bookingroom->from_date)}}</td>
                                                    <td>{{Helper::dateFormat($bookingroom->to_date)}}</td>
                                                    <td>{{Helper::convertToRupiah(Helper::getTotalPayment($bookingroom->total_room,$booking->roomss->price)) }}</td>
                                                    <td>{{$bookingroom->limit_people}}</td>
                                                    <td>{{$bookingroom->status}}</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="{{route('bookingrooms.edit',$bookingroom->id)}}"
                                                               data-toggle="tooltip" title=""
                                                               class="btn btn-link btn-primary btn-lg"
                                                               data-original-title="Chỉnh Sửa Loại Phòng">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('bookingrooms.destroy',$booking->id)}}"
                                                                style="display:inline" method="post">
                                                                <button
                                                                    onclick="return confirm('Hủy đặt phòng {{$booking->roomss->name}} ?')"
                                                                    data-toggle="tooltip" title=""
                                                                    class="btn btn-link btn-danger"
                                                                    data-original-title="Xóa">Hủy đặt
                                                                </button>
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @else
                                                khong cp
                                            @endif
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <div class='float-start'>
                                        <span aria-hidden="true">Showing{{''.$bookingrooms->count().'  ' }} to {{$bookingrooms->currentPage() }}of {{$bookingrooms->lastPage()}}</span>
                                    </div>
                                    <div class='float-end'>
                                        <ul class="pagination">
                                            <span aria-hidden="true">{{ $bookingrooms->links() }}</span>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("datatable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>

@endsection

