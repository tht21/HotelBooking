<header class="fixed transparent">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle mobile_menu_btn" data-toggle="collapse"
                        data-target=".mobile_menu" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand light" href="index.html">
                        <img src="{{asset('web/images/logo_light.svg')}}" height="32" alt="Logo">
                    </a>
                    <a class="navbar-brand dark nodisplay" href="index.html">
                        <img src="{{asset('web/images/logo.svg')}}" height="32" alt="Logo">
                    </a>
                </div>
                <nav id="main_menu" class="mobile_menu navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="mobile_menu_title" style="display:none;">MENU</li>
                        <li class="dropdown simple_menu active">
                            <a href="{{route('homeweb')}}"  data-toggle="dropdown">Home<b class=""></b></a>
                        </li>
                        <li class="dropdown simple_menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Rooms<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('room.index')}}">Room List</a></li>
                               
                            </ul>
                        </li>
                        <li class="dropdown mega_menu mega_menu_fullwidth"><a href="#" data-toggle="dropdown"
                                class="dropdown-toggle" aria-expanded="true">PAGES <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    {{-- <div class="mega_menu_inner">
                                        <div class="row">
                                            <ul class="col-md-3">
                                                <li class="list_title">PAGES</li>
                                                <li><a href="gallery.html">Gallery 4 Columns</a></li>
                                                <li><a href="gallery-3columns.html">Gallery 3 Columns</a></li>
                                                <li><a href="gallery-2columns.html">Gallery 2 Columns</a></li>
                                                <li><a href="gallery-withoutdetails.html">Gallery Without Details</a>
                                                </li>
                                                <li><a href="gallery-withoutfilters.html">Gallery Without Filters</a>
                                                </li>
                                                <li><a href="gallery-slider.html">Gallery Slider</a></li>
                                                <li><a href="gallery2.html">Gallery Version 2</a></li>
                                            </ul>
                                            <ul class="col-md-3">
                                                <li class="list_title">PAGES</li>
                                                <li><a href="contact2.html">Contact Us Version 2</a></li>
                                                <li><a href="about-us.html">About Us</a></li>
                                                <li><a href="404.html">404 Page Version 1</a></li>
                                                <li><a href="404-v2.html">404 Page Version 2</a></li>
                                                <li><a href="coming-soon.html">Coming Soon</a></li>
                                                <li><a href="location.html">Our Location</a></li>
                                                <li><a href="restaurant.html">Our Restaurant</a></li>
                                            </ul>
                                            <ul class="col-md-3">
                                                <li class="list_title">PAGES</li>
                                                <li><a href="blog-post.html">Blog Details 1</a></li>
                                                <li><a href="blog-post2.html">Blog Details 2</a></li>
                                                <li><a href="places.html">Places</a></li>
                                                <li><a href="place-details.html">Place Details</a></li>
                                                <li><a href="events.html">Events</a></li>
                                                <li><a href="event-details.html">Event Details</a></li>
                                                <li><a href="spa.html">Our Spa</a></li>
                                            </ul>
                                            <ul class="col-md-3">
                                                <li class="list_title">MORE PAGES</li>
                                                <li><a href="loading.html">Loading Page </a></li>
                                                <li><a href="loading2.html">Loading Page 2</a></li>
                                                <li><a href="loading3.html">Loading Page 3</a></li>
                                                <li><a href="full-width.html">Full Width Page</a></li>
                                                <li><a href="right-sidebar.html">Right Sidebar Page</a></li>
                                                <li><a href="left-sidebar.html">Left Sidebar Page</a></li>
                                                <li><a href="our-staff.html">Our Staff</a></li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown simple_menu"><a href="#" data-toggle="dropdown" class="dropdown-toggle"
                                aria-expanded="true">ELEMENTS <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="icons.html">Icons</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">CONTACT US</a></li>
                        <li><a href="blog.html">BLOG</a></li>
                        <li class="menu_button">
                            <a href="booking-form.html" class="button  btn_yellow"><i class="fa fa-calendar"></i>BOOK
                                ONLINE</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="rev_slider_wrapper fullscreen-container">
            <div id="fullscreen_hero_video" class="rev_slider fullscreenbanner gradient_slider" style="display:none"
                data-version="5.4.1">
                <ul>
                    <li data-transition="fade">

                        <img src="{{asset('web/images/slider/video_fullscreen.jpg')}}" alt="Image" data-bgposition="center center"
                            data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="3" class="rev-slidebg"
                            data-no-retina>

                        <div class="rs-background-video-layer" data-forcerewind="on" data-volume="mute"
                            data-videomp4="videos/hero_video.mp4" data-vimeoid="88944221"
                            data-videoattributes="title=0&amp;byline=0&amp;portrait=0&amp;api=1" data-videowidth="100%"
                            data-videoheight="100%" data-videocontrols="none" data-videostartat="00:00"
                            data-videoendat="" data-videoloop="loop" data-forceCover="1" data-aspectratio="4:3"
                            data-autoplay="true" data-autoplayonlyfirsttime="false" data-nextslideatend="false">
                        </div>

                        <div class="tp-caption gradient_overlay" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['0','0','0','0']" data-width="full" data-height="full"
                            data-whitespace="nowrap" data-transform_idle="o:1;"
                            data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;"
                            data-transform_out="opacity:0;s:500;s:500;" data-start="0" data-basealign="slide"
                            data-responsive_offset="off" data-responsive="off"
                            style="z-index: 7;border-color:rgba(0, 0, 0, 0);">
                        </div>

                        <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="" data-y="middle"
                            data-voffset="" data-fontsize="['100','90','70','60']"
                            data-lineheight="['100','90','70','60']" data-whitespace="nowrap"
                            data-responsive_offset="on"
                            data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 99; color: #fff; font-weight: 900;">ZANTE HOTEL
                        </div>

                        <div class="tp-caption tp-resizeme" data-x="['center','center','center','center']"
                            data-hoffset="['-300','-270','-200','-160']" data-y="middle"
                            data-voffset="['-12','-15','-24','-28']" data-fontsize="['11','10','7','6']"
                            data-lineheight="['11','10','7','6']" data-whitespace="nowrap" data-width="100"
                            data-height="100" data-responsive_offset="on"
                            data-frames='[{"delay":2500,"speed":1500,"frame":"0","from":"x:[40%];z:0;rX:0deg;rY:0;rZ:-90;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;rZ:-90","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 11; color: #fff; font-weight: 900; ">WELCOME TO
                        </div>

                        <a class="tp-caption button btn_yellow" href="booking-form.html" data-x="center" data-hoffset=""
                            data-y="middle" data-voffset="120" data-fontsize="14" data-responsive_offset="on"
                            data-whitespace="nowrap"
                            data-frames='[{"delay":2500,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 11; "><i class="fa fa-calendar"></i>BOOK A ROOM NOW
                        </a>
                    </li>
                </ul>
            </div>
        </div>
