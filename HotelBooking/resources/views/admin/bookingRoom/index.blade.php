@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=>'Danh sách đặt phòng','name'=>'Quản lý phòng','key'=>'Danh sách đặt phòng'])
        <div class="m-3">
            <ul class="nav nav-tabs card-header-tabs">
                <div class="all">
                    <li class="nav-item1">
                        <a class="nav-link active" href="{{route('rooms.index')}}">Tất Cả</a>
                    </li>
                </div>
                <div class="trash ">
                    <li class="nav-item2">
                        <a class="nav-link active " href="{{route('rooms.trash')}}">Thùng Rác</a>
                    </li>
                </div>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="page-inner">
            <div class="row">
                @foreach($rooms as $room)
                    <div class="col-6 col-sm-4 col-lg-2">
                        <div class="card">
                            <div class="card-body p-3 text-center">
                                <div class="text-right text-success">
                                    6%
                                    <i class="fa fa-chevron-up"></i>
                                </div>
                                <div class="h1 m-0">
                                    {{$room->name}}
                                </div>
                                <div class="text-muted mb-3">{{$room->status}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <div class="text-right text-danger">
                                -3%
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="h1 m-0">17</div>
                            <div class="text-muted mb-3">Closed Today</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <div class="text-right text-success">
                                9%
                                <i class="fa fa-chevron-up"></i>
                            </div>
                            <div class="h1 m-0">7</div>
                            <div class="text-muted mb-3">New Replies</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <div class="text-right text-success">
                                3%
                                <i class="fa fa-chevron-up"></i>
                            </div>
                            <div class="h1 m-0">27.3K</div>
                            <div class="text-muted mb-3">Followers</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <div class="text-right text-danger">
                                -2%
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="h1 m-0">$95</div>
                            <div class="text-muted mb-3">Daily Earnings</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <div class="text-right text-danger">
                                -1%
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="h1 m-0">621</div>
                            <div class="text-muted mb-3">Products</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
