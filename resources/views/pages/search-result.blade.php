@extends('layouts.master')

@section('title', 'Home')

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
@stop
<style>
/* propert content */
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


.vpt {
  position: relative;
  width: 100%;
  overflow: hidden;
  padding-top: 75%; /* 16:9 Aspect Ratio */
}

.describe {
  position: absolute;
  top: 120px;

  width: 100%;

}
.responsive-iframe {
  position: absolute;
  left: 0;
  bottom: 0;
  right: 0;
  width: 80%;
  height: 80%;
  border: none;
}
@media screen and (min-width: 601px) {

}

@media screen and (max-width: 600px) {
.container h3 {
    font-size:18px;
    }
.topping {
    margin-bottom:-250px;
}
.describe {
  position: absolute;
  top: 10px;

}

.home {
    margin-top: -200px;
    padding-top: 0px;
}
.featured-properties-area {
    margin-top: -120px !important;
    }
}
h5 {
        margin-bottom:  0px !important;
        margin-top:     -20px !important;
}
h6 {
        margin-bottom:  -5px !important;
}
.thumb-space {
    margin-bottom: 15px !important;
}
.social {
    margin-top:  40px;
    margin-left: 15px;
}
.facebook, .whatsapp, .linkedin{
    margin: -20px 10px 10px -5px;
    width: 25px;
    height: 25px;
    display: inline-block;

}

.center, .social {
  display: flex;
  justify-content: center;
  align-items: center;
}
.detail-btn {
  background-color: #947054;
  border: 1px solid #947054;
  color: white;
  margin-top: 10px;
  padding: 6px 25px;
  text-align: center;
  font-size: 16px;
  transition: 0.8s;
  border-radius: 30px;
}

.detail-btn:hover {
  background-color: white;
  color: #947054;
  border: 1px solid #947054;
}
</style>
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
                                            <option> All Cities </option>
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



                                <div class="col-12">
                                    <br>
                                    <div class="row">

                                        <div class="col-12 col-md-6 col-sm-12 col-lg-6 col-xl-6" style="padding-right: 30px; margin-bottom: 20px;">

                                            <div style="width:100%;" id="price-slider"></div>
                                            <label class="mt-2"><small>Price: </small><span id="price-tag"></span></label>
                                            <input name="priceRange" id="price-range" hidden>

                                            {{-- <label><small>Price: </small><span id="price-tag"></span></label> --}}

                                            {{-- <div class="form-group" style="width:100%;">
                                                <input type="range" class="slider" min="0" max="10000000" value="0" step="5000" id="priceRange" name="price">
                                                <label class="mt-1" for="formControlRange"><small>Price: </small><span id="priceText"></span></label>
                                            </div> --}}
                                        </div>

                                        <div class="col-8 col-md-4 col-sm-8 col-lg-4 col-xl-4">
                                            <div style="width:100%;" id="unit-slider"></div>
                                            <label class="mt-2"><small>Size: </small><span id="unit-tag"></span></label>
                                            <input name="unitRange" id="unit-range" hidden>
                                            {{-- <div class="form-group" style="width:100%;">
                                                <input type="range" class="slider" min="0" max="10000" value="0" step="50" id="sizeRange" name="size">
                                                <label class="mt-1" for="formControlRange"><small>Size: </small><span id="sizeText"></span></label>
                                            </div> --}}
                                        </div>
                                        <div class="col-4 col-md-2  col-sm-4 col-lg-2">
                                            <div class="form-group">
                                                <select class="form-control" name="unit">
                                                    <option>sq ft</option>
                                                    <option>m&#178;</option>
                                                </select>
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

    <div style="height:80px; display:none;" id="results"></div>

    <!-- ##### Featured Properties Area Start ##### -->
    <section class="featured-properties-area section-padding-100-50" id="results">
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
                                    <a href="{{ route('property', [app()->getLocale(), $property->property_code]) }}"><img style="width: 100%;" src="{{url('storage/properties/'.$property->property_code.'/thumbnails'.'/'.$property->pictures)}}"></a>

                                    <div class="tag">
                                        <span>For {{$property->purpose}}</span>
                                    </div>
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
                                    <div class="center">
                                        <a href="{{ route('property', [app()->getLocale(), $property->property_code])  }}"><button class="button detail-btn">Details</button></a>
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
                                        <a href="{{ route('property', [app()->getLocale(), $property->property_code]) }}"><img style="width: 100%;" src="{{url('storage/projects/'.$property->property_code.'/thumbnails'.'/'.$property->pictures)}}"></a>
                                </div>

                                <!-- Property Content -->
                                <div class="property-content" style="background-color: white;">
                                    <a href="{{ route('property', [app()->getLocale(), $property->property_code]) }}"><div style="height:54px;"><h5>{{$property->title}}</h5></div></a>
                                    <p class="location thumb-space" style="font-size: 16px;">{{$property->city}}</p>
                                    <h6>Expected Date of Completion</h6>
                                    <p class="thumb-space">2022 Q2</p>

                                    <h6>Price Range</h6>
                                    <p class="thumb-space">Prices from {{$property->currency}} {{ number_format($property->price, 0, '.', ',') }}</p>
                                    <div class="social">
                                        <a id="shareToWP" href="whatsapp://send?text={{ route('property', [app()->getLocale(), $property->property_code]) }}" data-action="share/whatsapp/share"><div class="whatsapp"></div></a>

                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('property', [app()->getLocale(), $property->property_code]) }}" target="_blank"><div class="facebook"></div></a>

                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('property', [app()->getLocale(), $property->property_code]) }}&title=&summary=&source=" target="_blank"><div class="linkedin"></div></a>

                                        {{-- <a href="https://twitter.com/home?status={{ route('property', [app()->getLocale(), $property->property_code]) }}" target="_blank"><i class="fa fa-twitter"></i></a> --}}

                                        {{-- @auth<a href="#"  onclick="likeThis('{{$property->property_id}}')"><i class="fa fa-heart" hidden></i></a>@endauth --}}
                                    </div>
                                    <div class="center">
                                        <a href="{{ route('property', [app()->getLocale(), $property->property_code])  }}"><button class="button detail-btn">Details</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $properties->appends(request()->query())->onEachSide(1)->links() }}
            </div>
        </div>
    </section>

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
            start: [0, 1000000],
            connect: true,
            range: {
                'min': 0,
                'max': 1000000
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

        // // Price range
        // var priceSlider = document.getElementById("priceRange");
        // var priceText = document.getElementById("priceText");
        // if (priceSlider.value == 0) {
        //     priceText.innerHTML = "Any";
        // } else {
        //     priceText.innerHTML = priceSlider.value;
        // }
        //
        // priceSlider.oninput = function() {
        //     if (this.value == 0) {
        //         priceText.innerHTML = "Any";
        //     } else {
        //         priceText.innerHTML = new Intl.NumberFormat().format(this.value);
        //     }
        // }
        //
        // // Size range
        // var sizeSlider = document.getElementById("sizeRange");
        // var sizeText = document.getElementById("sizeText");
        // if (sizeSlider.value == 0) {
        //     sizeText.innerHTML = "Any";
        // } else {
        //     sizeText.innerHTML = sizeSlider.value;
        // }
        //
        // sizeSlider.oninput = function() {
        //     if (this.value == 0) {
        //         sizeText.innerHTML = "Any";
        //     } else {
        //         sizeText.innerHTML = new Intl.NumberFormat().format(this.value);
        //     }
        // }

        function scrollWin() {
            $('#results').css("display", "block");
            var elmnt = document.getElementById("results");
            elmnt.scrollIntoView();
        }

        scrollWin();
    </script>

    <style>

    </style>
@stop
