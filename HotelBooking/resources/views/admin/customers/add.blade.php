@extends('layouts.admin.app')
@section('content')
<div class="page-inner">
   @include('layouts.admin.includes.content',['key'=> 'Khách Hàng','name'=> 'Quản Lý Khách Hàng ','key'=> 'Khách Hàng '])

   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="card-title">Thêm Khách Hàng</div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-12">
                  <form method="post" action="{{route('customers.store')}}">
                     @csrf
                     <div class="form-group">
                        <label>Tên Khách hàng</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên khách hàng" value="{{old('name')}}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                     </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email khách hàng" value="{{old('email')}}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('email') }}</p>
                        @endif
                     </div>
                     <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại khách hàng" value="{{old('phone')}}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('phone') }}</p>
                        @endif
                     </div>
                     <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ khách hàng" value="{{old('address')}}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('address') }}</p>
                        @endif
                     </div>
                     <div class="form-group">
                        <label>Số CMND/CCCD</label>
                        <input type="text" class="form-control" id="cmnd" name="cmnd" placeholder="Nhập số CMND" value="{{old('cmnd')}}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('cmnd') }}</p>
                        @endif
                     </div>
                           <button type=" submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('customers.index')}}" class="btn btn-danger">Hủy</a>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection