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
            </div>
        </div>
    </div>

@endsection
