@extends('layouts.web.app')
@section('content')
<main id="room_page">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <div class="main_title mt50">
               <h2>GIỚI THIỆU VỀ KHÁCH SẠN ZANTE HOTEL</h2>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
               laoreet dolore
               magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
               suscipit lobortis
               nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit
               esse
               molestie consequat, vel illum dolore eu feugiat nulla facilisis</p>
            <p> at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis
               dolore te
               feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming
               id quod mazim
               placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum
               claritatem.
               Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius</p>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
               laoreet dolore
               magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
               suscipit lobortis
               nisl ut aliquip ex ea commodo consequat.</p>
            <div class="main_title t_style a_left s_title mt50">
               <div class="c_inner">
                  <h2 class="c_title">DỊCH VỤ</h2>
               </div>
            </div>
            <div class="room_facilitys_list">
               <div class="all_facility_list">
                  <div class="col-sm-4 nopadding">
                     <ul class="list-unstyled">
                        <li><i class="fa fa-check"></i>Giường Đôi</li>
                        <li><i class="fa fa-check"></i>6 Người</li>
                        <li><i class="fa fa-check"></i>Mạng miễn phí</li>
                     </ul>
                  </div>
                  <div class="col-sm-4 nopadding">
                     <ul class="list-unstyled">
                        <li><i class="fa fa-check"></i>Wi-Fi miễn phí</li>
                        <li><i class="fa fa-check"></i>Bao gồm bữa sáng</li>
                        <li><i class="fa fa-check"></i>Báo miễn phí</li>
                     </ul>
                  </div>
                  <div class="col-sm-4 nopadding_left">
                     <ul class="list-unstyled">
                        <li><i class="fa fa-check"></i>Tivi màn hình phẳng</li>
                        <li><i class="fa fa-check"></i>Nhìn ra bãi biển</li>
                        <li><i class="fa fa-check"></i>Có bể bơi</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="similar_rooms">
               <div class="main_title t_style5 l_blue s_title a_left">
                  <div class="c_inner">
                     <h2 class="c_title">DANH SÁCH PHÒNG</h2>
                  </div>
               </div>
               <div class="row" id="table_data">
                  @foreach ($rooms as $key => $room)
                  @if ($room->status == 'còn phòng')
                  <div class="col-md-4">
                     <article>
                        <figure>
                           <a href="#" class="hover_effect h_blue h_link"><img src="{{$room->image_path}}" alt="Image"
                                 class="img-responsive"></a>
                           <div class="price">{{number_format($room->price)}} VNĐ<span> Đêm</span></div>
                           <figcaption>
                              <h4><a href="">{{$room->room_type ? $room->room_type->name : ''}}</a></h4>
                              <span class="f_right"><a href="#" class="button btn_sm btn_blue">Xem Chi Tiết</a></span>
                           </figcaption>
                        </figure>
                     </article>
                  </div>
                  @endif
                  @endforeach
               </div>
               {{$rooms->appends(request()->query())}}
            </div>
         </div>
         <div class="col-md-4">
            <div class="sidebar">
               <aside class="widget">
                  <div class="vbf">
                     <h2 class="form_title"><i class="fa fa-calendar"></i> ĐẶT ONLINE</h2>
                     <form id="booking-form" class="inner">
                        <div class="form-group">
                           <input class="form-control" name="booking-name" placeholder="Nhập tên" type="text">
                        </div>
                        <div class="form-group">
                           <input class="form-control" name="booking-email" placeholder="Nhập địa chỉ email"
                              type="email">
                        </div>
                        <div class="form-group">
                           <input class="form-control" name="booking-phone" placeholder="Nhập số điện thoại"
                              type="text">
                        </div>
                        <div class="form-group">
                           <div class="form_select">
                              <select name="booking-roomtype" class="form-control" title="Chọn Loại Phòng"
                                 data-header="Loại Phòng" >
                                 @foreach ($roomtypes as $roomtype)
                                 <option value="Single Room" >{{$roomtype->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                           <div class="form_select">
                              <select name="booking-adults" class="form-control md_noborder_right" title="Người lớn"
                                 data-header="Adults">
                                 <option value="0">0</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                           <div class="form_select">
                              <select name="booking-children" class="form-control" title="Trẻ em"
                                 data-header="Children">
                                 <option value="0">0</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                           <div class="input-group">
                              <div class="form_date">
                                 Ngày Đến
                                 <input type="date" class="datepicker form-control md_noborder_right"
                                    name="booking-checkin" placeholder="Ngày Đến" >
                              </div>
                           </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                           <div class="input-group">
                              <div class="form_date">
                                 Ngày Đi
                                 <input type="date" class="datepicker form-control" name="booking-checkout"
                                    placeholder="Ngày Đi" >
                              </div>
                           </div>
                        </div>
                        <button class="button btn_lg btn_blue btn_full" type="submit">BOOK A ROOM NOW</button>
                        <div class="a_center mt10">
                           <a href="booking-form.html" class="a_b_f">Advanced Booking Form</a>
                        </div>
                     </form>
                  </div>
               </aside>
               <aside class="widget">
                  <h4>CẦN GIÚP ĐỠ?</h4>
                  <div class="help">
                     Nếu bạn có bất kỳ câu hỏi nào, xin vui lòng liên hệ với chúng tôi qua số điện thoại
                     <div class="phone"><i class="fa  fa-phone"></i><a href=""> 0925191689 </a></div>
                     Hoặc qua Email
                     <div class="email"><i class="fa  fa-envelope-o ">nguyenlinh23444@gmail.com</i><i
                           class="fa  fa-envelope-o "> quocvietk5959@gmail.com</i>
                     </div>
                  </div>
               </aside>
               
            </div>
         </div>
      </div>
   </div>
</main>
@endsection