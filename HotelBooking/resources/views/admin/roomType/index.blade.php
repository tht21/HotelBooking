@extends('Layouts.admin.app')
@section('content')
<div class="page-inner">
@include('Layouts.admin.includes.content',['key'=> 'Loại Phòng ','name'=> ' Quản Lý Phòng','key' => 'Loại Phòng'])

   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <div class="d-flex align-items-center">
                  <h4 class="card-title">Danh Sách Loại Phòng</h4>
                  <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                     <i class="fa fa-plus"></i>
                     Thêm Loại Phòng
                  </button>
               </div>
            </div>
            <div class="card-body">
               <!-- Modal -->
               <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header no-bd">
                           <h5 class="modal-title">
                              <span class="fw-mediumbold">
                              New</span> 
                              <span class="fw-light">
                                 Row
                              </span>
                           </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                       
                        <div class="modal-footer no-bd">
                           <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="table-responsive">
                  <table id="add-row" class="display table table-striped table-hover" >
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Tên Loại Phòng</th>
                           <th>Trạng Thái</th>
                           <th style="width: 10%">Action</th>
                        </tr>
                     </thead>
      
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>hahah</td>
                           <td>mở</td>
                           <td>
                              <div class="form-button-action">
                                 <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                    <i class="fa fa-edit"></i>
                                 </button>
                                 <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                    <i class="fa fa-trash"></i>
                                 </button>
                              </div>
                           </td>
                        </tr>
                       
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection