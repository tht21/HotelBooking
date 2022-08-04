@extends('layouts.admin.app')
@section('content')
<div class="page-inner">
   @include('Layouts.admin.includes.content',['key'=>'','name'=>'Thống Kê','key'=>'Trang Chủ'])
            {{-- <h4 class="page-title">Card</h4> --}}
            <div class="row">
               <div class="col-sm-6 col-md-4">
                  <a href="{{route('rooms.index')}}">
                  <div class="card card-stats card-primary card-round">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-5">
                              <div class="icon-big text-center">
                                 <i class="flaticon-store"></i>
                              </div>
                           </div>
                           <div class="col-7 col-stats">
                              <div class="numbers">
                                 <p class="card-category">Tổng Số Phòng </p>
                                 <h4 class="card-title">{{$room_count}}</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </a>
               </div>
               <div class="col-sm-6 col-md-4">
                  <a href="{{route('users.index')}}">
                  <div class="card card-stats card-info card-round">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-5">
                              <div class="icon-big text-center">
                                 <i class="flaticon-profile-1"></i>
                              </div>
                           </div>
                           <div class="col-7 col-stats">
                              <div class="numbers">
                                 <p class="card-category">Tổng Số Nhân Viên</p>
                                 <h4 class="card-title">{{$user_count}}</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  </a>
               </div>
               <div class="col-sm-6 col-md-4">
                  <a href="{{route('customers.index')}}">
                  <div class="card card-stats card-success card-round">
                     <div class="card-body ">
                        <div class="row">
                           <div class="col-5">
                              <div class="icon-big text-center">
                                 <i class="flaticon-user"></i>
                              </div>
                           </div>
                           <div class="col-7 col-stats">
                              <div class="numbers">
                                 <p class="card-category">Tổng Số Khách Hàng</p>
                                 <h4 class="card-title">{{$customer_count}}</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  </a>
               </div>
            </div>
               
            <!-- Card With Icon States Color -->
            <div class="row">
               <div class="col-sm-6 col-md-4">
                  <a href="{{route('usergroups.index')}}">
                  <div class="card card-stats card-round">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-5">
                              <div class="icon-big text-center icon-info">
                                 <i class="flaticon-users"></i>
                              </div>
                           </div>
                           <div class="col-7 col-stats">
                              <div class="numbers">
                                 <p class="card-category">Tổng Nhóm Nhân Viên </p>
                                 <h4 class="card-title">{{$user_group_count}}</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  </a>
               </div>
               <div class="col-sm-6 col-md-4">
                  <a href="{{route('rooms.index')}}">
                  <div class="card card-stats card-round">
                     <div class="card-body ">
                        <div class="row">
                           <div class="col-5">
                              <div class="icon-big text-center icon-danger">
                                 <i class="flaticon-close"></i>

                              </div>
                           </div>
                           <div class="col-7 col-stats">
                              <div class="numbers">
                                 <p class="card-category">Số Phòng Bận</p>
                                 <h4 class="card-title">{{$busy_room}}</h4>
                                
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  </a>
               </div>
               <div class="col-sm-6 col-md-4">
                  <a href="{{route('rooms.index')}}">
                  <div class="card card-stats card-round">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-5">
                              <div class="icon-big text-center icon-primary">
                                 <i class="flaticon-circle"></i>
                              </div>
                           </div>
                           <div class="col-7 col-stats">
                              <div class="numbers">
                                 <p class="card-category">Số Phòng Còn Trống</p>
                                 <h4 class="card-title">{{$empty_room}}</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  </a>
               </div>
            </div>
            <!-- Card With Icon States Background -->
            <div class="row">
               <div class="col-sm-6 col-md-4">
                  <a href="{{route('rooms.index')}}">

                  <div class="card card-stats card-round">
                     <div class="card-body ">
                        <div class="row align-items-center">
                           <div class="col-icon">
                              <div class="icon-big text-center icon-warning bubble-shadow-small">
                                 <i class="flaticon-home"></i>
                              </div>
                           </div>
                           <div class="col col-stats ml-3 ml-sm-0">
                              <div class="numbers">
                                 <p class="card-category">Số Phòng Thường</p>
                                 <h4 class="card-title">{{$roomtype_count}}</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  </a>
               </div>
               <div class="col-sm-6 col-md-4">
                  <a href="{{route('rooms.index')}}">
                  <div class="card card-stats card-round">
                     <div class="card-body">
                        <div class="row align-items-center">
                           <div class="col-icon">
                              <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                 <i class="flaticon-home"></i>

                              </div>
                           </div>
                           <div class="col col-stats ml-3 ml-sm-0">
                              <div class="numbers">
                                 <p class="card-category">Số Phòng Vip</p>
                                 <h4 class="card-title">{{$roomtype_vip}}</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  </a>
               </div>
               <div class="col-sm-6 col-md-4">
                  <a href="{{route('bookingrooms.list')}}">
                  <div class="card card-stats card-round">
                     <div class="card-body">
                        <div class="row align-items-center">
                           <div class="col-icon">
                              <div class="icon-big text-center icon-success bubble-shadow-small">
                                 <i class="flaticon-interface-6"></i>
                              </div>
                           </div>
                           <div class="col col-stats ml-3 ml-sm-0">
                              <div class="numbers">
                                 <p class="card-category">Số Đơn Đặt Phòng</p>
                                 <h4 class="card-title">{{$order_room}}</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  </a>
               </div>
               
            </div>
         </div>
   
@endsection