<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <meta content="IE=edge" http-equiv="X-UA-Compatible"> -->
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">

    <title>Zante Hotel </title>
    <meta content="Hotel & Resort HTML Template - Zante Hotel" name="description">
    <meta
        content="Website Templates, Hotel Themes, Hotel Templates, Booking Themes, Booking Templates, Travel Themes, Travel Template, Hotel Site"
        name="keywords">
    <meta content="Eagle-Themes" name="author">

    <link rel="apple-touch-icon-precomposed" href="{{asset('images/favicon-apple.png')}}"/>
    <link rel="icon" href="{{asset('images/favicon.png')}}">

    <link href="{{asset('web/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('web/revolution/css/layers.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('web/revolution/css/settings.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('web/revolution/css/navigation.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('web/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('web/css/animate.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('web/css/famfamfam-flags.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('web/css/magnific-popup.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('web/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('web/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('web/css/responsive.css')}}" rel="stylesheet" type="text/css">

    <!-- <link href="fonts/font-awesome.min.css" rel="stylesheet">
    <link href="fonts/flaticon.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900%7cRaleway:400,500,600,700"
          rel="stylesheet">
</head>

<body>
<div class="wrapper">
    @include('layouts.web.includes.header')

    @yield('content')
    @include('layouts.web.includes.footer')
</div>

<div id="back_to_top">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</div>

<div id="notification"></div>

<div class='buy-now left'>
    <a href="https://1.envato.market/PKZzY" target="_blank" class='buy-now-btn'>
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    </a>
    <div class='ripple'></div>
</div>


<script type="text/javascript" src="{{asset('web/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/jquery.smoothState.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/morphext.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/jquery.easing.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/owl.carousel.thumbs.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/jPushMenu.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/isotope.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/countUp.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/jquery.countdown.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/main.js')}}"></script>

<script type="text/javascript" src="{{asset('web/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('web/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('web/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('web/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('web/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('web/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('web/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('web/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('web/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('web/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('web/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>

</script>

</body>

</html>
