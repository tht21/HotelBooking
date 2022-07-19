@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        @include('Layouts.admin.includes.content',['key'=> 'Chỉnh sửa Phòng ','name'=> ' Quản Lý Phòng','key' => 'Chỉnh sửa Phòng'])
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('rooms.update',$room->id)}}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Chỉnh Sửa Phòng</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="text">Tên phòng</label>
                                        <input type="text" name="name" class="form-control" id="email2"
                                               placeholder="Nhập tên phòng" value="{{$room->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Giá phòng</label>
                                        <input type="text" name="price" class="form-control" id="password"
                                               placeholder="Nhập giá phòng" value="{{$room->price}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Loại phòng</label>
                                        <select class="form-control" name="room_types" id="exampleFormControlSelect1">
                                            @foreach($roomTypes as $roomType)
                                                <option
                                                    value="{{$roomType->id}}" @selected(old('room_types')==$roomType->id)>{{$roomType->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Tầng</label>
                                        <select class="form-control" name="floor" id="exampleFormControlSelect1">
                                            @foreach($floors as $floor)
                                                <option
                                                    value="{{$floor->id}}" @selected(old('floor')==$floor->id)>{{$floor->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Tiện nghi</label>
                                        <textarea id="summer" data-toggle="summernote" name="convenient" type="text"
                                                  class="form-control">{{$room->convenient}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Ảnh</label>
                                        <input type="file" name="image_path" class="form-control-file"
                                               id="exampleFormControlFile1">
                                        <br>
                                        <img src="{{$room->image_path}}" height="70" width="80">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Ảnh Chi tiết</label>
                                        <input type="file" name="room_image_path[]" class="form-control-file"
                                               id="exampleFormControlFile1" multiple>
                                        <br>
                                        <div class="row ">
                                            @foreach($room->room_image as $producImageItem)
                                                <div class="col-md-3">
                                                    <img class="image_detail_product"
                                                         src="{{ $producImageItem->name }}" alt="">
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Mô tả phòng</label>
                                        <textarea id="summernote" data-toggle="summernote" name="description"
                                                  type="text"
                                                  class="form-control">{{$room->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Tình trạng phòng</label>
                                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                                            <option value="còn phòng">Còn phòng</option>
                                            <option value="hết phòng">Hết phòng</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Chỉnh sửa</button>
                            <button class="btn btn-danger">Hủy</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



