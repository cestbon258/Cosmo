@extends('layouts.master')

@section('sharing')
    @parent
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

@endsection

@section('title', 'Home')

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>

@stop


@section('content')


    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area" id="bg-video">
        <video autoplay="autoplay" muted="muted" loop="loop" playsinline>
            <source src="{{ URL::asset('logo/cosmo_v4.mp4') }}" type="video/mp4">
        </video>
        {{-- <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Find your home</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/hero2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Find your dream house</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/hero3.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Find your perfect house</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>
    <!-- ##### Hero Area End ##### -->

    <div id="nav-placeholder"  style="height:155px; display:none;"></div>
    <!-- ##### Advance Search Area Start ##### -->
    <div class="south-search-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="advanced-search-form">
                        <!-- Search Title -->
                        <div class="search-title">
                            <p>@lang('index.search_text')</p>
                        </div>
                        <!-- Search Form -->
                        <form action="{{ route('search', app()->getLocale()) }}" method="get" id="advanceSearch">
                            {{-- @csrf --}}

                            <div class="row">

                                {{-- <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <input type="input" class="form-control" name="input" placeholder="Keyword">
                                    </div>
                                </div> --}}
                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        You want to:
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" name="purpose">
                                            <option>Buy</option>
                                            <option>Rent</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" name="propertyType">
                                            <option>All Property Type</option>
                                            <option>Commercial</option>
                                            <option>Industrial</option>
                                            <option>Retail</option>
                                            <option>Residential</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" onchange="getCities()" id="country" name="country">
                                            <option>@lang('index.all_countries')</option>
                                            @foreach ($districts as $key => $district)
                                                <option value="{{$district->country}}"> {{$district->country}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" id="city" name="city">
                                            <option> All Cities </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" id="bedrooms" name="bedroom">
                                            <option>@lang('index.bedrooms')</option>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            {{-- <option>10</option> --}}
                                            <option>10+</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" id="bathrooms" name="bathroom">
                                            <option>@lang('index.bathrooms')</option>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>1.5</option>
                                            <option>2</option>
                                            <option>2.5</option>
                                            <option>3</option>
                                            <option>3.5</option>
                                            <option>4</option>
                                            <option>4.5</option>
                                            <option>5</option>
                                            <option>5.5</option>
                                        </select>
                                    </div>
                                </div>





                                <div class="col-12">
                                    <br>
                                    <div class="row">

                                        <div class="col-12 col-md-6 col-sm-12 col-lg-6 col-xl-6" style="padding-right: 30px; margin-bottom: 20px;">

                                            <div style="width:100%;" id="price-slider"></div>
                                            <label class="mt-4"><small>Price: </small><span id="price-tag"></span></label>
                                            <input name="priceRange" id="price-range" hidden>

                                            {{-- <label><small>Price: </small><span id="price-tag"></span></label> --}}

                                            {{-- <div class="form-group" style="width:100%;">
                                                <input type="range" class="slider" min="0" max="10000000" value="0" step="5000" id="priceRange" name="price">
                                                <label class="mt-1" for="formControlRange"><small>Price: </small><span id="priceText"></span></label>
                                            </div> --}}
                                        </div>

                                        <div class="col-12 col-md-6 col-sm-12 col-lg-6 col-xl-6" style="padding-right: 30px;">
                                            <div style="width:100%;" id="unit-slider"></div>
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6  col-sm-6 col-lg-6">
                                                    <label class="mt-3"><small>Size: </small><span id="unit-tag"></span></label>
                                                    <input name="unitRange" id="unit-range" hidden>
                                                </div>
                                                <div class="col-6 col-md-6  col-sm-6 col-lg-6 mt-2" style="padding-right:0;">
                                                    {{-- <div class="form-group"> --}}
                                                        <select class="form-control" name="unit">
                                                            <option>sq ft</option>
                                                            <option>m&#178;</option>
                                                        </select>
                                                    {{-- </div> --}}
                                                </div>
                                            </div>
                                            {{-- <div class="form-group" style="width:100%;">
                                                <input type="range" class="slider" min="0" max="10000" value="0" step="50" id="sizeRange" name="size">
                                                <label class="mt-1" for="formControlRange"><small>Size: </small><span id="sizeText"></span></label>
                                            </div> --}}
                                        </div>

                                    </div>
                                </div>



                                {{-- <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" id="catagories">
                                            <option>All Catagories</option>
                                            <option>Apartment</option>
                                            <option>Bar</option>
                                            <option>Farm</option>
                                            <option>House</option>
                                            <option>Store</option>
                                        </select>
                                    </div>
                                </div> --}}

                                {{-- <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" id="offers">
                                            <option>All Offers</option>
                                            <option>100% OFF</option>
                                            <option>75% OFF</option>
                                            <option>50% OFF</option>
                                            <option>25% OFF</option>
                                            <option>10% OFF</option>
                                        </select>
                                    </div>
                                </div> --}}

                                {{-- <div class="col-12 col-md-4 col-xl-3">
                                    <div class="form-group">
                                        <select class="form-control" id="listings">
                                            <option>All Listings</option>
                                            <option>Listings 1</option>
                                            <option>Listings 2</option>
                                            <option>Listings 3</option>
                                            <option>Listings 4</option>
                                            <option>Listings 5</option>
                                        </select>
                                    </div>
                                </div> --}}






                                {{-- <div class="col-12 col-md-5 col-lg-12 col-xl-5 d-flex"> --}}


                                <div class="col-12 search-form-second-steps">
                                    <div class="row">

                                        <div class="col-12 col-md-4 col-lg-3">
                                            <div class="form-group">
                                                <select class="form-control" id="types">
                                                    <option>All Types</option>
                                                    <option>Apartment <span>(30)</span></option>
                                                    <option>Land <span>(69)</span></option>
                                                    <option>Villas <span>(103)</span></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-3">
                                            <div class="form-group">
                                                <select class="form-control" id="catagories2">
                                                    <option>All Catagories</option>
                                                    <option>Apartment</option>
                                                    <option>Bar</option>
                                                    <option>Farm</option>
                                                    <option>House</option>
                                                    <option>Store</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-3">
                                            <div class="form-group">
                                                <select class="form-control" id="Actions">
                                                    <option>All Actions</option>
                                                    <option>Sales</option>
                                                    <option>Booking</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-3">
                                            <div class="form-group">
                                                <select class="form-control" id="city2">
                                                    <option>All City</option>
                                                    <option>City 1</option>
                                                    <option>City 2</option>
                                                    <option>City 3</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <select class="form-control" id="Actions3">
                                                    <option>All Actions</option>
                                                    <option>Sales</option>
                                                    <option>Booking</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <select class="form-control" id="city3">
                                                    <option>All City</option>
                                                    <option>City 1</option>
                                                    <option>City 2</option>
                                                    <option>City 3</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <select class="form-control" id="city5">
                                                    <option>All City</option>
                                                    <option>City 1</option>
                                                    <option>City 2</option>
                                                    <option>City 3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-between align-items-end">
                                    <div class="more-filter">
                                        {{-- <a href="#" id="moreFilter">+ More filters</a> --}}
                                    </div>

                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn south-btn">@lang('index.search')</button>
                                    </div>
                                </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Advance Search Area End ##### -->

    {{-- <div class="container section-padding-100-50">
        <div class="row">
            <div class="col-12">
                <div class="section-heading wow fadeInUp">
                    <h2>Cosmo Virtual Property Tour</h2>
                </div>
            </div>
        </div>

        <div class="embed-responsive embed-responsive-4by3 fadeInUp">
            <iframe class="embed-responsive-item" src="https://unbranded.youriguide.com/28626_mt_rushmore_rd_rancho_palos_verdes_ca?__avoid-embed-load__=&nosplash=&page=tour&noinitanimation=1&pano=3&rotation=-0.24434609527920614&elevation=0&from=singlemessag"></iframe>
        </div>
    </div> --}}
    <div style="height:80px; display:none;" id="featured-property"></div>

    <!-- ##### Featured Properties Area Start ##### -->
    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp">
                        <h2>@lang('index.featured_properties')</h2>
                        {{-- <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($properties as $key => $property)
                    @if ($property->project_type == 1)
                        <!-- Single Featured Property -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">

                                <!-- Property Thumbnail -->
                                <div class="property-thumb">
                                    <a href="{{ route('property', [app()->getLocale(), $property->property_code]) }}"><img style="width: 100%;" src="{{url('storage/properties/'.$property->property_code.'/thumbnails'.'/'.$property->pictures)}}"></a>

                                    @if ($property->project_status)
                                        <div class="tag">
                                            <span>{{$property->project_status}}</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Property Content -->
                                <div class="property-content" style="background-color: white;">
                                    <a href="{{ route('property', [app()->getLocale(), $property->property_code]) }}"><div style="height:54px;"><h5>{{$property->title}}</h5></div></a>
                                    <p class="location thumb-space" style="font-size: 16px;">{{$property->city}}</p>
                                    <h6>Expected Date of Completion</h6>
                                    <p class="thumb-space">{{$property->time ? $property->time : 'completed' }}</p>

                                    <h6>Price Range</h6>
                                    <p class="thumb-space">Prices from {{$property->currency}} {{ number_format($property->price, 0, '.', ',') }}</p>
                                    <div class="social">
                                        <a id="shareToWP" href="whatsapp://send?text={{ route('property', [app()->getLocale(), $property->property_code]) }}" data-action="share/whatsapp/share"><div class="whatsapp"></div></a>

                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('property', [app()->getLocale(), $property->property_code]) }}" target="_blank"><div class="facebook"></div></a>

                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('property', [app()->getLocale(), $property->property_code]) }}&title=&summary=&source=" target="_blank"><div class="linkedin"></div></a>

                                        {{-- <a href="https://twitter.com/home?status={{ route('property', [app()->getLocale(), $property->property_code]) }}" target="_blank"><i class="fa fa-twitter"></i></a> --}}

                                        {{-- @auth<a href="#"  onclick="likeThis('{{$property->property_id}}')"><i class="fa fa-heart" hidden></i></a>@endauth --}}
                                    </div>
                                    <center>
                                        <a href="{{ route('property', [app()->getLocale(), $property->property_code])  }}">
                                            <button type="button" class="btn south-btn detail-btn">Details</button>
                                        </a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Project Featured Property -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                                <!-- Property Thumbnail -->
                                <div class="property-thumb">
                                        <a href="{{ route('property', [app()->getLocale(), $property->property_code]) }}"><img style="width: 100%;" src="{{url('storage/projects/'.$property->property_code.'/thumbnails'.'/'.$property->pictures)}}"></a>

                                        @if ($property->project_status)
                                            <div class="tag">
                                                <span>{{$property->project_status}}</span>
                                            </div>
                                        @endif
                                </div>

                                <!-- Property Content -->
                                <div class="property-content" style="background-color: white;">
                                    <a href="{{ route('property', [app()->getLocale(), $property->property_code]) }}"><div style="height:54px;"><h5>{{$property->title}}</h5></div></a>
                                    <p class="location thumb-space" style="font-size: 16px;">{{$property->city}}</p>
                                    <h6>Expected Date of Completion</h6>
                                    <p class="thumb-space">{{$property->completed_date ? $property->completed_date : 'Completed'}}</p>

                                    <h6>Price Range</h6>
                                    <p class="thumb-space">Prices from {{$property->currency}} {{ number_format($property->price, 0, '.', ',') }}</p>
                                    <div class="social">
                                        <a id="shareToWP" href="whatsapp://send?text={{ route('property', [app()->getLocale(), $property->property_code]) }}" data-action="share/whatsapp/share"><div class="whatsapp"></div></a>

                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('property', [app()->getLocale(), $property->property_code]) }}" target="_blank"><div class="facebook"></div></a>

                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('property', [app()->getLocale(), $property->property_code]) }}&title=&summary=&source=" target="_blank"><div class="linkedin"></div></a>

                                        {{-- <a href="https://twitter.com/home?status={{ route('property', [app()->getLocale(), $property->property_code]) }}" target="_blank"><i class="fa fa-twitter"></i></a> --}}

                                        {{-- @auth<a href="#"  onclick="likeThis('{{$property->property_id}}')"><i class="fa fa-heart" hidden></i></a>@endauth --}}
                                    </div>
                                    <center>
                                        <a href="{{ route('property', [app()->getLocale(), $property->property_code])  }}">
                                            <button type="button" class="btn south-btn detail-btn">Details</button>
                                        </a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach





                {{-- <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="600ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img src="img/bg-img/feature6.jpg" alt="">

                            <div class="tag">
                                <span>For Sale</span>
                            </div>
                            @auth
                                <div class="list-price">
                                    <p>$945 679</p>
                                </div>
                            @endauth
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>Town House in Los Angeles</h5>
                            <p class="location"><img src="img/icons/location.png" alt="">Upper Road 3411, no.34 CA</p>
                            <p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="img/icons/new.png" alt="">
                                </div>
                                <div class="bathroom">
                                    <img src="img/icons/bathtub.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="garage">
                                    <img src="img/icons/garage.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="space">
                                    <img src="img/icons/space.png" alt="">
                                    <span>120 sq ft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $properties->appends(request()->query())->onEachSide(1)->links() }}
            </div>
        </div>
    </section>
    <!-- ##### Featured Properties Area End ##### -->

    <!-- ##### Call To Action Area Start ##### -->
    {{-- <section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url( {{url('img/bg-img/cta.jpg')}} )">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-12">
                    <div class="cta-content text-center">
                        <h2 class="wow fadeInUp" data-wow-delay="300ms">@lang('index.are_you_looking_for')</h2>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ##### Call To Action Area End ##### -->

    <!-- ##### Testimonials Area Start ##### -->
    {{-- <section class="south-testimonials-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                        <h2>Client testimonials</h2>
                        <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel wow fadeInUp" data-wow-delay="500ms">

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide text-center">
                            <h5>Perfect Home for me</h5>
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                            <div class="testimonial-author-info">
                                <img src="img/bg-img/feature6.jpg" alt="">
                                <p>Daiane Smith, <span>Customer</span></p>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide text-center">
                            <h5>Perfect Home for me</h5>
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                            <div class="testimonial-author-info">
                                <img src="img/bg-img/feature6.jpg" alt="">
                                <p>Daiane Smith, <span>Customer</span></p>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide text-center">
                            <h5>Perfect Home for me</h5>
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                            <div class="testimonial-author-info">
                                <img src="img/bg-img/feature6.jpg" alt="">
                                <p>Daiane Smith, <span>Customer</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ##### Testimonials Area End ##### -->

    <section>
        <div class="row" style="margin: 0;">
            {{-- <div class="col-xl-4 col-md-6 px-0 grid-image">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;">Perth</h4>
                    <p><i>The Perth Cultural Centre occupies its own central precinct, including a theatre, library and the Art Gallery of Western Australia.</i></p>
                    <span class="btn btn-link">Read More</span>
                </div>
                <img src="{{url('img/gallery/Australia/perth-1200x720.jpg')}}">
            </div> --}}

            <div class="col-xl-4 col-md-6 px-0 view view-tenth " style=" background-color: #000;">
                <a href="{{ route('search-by', [app()->getLocale(), 'country=Australia&city=Brisbane']) }}">
                    <div class="text-center centered" style="z-index: 1;">
                        <h4 style="color:white;" class="text-uppercase">@lang('index.brisbane')</h4>
                    </div>
                    <img src="{{url('img/gallery/Australia/Brisbane.jpg')}}">
                    <div class="mask">
                        <h2>@lang('index.brisbane')</h2>
                        <p><i>@lang('index.brisbane_text')</i></p>
                        {{-- <a href="#" class="info">Read More</a> --}}
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <a href="{{ route('search-by', [app()->getLocale(), 'country=Australia&city=gold coast']) }}">
                    <div class="text-center centered" style="z-index: 1;">
                        <h4 style="color:white;" class="text-uppercase">@lang('index.gold_coast')</h4>
                    </div>
                    <img src="{{url('img/gallery/Australia/gold-coast.jpg')}}">
                    <div class="mask">
                        <h2>@lang('index.gold_coast')</h2>
                        <p><i>@lang('index.gold_coast_text')</i></p>
                        {{-- <a href="#" class="info">Read More</a> --}}
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <a href="{{ route('search-by', [app()->getLocale(), 'country=Australia&city=melbourne']) }}">
                    <div class="text-center centered" style="z-index: 1;">
                        <h4 style="color:white;" class="text-uppercase">@lang('index.melbourne')</h4>
                    </div>
                    <img src="{{url('img/gallery/Australia/melbourne.jpg')}}">
                    <div class="mask">
                        <h2>@lang('index.melbourne')</h2>
                        <p><i>@lang('index.melbourne_text')</i></p>
                        {{-- <a href="#" class="info">Read More</a> --}}
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <a href="{{ route('search-by', [app()->getLocale(), 'country=Australia&city=perth']) }}">
                    <div class="text-center centered" style="z-index: 1;">
                        <h4 style="color:white;" class="text-uppercase">@lang('index.perth')</h4>
                    </div>
                    <img src="{{url('img/gallery/Australia/perth.jpg')}}">
                    <div class="mask">
                        <h2>@lang('index.perth')</h2>
                        <p><i>@lang('index.perth_text')</i></p>
                        {{-- <a href="#" class="info">Read More</a> --}}
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <a href="{{ route('search-by', [app()->getLocale(), 'country=Australia&city=sydney']) }}">
                    <div class="text-center centered" style="z-index: 1;">
                        <h4 style="color:white;" class="text-uppercase">@lang('index.sydney')</h4>
                    </div>
                    <img src="{{url('img/gallery/Australia/sydney.jpg')}}">
                    <div class="mask">
                        <h2>@lang('index.sydney')</h2>
                        <p>@lang('index.sydney_text')</p>
                        {{-- <a href="#" class="info">Read More</a> --}}
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <a href="{{ route('search-by', [app()->getLocale(), 'country=UK&city=leeds']) }}">
                    <div class="text-center centered" style="z-index: 1;">
                        <h4 style="color:white;" class="text-uppercase">@lang('index.leeds')</h4>
                    </div>
                    <img src="{{url('img/gallery/UK/leeds.jpg')}}">
                    <div class="mask">
                        <h2>@lang('index.leeds')</h2>
                        <p><i>@lang('index.leeds_text')</i></p>
                        {{-- <a href="#" class="info">Read More</a> --}}
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <a href="{{ route('search-by', [app()->getLocale(), 'country=UK&city=liverpool']) }}">
                    <div class="text-center centered" style="z-index: 1;">
                        <h4 style="color:white;" class="text-uppercase">@lang('index.liverpool')</h4>
                    </div>
                    <img src="{{url('img/gallery/UK/liverpool.jpg')}}">
                    <div class="mask">
                        <h2>@lang('index.liverpool')</h2>
                        <p><i>@lang('index.liverpool_text')</i></p>
                        {{-- <a href="#" class="info">Read More</a> --}}
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <a href="{{ route('search-by', [app()->getLocale(), 'country=UK&city=london']) }}">
                    <div class="text-center centered" style="z-index: 1;">
                        <h4 style="color:white;" class="text-uppercase">@lang('index.london')</h4>
                    </div>
                    <img src="{{url('img/gallery/UK/london.jpg')}}">
                    <div class="mask">
                        <h2>@lang('index.london')</h2>
                        <p><i>@lang('index.london_text')</i></p>
                        {{-- <a href="#" class="info">Read More</a> --}}
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <a href="{{ route('search-by', [app()->getLocale(), 'country=UK&city=manchester']) }}">
                    <div class="text-center centered" style="z-index: 1;">
                        <h4 style="color:white;" class="text-uppercase">@lang('index.manchester')</h4>
                    </div>
                    <img src="{{url('img/gallery/UK/manchester.jpg')}}">
                    <div class="mask">
                        <h2>@lang('index.manchester')</h2>
                        <p><i>@lang('index.manchester_text')</i></p>
                        {{-- <a href="#" class="info">Read More</a> --}}
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <a href="{{ route('search-by', [app()->getLocale(), 'country=UK&city=sheffield']) }}">
                    <div class="text-center centered" style="z-index: 1;">
                        <h4 style="color:white;" class="text-uppercase">@lang('index.sheffield')</h4>
                    </div>
                    <img src="{{url('img/gallery/UK/sheffield.jpg')}}">
                    <div class="mask">
                        <h2>@lang('index.sheffield')</h2>
                        <p><i>@lang('index.sheffield_text')</i></p>
                        {{-- <a href="#" class="info">Read More</a> --}}
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <a href="{{ route('search-by', [app()->getLocale(), 'country=US&city=los angeles']) }}">
                    <div class="text-center centered" style="z-index: 1;">
                        <h4 style="color:white;" class="text-uppercase">@lang('index.los_angeles')</h4>
                    </div>
                    <img src="{{url('img/gallery/US/los-angeles.jpg')}}">
                    <div class="mask">
                        <h2>@lang('index.los_angeles')</h2>
                        <p><i>@lang('index.los_angeles_text')</i></p>
                        {{-- <a href="#" class="info">Read More</a> --}}
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <a href="{{ route('search-by', [app()->getLocale(), 'country=US&city=miami']) }}">
                    <div class="text-center centered" style="z-index: 1;">
                        <h4 style="color:white;" class="text-uppercase">@lang('index.miami')</h4>
                    </div>
                    <img src="{{url('img/gallery/US/miami.jpg')}}">
                    <div class="mask">
                        <h2>@lang('index.miami')</h2>
                        <p><i>@lang('index.miami_text')</i></p>
                        {{-- <a href="#" class="info">Read More</a> --}}
                    </div>
                </a>
            </div>

            {{-- <div class="col-xl-4 col-md-6 px-0 grid-image">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;">Leeds</h4>
                    <p><i>Leeds plays host to world class culture, incredible shopping, stunning architecture and a varied housing stock.</i></p>
                    <span class="btn btn-link">Read More</span>
                </div>
                <img src="{{url('img/gallery/UK/leeds.jpg')}}">
            </div> --}}
            {{-- <div class="col-xl-4 col-md-6 px-0 grid-image">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;">Leeds</h4>
                    <p><i>Leeds plays host to world class culture, incredible shopping, stunning architecture and a varied housing stock.</i></p>
                    <span class="btn btn-link">Read More</span>
                </div>
                <img src="{{url('img/gallery/UK/leeds.jpg')}}">
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;">London</h4>
                </div>
                <img  style="height:280px; width:100%;" src="{{url('img/gallery/UK/london.jpg')}}">
                <div class="mask">
                    <h2>London</h2>
                    <p><i>London is the most ethnically diverse city in the world due to the UK's history as a global power and its international business focus.</i></p>
                    <a href="#" class="info">Read More</a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 px-0 grid-image">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;">liverpool</h4>
                    <p><i>A vibrant, growing city with history, architecture, it has a bustling centre, the countryside, the beach and, of course, the Beatles.</i></p>
                    <span class="btn btn-link">Read More</span>
                </div>
                <img src="{{url('img/gallery/UK/liverpool.jpg')}}">
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;">Miami</h4>
                </div>
                <img  style="height:280px; width:100%;" src="{{url('img/gallery/US/Miami-1024x547.jpg')}}">
                <div class="mask">
                    <h2>Miami</h2>
                    <p><i>A city with its amazing cultural spots and breathtaking beaches, to its varied cuisine and wide assortment of nightlife and entertainment options.</i></p>
                    <a href="#" class="info">Read More</a>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 px-0 grid-image">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;">Manchester</h4>
                    <p><i>Youthful, diverse, energetic and bursting with character.</i></p>
                    <span class="btn btn-link">Read More</span>
                </div>
                <img src="{{url('img/gallery/UK/manchester.jpg')}}">
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;">Sheffield</h4>
                </div>
                <img  style="height:280px; width:100%;" src="{{url('img/gallery/UK/sheffield.jpg')}}">
                <div class="mask">
                    <h2>Sheffield</h2>
                    <p><i>From a distance and up close, it’s beautiful, our views are spectacular, our food and drink are inspirational.</i></p>
                    <a href="#" class="info">Read More</a>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 px-0 grid-image">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;">Gold Coast</h4>
                    <p><i>Famed for its long sandy beaches, surfing spots and elaborate system of inland canals and waterways.</i></p>
                    <span class="btn btn-link">Read More</span>
                </div>
                <img src="{{url('img/gallery/Australia/gold-coast.jpg')}}">
            </div> --}}




            {{-- <div class="col-xl-4 col-md-6 px-0 grid-image">
                <div class="text-center centered" style="z-index: 1; color:blue;"><h4 style="color:white;">Trousdale Estates</h4><p style="display: none; color:white;">The alluring homes of Trousdale Estates offer some of the most exceptional views Beverly Hills has to offer.</p><span class="btn btn-link" style="display: none; color:white;">Read More</span></div>
                <img src="//res.cloudinary.com/luxuryp/image/upload/q_auto:good,f_auto/w_700/ohj0enc1kmcmgyjgnajj.jpg" style="width:100%; opacity:.8;">
            </div>
            <div class="col-xl-4 col-md-6 px-0 grid-image">
                <div class="text-center centered" style="z-index: 1; color:blue;"><h4 style="color:white;">Trousdale Estates</h4><p style="display: none; color:white;">The alluring homes of Trousdale Estates offer some of the most exceptional views Beverly Hills has to offer.</p><span class="btn btn-link" style="display: none; color:white;">Read More</span></div>
                <img src="//res.cloudinary.com/luxuryp/image/upload/q_auto:good,f_auto/w_700/ohj0enc1kmcmgyjgnajj.jpg" style="width:100%;  opacity:.8;">
            </div> --}}

        </div>
    </section>
    {{-- <section>
        <a href="communities/trousdale-estates" class="grid community-grid-item"><div class="grid-text"><h4>Trousdale Estates</h4><p>The alluring homes of Trousdale Estates offer some of the most exceptional views Beverly Hills has to offer.</p><span class="btn btn-link">Read More</span></div><img alt="" src="//res.cloudinary.com/luxuryp/image/upload/q_auto:good,f_auto/w_700/ohj0enc1kmcmgyjgnajj.jpg" class="grid-image cover"></a>
    </section> --}}
    <!-- ##### Editor Area Start ##### -->
    {{-- <section class="south-editor-area d-flex align-items-center">
        <!-- Editor Content -->
        <div class="editor-content-area">
            <!-- Section Heading -->
            <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                <img src="img/icons/prize.png" alt="">
                <h2>Vivian Chan</h2>
                <p>Cosmos Founder</p>
            </div>
            <p class="wow fadeInUp" data-wow-delay="500ms">20 years of experience in real estate industries. Current CEO of other tech company. Sutdying the ultimate degree from US prestigious universities. Live between life and death. Trap in UST campus. Experience 5 hours of torturing exams without breaks. After exam, she breaks down physically and mentally</p>
            <div class="address wow fadeInUp" data-wow-delay="750ms">
                <h6><img src="img/icons/phone-call.png" alt=""> +805 9225 3126</h6>
                <h6><img src="img/icons/envelope.png" alt=""> iamceo@coscmos.com</h6>
            </div>
            <div class="signature mt-50 wow fadeInUp" data-wow-delay="1000ms">
                <img src="img/core-img/signature.png" alt="">
            </div>
        </div>

        <!-- Editor Thumbnail -->
        <div class="editor-thumbnail">
            <img src="img/bg-img/editor.jpg" alt="">
        </div>
    </section> --}}
    <!-- ##### Editor Area End ##### -->

    <script>

        var districts = {!! json_encode($districts) !!};

        function getCities (){
            var selectedCountry = document.getElementById("country").value;
            var cityList = document.getElementById("city");

            if (selectedCountry != "All Countries") {
                for (var i = 0; i < districts.length; i++) {
                    if (selectedCountry == districts[i]['country']) {
                        var citiesArray = districts[i]['city'];

                        var checkExist = citiesArray.includes("All Cities");
                        if (!checkExist) {
                            citiesArray.unshift("All Cities");
                        }

                        while (cityList.options.length) {
                            cityList.remove(0);
                        }

                        for (var j = 0; j < citiesArray.length; j++) {
                            var city = new Option(citiesArray[j], citiesArray[j]);
                            cityList.options.add(city);
                        }
                    }
                }
            } else {
                $('#city')
                .empty()
                .append('<option selected="selected" value="All Cities">All Cities</option>');
            }

        }

        function likeThis(pid) {
            $.ajax({
                   type:'get',
                   url: '{{ route('like_this', app()->getLocale())}}',
                   data: {propertyID: pid},
                   dataType: "json",
                   success:function(data) {
                       console.log(data);
                   },
                   error:function() {
                   }
               });
        }


        var priceSlider = document.getElementById('price-slider');
        var priceTag = document.getElementById('price-tag');
        var priceRange = document.getElementById('price-range');
        noUiSlider.create(priceSlider, {
            start: [0, 10000000],
            connect: true,
            range: {
                'min': 0,
                'max': 10000000
            },
            orientation: 'horizontal', // 'horizontal' or 'vertical'
            step: 5000,
            behaviour: 'snap',
            // tooltips: true,
            format: wNumb({
                decimals: 0,
            	thousand: ','
            })
        });
        priceSlider.noUiSlider.on('update', function (value) {
            priceTag.innerHTML = value.join(' - ');
            priceRange.value = value.join('-');

        });


        var unitSlider = document.getElementById('unit-slider');
        var unitTag = document.getElementById('unit-tag');
        var unitRange = document.getElementById('unit-range');
        noUiSlider.create(unitSlider, {
            start: [0, 10000],
            connect: true,
            range: {
                'min': 0,
                'max': 10000
            },
            orientation: 'horizontal', // 'horizontal' or 'vertical'
            step: 50,
            behaviour: 'snap',
            // tooltips: true,
            format: wNumb({
                decimals: 0,
                thousand: ','
            })
        });
        unitSlider.noUiSlider.on('update', function (value) {
            unitTag.innerHTML = value.join(' - ');
            unitRange.value = value.join('-');

        });

        // if pagination, scroll to specific position and hide video
        var url_string = window.location.href;
        var url = new URL(url_string);
        var page = url.searchParams.get('page');

        if(page != null) {
            $('#nav-placeholder').css("display", "block");
            $('#bg-video').css("display", "none");

            $('#featured-property').css("display", "block");


            var elmnt = document.getElementById("featured-property");
            elmnt.scrollIntoView();
        }
    </script>

    <style>
        html {
            scroll-behavior: smooth;
        }
        .facebook {
            background: url( {{url("img/icons/facebook-off.png")}} );

        }
        .facebook:hover {
            background: url( {{url("img/icons/facebook-on.png")}} );
        }
        .whatsapp {
            background: url( {{url("img/icons/whatsapp-off.png")}} );

        }
        .whatsapp:hover {
            background: url( {{url("img/icons/whatsapp-on.png")}} );
        }
        .linkedin {
            background: url( {{url("img/icons/linkedin-off.png")}} );

        }
        .linkedin:hover {
            background: url( {{url("img/icons/linkedin-on.png")}} );
        }

        .thumb-space {
            margin-bottom: 15px !important;
        }
        .social {
            margin-top:  40px;
            margin-left: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .facebook, .whatsapp, .linkedin {
            margin: -20px 10px 10px -5px;
            width: 25px;
            height: 25px;
            display: inline-block;
        }

        .detail-btn {
            min-width: 54px !important;
            border-radius: 35px !important;
        }
    </style>

@stop
