@extends('layouts.admin.app')
@section('content')
<div class="page-inner">
    @include('layouts.admin.includes.content',['key'=>'Danh sách phòng','name'=>'Quản lý phòng','key'=>'Danh sách
    phòng'])
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Danh sách phòng</h4>
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

                    <div class="d-flex align-items-center">
                        <div class="col-6">
                            <form class="navbar-form navbar-left" method="get">
                                @csrf
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nhập tên phòng..." name='search'>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if(Auth::user()->hasPermission('Rooms_create'))
                        <a href="{{route('rooms.create')}}" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Thêm Phòng
                        </a>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Mã phòng</th>
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
                                    <td>{{$room->id}}</td>
                                    <td><img src="{{asset($room->image_path)}}" height="70" width="80"></td>
                                    <td>{{$room->name}}</td>
                                    <td>{{number_format($room->price)}} VNĐ</td>
                                    <td>{{$room->room_type ? $room->room_type->name : ''}}</td>
                                    <td>
                                        {{$room->status=== '0'?'Còn phòng':'Hết phòng'}}
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            @if(Auth::user()->hasPermission('Rooms_update'))

                                            <a href="{{route('rooms.edit',$room->id)}}" data-toggle="tooltip" title=""
                                                class="btn btn-link btn-primary btn-lg"
                                                data-original-title="Chỉnh Sửa Loại Phòng">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @endif

                                            @if(Auth::user()->hasPermission('Rooms_delete'))

                                            <form action="{{ route('rooms.destroy',$room->id)}}" style="display:inline"
                                                method="post">
                                                <button onclick="return confirm('Xóa {{$room->name}} ?')"
                                                    data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                                    data-original-title="Xóa"><i class="far fa-trash-alt"></i></button>
                                                @csrf
                                                @method('delete')
                                            </form>
                                            @endif
                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <div class='float-start'>
                                <span aria-hidden="true">Showing {{''.$rooms->count().' ' }} to
                                    {{$rooms->currentPage() }} of {{$rooms->lastPage()}}</span>
                            </div>
                            <div class='float-end'>
                                <ul class="pagination">
                                    {{$rooms->appends(request()->query())}}
                                </ul>
                            </div>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#search').on('keyup', function () {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('search') }}',
            data: {
                'search': $value
            },
            success: function (data) {
                $('tbody').html(data);
            }
        });
    })
    $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});
</script>
@endsection