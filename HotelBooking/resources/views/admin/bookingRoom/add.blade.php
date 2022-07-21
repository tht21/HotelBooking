@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=> 'Quản lý đặt phòng ','name'=> ' Quản Lý Phòng','key' => 'Quản lý đặt phòng'])
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" action="{{route('bookingrooms.store')}}">
                                @csrf
                                @method('put')
                                <div class="card-title">Thông tin khách hàng</div>
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Nhập tên khách hàng">
                                    @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email khách hàng</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Nhập tên email">
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label>CMND</label>
                                        <input type="text" class="form-control" id="limit_people" name="limit_people"
                                               placeholder="Nhập số CCCD">
                                        <br>
                                        <label>Phone</label>
                                        <input type="text" class="form-control" id="limit_people" name="limit_people"
                                               placeholder="Nhập số điện thoại">
                                    </div>
                                    <div class="col-6">
                                        <label>From Date</label>
                                        <input placeholder="Ngày đặt phòng" type="date" id="example"
                                               class="form-control">
                                        <br>
                                        <label>To Date</label>
                                        <input placeholder="Ngày trả phòng" type="date" id="example"
                                               class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label>Tổng số phòng</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Nhập tên khách hàng">
                                        @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label>Số lượng người</label>
                                        <input type="number" class="form-control" id="name" name="name"
                                               placeholder="Nhập tên khách hàng">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Ghi chú</label>
                                    <textarea id="summernote1" data-toggle="summernote1" name="note" type="text"
                                              class="form-control">{{old('note')}}</textarea>

                                </div>
                                <hr>
                                <div class="card-title">Thông tin Nhân viên</div>
                                <div class="form-group">

                                </div>
                                <div class="row form-group">
                                    <div class="col-3">
                                        <label>Tên nhân viên</label>
                                        <select class="form-control" name="room_types" id="exampleFormControlSelect1">
                                            @foreach($rooms as $room)
                                                <option
                                                    value="{{$room->id}}" @selected(old('room_types')==$room->id)>{{$room->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-3">
                                        <label>Quyền</label>
                                        <input type="text" class="form-control" id="limit_people"
                                               name="limit_people"
                                               placeholder="Nhập số người">
                                        @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('limit_people') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-3">
                                        <label>Phòng</label>
                                        <select class="form-control" name="room" id="exampleFormControlSelect1">
                                            @foreach($rooms as $room)
                                                <option
                                                    value="{{$room->id}}" @selected(old('room_types')==$room->id)>{{$room->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
@section('js')

@endsection
