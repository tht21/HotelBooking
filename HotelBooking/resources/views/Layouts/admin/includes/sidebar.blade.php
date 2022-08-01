<div class="sidebar sidebar-style-2">
   <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
         <div class="user">
            <div class="avatar-sm float-left mr-2">
               <img src="{{asset($profile_user->avatar)}}" width="100px" height="100px" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
               <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">

                  <span>
                      {{$profile_user->name }}
                     <span class="user-level">{{ $profile_user->userGroup->name }}</span>
                     <span class="caret"></span>
                  </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{route('profile.index')}}">
                                    <span class="link-collapse">Hồ Sơ</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Cài Đặt</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
         <ul class="nav nav-primary">
            <li class="nav-item active">
               <a href="{{route('home')}}">
                  <i class="fas fa-home"></i>
                  <p>Thống Kê</p>
               </a>
            </li>
            <li class="nav-section">

               <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
               </span>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Đặt Phòng</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            @if(Auth::user()->hasPermission('Bookings_viewAny'))
                            
                            <li>
                                <a href="{{route('bookingrooms.index')}}?status=2">
                                    <span class="sub-item">Xem Dạng Danh Sách</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('bookingrooms.list')}}">
                                    <span class="sub-item">Danh Sách đặt phòng</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @if(Auth::user()->hasPermission('Customers_viewAny'))
             <li class="nav-item">
                 <a href="{{route('customers.index')}}">
                     <i class="fas fa-th-list"></i>
                     <p>Khách Hàng</p>
                 </a>
             </li>
             @endif
             <li class="nav-item">
                    <a data-toggle="collapse" href="#tables">
                        <i class="fas fa-table"></i>
                        <p>Quản Lý Phòng</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav nav-collapse">
                            @if(Auth::user()->hasPermission('RoomType_viewAny'))
                            <li>
                                <a href="{{route('roomtype.index')}}">
                                    <span class="sub-item">Loại Phòng</span>
                                </a>
                            </li>
                            @endif
                            @if(Auth::user()->hasPermission('Rooms_viewAny'))
                            <li>
                                <a href="{{route('rooms.index')}}">
                                    <span class="sub-item">Phòng</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
             </li>
             @if(Auth::user()->hasPermission('User_viewAny'))
                 <li class="nav-item">
                     <a href="{{route('users.index')}}">
                         <i class="fas fa-user"></i>
                         <p>Nhân Viên</p>
                     </a>
                 </li>
             @endif
             @if(Auth::user()->hasPermission('UserGroup_viewAny'))
                 <li class="nav-item">
                     <a href="{{route('usergroups.index')}}">
                         <i class="fas fa-users"></i>
                         <p>Nhóm Nhân Viên</p>
                     </a>
                 </li>
             @endif

             <li class="nav-item">
                 <a href="#forms">
                     <i class="fas fa-list"></i>
                     <p>Menu</p>
                 </a>
             </li>
             <li class="nav-item">
                 <a href="#maps">
                     <i class="fas fa-phone"></i>
                        <p>Liên Hệ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#charts">
                        <i class="far fa-bell"></i>
                        <p>Theo Dõi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#submenu">
                        <i class="fas fa-cog fa-spin"></i>
                        <p>Cài Đặt</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="submenu">
                        <ul class="nav nav-collapse">
                            <li>
                                <a data-toggle="collapse" href="#subnav1">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav1">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a data-toggle="collapse" href="#subnav2">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav2">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Level 1</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
