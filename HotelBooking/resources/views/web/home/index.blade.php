@extends('layouts.web.app')
@section('content')
    @include('layouts.web.includes.content')
<section class="white_bg" id="rooms">
   <div class="container">
       <div class="main_title mt_wave mt_blue a_center">
           <h2>Danh Sách Phòng</h2>
       </div>
       <div class="row">
        @foreach ($rooms as $room)
           <div class="col-md-4">
               <article class="room">
                   <figure>
                       <div class="price">{{number_format($room->price)}} VNĐ<span>/ Đêm</span></div>
                       <a class="hover_effect h_blue h_link" href="room.html">
                           <img src="{{asset($room->image_path)}}" class="img-responsive" alt="Image">
                       </a>
                       <figcaption>
                           <h4><a href="room.html">{{$room->room_type->name}}</a></h4>
                           <span class="f_right"><a href="#" class="button btn_sm btn_blue">VIEW
                                   DETAILS</a></span>
                       </figcaption>
                   </figure>
               </article>
           </div>
           @endforeach
       </div>
       {{$rooms->appends(request()->query())}}
       <div class="mt40 a_center">
           <a class="button btn_sm btn_yellow" href="{{route('room.index')}}">VIEW ROOMS LIST</a>
       </div>
   </div>
</section>

<section class="lightgrey_bg" id="features">
   <div class="container">
       <div class="main_title mt_wave mt_blue a_center">
           <h2>OUR AWESOME SERVICES</h2>
       </div>
       <p class="main_description a_center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
           nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
           veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
       <div class="row">
           <div class="col-md-7">
               <div data-slider-id="features" id="features_slider" class="owl-carousel">
                   <div><img src="{{asset('web/images/restaurant.jpg')}}" class="img-responsive" alt="Image"></div>
                   <div><img src="{{asset('web/images/spa.jpg')}}" class="img-responsive" alt="Image"></div>
                   <div><img src="{{asset('web/images/conference.jpg')}}" class="img-responsive" alt="Image"></div>
                   <div><img src="{{asset('web/images/swimming.jpg')}}" class="img-responsive" alt="Image"></div>
               </div>
           </div>
           <div class="col-md-5">
               <div class="owl-thumbs" data-slider-id="features">
                   <div class="owl-thumb-item">
                       <span class="media-left"><i class="flaticon-food"></i></span>
                       <div class="media-body">
                           <h5>Restaurant</h5>
                           <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                               euismod tincidunt ut laoreet.</p>
                       </div>
                   </div>
                   <div class="owl-thumb-item">
                       <span class="media-left"><i class="flaticon-person"></i></span>
                       <div class="media-body">
                           <h5>Spa - Beauty &amp; Health</h5>
                           <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                               euismod tincidunt ut laoreet.</p>
                       </div>
                   </div>
                   <div class="owl-thumb-item">
                       <span class="media-left"><i class="flaticon-business"></i></span>
                       <div class="media-body">
                           <h5>Conference Room</h5>
                           <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                               euismod tincidunt ut laoreet.</p>
                       </div>
                   </div>
                   <div class="owl-thumb-item">
                       <span class="media-left"><i class="flaticon-beach"></i></span>
                       <div class="media-body">
                           <h5>Swimming Pool</h5>
                           <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                               euismod tincidunt ut laoreet.</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</section>

<section id="gallery_style_2" class="white_bg">
   <div class="container">
       <div class="main_title mt_wave mt_blue a_center">
           <h2>IMAGE GALLERY</h2>
       </div>
       <p class="main_description a_center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
           nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
           veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
       <div class="row">
           <div class="image-gallery">

               <div class="col-md-3 col-sm-4">
                   <figure class="gs2_item">
                       <a href="{{asset('web/images/gallery/gallery1.jpg')}}" class="hover_effect h_lightbox h_blue">
                           <img src="{{asset('web/images/gallery/gallery1.jpg')}}" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>

               <div class="col-md-3 col-sm-4">
                   <figure class="gs2_item">
                       <a href="{{asset('web/images/gallery/gallery2.jpg')}}" class="hover_effect h_lightbox h_blue">
                           <img src="{{asset('web/images/gallery/gallery2.jpg')}}" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>

               <div class="col-md-3 col-sm-4">
                   <figure class="gs2_item">
                       <a href="{{asset('web/images/gallery/gallery3.jpg')}}" class="hover_effect h_lightbox h_blue">
                           <img src="{{asset('web/images/gallery/gallery3.jpg')}}" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>

               <div class="col-md-3 col-sm-4">
                   <figure class="gs2_item">
                       <a href="{{asset('web/images/gallery/gallery4.jpg')}}" class="hover_effect h_lightbox h_blue">
                           <img src="{{asset('web/images/gallery/gallery4.jpg')}}" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>

               <div class="col-md-3 col-sm-4">
                   <figure class="gs2_item">
                       <a href="{{asset('web/images/gallery/gallery5.jpg')}}" class="hover_effect h_lightbox h_blue">
                           <img src="{{asset('web/images/gallery/gallery5.jpg')}}" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>

               <div class="col-md-3 col-sm-4">
                   <figure class="gs2_item">
                       <a href="{{asset('web/images/gallery/gallery6.jpg')}}" class="hover_effect h_lightbox h_blue">
                           <img src="{{asset('web/images/gallery/gallery6.jpg')}}" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>

               <div class="col-md-3 col-sm-4">
                   <figure class="gs2_item">
                       <a href="{{asset('web/images/gallery/gallery7.jpg')}}" class="hover_effect h_lightbox h_blue">
                           <img src="{{asset('web/images/gallery/gallery7.jpg')}}" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>

               <div class="col-md-3 col-sm-4">
                   <figure class="gs2_item">
                       <a href="{{asset('web/images/gallery/gallery8.jpg')}}" class="hover_effect h_lightbox h_blue">
                           <img src="{{asset('web/images/gallery/gallery8.jpg')}}" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>

               <div class="col-md-3 col-sm-4">
                   <figure class="gs2_item">
                       <a href="{{asset('web/images/gallery/gallery9.jpg')}}" class="hover_effect h_lightbox h_blue">
                           <img src="{{asset('web/images/gallery/gallery9.jpg')}}" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>

               <div class="col-md-3 col-sm-4">
                   <figure class="gs2_item">
                       <a href="{{asset('web/images/gallery/gallery10.jpg')}}" class="hover_effect h_lightbox h_blue">
                           <img src="{{asset('web/images/gallery/gallery10.jpg')}}" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>

               <div class="col-md-3 col-sm-4">
                   <figure class="gs2_item">
                       <a href="{{asset('web/images/gallery/gallery11.jpg')}}" class="hover_effect h_lightbox h_blue">
                           <img src="{{asset('web/images/gallery/gallery11.jpg')}}" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>

               <div class="col-md-3 col-sm-4">
                   <figure class="gs2_item">
                       <a href="{{asset('web/images/gallery/gallery12.jpg')}}" class="hover_effect h_lightbox h_blue">
                           <img src="{{asset('web/images/gallery/gallery12.jpg')}}" class="img-responsive" alt="Image">
                       </a>
                   </figure>
               </div>
           </div>
       </div>
   </div>
</section>

<section id="video">
   <div class="inner gradient_overlay">
       <div class="container">
           <div class="video_popup">
               <a class="popup-vimeo" href="videos/hero_video.mp4"><i class="fa fa-play"></i></a>
           </div>
       </div>
   </div>
</section>

<section class="white_bg" id="contact">
   <div class="container">
       <div class="main_title mt_wave mt_blue a_center">
           <h2 class="c_title">LOCATION - CONTACT US</h2>
       </div>
       <p class="main_description a_center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
           nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
           veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
       <div class="row">
           <div class="col-md-6">
               <div id="">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.4830847428357!2d107.10925625022507!3d16.802374023779155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3140e584960ba903%3A0x5c5e139c80555b93!2zMTMzIEzDvSBUaMaw4budbmcgS2nhu4d0LCDEkMO0bmcgSOG6o2ksIMSQw7RuZyBIw6AsIFF14bqjbmcgVHLhu4ssIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1657869206341!5m2!1svi!2s" width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
           </div>
           <div class="col-md-6">
               <div class="row">
                   <div class="contact-items">
                       <div class="col-md-4 col-sm-4">
                           <div class="contact-item">
                               <i class="glyphicon glyphicon-map-marker"></i>
                               <h6>Navagio Zakynthos</h6>
                           </div>
                       </div>
                       <div class="col-md-4 col-sm-4">
                           <div class="contact-item">
                               <i class="glyphicon glyphicon-phone-alt"></i>
                               <h6>1-888-123-4567</h6>
                           </div>
                       </div>
                       <div class="col-md-4 col-sm-4">
                           <div class="contact-item">
                               <i class="fa fa-envelope"></i>
                               <h6><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                       data-cfemail="5b3834352f3a382f1b28322f3e75383436">[email&#160;protected]</a>
                               </h6>
                           </div>
                       </div>
                   </div>
               </div>
               <form id="contact-form" name="contact-form">
                   <div id="contact-result"></div>
                   <div class="form-group">
                       <input class="form-control" name="name" placeholder="Your Name" type="text">
                   </div>
                   <div class="form-group">
                       <input class="form-control" name="email" type="email" placeholder="Your Email Address">
                   </div>
                   <div class="form-group">
                       <textarea class="form-control" name="message" placeholder="Your Message"></textarea>
                   </div>
                   <button class="button btn_lg btn_blue btn_full upper" type="submit"><i
                           class="fa fa-location-arrow"></i>Send Message</button>
               </form>
           </div>
       </div>
   </div>
</section>
@endsection
