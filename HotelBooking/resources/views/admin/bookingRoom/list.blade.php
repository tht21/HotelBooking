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
                            <button class="btn btn-primary btn-round ml-auto">
                                <a href="{{route('bookingrooms.create')}}"> <i class="fa fa-plus"></i>Thêm khách đặt
                                    phòng</a>
                            </button>
                            <a href="{{route('bookingrooms.export')}}" class="btn btn-primary">
                                <i class="fas fa-file"></i>
                                <span class="ml-1">Xuất file excel</span>
                            </a>

                        </div>
                        <ul class="nav nav-tabs card-header-tabs">
                            <div class="all">
                                <li class="nav-item1">
                                    <a class="nav-link active" href="{{route('bookingrooms.index')}}">Tất Cả</a>
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
                                    <th>#</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tên phòng</th>
                                    <th>Tiền phòng</th>
                                    <th>Tổng phòng</th>
                                    <th>Số lượng người</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bookingrooms as $key=> $bookingroom )
                                    @foreach($bookingroom->roombooking as $key1=> $booking )
                                        @if($bookingroom->id===$booking->booking_id)
                                            <tr>
                                                <td>{{$bookingroom->id}}</td>
                                                <td>{{$bookingroom->customer->name}}</td>
                                                <td>{{$booking->roomss->name}}</td>
                                                <td>{{$booking->roomss->price}}</td>
                                                <td>{{$bookingroom->total_room}}</td>
                                                <td>{{$bookingroom->limit_people}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{route('bookingrooms.edit',$bookingroom->id)}}"
                                                           data-toggle="tooltip" title=""
                                                           class="btn btn-link btn-primary btn-lg"
                                                           data-original-title="Chỉnh Sửa Loại Phòng">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('bookingrooms.destroy',$bookingroom->id)}}"
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
                                                        {{--                                                        <a data-url="{{ route('bookingrooms.destroy',$bookingroom->id)}}"--}}
                                                        {{--                                                           class="btn btn-link btn-danger " id="deleteBook"--}}
                                                        {{--                                                           data-target="#delete">Hủy--}}
                                                        {{--                                                            đặt</a>--}}
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{--    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
    {{--    <script>--}}
    {{--        $(document).on('click', '#deleteBook', function (e) {--}}
    {{--            e.preventDefault();--}}
    {{--            var url = $(this).attr('data-url');--}}
    {{--            var _this = $(this);--}}
    {{--            let csrf = '{{ csrf_token() }}';--}}
    {{--            Swal.fire({--}}
    {{--                title: 'Khách hàng muốn hủy đặt phòng?',--}}
    {{--                text: "You won't be able to revert this!",--}}
    {{--                icon: 'warning',--}}
    {{--                showCancelButton: true,--}}
    {{--                confirmButtonColor: '#3085d6',--}}
    {{--                cancelButtonColor: '#d33',--}}
    {{--                confirmButtonText: 'Yes, delete it!'--}}
    {{--            }).then((result) => {--}}
    {{--                if (result.isConfirmed) {--}}
    {{--                    $.ajax({--}}
    {{--                        url: url,--}}
    {{--                        method: 'delete',--}}
    {{--                        data: {--}}
    {{--                            _token: csrf--}}
    {{--                        },--}}
    {{--                        success: function (response) {--}}
    {{--                            console.log(response);--}}
    {{--                            Swal.fire(--}}
    {{--                                'Hủy đặt phòng!',--}}
    {{--                                'Khách hàng đã hủy phòng .',--}}
    {{--                                'success'--}}
    {{--                            )--}}
    {{--                            window.location.reload();--}}
    {{--                        }--}}
    {{--                    });--}}
    {{--                }--}}
    {{--                document.reload();--}}
    {{--            })--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
