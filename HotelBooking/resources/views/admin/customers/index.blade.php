@extends('layouts.admin.app')
@section('content')
<div class="page-inner">
@include('layouts.admin.includes.content',['key'=> 'Khách Hàng','name'=> 'Quản Lý Khách Hàng ','key'=> 'Khách Hàng '])

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h4 class="card-title">Quản Lý Khách Hàng</h4>
         </div>
         <div class="card-body">
               <div class="d-flex align-items-center">
                  <a href="{{route('customers.create')}}" class="btn btn-primary btn-round ml-auto" >
                     <i class="fa fa-plus"></i>
                     Thêm Khách Hàng
                  </a>
               </div>
               <div class="table-responsive">
               <table id="basic-datatables" class="display table table-striped table-hover" >
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Tên Khách Hàng</th>
                        <th>Email</th>
                        <th>Số ĐT</th>
                        <th>Địa Chỉ</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($customers as $key => $customer)
                        
                     <tr>
                        <td>{{ $key = $key + 1}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->address}}</td>
                        <td>
                           <div class="form-button-action">
                              <a href="{{route('customers.edit',$customer->id)}}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Chỉnh Sửa Thông Tin Khách Hàng">
                                 <i class="fa fa-edit"></i>
                              </a>
                              <form action="{{ route('customers.destroy',$customer->id)}}" style="display:inline" method="post">
                                 <button onclick="return confirm('Xóa {{$customer->name}} ?')" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa" ><i class="far fa-trash-alt"></i></button>
                                 @csrf
                                 @method('delete')
                             </form>
                           </div>
                        </td>
                     </tr>
                     @endforeach
                    
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection