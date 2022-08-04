<div class="hbf_3">
   <div class="container">
       <div class="inner">
           <form id="booking-form">
               <div class="row">
                   <div class="col-md-2 md_pr5">
                       <div class="form-group">
                           <input class="form-control" name="booking-email" type="email"
                               placeholder="Địa chỉ email">
                       </div>
                   </div>
                   <div class="col-md-2 md_p5">
                       <div class="form-group">
                           <div class="form_select">
                               <select name="booking-roomtype" class="form-control" title="Loại Phòng"
                                   data-header="Loại Phòng">
                                   @foreach ($roomtypes as $roomtype)
                                   <option value="Single">{{$roomtype->name}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="row">
                           <div class="col-md-6 col-sm-6 arrival_date md_pl5 md_nopadding_right">
                               <div class="form-group">
                                   <div class="form_date">
                                       <input type="text" class="datepicker form-control md_noborder_right"
                                           name="booking-checkin" placeholder="Ngày đến" readonly>
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-6 col-sm-6 departure_date md_pr5 md_nopadding_left">
                               <div class="form-group">
                                   <div class="form_date departure">
                                       <input type="text" class="datepicker form-control"
                                           name="booking-checkout" placeholder="Ngày đi" readonly>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="row">
                           <div class="col-md-6 col-sm-6 adults md_pl5 md_nopadding_right">
                               <div class="form-group">
                                   <div class="form_select">
                                       <select name="booking-adults" class="form-control md_noborder_right"
                                           title="Người Lớn" data-header="Adults">
                                           <option value="0">0</option>
                                           <option value="1">1</option>
                                           <option value="2">2</option>
                                           <option value="3">3</option>
                                           <option value="4">4</option>
                                       </select>
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-6 col-sm-6 children md_pr5 md_nopadding_left">
                               <div class="form-group">
                                   <div class="form_select childrens_select">
                                       <select name="booking-children" class="form-control" data-size="5"
                                           title="Trẻ Em" data-header="Children">
                                           <option value="0">0</option>
                                           <option value="1">1</option>
                                           <option value="2">2</option>
                                           <option value="3">3</option>
                                           <option value="4">4</option>
                                       </select>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-2 md_pl5">
                       <a href="{{route('room.index')}}" class="button btn_blue btn_full">Kiểm Tra Phòng Trống</a>  
                   </div>
               </div>
           </form>
       </div>
   </div>
</div>