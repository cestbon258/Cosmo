<!-- Stored in resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Cosmo - Global Real Estate - @yield('title')</title>
    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('style.css')}}">
    <style>
    .single-featured-property:hover img{
        -webkit-transition-duration: 1000ms;
        -o-transition-duration: 1000ms;
        transition-duration: 1000ms;
        -webkit-transform: scale(1.2);
        -ms-transform: scale(1.2);
        transform: scale(1.2);
    }
    .single-property-area .property-thumb img {
        -webkit-transition-duration: 1000ms;
        -o-transition-duration: 1000ms;
        transition-duration: 1000ms;
        border-radius: 5px 5px 0 0;
        width: 100%;
    }
    .primary-btn {
      background-color: #947054;
      color: #fff;
    }


    :root {
      --input-padding-x: 1.5rem;
      --input-padding-y: 0.75rem;
    }

    .login,
    .image {
      min-height: 100vh;
    }

    .bg-image {
      background-image: url('https://source.unsplash.com/WEQbe2jBg40/600x1200');
      background-size: cover;
      background-position: center;
    }

    .login-heading {
      font-weight: 300;
    }

    .btn-login {
      font-size: 0.9rem;
      letter-spacing: 0.05rem;
      padding: 0.75rem 1rem;
      border-radius: 2rem;
    }

    .form-label-group {
      position: relative;
      margin-bottom: 1rem;
    }

    .form-label-group>input,
    .form-label-group>label {
      padding: var(--input-padding-y) var(--input-padding-x);
      height: auto;
      border-radius: 2rem;
    }

    .form-label-group>label {
      position: absolute;
      top: 0;
      left: 0;
      display: block;
      width: 100%;
      margin-bottom: 0;
      /* Override default `<label>` margin */
      line-height: 1.5;
      color: #495057;
      cursor: text;
      /* Match the input under the label */
      border: 1px solid transparent;
      border-radius: .25rem;
      transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
      color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
      color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
      color: transparent;
    }

    .form-label-group input::-moz-placeholder {
      color: transparent;
    }

    .form-label-group input::placeholder {
      color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
      padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
      padding-bottom: calc(var(--input-padding-y) / 3);
    }

    .form-label-group input:not(:placeholder-shown)~label {
      padding-top: calc(var(--input-padding-y) / 3);
      padding-bottom: calc(var(--input-padding-y) / 3);
      font-size: 12px;
      color: #777;
    }

    /* Fallback for Edge
    -------------------------------------------------- */

    @supports (-ms-ime-align: auto) {
      .form-label-group>label {
        display: none;
      }
      .form-label-group input::-ms-input-placeholder {
        color: #777;
      }
    }

    /* Fallback for IE
    -------------------------------------------------- */

    @media all and (-ms-high-contrast: none),
    (-ms-high-contrast: active) {
      .form-label-group>label {
        display: none;
      }
      .form-label-group input:-ms-input-placeholder {
        color: #777;
      }
    }
    </style>
</head>
<body>
        <!-- ##### Header Area Start ##### -->
        <header class="header-area">

        @auth
            <!-- Top Header Area -->
            <div class="top-header-area">
                <div class="h-100 d-md-flex justify-content-between align-items-center">
                    <div class="email-address">
                        <a href="mailto:contact@southtemplate.com">contact@southtemplate.com</a>
                    </div>
                    <div class="phone-number d-flex">
                        <div class="icon">
                            <img src="img/icons/phone-call.png" alt="">
                        </div>
                        <div class="number">
                            <a href="tel:+45 677 8993000 223">+45 677 8993000 223</a>
                        </div>
                    </div>
                </div>
            </div>
        @endauth

<!-- Main Header Area -->
<div class="main-header-area" id="stickyHeader">
    <div class="classy-nav-container breakpoint-off">
        <!-- Classy Menu -->
        <nav class="classy-navbar justify-content-between" id="southNav">

            <!-- Logo -->
            <a class="nav-brand" href="{{ url('/') }}"><img src="{{ url("img/core-img/logo.png") }}" alt=""></a>

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
                        <li><a href="{{ route('/') }}">Home</a></li>
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
        <li><a href="{{ route('about-us') }}">About Us</a></li>
        <li><a href="listings.html">Properties</a></li>
        <li><a href="blog.html">Blog</a></li>
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
        <li><a href="{{ route('contact') }}">Contact</a></li>
        @auth
            <li><a href="#">My Account</a>
                <ul class="dropdown">
                    <li><a href="{{ route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{ route('profile')}}">Profile</a></li>

                    <li><a href="{{ url('/logout') }}"><button type="button" class="btn primary-btn btn-md btn-block mt-2">Sign Out</button></a></li>
                </ul>
            </li>
        @else
            <li><a href="{{ url('/login') }}"><button type="button" class="btn primary-btn btn-md text-uppercase">Sign In</button></a></li>
        @endauth


        </ul>

        <!-- Search Form -->
        <div class="south-search-form">
            <form action="#" method="post">
                <input type="search" name="search" id="search" placeholder="Search Anything ...">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>

        <!-- Search Button -->
        <a href="#" class="searchbtn"><i class="fa" aria-hidden="true"></i></a>
        </div>
        <!-- Nav End -->
        </div>
        </nav>
</div>
</div>
</header>

<div>
    @yield('content')
</div>



<!-- ##### Footer Area Start ##### -->
<footer class="footer-area section-padding-100-0 bg-img gradient-background-overlay" style="background-image: url(img/bg-img/cta.jpg);">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title">
                            <h6>About Us</h6>
                        </div>

                        <img src="img/bg-img/footer.jpg" alt="">
                        <div class="footer-logo my-4">
                            <img src="img/core-img/logo.png" alt="">
                        </div>
                        <p>Integer nec bibendum lacus. Suspen disse dictum enim sit amet libero males uada feugiat. Praesent malesuada.</p>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title">
                            <h6>Hours</h6>
                        </div>
                        <!-- Office Hours -->
                        <div class="weekly-office-hours">
                            <ul>
                                <li class="d-flex align-items-center justify-content-between"><span>Monday - Friday</span> <span>09 AM - 19 PM</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Saturday</span> <span>09 AM - 14 PM</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Sunday</span> <span>Closed</span></li>
                            </ul>
                        </div>
                        <!-- Address -->
                        <div class="address">
                            <h6><img src="img/icons/phone-call.png" alt=""> +45 677 8993000 223</h6>
                            <h6><img src="img/icons/envelope.png" alt=""> office@template.com</h6>
                            <h6><img src="img/icons/location.png" alt=""> Main Str. no 45-46, b3, 56832, Los Angeles, CA</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title">
                            <h6>Useful Links</h6>
                        </div>
                        <!-- Nav -->
                        <ul class="useful-links-nav d-flex align-items-center">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Properties</a></li>
                            <li><a href="#">Listings</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Properties</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Elements</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title">
                            <h6>Featured Properties</h6>
                        </div>
                        <!-- Featured Properties Slides -->
                        <div class="featured-properties-slides owl-carousel">
                            <!-- Single Slide -->
                            <div class="single-featured-properties-slide">
                                <a href="#"><img src="img/bg-img/fea-product.jpg" alt=""></a>
                            </div>
                            <!-- Single Slide -->
                            <div class="single-featured-properties-slide">
                                <a href="#"><img src="img/bg-img/fea-product.jpg" alt=""></a>
                            </div>
                            <!-- Single Slide -->
                            <div class="single-featured-properties-slide">
                                <a href="#"><img src="img/bg-img/fea-product.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Copywrite Text -->
    <div class="copywrite-text d-flex align-items-center justify-content-center">
        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
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
