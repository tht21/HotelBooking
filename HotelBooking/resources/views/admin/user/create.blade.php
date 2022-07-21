@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=> 'Nhân Viên ','name'=> 'Quản Lý Nhân Viên  ','key'=> 'Nhân Viên '])

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Thêm Nhân viên</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row form-group">
                                    <div class="col-9">
                                        <label>Tên nhân viên </label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Nhập tên nhân viên">
                                        @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-3">
                                        <label for="comment">Hình ảnh nhân viên</label>
                                        <input type="file" name="avatar" class="form-control"
                                               id="exampleFormControlFile1">
                                        @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('avatar') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                           placeholder="Nhập email nhân viên">
                                    @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                           placeholder="Nhập số điện thoại nhân viên">
                                    @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" id="email" name="password"
                                           placeholder="Nhập email nhân viên">
                                    @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="row form-group">
                                    <div class="col-9">
                                        <label>Ngày sinh</label>
                                        <input type="date" class="form-control" id="email" name="birth_day"
                                               placeholder="Nhập email nhân viên">
                                        @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('birth_day') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-3">
                                        <label>Giới tính</label><br/>
                                        <br/>
                                        <label class="form-radio-label">
                                            <input class="form-radio-input" type="radio" name="gender" value="Nam"
                                                   checked="Nam">
                                            <span class="form-radio-sign">Nam</span>
                                        </label>
                                        <label class="form-radio-label ml-3">
                                            <input class="form-radio-input" type="radio" name="gender" value="Nữ">
                                            <span class="form-radio-sign">Nữ</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <textarea data-toggle="summernote" name="address"
                                              type="text"
                                              class="form-control">{{old('address')}}</textarea>
                                    @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('address') }}</p>
                                    @endif
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label for="exampleFormControlSelect1">Nhóm nhân viên</label>
                                        <select class="form-control" name="user_group_id"
                                                id="exampleFormControlSelect1">
                                            @foreach($userGroups as $userGroup)
                                                <option
                                                    value="{{$userGroup->id}}" @selected(old('floor')==$userGroup->id)>{{$userGroup->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type=" submit" class="btn btn-primary">Lưu</button>
                                <a href="{{route('users.index')}}" class="btn btn-danger">Hủy</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
