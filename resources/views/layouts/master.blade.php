<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PT. Daya Sinergi Teknomandiri</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('uploads/attributes/'.\App\Models\Attributes::first()->favicon)}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('uploads/attributes/'.\App\Models\Attributes::first()->favicon)}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('uploads/attributes/'.\App\Models\Attributes::first()->favicon)}}" />
    <meta name="description" content="Daya Sinergi Teknomandiri" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/animate/custom-animate.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/izeetak-icons/style.css">
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/twentytwenty/twentytwenty.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/bootstrap-select/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/vegas/vegas.min.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/timepicker/timePicker.css" />
    <!-- template styles -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/izeetak.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/izeetak-responsive.css" />
    @stack('css')
    <style>
        div#social-links {
            margin: 0 auto;
            text-align: left;
        }
        div#social-links ul li {
            
            display: inline-block;
        }          
        div#social-links ul li a {
            padding: 10px;
            border-radius: 10px;
            margin: 5px;
            font-size: 16px;
            color: #222;
            background-color: #EEF3F7;
        }
    </style>
    <script src="{{asset('assets')}}/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easy-ticker/2.0.0/jquery.easy-ticker.min.js"></script>
    <script src="{{asset('assets')}}/js/ticker.js"></script>
</head>

<body>
    <!-- <div class="preloader">
        <img class="preloader__image" width="60" src="{{asset('assets')}}/images/loader.png" alt="" />
    </div> -->
    <!-- /.preloader -->
    <div class="page-wrapper">
        @php
            $main_contact = \App\Models\Contact::first();
            $main_attributes = \App\Models\Attributes::first();
        @endphp

        @include('layouts.header')
        <!--Main Slider Start-->
        @yield('content')
        <!--Site Footer One Start-->
        @include('layouts.footer')
        <!--Site Footer One End-->
    </div><!-- /.page-wrapper -->
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="{{asset('assets')}}/images/resources/footer-logo.png"
                        width="155" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">needhelp@izeetak.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

    <script src="{{asset('assets')}}/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets')}}/vendors/jarallax/jarallax.min.js"></script>
    <script src="{{asset('assets')}}/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="{{asset('assets')}}/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="{{asset('assets')}}/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="{{asset('assets')}}/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('assets')}}/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="{{asset('assets')}}/vendors/nouislider/nouislider.min.js"></script>
    <script src="{{asset('assets')}}/vendors/odometer/odometer.min.js"></script>
    <script src="{{asset('assets')}}/vendors/swiper/swiper.min.js"></script>
    <script src="{{asset('assets')}}/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="{{asset('assets')}}/vendors/wnumb/wNumb.min.js"></script>
    <script src="{{asset('assets')}}/vendors/wow/wow.js"></script>
    <script src="{{asset('assets')}}/vendors/isotope/isotope.js"></script>
    <script src="{{asset('assets')}}/vendors/countdown/countdown.min.js"></script>
    <script src="{{asset('assets')}}/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{asset('assets')}}/vendors/twentytwenty/twentytwenty.js"></script>
    <script src="{{asset('assets')}}/vendors/twentytwenty/jquery.event.move.js"></script>
    <script src="{{asset('assets')}}/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="{{asset('assets')}}/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="{{asset('assets')}}/vendors/vegas/vegas.min.js"></script>
    <script src="{{asset('assets')}}/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="{{asset('assets')}}/vendors/timepicker/timePicker.js"></script>
    <!-- <script src="{{asset('assets')}}/vendors/particles/particles.min.js"></script> -->
    <!-- <script src="{{asset('assets')}}/vendors/particles/particles-config.js"></script> -->
    <!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script> -->
    @stack('js')
    <!-- template js -->
    <script src="{{asset('assets')}}/js/izeetak.js"></script>
</body>

</html>