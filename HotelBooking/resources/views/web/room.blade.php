@extends('layouts.web.app')
@section('content')
<style>
    span {
        color: white;
        border-radius: 3px;
        padding: 3px;
    }
</style>
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
                            <h3><a href="{{route('roomDetail.index',$room->id)}}">{{$room->room_type->name}}</a></h3>
                            <p>{{$room->description}}</p>
                            @if ($room->status == 'hết phòng')
                            <p>Tình Trạng: <span style="background-color: red">{{$room->status}}</span></p>
                            @endif
                            @if ($room->status == 'còn phòng')
                            <p>Tình Trạng: <span style="background-color: rgb(45, 245, 82)">{{$room->status}}</span></p>
                            @endif
                            <p>Số Người: {{$room->room_type->limit_people}}</p>
                            <div class="room_services">
                                <i class="fa fa-coffee" data-toggle="popover" data-placement="top" data-trigger="hover"
                                    data-content="Cà phê miễn phí" data-original-title="Coffee"></i>
                                <i class="fa fa-cutlery" data-toggle="popover" data-placement="top" data-trigger="hover"
                                    data-content="Bữa sáng miễn phí" data-original-title="Food"></i>
                                <i class="fa fa-wifi" data-toggle="popover" data-placement="top" data-trigger="hover"
                                    data-content="Wifi miễn phí" data-original-title="Wifi"></i>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                            <div class="room_price_inner">
                                <span class="room_price_number"> {{number_format($room->price)}} VNĐ </span>
                                <small class="upper"> Một Ngày</small>
                                @if ($room->status == 'còn phòng')
                                <a href="{{route('booking.index',$room->id)}}" class="button  btn_blue btn_full upper">Đặt Ngay</a>
                                @endif
                                @if ($room->status == 'hết phòng')
                                {{-- <a href="#" class="button  btn_blue btn_full upper">Đặt Ngay</a> --}}
                                <button style="background-color: rgb(40, 136, 255)">Quý khách thông cảm phòng này hiện
                                    đã có người đặt</button>
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