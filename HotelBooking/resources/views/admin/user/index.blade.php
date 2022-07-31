@extends('layouts.admin.app')
@section('content')
<style>
    .col-lg-4 {
    margin: 28px -32px 1px 0px;
}
a.btn.btn-primary.btn-round.ml-auto {
    margin: 25px -22px 22px;
}   
</style>
<div class="page-inner">
    @include('layouts.admin.includes.content',['key'=> 'Khách Hàng','name'=> 'Quản Lý Khách Hàng ','key'=> 'Khách Hàng
    '])

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Quản Lý Nhân Viên</h4>
                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="text text-success"><b>{{session::get('success')}}</b></div>
                        @endif
                        @if (Session::has('error'))
                        <div class="text text-danger"><b>{{session::get('error')}}</b></div>
                        @endif
                        <div class="row">
                            <div class="card-header">
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
                            <div class="col-lg-4">
                                <form action="" method="GET" id="form-search" class="form-dark">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="myInput" placeholder="seach name"
                                            aria-label="Recipient's username" onkeyup="myFunction()"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button type="button" class="input-group-text" id="basic-addon2"
                                                data-toggle="modal" data-target="#exampleModalLong">
                                                Tìm kiếm nhanh
                                            </button>
                                        </div>
                                        @include('admin.user.modals.modalSearch')
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                            </div>
                            <div class="col-lg-1">
                                @if(Auth::user()->hasPermission('User_create'))
                                <a href="{{route('users.create')}}" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Thêm nhân viên
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="datatable" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Mã nhân viên</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Tên nhân viên</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Nhóm nhân viên</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $user->id}}</td>
                                    <td><img src="{{asset($user->avatar)}}" height="70" width="80"></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->userGroup->name}}</td>
                                    <td>
                                        <div class="form-button-action">
                                            @if(Auth::user()->hasPermission('User_update'))
                                            <a href="{{route('users.edit',$user->id)}}" data-toggle="tooltip" title=""
                                                class="btn btn-link btn-primary btn-lg"
                                                data-original-title="Chỉnh Sửa Thông Tin Nhân viên">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @endif
                                            @if($user->userGroup->id != 1)
                                            @if(Auth::user()->hasPermission('User_delete'))
                                            <form action="{{ route('users.destroy',$user->id)}}" style="display:inline"
                                                method="post">
                                                <button onclick="return confirm('Xóa {{$user->name}} ?')"
                                                    data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                                    data-original-title="Xóa"><i class="far fa-trash-alt"></i></button>
                                                @csrf
                                                @method('delete')
                                            </form>
                                            @endif
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <div class='float-start'>
                                <span aria-hidden="true">Showing{{''.$users->count().' ' }} to {{$users->currentPage()
                                    }}of {{$users->lastPage()}}</span>
                            </div>
                            <div class='float-end'>
                                <ul class="pagination">
                                    <span aria-hidden="true">{{ $users->links() }}</span>
                                </ul>
                            </div>
                        </nav>
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
                    td = tr[i].getElementsByTagName("td")[2];
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