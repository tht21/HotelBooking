@extends('layouts.admin.app')
@section('content')
<div class="page-inner">
   @include('layouts.admin.includes.content',['key'=> 'Khách Hàng','name'=> 'Quản Lý Khách Hàng ','key'=> 'Khách Hàng '])

   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="card-title">Chỉnh Sửa Thông Tin Khách Hàng</div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-12">
                  <form method="post" action="{{route('customers.update',$customer->id)}}">
                     @method('put')
                     @csrf
                     <div class="form-group">
                        <label>Tên Khách hàng</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$customer->name}}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                     </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$customer->email}}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('email') }}</p>
                        @endif
                     </div>
                     <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$customer->phone}}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('phone') }}</p>
                        @endif
                     </div>
                     <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$customer->address}}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('address') }}</p>
                        @endif
                     </div>
                     <div class="form-group">
                        <label>Số CMND</label>
                        <input type="text" class="form-control" id="cmnd" name="cmnd" value="{{$customer->cmnd}}">
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