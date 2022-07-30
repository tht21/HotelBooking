@extends('layouts.web.app')
@section('content')
<style>
   form.inner1 {
    height: 400px;
}
.col-md-6 {
    margin-left: 305px;
}
.card {
    padding: 10px 0px 0px 20px;
}
a.btn.btn-warning {
    margin: 18px 347px 18px 2px;
}
</style>
<div class="container">
<div class="col-md-6">
   <div class="sidebar">
      <aside class="widget">
         <div class="vbf">
            <h2 class="form_title"><i class="fa fa-dollar"></i> Chi Tiết Thanh Toán</h2>
            <form class="inner1" method="post" action="">
               @csrf
               <div class="card">
                  <div class="form-group">
                     <p> Tên Khách Hàng: {{$checks['name']}}</p>
                   </div>
                  <div class="form-group">
                     <p> Số Phòng: {{$rooms->name}}</p>
                   </div>
                  <div class="form-group">
                    <p> Loại Phòng: {{$rooms->room_type->name}}</p>
                  </div>
                  <div class="form-group">
                     <p>Số Người: {{$rooms->room_type->limit_people}}</p>
                   </div>
                  <div class="form-group">
                     <p>Giá: {{number_format($rooms->price)}}  VND/ Ngày</p>
                  </div>
                  <div class="form-group">
                     <p>Thời Gian: từ <b>{{$checks['booking_checkin']}}</b> đến <b>{{$checks['booking_checkout']}}</b></p>
                  </div>
               <div class="form-group">
                  <div class="form-group">
                     <h4>Phương thức thanh toán:</h4>
                     <span style="color: red">Thanh toán khi nhận phòng</span>
                  </div>
                  <div class="form-group">
                     <h4>Tổng Tiền: {{number_format($rooms->price * $total)}} VND</h4> 
                  </div>
               </div>
               <button type="submit" class="btn btn-primary" >
                  Tiếp Tục
               </button>
            </form>
            <a onclick="history.back()" class="btn btn-warning">Quay Lại</a>
         </div>
      </aside>
   </div>
</div>
</div>
@endsection