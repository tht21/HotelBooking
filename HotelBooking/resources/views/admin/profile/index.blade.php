@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=> ' ','name'=> 'Hồ Sơ Cá Nhân','key' => 'Xem Hồ Sơ Cá Nhân'])
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="email2">Họ Và Tên</label>
                            <input type="text" class="form-control" value="{{$profile_user->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email2">Email</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                </div>
                                <input type="text" class="form-control" value="{{$profile_user->email}}"
                                       aria-describedby="basic-addon1" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email2">Ngày Sinh</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" value="{{$profile_user->birth_day}}"
                                       aria-describedby="basic-addon1" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email2">Địa Chỉ</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" value="{{$profile_user->address}}"
                                       aria-describedby="basic-addon1" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="email2">Số Điện Thoại</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" value="{{$profile_user->phone}}"
                                       aria-describedby="basic-addon1" readonly>
                            </div>
                        </div>

                        <div class="form-check">
                            <label>Giới Tính</label><br/>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control" value="{{$profile_user->gender}}"
                                       aria-describedby="basic-addon1" readonly>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="email2">Ảnh</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                </div>
                                <img src="{{asset($profile_user->avatar)}}" width="100px" height="100px">
                            </div>
                        </div>
                    </div>
                    <div class="back">
                        <a href="{{route('home')}}" class="btn btn-primary">Quay Lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
