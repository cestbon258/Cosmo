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

    <div style="height:40px;"></div>



    <div style="height:80px; display:none;" id="results"></div>

    <!-- ##### Featured Properties Area Start ##### -->
    <section class="featured-properties-area section-padding-100-50" id="results">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp">
                        <h2>VR Properties</h2>
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
