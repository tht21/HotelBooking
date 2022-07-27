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
                                    <select class="form-control" name="customer_id" id="exampleFormControlSelect1">
                                        <option>--- Select khách hàng ---</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->any())
                                        <p style=" color:red">{{ $errors->first('customer_id') }}</p>
                                    @endif
                                </div>

                                <div class="row form-group">
                                    <div class="col-6">
                                        <label>Số lượng người</label>
                                        <input type="number" class="form-control" id="name" name="limit_people"
                                               placeholder="Nhập số lượng người" value="{{old('limit_people')}}">
                                        @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('limit_people') }}</p>
                                        @endif
                                        <br>
                                        <label>Phòng </label>
                                        <select class="form-control rooms_select_choose" id="exampleFormControlSelect1"
                                                name="room_id[]" multiple="multiple">
                                            @foreach($rooms as $room)
                                                <option value="{{$room->id}}">{{$room->name}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                    </div>
                                    <div class="col-6">
                                        <label>From Date</label>
                                        <input placeholder="Ngày đặt phòng" type="date" id="example"
                                               class="form-control checkin_date" name="from_date"
                                               value="{{old('from_date')}}">
                                        @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('from_date') }}</p>
                                        @endif
                                        <br>
                                        <label>To Date</label>
                                        <input placeholder="Ngày trả phòng" type="date" id="example"
                                               class="form-control" name="to_date" value="{{old('to_date')}}">
                                        @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('to_date') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Ghi chú</label>
                                    <textarea id="summernote1" data-toggle="summernote1" name="note" type="text"
                                              class="form-control"
                                              value="ghi chú">{{old('note')}}ghi chú khách hàng</textarea>
                                </div>
                                <hr>
                                <div class="card-title">Thông tin Nhân viên</div>
                                <div class="row form-group">
                                    <div class="col-3">
                                        <label>Tên nhân viên</label>
                                        <select class="form-control" name="user_id" id="exampleFormControlSelect1">
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">

                                    </div>
                                    <div class="col-3">


                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{route('bookingrooms.index')}}" class="btn btn-danger">Hủy</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
