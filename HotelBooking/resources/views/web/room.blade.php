@extends('layouts.web.app')
@section('content')
    <style>
        .col-8 {
            margin-left: 896px;
        }

        .row {
            display: flex;
        }
    </style>
    <main id="rooms_list">
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-4"></div>
                <div class="col-lg-6">
                    <form class="navbar-form navbar-left" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nhập tên phòng..."
                                           name='search'>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                                    <h3><a href="{{route('roomDetail.index',$room->id)}}">{{$room->room_type->name}}</a>
                                    </h3>
                                    <p>{!! $room->convenient !!}}</p>
                                    <p>Tầng: <span
                                            style="background-color: rgb(45, 245, 82)">{{$room->room_floor->name}}</span>
                                    </p>
                                    @if ($room->status === 0)
                                        <p>Tình Trạng: <span style="background-color: rgb(45, 245, 82)">Còn Phòng</span>
                                        </p>
                                    @endif
                                    <p>Số Người: {{$room->room_type->limit_people}}</p>
                                    <div class="room_services">
                                        <i class="fa fa-coffee" data-toggle="popover" data-placement="top"
                                           data-trigger="hover"
                                           data-content="Cà phê miễn phí" data-original-title="Coffee"></i>
                                        <i class="fa fa-cutlery" data-toggle="popover" data-placement="top"
                                           data-trigger="hover"
                                           data-content="Bữa sáng miễn phí" data-original-title="Food"></i>
                                        <i class="fa fa-wifi" data-toggle="popover" data-placement="top"
                                           data-trigger="hover"
                                           data-content="Wifi miễn phí" data-original-title="Wifi"></i>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                            <div class="room_price_inner">
                                <span class="room_price_number"> {{number_format($room->price)}} VNĐ </span>
                                <small class="upper"> Một Ngày</small>
                                @if ($room->status == 0)
                                    <a href="{{route('booking.addRoom',$room->id)}}"
                                       class="button  btn_blue btn_full upper">Đặt Ngay</a>
                                @endif
                                @if ($room->status == 1)

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        @endforeach
        {{$rooms->appends(request()->query())}}
    </div>
</main>
@endsection
