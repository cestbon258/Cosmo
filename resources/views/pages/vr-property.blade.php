@extends('layouts.master')

@section('title', 'VR Property')

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
@stop

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
                    @foreach ($property->vr_url as $index => $vr)

                        <!-- Single Featured Property -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">

                                <!-- Property Thumbnail -->
                                <div class="embed-responsive embed-responsive-4by3 fadeInUp">
                                    <iframe class="embed-responsive-item" src="{{$vr}}"></iframe>
                                </div>
                                <a href="{{$vr}}" target="_blank">
                                    <button type="button" class="btn float-right">Full Screen</button>
                                </a>
                                <!-- Property Content -->
                                <div class="property-content" style="background-color: white;">
                                    <a href="{{ route('property', [app()->getLocale(), $property->property_code]) }}"><div style="height:64px;"><h5>{{$property->title}}</h5></div></a>
                                    <div></div>
                                    <center>
                                        <a href="{{ route('property', [app()->getLocale(), $property->property_code])  }}">
                                            <button type="button" class="btn south-btn detail-btn">Details</button>
                                        </a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
