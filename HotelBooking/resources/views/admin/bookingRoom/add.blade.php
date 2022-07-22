@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=> 'Quản lý đặt phòng ','name'=> ' Quản Lý Phòng','key' => 'Quản lý đặt phòng'])
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{route('bookingrooms.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-title">Thông tin khách hàng</div>
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Nhập tên khách hàng" value="{{old('name')}}">
                                    @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email khách hàng</label>
                                    <input type="text" class="form-control" name="email"
                                           placeholder="Nhập tên email" value="{{old('email')}}">
                                    @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label>CMND</label>
                                        <input type="number" class="form-control" id="limit_people" name="cmnd"
                                               placeholder="Nhập số CMND" value="{{old('cmnd')}}">
                                        @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('cmnd') }}</p>
                                        @endif
                                        <br>
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone"
                                               placeholder="Nhập số điện thoại" value="{{old('phone')}}">
                                        @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('phone') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label>From Date</label>
                                        <input placeholder="Ngày đặt phòng" type="date" id="example"
                                               class="form-control" name="from_date" value="{{old('from_date')}}">
                                        @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('phone') }}</p>
                                        @endif
                                        <br>
                                        <label>To Date</label>
                                        <input placeholder="Ngày trả phòng" type="date" id="example"
                                               class="form-control" name="to_date" value="{{old('to_date')}}">
                                        @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('phone') }}</p>
                                        @endif

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label>Tổng số phòng</label>
                                        <input type="number" class="form-control" id="name" name="total_room"
                                               placeholder="Nhập tên khách hàng" value="{{old('total_room')}}">
                                        @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('total_room') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label>Số lượng người</label>
                                        <input type="number" class="form-control" id="name" name="limit_people"
                                               placeholder="Nhập tên khách hàng" value="{{old('limit_people')}}">
                                        @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('limit_people') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Địa chỉ</label>
                                    <textarea id="summernote1" data-toggle="summernote1" name="address" type="text"
                                              class="form-control" value="ghi chú">{{old('address')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Ghi chú</label>
                                    <textarea id="summernote1" data-toggle="summernote1" name="note" type="text"
                                              class="form-control" value="ghi chú">{{old('note')}}ghi chú</textarea>
                                </div>
                                <hr>
                                <div class="card-title">Thông tin Nhân viên</div>
                                <div class="row form-group">
                                    <div class="col-3">
                                        <label>Tên nhân viên</label>
                                        <select class="form-control" name="user_id" id="exampleFormControlSelect1">
                                            @foreach($users as $user)
                                                <option
                                                    value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label>Quyền</label>
                                        <select class="form-control" name="user_id" id="exampleFormControlSelect1">
                                            @foreach($users as $user)
                                                <option
                                                    value="{{$user->userGroup->id}}">{{$user->userGroup->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label>Phòng</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="room_id">
                                            @foreach($rooms as $room)
                                                <option value="{{$room->id}}">{{$room->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{route('bookingrooms.index')}}" class="btn btn-danger">Hủy</a>

                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')

@endsection
