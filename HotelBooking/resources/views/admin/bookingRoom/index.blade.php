@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('layouts.admin.includes.content',['key'=>'Danh sách đặt phòng','name'=>'Quản lý phòng','key'=>'Danh sách đặt phòng'])
        <div class="m-3">

        </div>
    </div>
    <div class="content">
        <div class="page-inner">
            <div class="row">
                @foreach($rooms as $room)
                    <div class="col-6 col-sm-4 col-lg-2">
                        <div class="card">
                            <div class="card-body p-3 text-center">

                                <div class="h1 m-0">
                                    {{$room->name}}
                                </div>
                                <div
                                    class="text-muted mb-3 text-success">{{$room->status==='0'?'Còn phòng':'Hết phòng'}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
