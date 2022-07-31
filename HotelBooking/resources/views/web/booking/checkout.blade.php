@extends('layouts.web.app')
@section('content')
    <main id="booking_page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="booking_advanced">
                        <div class="main_title a_left upper">
                            <h2>Thông tin liên hệ</h2>
                        </div>

                        <div class="row">
                            <form id="booking_form_advanced" method="post" action="{{route('booking.pay')}}">
                                @csrf
                                <div class="col-md-8">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Họ Tên</label>
                                            <input name="name" type="text" class="form-control"
                                                   placeholder="Your Name" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" type="email"
                                                   placeholder="Your Email Address" value="{{old('email')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input name="phone" type="text" class="form-control"
                                                   placeholder="Your Phone Number" value="{{old('phone')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Số CMND</label>
                                            <input name="cmnd" type="password" class="form-control"
                                                   placeholder="Your CMND Number" value="{{old('password')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input name="address" type="text" class="form-control"
                                                   placeholder="Nhập địa chỉ" value="{{old('address')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Ghi chú</label>
                                            <textarea class="form-control" name="note"
                                                      placeholder="Your Comments..."></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Mã phòng</label>
                                                <input class="form-control" name="room_id" type="number"
                                                       placeholder="" value="{{$rooms->id}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ngày đặt phòng
                                                    <a href="#" title="Arrival" data-toggle="popover"
                                                       data-placement="top"
                                                       data-trigger="hover" data-content="Check In from 11:00 am"> <i
                                                            class="label_icon_info fa fa-info-circle"></i></a>
                                                </label>
                                                <div class="form_date">
                                                    <input type="text" class="datepicker form-control "
                                                           name="from_date" placeholder="Arrival Date" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ngày trả phòng
                                                    <a href="#" title="Departure" data-toggle="popover"
                                                       data-placement="top"
                                                       data-trigger="hover" data-content="Check Out from 12:00 am"> <i
                                                            class="label_icon_info fa fa-info-circle"></i></a>
                                                </label>
                                                <div class="form_date">
                                                    <input type="text" class="datepicker form-control"
                                                           name="to_date" placeholder="Departure Date" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Số người
                                                    <a href="#" title="Adults" data-toggle="popover"
                                                       data-placement="top"
                                                       data-trigger="hover" data-content="+18 years"> <i
                                                            class="label_icon_info fa fa-info-circle"></i></a>
                                                </label>
                                                <div class="form_select">
                                                    <select name="limit_people" class="form-control" title="Adults"
                                                            data-header="Adults">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="button btn_blue pull-right"><i
                                            class="fa fa-calendar-check-o" aria-hidden="true"></i> Đặt phòng
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>
@endsection
