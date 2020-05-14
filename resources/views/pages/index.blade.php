@extends('layouts.master')

@section('title', 'Home')

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
@stop

@section('content')


    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
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
                                        <select class="form-control" onchange="getCities()" id="country" name="country">
                                            <option>@lang('index.all_countries')</option>
                                            @foreach ($districts as $key => $district)
                                                <option id="Country-{{$district->country}}"> {{$district->country}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" id="city" name="city">
                                            <option>@lang('index.all_cities')</option>

                                            @foreach ($districts as $key => $district)
                                                    <option disabled>--- {{$district->country}} ---</option>
                                                @foreach ($district->city as $keyy => $value)
                                                    <option value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
{{--
                                    @foreach ($districts as $key => $district)

                                    <div class="form-group" id="{{$district->country}}-City" style="display:none;">


                                        <select class="form-control" id="city" name="city" >
                                            <option>All Cities</option>
                                                    <option disabled>--- {{$district->country}} ---</option>
                                                @foreach ($district->city as $keyy => $value)
                                                    <option value="{{$value}}|{{$district->country}}">{{$value}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    @endforeach --}}

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
                                            <option>10</option>
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

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" name="unit">
                                            <option>@lang('index.unit')</option>
                                            <option>sq ft</option>
                                            <option>m&#178;</option>
                                        </select>
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
                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <!-- Price Range -->
                                    <div class="slider-range">
                                        <div data-min="1" data-max="1000000" data-unit="" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="1" data-value-max="1000000">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        </div>
                                        <div>
                                            <span style="font-size:12px;">@lang('index.price'): </span>
                                            <span class="range" id="priceRange">1 - 1000000</span>
                                            <input id="priceRangeValue" name="priceRange" hidden>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <!-- Space Range -->
                                    <div class="slider-range">
                                        <div data-min="1" data-max="5000" data-unit="" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="1" data-value-max="5000">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        </div>
                                        <div>
                                            <span style="font-size:12px;">@lang('index.size'): </span>
                                            <span class="range" id="sizeRange">1 - 5000</span>
                                            <input id="sizeRangeValue" name="sizeRange" hidden>
                                        </div>
                                    </div>


                                    <!-- Distance Range -->
                                    {{-- <div class="slider-range">
                                        <div data-min="10" data-max="1300" data-unit=" mil" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="10" data-value-max="1300">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        </div>
                                        <div class="range">10 mil - 1300 mil</div>
                                    </div> --}}
                                </div>


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
                                    {{-- @auth --}}
                                        <a href="{{ route('property', [app()->getLocale(), $property->property_code]) }}"><img style="width: 100%;" src="{{url('storage/properties/'.$property->property_code.'/thumbnails'.'/'.$property->pictures)}}"></a>
                                    {{-- @else
                                        <a href="{{ url('login') }}"><img style="width: 100%;" src="{{url('storage/properties/'.$property->property_code.'/thumbnails'.'/'.$property->pictures)}}"><a>
                                    @endauth --}}

                                    <div class="tag">
                                        <span>For {{$property->purpose}}</span>
                                    </div>
                                    @auth
                                        <div class="list-price">
                                            <p style="font-size:16px;">{{$property->currency}} {{ number_format($property->price, 0, '.', ',') }}</p>
                                        </div>
                                    @endauth
                                </div>
                                <!-- Property Content -->
                                <div class="property-content">
                                    {{-- @auth --}}
                                        <a href="{{ route('property', [app()->getLocale(), $property->property_code]) }}"><div style="height:50px;"><h5>{{$property->title}}</h5></div></a>
                                    {{-- @else
                                        <a href="{{ url('login') }}"><div style="height:50px;"><h5>{{$property->title}}</h5></div></a>
                                    @endauth --}}
                                    <div style="height:80px;"><p class="location"><img src="{{ url('img/icons/location.png') }}" alt="">{{$property->address}}</p></div>
                                    <div style="height: 120px;">
                                        {{-- <p class="text-wrapper text-left" style="margin-bottom: 0;">{{ strip_tags($property->description) }} </p> --}}
                                        <p class="text-wrapper text-left" style="margin-bottom: 0;">{{ strip_tags(htmlspecialchars_decode($property->description)) }} </p>
                                        {{-- @auth --}}
                                            <a href="{{ route('property', [app()->getLocale(), $property->property_code])  }}">@lang('index.read_more')</a>
                                        {{-- @else
                                            <a href="{{ url('login') }}">Read More</a>
                                        @endauth --}}
                                    </div>

                                    <div class="property-meta-data d-flex align-items-end justify-content-between">
                                        <div class="new-tag">
                                            <img src="{{ url('img/icons/new.png') }}" alt="">
                                        </div>
                                        <div class="bathroom">
                                            <img src="{{ url('img/icons/bathtub.png') }}" alt="">
                                            <span>{{$property->bathroom}}</span>
                                        </div>
                                        <div class="garage">
                                            <img src="{{ url('img/icons/garage.png') }}" alt="">
                                            <span>{{$property->bedroom}}</span>
                                        </div>
                                        <div class="space">
                                            <img src="{{ url('img/icons/space.png') }}" alt="">
                                            <span>{{$property->size}} {{$property->measurement}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Project Featured Property -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                                <!-- Property Thumbnail -->
                                <div class="property-thumb">
                                    {{-- @auth --}}
                                        <a href="{{ route('property', [app()->getLocale(), $property->property_code]) }}"><img style="width: 100%;" src="{{url('storage/projects/'.$property->property_code.'/thumbnails'.'/'.$property->pictures)}}"></a>
                                    {{-- @else
                                        <a href="{{ url('login') }}"><img style="width: 100%;" src="{{url('storage/projects/'.$property->property_code.'/thumbnails'.'/'.$property->pictures)}}"><a>
                                    @endauth --}}


                                    {{-- <div class="tag">
                                        <span>For {{$property->purpose}}</span>
                                    </div>
                                    @auth
                                        <div class="list-price">
                                            <p>${{$property->price}}</p>
                                        </div>
                                    @endauth --}}
                                </div>
                                <!-- Property Content -->
                                <div class="property-content">
                                    {{-- @auth --}}
                                        <a href="{{ route('property', [app()->getLocale(), $property->property_code]) }}"><div style="height:50px;"><h5>{{$property->title}}</h5></div></a>
                                    {{-- @else
                                        <a href="{{ url('login') }}"><div style="height:50px;"><h5>{{$property->title}}</h5></div></a>
                                    @endauth --}}
                                    <div style="height:80px;"><p class="location"><img src="{{ url('img/icons/location.png') }}" alt="">{{$property->address}}</p></div>
                                    <div style="height: 120px;">
                                        {{-- <p class="text-wrapper text-left" style="margin-bottom: 0;">{{ strip_tags($property->description) }} </p> --}}
                                        <p class="text-wrapper text-left" style="margin-bottom: 0;">{{ strip_tags(htmlspecialchars_decode($property->description)) }} </p>
                                        {{-- @auth --}}
                                            <a href="{{ route('property', [app()->getLocale(), $property->property_code])  }}">@lang('index.read_more')</a>
                                        {{-- @else
                                            <a href="{{ url('login') }}">Read More</a>
                                        @endauth --}}
                                    </div>

                                    <div class="property-meta-data d-flex align-items-end justify-content-between">
                                        <div style="height:27px;"></div>
                                        {{-- <div class="new-tag">
                                            <img src="img/icons/new.png" alt="">
                                        </div> --}}
                                        {{-- <div class="bathroom">
                                            <img src="img/icons/bathtub.png" alt="">
                                            <span>{{$property->bathroom}}</span>
                                        </div>
                                        <div class="garage">
                                            <img src="img/icons/garage.png" alt="">
                                            <span>{{$property->bedroom}}</span>
                                        </div>
                                        <div class="space">
                                            <img src="img/icons/space.png" alt="">
                                            <span>{{$property->size}} {{$property->measurement}}</span>
                                        </div> --}}
                                    </div>
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
    </section>
    <!-- ##### Featured Properties Area End ##### -->

    <!-- ##### Call To Action Area Start ##### -->
    <section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url( {{url('img/bg-img/cta.jpg')}} )">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-12">
                    <div class="cta-content text-center">
                        <h2 class="wow fadeInUp" data-wow-delay="300ms">@lang('index.are_you_looking_for')</h2>
                        {{-- <h6 class="wow fadeInUp" data-wow-delay="400ms">Suspendisse dictum enim sit amet libero malesuada feugiat.</h6> --}}
                        {{-- <a href="#" class="btn south-btn mt-50 wow fadeInUp" data-wow-delay="500ms">Search</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
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
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;" class="text-uppercase">@lang('index.brisbane')</h4>
                </div>
                <img src="{{url('img/gallery/Australia/Brisbane.jpg')}}">
                <div class="mask">
                    <h2>@lang('index.brisbane')</h2>
                    <p><i>@lang('index.brisbane_text')</i></p>
                    {{-- <a href="#" class="info">Read More</a> --}}
                </div>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;" class="text-uppercase">@lang('index.gold_coast')</h4>
                </div>
                <img src="{{url('img/gallery/Australia/gold-coast.jpg')}}">
                <div class="mask">
                    <h2>@lang('index.gold_coast')</h2>
                    <p><i>@lang('index.gold_coast_text')</i></p>
                    {{-- <a href="#" class="info">Read More</a> --}}
                </div>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;" class="text-uppercase">@lang('index.melbourne')</h4>
                </div>
                <img src="{{url('img/gallery/Australia/melbourne.jpg')}}">
                <div class="mask">
                    <h2>@lang('index.melbourne')</h2>
                    <p><i>@lang('index.melbourne_text')</i></p>
                    {{-- <a href="#" class="info">Read More</a> --}}
                </div>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;" class="text-uppercase">@lang('index.perth')</h4>
                </div>
                <img src="{{url('img/gallery/Australia/perth.jpg')}}">
                <div class="mask">
                    <h2>@lang('index.perth')</h2>
                    <p><i>@lang('index.perth_text')</i></p>
                    {{-- <a href="#" class="info">Read More</a> --}}
                </div>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;" class="text-uppercase">@lang('index.sydney')</h4>
                </div>
                <img src="{{url('img/gallery/Australia/sydney.jpg')}}">
                <div class="mask">
                    <h2>@lang('index.sydney')</h2>
                    <p>@lang('index.sydney_text')</p>
                    {{-- <a href="#" class="info">Read More</a> --}}
                </div>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;" class="text-uppercase">@lang('index.leeds')</h4>
                </div>
                <img src="{{url('img/gallery/UK/leeds.jpg')}}">
                <div class="mask">
                    <h2>@lang('index.leeds')</h2>
                    <p><i>@lang('index.leeds_text')</i></p>
                    {{-- <a href="#" class="info">Read More</a> --}}
                </div>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;" class="text-uppercase">@lang('index.liverpool')</h4>
                </div>
                <img src="{{url('img/gallery/UK/liverpool.jpg')}}">
                <div class="mask">
                    <h2>@lang('index.liverpool')</h2>
                    <p><i>@lang('index.liverpool_text')</i></p>
                    {{-- <a href="#" class="info">Read More</a> --}}
                </div>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;" class="text-uppercase">@lang('index.london')</h4>
                </div>
                <img src="{{url('img/gallery/UK/london.jpg')}}">
                <div class="mask">
                    <h2>@lang('index.london')</h2>
                    <p><i>@lang('index.london_text')</i></p>
                    {{-- <a href="#" class="info">Read More</a> --}}
                </div>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;" class="text-uppercase">@lang('index.manchester')</h4>
                </div>
                <img src="{{url('img/gallery/UK/manchester.jpg')}}">
                <div class="mask">
                    <h2>@lang('index.manchester')</h2>
                    <p><i>@lang('index.manchester_text')</i></p>
                    {{-- <a href="#" class="info">Read More</a> --}}
                </div>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;" class="text-uppercase">@lang('index.sheffield')</h4>
                </div>
                <img src="{{url('img/gallery/UK/sheffield.jpg')}}">
                <div class="mask">
                    <h2>@lang('index.sheffield')</h2>
                    <p><i>@lang('index.sheffield_text')</i></p>
                    {{-- <a href="#" class="info">Read More</a> --}}
                </div>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;" class="text-uppercase">@lang('index.los_angeles')</h4>
                </div>
                <img src="{{url('img/gallery/US/los-angeles.jpg')}}">
                <div class="mask">
                    <h2>@lang('index.los_angeles')</h2>
                    <p><i>@lang('index.los_angeles_text')</i></p>
                    {{-- <a href="#" class="info">Read More</a> --}}
                </div>
            </div>
            <div class="col-xl-4 col-md-6 px-0 view view-tenth" style=" background-color: #000;">
                <div class="text-center centered" style="z-index: 1;">
                    <h4 style="color:white;" class="text-uppercase">@lang('index.miami')</h4>
                </div>
                <img src="{{url('img/gallery/US/miami.jpg')}}">
                <div class="mask">
                    <h2>@lang('index.miami')</h2>
                    <p><i>@lang('index.miami_text')</i></p>
                    {{-- <a href="#" class="info">Read More</a> --}}
                </div>
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

            for (var i = 0; i < districts.length; i++) {
                if (selectedCountry == districts[i]['country']) {
                    console.log(districts[i]['city']);
                }
            }
        }

        // price range
        var priceRange = document.getElementById("priceRange");
        var priceRangeValue = document.getElementById("priceRangeValue");
        priceRangeValue.value = priceRange.innerHTML;

        $('#priceRange').on('DOMSubtreeModified',function(){
            var priceRange = document.getElementById("priceRange");
            var priceRangeValue = document.getElementById("priceRangeValue");
            priceRangeValue.value = priceRange.innerHTML;
        })

        // size range
        var sizeRange = document.getElementById("sizeRange");
        var sizeRangeValue = document.getElementById("sizeRangeValue");
        sizeRangeValue.value = sizeRange.innerHTML;

        $('#sizeRange').on('DOMSubtreeModified',function(){
            var sizeRange = document.getElementById("sizeRange");
            var sizeRangeValue = document.getElementById("sizeRangeValue");
            sizeRangeValue.value = sizeRange.innerHTML;
        })

    </script>
    <style>
        video {
            height: auto;
            width: 100%;
            object-fit: fill;
        }

        .nice-select .list {
            overflow-y: auto;
            height: 250px;
        }


        .centered {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translateY(-50%);
        }
        .grid-image {
            cursor: pointer;
        }
        .grid-image div p{
            display: none;
            color:white;
            padding:0 12px;
            -webkit-transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            -o-transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .grid-image div span{
            display: none;
            transition: opacity 1s ease-out;
            color:white;
        }
        .grid-image img {
            width:100%;
            opacity:.8;
            height: 280px !important;
        }
        .grid-image div span{
            -webkit-transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            -o-transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .grid-image:hover{
            background-color: transparent !important;
            /* opacity: 0.4 !important; */
            background-color: black !important;
        }
        .grid-image:hover div span{
            display: block !important;
        }
        .grid-image:hover div p{
            display: block !important;
        }
        .grid-image:hover img {
            opacity:.4 !important;
        }

    </style>
@stop
