@extends('layouts.master')

@section('title', 'Home')

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
@stop

@section('content')


    <section class="breadcumb-area bg-img" style="background-image: url({{ url('logo/banner.jpg') }});"></section>

    <!-- ##### Advance Search Area Start ##### -->
    <div class="south-search-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="advanced-search-form">
                        <!-- Search Title -->
                        <div class="search-title">
                            <p>Search for your home</p>
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
                                        <select class="form-control" id="country" name="country">
                                            <option>All Countries</option>
                                            @foreach ($districts as $key => $district)
                                                <option id="Country-{{$district->country}}"> {{$district->country}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" id="city" name="city">
                                            <option>All Cities</option>
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
                                            <option>Bedrooms</option>
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
                                            <option>Bathrooms</option>
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
                                            <option>Unit</option>
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
                                            <span style="font-size:12px;">Price: </span>
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
                                            <span style="font-size:12px;">Size: </span>
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
                                        <button type="submit" class="btn south-btn">Search</button>
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


    <!-- ##### Featured Properties Area Start ##### -->
    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp">
                        <h2>Results</h2>
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
                                            <a href="{{ route('property', [app()->getLocale(), $property->property_code])  }}">Read More</a>
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
                                            <a href="{{ route('property', [app()->getLocale(), $property->property_code])  }}">Read More</a>
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
            </div>
        </div>
    </section>

    <script>
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

        function scrollWin() {
            // window.scrollTo(0, 600);
            window.scrollBy(0, 320);
        }

        scrollWin();
    </script>

    <style>
        .nice-select .list {
            overflow-y: auto;
            height: 250px;
        }
    </style>
@stop
