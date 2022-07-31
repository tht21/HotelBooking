@extends('layouts.admin.app')
@section('content')
<div class="page-inner">
    @include('layouts.admin.includes.content',['key'=>'Danh sách đặt phòng','name'=>'Quản lý phòng','key'=>'Danh sách
    đặt phòng'])
    <div class="m-3">

    </div>
</div>
<div class="content">
    <form action="{{route('bookingrooms.index')}}" method="get" id="filter">
        <div class="page-inner">
            <div class="custom-control custom-radio custom-control-inline">
                <input name="status" type="radio" id="customRadioInline3" value="2" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline3">Tất Cả</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input name="status" type="radio" id="customRadioInline1" value="1" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline1">Hết phòng</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input name="status" type="radio" id="customRadioInline2" value="0" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">Còn phòng</label>
            </div>
        </div>
    </form>
    <div class="page-inner">
        <div class="row">
            @foreach($rooms as $room)
            @if ($_REQUEST['status'] == $room->status)
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="h1 m-0">
                            {{$room->name}}
                        </div>
                        <div class="text-muted mb-3 text-success">{{$room->status==='0'?'Còn phòng':'Hết phòng'}}</div>
                    </div>
                </div>
            </div>
            @endif
            @if ($_REQUEST['status'] == 2)
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="h1 m-0">
                            {{$room->name}}
                        </div>
                        <div class="text-muted mb-3 text-success">{{$room->status ==='0'?'Còn phòng':'Hết phòng'}}</div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
  $(".custom-control-input").change(function(){
   //filter
   $('#filter').submit();
  });   
 
});
</script>
@endsection