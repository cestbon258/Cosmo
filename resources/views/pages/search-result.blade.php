@extends('layouts.master')

@section('title', 'Home')

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
@stop

@section('content')

    <div style="height:70px;"></div>
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
                                        </select>
                                    </div>
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


                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-md-8 col-sm-12 col-lg-8 col-xl-8 d-flex">
                                            <div class="form-group" style="width:100%;">
                                                <input type="range" class="slider" min="0" max="10000000" value="0" step="5000" id="priceRange" name="price">
                                                <label class="mt-1" for="formControlRange"><small>Price: </small><span id="priceText"></span></label>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4 col-sm-12 col-lg-4 col-xl-4 d-flex">
                                            <div class="form-group" style="width:100%;">
                                                <input type="range" class="slider" min="0" max="10000" value="0" step="50" id="sizeRange" name="size">
                                                <label class="mt-1" for="formControlRange"><small>Size: </small><span id="sizeText"></span></label>
                                            </div>
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

                                <div class="meida-buttons">
                                    <a id="shareToWP" href="whatsapp://send?text={{ route('property', [app()->getLocale(), $property->property_code]) }}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('property', [app()->getLocale(), $property->property_code]) }}" target="_blank"><i class="fa fa-facebook-f"></i></a>
                                    {{-- <a href="https://twitter.com/home?status={{ route('property', [app()->getLocale(), $property->property_code]) }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('property', [app()->getLocale(), $property->property_code]) }}&title=&summary=&source=" target="_blank"><i class="fa fa-linkedin"></i></a> --}}
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
                                        @if ($property->vr_url)
                                            <div>
                                                @auth
                                                    <a href="{{$property->vr_url}}" target="_blank"><span style="font-size:16px;"><mark><i>VR</i></mark></span></a>
                                                @else
                                                    <span style="font-size:16px;"><mark><i>VR</i></mark></span>
                                                @endauth
                                            </div>
                                        @endif
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

                                <div class="meida-buttons">
                                    <a id="shareToWP" href="whatsapp://send?text={{ route('property', [app()->getLocale(), $property->property_code]) }}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('property', [app()->getLocale(), $property->property_code]) }}" target="_blank"><i class="fa fa-facebook-f"></i></a>
                                    {{-- <a href="https://twitter.com/home?status={{ route('property', [app()->getLocale(), $property->property_code]) }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('property', [app()->getLocale(), $property->property_code]) }}&title=&summary=&source=" target="_blank"><i class="fa fa-linkedin"></i></a> --}}
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
                                        @if ($property->vr_url)
                                            <div>
                                                @auth
                                                    <a href="{{$property->vr_url}}" target="_blank"><span style="font-size:16px;"><mark><i>VR</i></mark></span></a>
                                                @else
                                                    <span style="font-size:16px;"><mark><i>VR</i></mark></span>
                                                @endauth
                                            </div>
                                        @else
                                            <div style="height:27px;"></div>
                                        @endif
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
        var districts = {!! json_encode($districts) !!};

        var cityList = document.getElementById("city");
        var city = new Option('All Cities', 'All Cities');
        cityList.options.add(city);

        function getCities (){
            var selectedCountry = document.getElementById("country").value;
            var cityList = document.getElementById("city");


            for (var i = 0; i < districts.length; i++) {
                if (selectedCountry == districts[i]['country']) {
                    // console.log(districts[i]['city']);
                    var citiesArray = districts[i]['city'];

                    var checkExist = citiesArray.includes("All Cities");
                    if (!checkExist) {
                        citiesArray.unshift("All Cities");
                    }

                    while (cityList.options.length) {
                        cityList.remove(0);
                    }

                    for (i = 0; i < citiesArray.length; i++) {
                        var city = new Option(citiesArray[i], citiesArray[i]);
                        cityList.options.add(city);
                    }
                } else {
                    while (cityList.options.length) {
                        cityList.remove(0);
                    }

                    var city = new Option('All Cities', 'All Cities');
                    cityList.options.add(city);
                }
            }
        }

        // Price range
        var priceSlider = document.getElementById("priceRange");
        var priceText = document.getElementById("priceText");
        if (priceSlider.value == 0) {
            priceText.innerHTML = "Any";
        } else {
            priceText.innerHTML = priceSlider.value;
        }

        priceSlider.oninput = function() {
            if (this.value == 0) {
                priceText.innerHTML = "Any";
            } else {
                priceText.innerHTML = new Intl.NumberFormat().format(this.value);
            }
        }

        // Size range
        var sizeSlider = document.getElementById("sizeRange");
        var sizeText = document.getElementById("sizeText");
        if (sizeSlider.value == 0) {
            sizeText.innerHTML = "Any";
        } else {
            sizeText.innerHTML = sizeSlider.value;
        }

        sizeSlider.oninput = function() {
            if (this.value == 0) {
                sizeText.innerHTML = "Any";
            } else {
                sizeText.innerHTML = new Intl.NumberFormat().format(this.value);
            }
        }

        function scrollWin() {
            // window.scrollTo(0, 600);
            window.scrollBy(0, 390);
        }

        scrollWin();
    </script>

    <style>

    </style>
@stop
