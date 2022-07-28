@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=> 'Nhóm Nhân Viên ','name'=> 'Quản Lý Nhóm Nhân Viên','key' => 'Nhóm Nhân Viên'])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"> Quản Lý Nhóm Nhân Viên</h4>
                            @if(Auth::user()->hasPermission('UserGroup_create'))
                                <a href="{{route('usergroups.create')}}" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Thêm Nhóm Nhân Viên
                                </a>
                            @endif
                        </div>
                        <ul class="nav nav-tabs card-header-tabs">
                            <div class="all">
                                <li class="nav-item1">
                                    <a class="nav-link active" href="{{route('usergroups.index')}}">Tất Cả</a>
                                </li>
                            </div>
                            <div class="trash">
                                <li class="nav-item2">
                                    <a class="nav-link active " href="{{route('usergroups.trash')}}">Thùng Rác</a>
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
                                    <th>Tên Nhóm Nhân Viên</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($items as $key => $item )

                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{route('usergroups.restore',$item->id)}}"
                                                   data-toggle="tooltip" title=""
                                                   class="btn btn-link btn-primary btn-lg"
                                                   data-original-title="Khôi Phục Nhóm Nhân Viên">
                                                    <i class="fas fa-trash-restore"></i>
                                                </a>

                                                <form action="{{ route('usergroups.force_destroy',$item->id)}}"
                                                      style="display:inline" method="post">
                                                    <button onclick="return confirm('Xóa {{$item->name}} ?')"
                                                            data-toggle="tooltip" title=""
                                                            class="btn btn-link btn-danger"
                                                            data-original-title="Xóa Vĩnh Viễn"><i
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
                            {{$items->appends(request()->query())}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
