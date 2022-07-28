@extends('layouts.web.app')
@section('content')
<main id="rooms_list">
   <div class="container">
      @foreach ($rooms as $room)
       <article class="room_list">
           <div class="row row-flex">
               <div class="col-lg-4 col-md-5 col-sm-12">
                   <figure>
                       <a href="#" class="hover_effect h_link h_blue">
                           <img src="{{asset($room->image_path)}}" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>
               <div class="col-lg-8 col-md-7 col-sm-12">
                   <div class="room_details row-flex">
                       <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                           <h3><a href="room.html">{{$room->room_type->name}}</a></h3>
                           <p>{{$room->description}}</p>
                           <div class="room_services">
                               <i class="fa fa-coffee" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Breakfast Included"
                                   data-original-title="Breakfast"></i>
                               <i class="fa fa-cutlery" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Restaurant"
                                   data-original-title="Zante Restaurant"></i>
                           </div>
                       </div>
                       <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                           <div class="room_price_inner">
                               <span class="room_price_number"> {{number_format($room->price)}} VNĐ </span>
                               <small class="upper"> Mỗi Đêm </small>
                               <a href="#" class="button  btn_blue btn_full upper">Đặt Ngay</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
         </article>
         @endforeach

       {{-- <article class="room_list">
           <div class="row">
               <div class="col-lg-4 col-md-5 col-sm-12">
                   <figure>
                       <div class="room_list_slider owl-carousel">
                           <div class="item">
                               <a href="room.html" class="hover_effect h_link h_blue"><img
                                       src="images/rooms/double1.jpg" alt="Image"></a>
                           </div>
                           <div class="item">
                               <a href="room.html" class="hover_effect h_link h_blue"><img
                                       src="images/rooms/double2.jpg" alt="Image"></a>
                           </div>
                           <div class="item">
                               <a href="room.html" class="hover_effect h_link h_blue"><img
                                       src="images/rooms/double3.jpg" alt="Image"></a>
                           </div>
                       </div>
                   </figure>
               </div>
               <div class="col-lg-8 col-md-7 col-sm-12">
                   <div class="room_details">
                       <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                           <h3><a href="room.html"> Double Room - With Slider </a></h3>
                           <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                               euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                               minim veniam.</p>
                           <div class="room_services">
                               <i class="fa fa-coffee" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Breakfast Included"
                                   data-original-title="Breakfast"></i>
                               <i class="fa fa-cutlery" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Restaurant"
                                   data-original-title="Zante Restaurant"></i>
                               <i class="fa fa-television" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Plasma TV with cable Channel"
                                   data-original-title="Plasma TV"></i>
                           </div>
                       </div>
                       <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                           <div class="room_price_inner">
                               <span class="room_price_number"> €129,00 </span>
                               <small class="upper"> per night </small>
                               <a href="room.html" class="button  btn_blue btn_full upper">Book Now</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </article>

       <article class="room_list">
           <div class="row">
               <div class="col-lg-4 col-md-5 col-sm-12">
                   <figure>
                       <a href="room.html" class="hover_effect h_link h_blue">
                           <img src="images/rooms/delux.jpg" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>
               <div class="col-lg-8 col-md-7 col-sm-12">
                   <div class="room_details">
                       <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                           <h3><a href="room.html"> Delux Room </a></h3>
                           <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                               euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                               minim veniam.</p>
                           <div class="room_services">
                               <i class="fa fa-coffee" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Breakfast Included"
                                   data-original-title="Breakfast"></i>
                               <i class="fa fa-wifi" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Free WiFi"
                                   data-original-title="WiFi"></i>
                               <i class="fa fa-cutlery" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Restaurant"
                                   data-original-title="Zante Restaurant"></i>
                               <i class="fa fa-television" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Plasma TV with cable Channel"
                                   data-original-title="Plasma TV"></i>
                           </div>
                       </div>
                       <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                           <div class="room_price_inner">
                               <span class="room_price_number"> €189,00 </span>
                               <small class="upper"> per night </small>
                               <a href="room.html" class="button  btn_blue btn_full upper">Book Now</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </article>

       <article class="room_list">
           <div class="row">
               <div class="col-lg-4 col-md-5 col-sm-12">
                   <figure>
                       <a href="room.html" class="hover_effect h_link h_blue">
                           <img src="images/rooms/king.jpg" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>
               <div class="col-lg-8 col-md-7 col-sm-12">
                   <div class="room_details">
                       <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                           <h3><a href="room.html"> King Room </a></h3>
                           <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                               euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                               minim veniam.</p>
                           <div class="room_services">
                               <i class="fa fa-coffee" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Breakfast Included"
                                   data-original-title="Breakfast"></i>
                               <i class="fa fa-cutlery" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Restaurant"
                                   data-original-title="Zante Restaurant"></i>
                               <i class="fa fa-television" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Plasma TV with cable Channel"
                                   data-original-title="Plasma TV"></i>
                           </div>
                       </div>
                       <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                           <div class="room_price_inner">
                               <span class="room_price_number"> €219,00 </span>
                               <small class="upper"> per night </small>
                               <a href="room.html" class="button  btn_blue btn_full upper">Book Now</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </article>

       <article class="room_list">
           <div class="row">
               <div class="col-lg-4 col-md-5 col-sm-12">
                   <figure>
                       <a href="room.html" class="hover_effect h_link h_blue">
                           <img src="images/rooms/honeymoon.jpg" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>
               <div class="col-lg-8 col-md-7 col-sm-12">
                   <div class="room_details">
                       <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                           <h3><a href="room.html">Honeymoon Room </a></h3>
                           <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                               euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                               minim veniam.</p>
                           <div class="room_services">
                               <i class="fa fa-coffee" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Breakfast Included"
                                   data-original-title="Breakfast"></i>
                               <i class="fa fa-cutlery" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Restaurant"
                                   data-original-title="Zante Restaurant"></i>
                               <i class="fa fa-television" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Plasma TV with cable Channel"
                                   data-original-title="Plasma TV"></i>
                           </div>
                       </div>
                       <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                           <div class="room_price_inner">
                               <span class="room_price_number"> €289,00 </span>
                               <small class="upper"> per night </small>
                               <a href="room.html" class="button  btn_blue btn_full upper">Book Now</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </article>

       <article class="room_list">
           <div class="row">
               <div class="col-lg-4 col-md-5 col-sm-12">
                   <figure>
                       <a href="room.html" class="hover_effect h_link h_blue">
                           <img src="images/rooms/family.jpg" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>
               <div class="col-lg-8 col-md-7 col-sm-12">
                   <div class="room_details">
                       <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                           <h3><a href="room.html"> Family Room </a></h3>
                           <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                               euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                               minim veniam.</p>
                           <div class="room_services">
                               <i class="fa fa-coffee" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Breakfast Included"
                                   data-original-title="Breakfast"></i>
                               <i class="fa fa-cutlery" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Restaurant"
                                   data-original-title="Zante Restaurant"></i>
                               <i class="fa fa-television" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Plasma TV with cable Channel"
                                   data-original-title="Plasma TV"></i>
                           </div>
                       </div>
                       <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                           <div class="room_price_inner">
                               <span class="room_price_number"> €149,00 </span>
                               <small class="upper"> per night </small>
                               <a href="room.html" class="button  btn_blue btn_full upper">Book Now</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </article> --}}
       {{-- <nav class="a_center">
           <ul class="pagination mt50 mb0">
               <li class="prev_pagination"><a href="#"><i class="fa fa-angle-left"></i></a></li>
               <li class="active"><a href="#">1</a></li>
               <li><a href="#">2</a></li>
               <li><a href="#">3</a></li>
               <li><a href="#">4</a></li>
               <li><a href="#">5</a></li>
               <li><a href="#">6</a></li>
               <li class="next_pagination"><a href="#"><i class="fa fa-angle-right"></i></a></li>
           </ul>
       </nav> --}}
   </div>
</main>
@endsection