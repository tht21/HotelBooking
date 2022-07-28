@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=> 'Nhóm Nhân Viên ','name'=> 'Quản Lý Nhóm Nhân Viên','key' => 'Nhóm Nhân Viên'])
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Thêm Nhóm Nhân Viên</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" action="{{route('usergroups.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label>Tên Nhóm Nhân Viên</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Nhập tên nhóm nhân viên">
                                    @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <button type=" submit" class="btn btn-primary">Lưu</button>
                                <a href="{{route('usergroups.index')}}" class="btn btn-danger">Hủy</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
