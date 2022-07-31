@extends('layouts.web.app')
@section('content')
<style>
   .form-group.col-md-6 {
      margin: 29px 0px 0px 0px;
   }

   .form-group.col-md-12 {
      margin: 20px 0px 0px 0px;
   }

   h5 {
      font-size: 1.3em;
      font-weight: 700;
      line-height: 1.1em;
   }

   .form_group.col-md-6 {
      background: #72f19d;
      padding: 13px;
      border-radius: 12px;
      width: 259px;
      margin-left: 309px;
   }
</style>
<div class="col-md-12">
   <div class="sidebar">
      <aside class="widget">
         <div class="vbf">
            <h2 class="form_title"><i class="fa fa-calendar"></i>Thông Tin Của Bạn</h2>
            <form class="inner" method="post" action="{{route('booking.checkout',$bookings->id)}}">
               @csrf
               <div class="card">
                  <div class="form-group">
                     Tên người liên hệ:
                     <input class="form-control" name="name" type="text" value="{{old('name')}}">
                     @if ($errors->any())
                     <p style="color:red">{{ $errors->first('name') }}</p>
                     @endif
                     <span>*Nhập tên như trên CMND/hộ chiếu</span>
                  </div>
                  <div class="form-group col-md-6">
                     Số Điện Thoại:
                     <input class="form-control" name="phone" type="text" value="{{old('phone')}}">
                     @if ($errors->any())
                     <p style="color:red">{{ $errors->first('phone') }}</p>
                     @endif
                  </div>
                  <div class="form-group col-md-6">
                     Email:
                     <input class="form-control" name="email" type="email" value="{{old('email')}}">
                     @if ($errors->any())
                     <p style="color:red">{{ $errors->first('email') }}</p>
                     @endif
                     <span>VD:email@example.com</span>
                  </div>
                  <div class="form-group col-md-6">
                     Địa Chỉ:
                     <input class="form-control" name="address" type="text" value="{{old('address')}}">
                     @if ($errors->any())
                     <p style="color:red">{{ $errors->first('address') }}</p>
                     @endif
                  </div>
                  <div class="form-group col-md-6">
                     Số CMND/CCCD:
                     <input class="form-control" name="cmnd" value="{{old('cmnd')}}">
                     @if ($errors->any())
                     <p style="color:red">{{ $errors->first('name') }}</p>
                     @endif
                  </div>
                  <div class="col-md-6 col-sm-6 arrival_date md_pl5 md_nopadding_right">
                     <div class="form-group">
                        <div class="form_date">
                           Ngày Nhận Phòng
                           <input type="date" name="booking_checkin"
                              placeholder="Ngày đến" value="{{old('booking_checkin')}}">
                              @if ($errors->any())
                              <p style="color:red">{{ $errors->first('booking_checkin') }}</p>
                              @endif
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 departure_date md_pr5 md_nopadding_left">
                     <div class="form-group">
                        <div class="form_date departure">
                           Ngày Trả Phòng
                           <input type="date" name="booking_checkout"
                              placeholder="Ngày đi" value="{{old('booking_checkout')}}">
                              @if ($errors->any())
                              <p style="color:red">{{ $errors->first('booking_checkout') }}</p>
                              @endif
                        </div>
                     </div>
                  </div>
               </div>
               <button type=" submit" class="btn btn-primary" >
                  Tiếp Tục
               </button>
            </form>
         </div>
      </aside>
   </div>
</div>


@endsection