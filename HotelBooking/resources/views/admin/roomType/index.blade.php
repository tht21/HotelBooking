@extends('layouts.admin.app')
@section('content')
<div class="page-inner">
@include('layouts.admin.includes.content',['key'=> 'Loại Phòng ','name'=> ' Quản Lý Phòng','key' => 'Loại Phòng'])

   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <div class="d-flex align-items-center">
                  <h4 class="card-title">Danh Sách Loại Phòng</h4>
                  @if(Auth::user()->hasPermission('RoomType_create'))
                  <a href="{{route('roomtype.create')}}" class="btn btn-primary btn-round ml-auto"  >
                     <i class="fa fa-plus"></i>
                     Thêm Loại Phòng
                  </a>
                  @endif
               </div> 
                  <ul class="nav nav-tabs card-header-tabs">
                     <div class="all">
                      <li class="nav-item1">
                          <a class="nav-link active" href="{{route('roomtype.index')}}">Tất Cả</a>
                      </li>
                     </div>
                     <div class="trash">
                      <li class="nav-item2">
                          <a class="nav-link active " href="{{route('roomtype.trash')}}">Thùng Rác</a>
                      </li>
                     </div>
                  </ul>
             
            </div>
            <div class="card-body">
               @if (Session::has('success'))
               <div class="text text-success"><b>{{session::get('success')}}</b></div>
               @endif
               @if (Session::has('error'))
               <div class="text text-danger"><b>{{session::get('error')}}</b></div>
               @endif
             <div class="table-responsive">
                  <table id="add-row" id="basic-datatables"  class="display table table-striped table-hover" >
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Tên Loại Phòng</th>
                           <th>Số Người</th>
                           <th style="width: 10%">Action</th>
                        </tr>
                     </thead>

                     <tbody>
                        @foreach ($roomtypes as $key => $roomtype )

                        <tr>
                           <td>{{$key = $key + 1}}</td>
                           <td>{{$roomtype->name}}</td>
                           <td>{{$roomtype->limit_people}}</td>
                           <td>
                              <div class="form-button-action">
                                 @if(Auth::user()->hasPermission('RoomType_update'))
                                 <a href="{{route('roomtype.edit',$roomtype->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Chỉnh Sửa Loại Phòng">
                                    <i class="fa fa-edit"></i>
                                 </a>
                                 @endif
                                 {{-- <a href="{{route('roomtype.destroy',$roomtype->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa" onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                    <i class="fa fa-trash"></i>
                                 </a> --}}
                                 @if(Auth::user()->hasPermission('RoomType_delete'))
                                 <form action="{{ route('roomtype.destroy',$roomtype->id)}}" style="display:inline" method="post">
                                    <button onclick="return confirm('Xóa {{$roomtype->name}} ?')" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa" ><i class="far fa-trash-alt"></i></button>
                                    @csrf
                                    @method('delete')
                                </form>
                                @endif
                              </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  {{$roomtypes->appends(request()->query())}}
               </div>

            </div>
        </div>
    </div>
   </div>
</div>
@endsection
