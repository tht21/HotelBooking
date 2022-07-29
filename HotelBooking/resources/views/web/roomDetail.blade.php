@extends('layouts.web.app')
@section('content')

    <main id="room_page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="slider">
                        <div id="slider-larg" class="owl-carousel image-gallery">

                            <div class="item lightbox-image-icon">
                                <a href="{{$rooms->image_path}}"
                                   class="hover_effect h_lightbox h_blue">
                                    <img class="img-responsive" src="{{$rooms->image_path}}"
                                         s alt="Image">
                                </a>
                            </div>

                        </div>
                        <div id="thumbs" class="owl-carousel">
                            @foreach($rooms->room_image as $room )
                                <div class="item"><img class="img-responsive"
                                                       src="{{$room->name}}" alt="Image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="main_title mt50">
                        <h2>THÔNG TIN VỀ HOTEL</h2>
                    </div>
                    <p>{!! $rooms->description !!}</p>
                    <div class="main_title mt50">
                        <h2>TIỆN NGHI</h2>
                    </div>
                    <p>{!!$rooms->convenient!!}</p>
                    <div class="similar_rooms">
                        <div class="main_title t_style5 l_blue s_title a_left">
                            <div class="c_inner">
                                <h2 class="c_title">Phòng liên Quan</h2>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($roomTypes as $roomType )
                                <div class="col-md-4">
                                    <article>
                                        <figure>
                                            <a href="room.html" class="hover_effect h_blue h_link"><img
                                                    src="{{$roomType->image_path}}" alt="Image"
                                                    class="img-responsive"></a>
                                            <div class="price">{{Helper::convertToRupiah($roomType->price)}}
                                                <span> night</span></div>
                                            <figcaption>
                                                <h4><a href="room.html">{{$roomType->room_type->name}}</a></h4>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <aside class="widget">
                            <div class="vbf">
                                <h2 class="form_title"><i class="fa fa-calendar"></i> BOOK ONLINE</h2>
                                <form id="booking-form" class="inner">
                                    <div class="form-group">
                                        <input class="form-control" name="booking-name"
                                               placeholder="Enter Your Name" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="booking-email"
                                               placeholder="Enter Your Email Address" type="email">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="booking-phone"
                                               placeholder="Enter Your Phone Number" type="text">
                                    </div>
                                    <div class="form-group">
                                        <div class="form_select">
                                            <select name="booking-roomtype" class="form-control"
                                                    title="Select Room Type" data-header="Room Type" disabled>
                                                <option value="Single Room" selected>Single Room</option>
                                                <option value="Double Room">Double Room</option>
                                                <option value="Deluxe Room">Deluxe Room</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="form_select">
                                            <select name="booking-adults" class="form-control md_noborder_right"
                                                    title="Adults" data-header="Adults">
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
                                            <select name="booking-children" class="form-control" title="Children"
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
                                                <input type="text" class="datepicker form-control md_noborder_right"
                                                       name="booking-checkin" placeholder="Arrival Date" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="input-group">
                                            <div class="form_date">
                                                <input type="text" class="datepicker form-control"
                                                       name="booking-checkout" placeholder="Departure Date" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="button btn_lg btn_blue btn_full" type="submit">BOOK A ROOM
                                        NOW
                                    </button>
                                    <div class="a_center mt10">
                                        <a href="booking-form.html" class="a_b_f">Advanced Booking Form</a>
                                    </div>
                                </form>
                            </div>
                        </aside>
                        <aside class="widget">
                            <h4>Thông tin</h4>
                            <div class="help">
                                Nếu bạn có bất kỳ câu hỏi, xin đừng ngần ngại liên hệ với chúng tôi
                                <div class="phone"><i class="fa  fa-phone"></i><a href="tel:18475555555">
                                        1-888-123-4567 </a></div>
                                <div class="email"><i class="fa  fa-envelope-o "></i><a
                                        href=""><span
                                            class="__cf_email__"
                                            data-cfemail="aecdc1c0dacfcddaeeddc7dacb80cdc1c3">[email&#160;protected]</span></a>
                                    or use <a href="contact.html"> contact form</a></div>
                            </div>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
