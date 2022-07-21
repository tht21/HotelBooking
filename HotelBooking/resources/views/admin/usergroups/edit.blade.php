@extends('layouts.admin.app')
@section('content')
<div class="page-inner">
@include('layouts.admin.includes.content',['key'=> 'Nhóm Nhân Viên ','name'=> 'Quản Lý Nhóm Nhân Viên','key' => 'Nhóm Nhân Viên'])

   <div class="content-wrapper">
      <div class="container-fluid">
         <header class="page-title-bar">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item active">
                     <a href="{{route('usergroups.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản
                        Lý
                        Nhóm Nhân Viên</a>
                  </li>
               </ol>
            </nav>
            <h1 class="page-title"> Chỉnh Sửa Nhóm Nhân Viên </h1>
         </header>

         <div class="page-section">
            <form method="post" action="{{route('usergroups.update',$item->id)}}">
               @csrf
               @method('PUT')
               <div class="card">
                  <div class="card-body">
                     <legend>Thông tin cơ bản</legend>
                     <div class="form-group">
                        <label for="tf1">Tên nhóm</label> <input name="name" value="{{$item->name }}" type="text"
                           class="form-control" id="" placeholder="Nhập tên nhóm"> <small id=""
                           class="form-text text-muted"></small>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                     </div>
                     <div class="form-group">
                        <label class="form-check form-switch">Quyền hạn
                           <input style="margin-left: 0.5em;" type="checkbox" id="checkAll" class="form-check-input"
                              value="Quyền hạn">
                        </label>
                        <div class="row">
                           @foreach ($group_names as $group_name => $roles)
                           <div class="list-group list-group-flush list-group-bordered col-lg-4">
                              <div class="list-group-header" style="color:rgb(50, 219, 101) ;">
                                 <h5> {{ __($group_name) }}</h5>
                              </div>
                              @foreach ($roles as $role)
                              <div class="list-group-item d-flex justify-content-between align-items-center">
                                 <span style="color: aliceblue ;">{{ __($role['name']) }}</span>
                                 <!-- .switcher-control -->
                                 <label class="form-check form-switch">
                                    <input type="checkbox" @checked( in_array($role['id'],$userRoles) ) name="roles[]"
                                       class="checkItem form-check-input" value="{{ $role['id'] }}">
                                    <span class="switcher-indicator"></span>
                                 </label>
                                 <!-- /.switcher-control -->
                              </div>
                              @endforeach
                           </div>
                           @endforeach
                        </div>
                     </div>
                     <div class="form-actions">
                        <a class="btn btn-secondary float-right " href="{{route('usergroups.index')}}">Hủy</a>
                        <button style="float: right;" class="btn btn-dark ml-auto mr-2"
                           type="submit">Lưu<noscript></noscript> </button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <script>
      $('#checkAll').click(function () {
        $(':checkbox.checkItem').prop('checked', this.checked);
});
   </script>
   @endsection