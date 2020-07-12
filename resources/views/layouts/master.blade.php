<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @yield('sharing')


    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Cosmo - Global Real Estate | @yield('title')</title>

    {{-- <meta http-equiv="cache-control" content="max-age=0" /> --}}
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('logo/favicon.ico') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>


    <link rel="stylesheet" type="text/css" href="{{ asset('css/style_common.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style10.css') }}" />

    {{--
        ####this js will affect the original js liberary,
        only include in specific pages,
        instead of set it globally####

        <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
     --}}

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/custom-style.css')}}">

    {{-- noUISlider --}}
    <link rel="stylesheet" href="{{ asset('css/nouislider.css')}}">
    <script src="{{ asset('js/nouislider.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.0.4/wNumb.min.js'></script>
    <style>
        .noUi-connect {
        	background: #947054;
        }

        .noUi-horizontal {
            height: 8px;
        }

        .noUi-horizontal .noUi-handle {
            width: 20px;
            height: 20px;
            right: -17px;
            top: -6px;
        }

        .noUi-handle:before, .noUi-handle:after {
            content: "";
            display: block;
            /* position: absolute; */
            height: 0 px;
            width: 0px;
            background: #E8E7E6;
            /* left: 14px; */
            /* top: 6px; */
        }
        /* Hide scrollbar for Chrome, Safari and Opera */
        html::-webkit-scrollbar {
          display: none;
        }

        /* Hide scrollbar for IE and Edge */
        html {
          -ms-overflow-style: none;
        }

    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166983837-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-166983837-1');
    </script>
</head>
<body>
        <!-- ##### Header Area Start ##### -->
<header class="header-area">

        {{-- @auth
            <!-- Top Header Area -->
            <div class="top-header-area">
                <div class="h-100 d-md-flex justify-content-between align-items-center">
                    <div class="email-address">
                        <a href="mailto:contact@southtemplate.com">contact@southtemplate.com</a>
                    </div>
                    <div class="phone-number d-flex">
                        <div class="icon">
                            <img src="{{ url('img/icons/phone-call.png') }}" alt="">
                        </div>
                        <div class="number">
                            <a href="tel:+45 677 8993000 223">+45 677 8993000 223</a>
                        </div>
                    </div>
                </div>
            </div>
        @endauth --}}

    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="southNav">

                <!-- Logo -->
                <a class="nav-brand" href="{{ route('/', app()->getLocale()) }}"><img class="w-logo" src="{{ url("logo/logo.png") }}" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="{{ route('/', app()->getLocale()) }}">@lang('master.home')</a></li>

                            <li>
                                <a href="#">Projects</a>
                                <ul class="dropdown">
                                    <?php $Australia = ["Brisbane", "Canberra", "Gold Coast", "Melbourne", "Perth", "Sydney"]; ?>
                                    <li>
                                        <a href="#">Australia</a>
                                        <ul class="dropdown">
                                            @foreach ($Australia as $city)
                                                <li><a href="{{ route('search-by', [app()->getLocale(), 'project=1&country=Australia&city='.$city]) }}">{{$city}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <?php $China = ["Beijing","Guangzhou", "Shenzhen", "Shanghai", "Zhongshan", "Zhuhai", "Macau"]; ?>
                                    <li>
                                        <a href="#">China</a>
                                        <ul class="dropdown">
                                            @foreach ($China as $city)
                                                <li><a href="{{ route('search-by', [app()->getLocale(), 'project=1&country=China&city='.$city]) }}">{{$city}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <?php $USA = ["Los Angeles", "Miami", "New York", "Orlando", "San Francisco"]; ?>
                                    <li><a href="#">USA</a>
                                        <ul class="dropdown">
                                            @foreach ($USA as $city)
                                                <li><a href="{{ route('search-by', [app()->getLocale(), 'project=1&country=USA&city='.$city]) }}">{{$city}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <?php $UK = ["London", "Liverpool", "Leeds", "Manchester", "Sheffield"]; ?>
                                    <li><a href="#">UK</a>
                                        <ul class="dropdown">
                                            @foreach ($UK as $city)
                                                <li><a href="{{ route('search-by', [app()->getLocale(), 'project=1&country=UK&city='.$city]) }}">{{$city}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <?php $Singapore = ["Singapore"]; ?>
                                    <li><a href="#">Singapore</a>
                                        <ul class="dropdown">
                                            @foreach ($Singapore as $city)
                                                <li><a href="{{ route('search-by', [app()->getLocale(), 'project=1&country=Singapore&city='.$city]) }}">{{$city}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="{{ route('vr-property', app()->getLocale()) }}">VR</a></li>
                            <li><a href="{{ route('media', app()->getLocale()) }}">Media</a></li>
                            <li><a href="{{ route('video', app()->getLocale()) }}">Video</a></li>

                            <li><a href="{{ route('events', app()->getLocale()) }}">Events</a></li>

                            <li><a href="{{ route('about-us', app()->getLocale()) }}">@lang('master.about_us')</a></li>


                            <li><a href="{{ route('contact', app()->getLocale()) }}">@lang('master.contact_us')</a></li>
                            @auth
                                <li><a href="#">@lang('master.my_account')</a>
                                    <ul class="dropdown">
                                        @if (Auth::user()->role == 0 || Auth::user()->role == 2)
                                            <li><a href="{{ route('property-list', app()->getLocale()) }}">My Properties</a></li>
                                        @endif
                                        <li><a href="{{ route('profile', app()->getLocale()) }}">@lang('master.profile')</a></li>
                                        <li><a href="{{ route('logout', app()->getLocale()) }}">@lang('master.signout')</a></li>
                                    </ul>
                                </li>
                            @else
                                <li><a href="{{ route('login', app()->getLocale()) }}">@lang('master.login')</a></li>
                                <li><a href="{{ route('register', app()->getLocale()) }}">@lang('master.signup')</a></li>
                            @endauth


                        </ul>

                    </div>
                    <!-- Nav End -->
                </div>
            </div>
        </nav>
    </div>
</header>

<div>
    @yield('specificScript')

    @yield('content')
</div>



<!-- ##### Footer Area Start ##### -->
<footer class="footer-area section-padding-100-0 bg-img" style="background-color: black">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title">
                            <h6>@lang('master.about_us')</h6>
                        </div>

                        {{-- <img src="{{ url('img/bg-img/footer.jpg') }}"> --}}
                        <div class="footer-logo my-4">
                            <img src="{{ url('logo/logo.png') }}">
                        </div>
                        <p>@lang('master.footer_description')</p>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title">
                            <h6>@lang('master.contact_us')</h6>
                        </div>
                        {{-- <div class="card text-center" style="width: 9rem;">
                          <img class="card-img-top" src="{{ url('img/icons/qrcode-wechat.jpeg') }}">
                          <div class="card-body" style="padding: 0.25rem;">
                            <p class="card-text"><i class="fa fa-weixin fa-2x" style="color:#000201"></i></p>
                          </div>
                        </div> --}}
                        {{-- <div>
                            <img class="qrcode-wechat" src="{{ url('img/icons/wechat.jpg') }}">
                        </div> --}}
                        <div class="mt-3">
                            <a href="https://www.facebook.com/icosmo.co/" target="_blank"><i class="fa fa-facebook-square fa-2x fb"></i></a>
                            <a href="https://www.instagram.com/icosmo.co/?fbclid=IwAR1tD44E-iESdx10U8a38jgaWocXDLitukGxYi_KN2NmFZcNFbZPalxBtRw" target="_blank"><i class="fa fa-instagram fa-2x ig"></i></a>
                            <a href="https://www.linkedin.com/company/icosmo" target="_blank"><i class="fa fa-linkedin-square fa-2x linkedin"></i></a>
                            <a href="https://www.youtube.com/channel/UCweufzFWJuXng4Mwmfrxlvg" target="_blank"><i class="fa fa-youtube fa-2x youtube"></i></a>
                        </div>
                        <div class="mt-3">
                            <h6 style="color:#fff;"><i class="fa fa-envelope"></i> cs@icosmo.co</h6>
                        </div>
                        {{-- <!-- Office Hours -->
                        <div class="weekly-office-hours">
                            <ul>
                                <li class="d-flex align-items-center justify-content-between"><span>Monday - Friday</span> <span>09 AM - 19 PM</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Saturday</span> <span>09 AM - 14 PM</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Sunday</span> <span>Closed</span></li>
                            </ul>
                        </div>
                        <!-- Address -->
                        <div class="address">
                            <h6><img src="{{ url('img/icons/phone-call.png') }}" alt=""> +45 677 8993000 223</h6>
                            <h6><img src="{{ url('img/icons/envelope.png') }}" alt=""> office@template.com</h6>
                            <h6><img src="{{ url('img/icons/location.png') }}" alt=""> Main Str. no 45-46, b3, 56832, Los Angeles, CA</h6>
                        </div> --}}
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title">
                            <h6>@lang('master.links')</h6>
                        </div>
                        <!-- Nav -->
                        <ul class="useful-links-nav d-flex align-items-center">
                            <li><a href="{{ route('/', app()->getLocale()) }}">@lang('master.home')</a></li>
                            <li><a href="{{ route('about-us', app()->getLocale()) }}">@lang('master.about_us')</a></li>
                            <li><a href="#">@lang('master.services')</a></li>
                            <li><a href="#">@lang('master.properties')</a></li>
                            <li><a href="{{ route('privacy', app()->getLocale()) }}">@lang('master.privacy')</a></li>
                            <li><a href="{{ route('terms', app()->getLocale()) }}">@lang('master.terms')</a></li>
                            <li><a href="{{ route('disclaimer', app()->getLocale()) }}">@lang('master.disclaimer')</a></li>
                            <li><a href="{{ route('contact', app()->getLocale()) }}">@lang('master.contact_us')</a></li>

                        </ul>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                {{-- <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title">
                            <h6>@lang('master.featured_properties')</h6>
                        </div>
                        <!-- Featured Properties Slides -->
                        <div class="featured-properties-slides owl-carousel">
                            <!-- Single Slide -->
                            <div class="single-featured-properties-slide">
                                <a href="#"><img src="{{ url('img/bg-img/fea-product.jpg') }}" alt=""></a>
                            </div>
                            <!-- Single Slide -->
                            <div class="single-featured-properties-slide">
                                <a href="#"><img src="{{ url('img/bg-img/fea-product.jpg') }}" alt=""></a>
                            </div>
                            <!-- Single Slide -->
                            <div class="single-featured-properties-slide">
                                <a href="#"><img src="{{ url('img/bg-img/fea-product.jpg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>

        <!-- Copywrite Text -->
        <div class="copywrite-text d-flex align-items-center justify-content-center" style="background-color:black;">
            <p>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="{{ route('/', app()->getLocale()) }}">COSMO Real Estate Limited</a>. All rights reserved
            </p>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    {{-- <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script> --}}

    <!-- Popper js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/classy-nav.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js') }}"></script>

    <script>
        // function getDistricts() {
        //     $.ajax({
        //         type:'get',
        //         url: '{{ route('get_districts', app()->getLocale())}}',
        //         dataType: "json",
        //         success:function(data) {
        //            console.log(data);
        //         },
        //         error:function() {
        //         }
        //     });
        // }

    </script>
</body>
</html>
