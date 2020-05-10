<!-- Stored in resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Starts social media tag -->
    <meta property="og:title" content="COSMO Real Estate Limited">
    <meta property="og:description" content="Your one-stop overseas property investments management platform">
    <meta name="image" property="og:image" content="http://icosmo.co/logo/cosmo-logo.jpg">
    <meta property="og:url" content="http://icosmo.co">
    <meta name="twitter:title" content="COSMO Real Estate Limited ">
    <meta name="twitter:description" content="Your one-stop overseas property investments management platform">
    <meta name="twitter:image" content="http://icosmo.co/logo/cosmo-logo.jpg">
    <meta name="twitter:card" content="cosmo-logo.jpeg">
    <!-- End social media tag -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <style>




    </style>
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
                        <!--<li><a href="#">Pages</a>
                        <ul class="dropdown">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="#">Listings</a>
                        <ul class="dropdown">
                        <li><a href="listings.html">Listings</a></li>
                        <li><a href="single-listings.html">Single Listings</a></li>
                    </ul>
                </li>
                <li><a href="#">Blog</a>
                <ul class="dropdown">
                <li><a href="blog.html">Blog</a></li>
                <li><a href="single-blog.html">Single Blog</a></li>
            </ul>
        </li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="elements.html">Elements</a></li>
            </ul>
        </li>-->
        <li><a href="{{ route('about-us', app()->getLocale()) }}">@lang('master.about_us')</a></li>
        {{-- <li><a href="listings.html">Properties</a></li>
        <li><a href="blog.html">Blog</a></li> --}}
        <!--<li><a href="#">Mega Menu</a>
        <div class="megamenu">
        <ul class="single-mega cn-col-4">
        <li class="title">Headline 1</li>
        <li><a href="#">Mega Menu Item 1</a></li>
        <li><a href="#">Mega Menu Item 2</a></li>
        <li><a href="#">Mega Menu Item 3</a></li>
        <li><a href="#">Mega Menu Item 4</a></li>
        <li><a href="#">Mega Menu Item 5</a></li>
        </ul>
        <ul class="single-mega cn-col-4">
        <li class="title">Headline 2</li>
        <li><a href="#">Mega Menu Item 1</a></li>
        <li><a href="#">Mega Menu Item 2</a></li>
        <li><a href="#">Mega Menu Item 3</a></li>
        <li><a href="#">Mega Menu Item 4</a></li>
        <li><a href="#">Mega Menu Item 5</a></li>
        </ul>
        <ul class="single-mega cn-col-4">
        <li class="title">Headline 3</li>
        <li><a href="#">Mega Menu Item 1</a></li>
        <li><a href="#">Mega Menu Item 2</a></li>
        <li><a href="#">Mega Menu Item 3</a></li>
        <li><a href="#">Mega Menu Item 4</a></li>
        <li><a href="#">Mega Menu Item 5</a></li>
        </ul>
        <ul class="single-mega cn-col-4">
        <li class="title">Headline 4</li>
        <li><a href="#">Mega Menu Item 1</a></li>
        <li><a href="#">Mega Menu Item 2</a></li>
        <li><a href="#">Mega Menu Item 3</a></li>
        <li><a href="#">Mega Menu Item 4</a></li>
        <li><a href="#">Mega Menu Item 5</a></li>
        </ul>
        </div>
        </li>-->
        <li><a href="{{ route('contact', app()->getLocale()) }}">@lang('master.contact')</a></li>
        @auth
            <li><a href="#">@lang('master.my_account')</a>
                <ul class="dropdown">
                    <li><a href="{{ route('dashboard', app()->getLocale()) }}">@lang('master.dashboard')</a></li>
                    <li><a href="{{ route('profile', app()->getLocale()) }}">@lang('master.profile')</a></li>
                    <li><a href="{{ route('logout', app()->getLocale()) }}">@lang('master.signout')</a></li>
                </ul>
            </li>
        @else
            <li><a href="{{ route('login', app()->getLocale()) }}">@lang('master.login')</a></li>
            <li><a href="{{ route('register', app()->getLocale()) }}">@lang('master.signup')</a></li>
        @endauth


        </ul>

        <!-- Search Form -->
        {{-- <div class="south-search-form">
            <form action="#" method="post">
                <input type="search" name="search" id="search" placeholder="Search Anything ...">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div> --}}

        <!-- Search Button -->
        {{-- <a href="#" class="searchbtn"><i class="fa" aria-hidden="true"></i></a> --}}
        </div>
        <!-- Nav End -->
        </div>
        </nav>
</div>
</div>
</header>

<div>
    @yield('specificScript')

    @yield('content')
</div>



<!-- ##### Footer Area Start ##### -->
<footer class="footer-area section-padding-100-0 bg-img gradient-background-overlay" style="background-image: url( {{ url('img/bg-img/cta.jpg') }} );">
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
                        <div>
                            <img class="qrcode-wechat" src="{{ url('img/icons/wechat.jpg') }}">
                        </div>
                        <div class="mt-3">
                            <a href="https://www.facebook.com/icosmo.co/" target="_blank"><i class="fa fa-facebook-square fa-2x fb"></i></a>
                            <a href="https://www.instagram.com/icosmo.co/?fbclid=IwAR1tD44E-iESdx10U8a38jgaWocXDLitukGxYi_KN2NmFZcNFbZPalxBtRw" target="_blank"><i class="fa fa-instagram fa-2x ig"></i></a>
                            <a href="https://www.linkedin.com/company/icosmo" target="_blank"><i class="fa fa-linkedin-square fa-2x linkedin"></i></a>
                            <i class="fa fa-youtube fa-2x youtube"></i>
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
                            <li><a href="{{ route('contact', app()->getLocale()) }}">@lang('master.contact')</a></li>

                        </ul>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-3">
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
                </div>

            </div>
        </div>
    </div>

        <!-- Copywrite Text -->
        <div class="copywrite-text d-flex align-items-center justify-content-center">
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

    <style type="text/css">

    </style>
</body>
</html>
