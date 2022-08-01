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
                                                <span> Ngày</span></div>
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
                                <h2 class="form_title"><i class="fa fa-calendar"></i>ĐẶT PHÒNG ONLINE</h2>
                                <form id="booking-form" class="inner" method="post"
                                      action="{{route('booking.addRoom',$rooms->id)}}">
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-control" name="name"
                                               placeholder="Nhập họ và tên" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="email"
                                               placeholder="Nhập địa chỉ email" type="email">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="phone"
                                               placeholder="Nhập số điện thoại" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="limit_people"
                                               placeholder="Số lượng người" type="number">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="input-group">
                                            <div class="form_date">
                                                <input type="text" class="datepicker form-control md_noborder_right"
                                                       name="from_date" placeholder="Ngày đặt phòng" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="input-group">
                                            <div class="form_date">
                                                <input type="text" class="datepicker form-control"
                                                       name="to_date" placeholder="Ngày trả phòng" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="button btn_lg btn_blue btn_full" type="submit">ĐẶT PHÒNG NGAY
                                    </button>

                                </form>
                            </div>
                        </aside>


                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
