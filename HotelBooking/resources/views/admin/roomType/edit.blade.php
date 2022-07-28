@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=> 'Loại Phòng ','name'=> ' Quản Lý Phòng','key' => 'Loại Phòng'])

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Chỉnh Sửa Loại Phòng</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" action="{{route('roomtype.update',$roomtype->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Loại Phòng</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{$roomtype->name}}">
                                    @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Số Người</label>
                                    <input type="text" class="form-control" id="limit_people" name="limit_people"
                                           value="{{$roomtype->limit_people}}">
                                    @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('limit_people') }}</p>
                                    @endif
                                </div>
                                <button type=" submit" class="btn btn-primary">Lưu</button>
                                <a href="{{route('roomtype.index')}}" class="btn btn-danger">Hủy</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
