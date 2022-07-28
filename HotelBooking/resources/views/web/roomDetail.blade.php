@extends('layouts.web.app')
@section('content')

    <main id="room_page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="slider">
                        <div id="slider-larg" class="owl-carousel image-gallery">
                            @foreach($rooms as $room)
                                <div class="item lightbox-image-icon">
                                    <a href="{{$room->image_path}}"
                                       class="hover_effect h_lightbox h_blue">
                                        <img class="img-responsive" src="{{$room->image_path}}"
                                             alt="Image">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div id="thumbs" class="owl-carousel">
                            @foreach($rooms as $roomss)
                                <div class="item"><img class="img-responsive"
                                                       src="{{$roomss->room_image->name}}" alt="Image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="main_title mt50">
                        <h2>ABOUT ZANTE HOTEL</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                        tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                        nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                        Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel
                        illum dolore eu feugiat nulla facilisis</p>
                    <p> at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit
                        augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend
                        option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non
                        habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.
                        Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                        tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                        nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                    </p>
                    <div class="main_title t_style a_left s_title mt50">
                        <div class="c_inner">
                            <h2 class="c_title">ROOM SERVICES</h2>
                        </div>
                    </div>
                    <div class="room_facilitys_list">
                        <div class="all_facility_list">
                            <div class="col-sm-4 nopadding">
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-check"></i>Double Bed</li>
                                    <li><i class="fa fa-check"></i>80 Sq mt</li>
                                    <li><i class="fa fa-check"></i>6 Persons</li>
                                    <li><i class="fa fa-check"></i>Free Internet</li>
                                </ul>
                            </div>
                            <div class="col-sm-4 nopadding">
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-check"></i>Free Wi-Fi</li>
                                    <li><i class="fa fa-check"></i>Breakfast Include</li>
                                    <li><i class="fa fa-check"></i>Private Balcony</li>
                                    <li class="no"><i class="fa fa-times"></i>Free Newspaper</li>
                                </ul>
                            </div>
                            <div class="col-sm-4 nopadding_left">
                                <ul class="list-unstyled">
                                    <li class="no"><i class="fa fa-times"></i>Flat Screen Tv</li>
                                    <li><i class="fa fa-check"></i>Full Ac</li>
                                    <li class="no"><i class="fa fa-times"></i>Beach View</li>
                                    <li><i class="fa fa-check"></i>Room Service</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="similar_rooms">
                        <div class="main_title t_style5 l_blue s_title a_left">
                            <div class="c_inner">
                                <h2 class="c_title">SIMILAR ROOMS</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <article>
                                    <figure>
                                        <a href="room.html" class="hover_effect h_blue h_link"><img
                                                src="images/rooms/single-room.jpg" alt="Image"
                                                class="img-responsive"></a>
                                        <div class="price">€99<span> night</span></div>
                                        <figcaption>
                                            <h4><a href="room.html">Double Room</a></h4>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-md-4">
                                <article>
                                    <figure>
                                        <a href="room.html" class="hover_effect h_blue h_link"><img
                                                src="images/rooms/double-room.jpg" alt="Image"
                                                class="img-responsive"></a>
                                        <div class="price">€129<span> night</span></div>
                                        <figcaption>
                                            <h4><a href="room.html">Single Room </a></h4>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-md-4">
                                <article>
                                    <figure>
                                        <a href="room.html" class="hover_effect h_blue h_link"><img
                                                src="images/rooms/deluxe-room.jpg" alt="Image"
                                                class="img-responsive"></a>
                                        <div class="price">€189<span> night</span></div>
                                        <figcaption>
                                            <h4><a href="room.html">Deluxe Room </a></h4>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <aside class="widget">
                            <div class="vbf">
                                <h2 class="form_title"><i class="fa fa-calendar"></i> BOOK ONLINE</h2>
                                <form id="booking-form" class="inner">
                                    <div class="form-group">
                                        <input class="form-control" name="booking-name"
                                               placeholder="Enter Your Name" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="booking-email"
                                               placeholder="Enter Your Email Address" type="email">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="booking-phone"
                                               placeholder="Enter Your Phone Number" type="text">
                                    </div>
                                    <div class="form-group">
                                        <div class="form_select">
                                            <select name="booking-roomtype" class="form-control"
                                                    title="Select Room Type" data-header="Room Type" disabled>
                                                <option value="Single Room" selected>Single Room</option>
                                                <option value="Double Room">Double Room</option>
                                                <option value="Deluxe Room">Deluxe Room</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="form_select">
                                            <select name="booking-adults" class="form-control md_noborder_right"
                                                    title="Adults" data-header="Adults">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="form_select">
                                            <select name="booking-children" class="form-control" title="Children"
                                                    data-header="Children">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="input-group">
                                            <div class="form_date">
                                                <input type="text" class="datepicker form-control md_noborder_right"
                                                       name="booking-checkin" placeholder="Arrival Date" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="input-group">
                                            <div class="form_date">
                                                <input type="text" class="datepicker form-control"
                                                       name="booking-checkout" placeholder="Departure Date" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="button btn_lg btn_blue btn_full" type="submit">BOOK A ROOM
                                        NOW
                                    </button>
                                    <div class="a_center mt10">
                                        <a href="booking-form.html" class="a_b_f">Advanced Booking Form</a>
                                    </div>
                                </form>
                            </div>
                        </aside>
                        <aside class="widget">
                            <h4>NEED HELP?</h4>
                            <div class="help">
                                If you have any question please don't hesitate to contact us
                                <div class="phone"><i class="fa  fa-phone"></i><a href="tel:18475555555">
                                        1-888-123-4567 </a></div>
                                <div class="email"><i class="fa  fa-envelope-o "></i><a
                                        href="/cdn-cgi/l/email-protection#385b57564c595b4c784b514c5d165b5755"><span
                                            class="__cf_email__"
                                            data-cfemail="aecdc1c0dacfcddaeeddc7dacb80cdc1c3">[email&#160;protected]</span></a>
                                    or use <a href="contact.html"> contact form</a></div>
                            </div>
                        </aside>
                        <aside class="widget">
                            <h4>Latest Posts</h4>
                            <div class="latest_posts">
                                <article class="latest_post">
                                    <figure>
                                        <a href="blog-post.html" class="hover_effect h_link h_blue">
                                            <img src="images/blog/thumb1.jpg" alt="Image">
                                        </a>
                                    </figure>
                                    <div class="details">
                                        <h6><a href="blog-post.html">Live your myth in Greece</a></h6>
                                        <span><i class="fa fa-calendar"></i>23/11/2016</span>
                                    </div>
                                </article>
                                <article class="latest_post">
                                    <figure>
                                        <a href="blog-post.html" class="hover_effect h_link h_blue">
                                            <img src="images/blog/thumb2.jpg" alt="Image">
                                        </a>
                                    </figure>
                                    <div class="details">
                                        <h6><a href="blog-post.html">Zante Hotel in pictures</a></h6>
                                        <span><i class="fa fa-calendar"></i>18/10/2016</span>
                                    </div>
                                </article>
                                <article class="latest_post">
                                    <figure>
                                        <a href="blog-post.html" class="hover_effect h_link h_blue">
                                            <img src="images/blog/thumb3.jpg" alt="Image">
                                        </a>
                                    </figure>
                                    <div class="details">
                                        <h6><a href="blog-post.html">Zante Hotel family party</a></h6>
                                        <span><i class="fa fa-calendar"></i>13/08/2016</span>
                                    </div>
                                </article>
                                <article class="latest_post">
                                    <figure>
                                        <a href="blog-post.html" class="hover_effect h_link h_blue">
                                            <img src="images/blog/thumb4.jpg" alt="Image">
                                        </a>
                                    </figure>
                                    <div class="details">
                                        <h6><a href="blog-post.html">Zante Hotel weddings</a></h6>
                                        <span><i class="fa fa-calendar"></i>13/08/2016</span>
                                    </div>
                                </article>
                                <article class="latest_post">
                                    <figure>
                                        <a href="blog-post.html" class="hover_effect h_link h_blue">
                                            <img src="images/blog/thumb5.jpg" alt="Image">
                                        </a>
                                    </figure>
                                    <div class="details">
                                        <h6><a href="blog-post.html">10 things you should know</a></h6>
                                        <span><i class="fa fa-calendar"></i>13/08/2016</span>
                                    </div>
                                </article>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
