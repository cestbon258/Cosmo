@extends('layouts.master')

@section('title', 'Property')

@section('sharing')
    @parent
    <!-- Starts social media tag -->
    @if ($property->project_type == 1)
        <meta property="og:title" content="COSMO Real Estate Limited - {{$property->title}} / {{$property->address}}">
        <meta property="og:description" content="{{$property->shortDesc}}...">
        <meta name="image" property="og:image" content="{{url('storage/properties/'.$property->property_code.'/thumbnails'.'/'.$property->pictures[0])}}">

        <meta property="og:url" content="{{ route('property', [app()->getLocale(), $property->property_code]) }}">
        <meta name="twitter:title" content="COSMO Real Estate Limited - {{$property->title}} / {{$property->address}}">
        <meta name="twitter:description" content="{{$property->shortDesc}}...">
        <meta name="twitter:image" content="{{url('storage/properties/'.$property->property_code.'/thumbnails'.'/'.$property->pictures[0])}}">
        <meta name="twitter:card" content="{{$property->pictures[0]}}">
    @else
        <meta property="og:title" content="COSMO Real Estate Limited - {{$property->title}} / {{$property->address}}">
        <meta property="og:description" content="{{$property->shortDesc}}...">
        <meta name="image" property="og:image" content="{{url('storage/projects/'.$property->property_code.'/thumbnails'.'/'.$property->pictures[0])}}">

        <meta property="og:url" content="{{ route('property', [app()->getLocale(), $property->property_code]) }}">
        <meta name="twitter:title" content="COSMO Real Estate Limited - {{$property->title}} / {{$property->address}}">
        <meta name="twitter:description" content="{{$property->shortDesc}}...">
        <meta name="twitter:image" content="{{url('storage/projects/'.$property->property_code.'/thumbnails'.'/'.$property->pictures[0])}}">
        <meta name="twitter:card" content="{{$property->pictures[0]}}">
    @endif
    <!-- End social media tag -->
@endsection

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
@stop



@section('content')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}

    <style>
        .carousel-indicators img {
            opacity: .6;
        }
        .card-info-text {
            color: #7d7d7d;
        }
    </style>

    <div style="height:120px;"></div>


    <div class="container-fluid">
        @guest
            <div class="alert alert-info" role="alert">
                Please <a href="#" class="alert-link"><a href="{{ route('login', app()->getLocale()) }}">@lang('master.login')</a></a> to know more details about this property!
            </div>
        @endguest
        {{-- project_type equal to 1 is not Project --}}
        @if ($property->project_type == 1)
            <div class="row">
                <div class="col-md-7 mb-4">
                    <div id="sliderIndicators" class="carousel slide" data-ride="carousel">
                        {{-- <ol class="carousel-indicators">
                            @foreach ($property->pictures as $key => $picture)
                                <img data-target="#sliderIndicators" data-slide-to="{{$key}}" class="active" src="{{url('images/'.$property->property_code.'/thumbnails'.'/'.$picture)}}" style="height:50px; width:100px;">
                            @endforeach
                        </ol> --}}
                        <div class="carousel-inner">
                            @foreach ($property->pictures as $key => $picture)
                                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                    <img class="d-block w-100" id="property-images" src="{{url('storage/properties/'.$property->property_code.'/'.$picture)}}" onerror="this.onerror=null;this.src='{{ url('img/icons/default.png') }}';" style="border-radius:4px;">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#sliderIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#sliderIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        {{-- <center> --}}
                            <div style="width:100%;">
                            <center>
                                <ol class="carousel-indicators" style="position: relative; bottom:-4px; overflow-x:auto; margin-left:0; margin-right:0; justify-content: unset !important;">
                                    @foreach ($property->pictures as $key => $picture)
                                        <img data-target="#sliderIndicators" data-slide-to="{{$key}}" class="{{$key==0 ? 'active' : ''}} px-1" src="{{url('storage/properties/'.$property->property_code.'/thumbnails'.'/'.$picture)}}" style="height:60px; width:100px; border-radius:6px;">
                                    @endforeach
                                </ol>
                            </center>
                            </div>
                        {{-- </center> --}}
                    </div>

                </div>
                <div class="col-md-5 mb-4">
                    <div class="card" style="height: 100%;">
                        <div class="card-body">

                            @if($property->vr_url)
                                <div class="float-right">
                                    <a href="{{$property->vr_url}}" target="_blank"><span style="font-size:16px;"><mark><i>VR</i></mark></span></a>
                                </div>
                            @endif

                            <h5 class="card-title">{{$property->title}}</h5>
                            <hr>
                            @auth
                            <div><h6 style="color:red;">{{$property->currency}} {{ number_format($property->price, 0, '.', ',') }}</h6></div>
                            <hr>
                            @endauth
                            <br>

                            <h6 class="card-info-text">Facilities</h6>
                            <div class="row">
                                <div class="col-6 new-tag">
                                    <img src="{{url('img/icons/new.png')}}" alt="">
                                </div>
                                <div class="col-6 bathroom">
                                    <img src="{{url('img/icons/bathtub.png')}}" alt="">
                                    <span>{{$property->bathroom}}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 garage">
                                    <img src="{{url('img/icons/garage.png')}}" alt="">
                                    <span>{{$property->bedroom}}</span>
                                </div>
                                <div class="col-6 space">
                                    <img src="{{url('img/icons/space.png')}}" alt="">
                                    <span>{{$property->size}} {{$property->measurement}}</span>
                                </div>
                            </div>
                            @if ( !empty($property->facilities) )
                                <hr>
                                @foreach ($property->facilities as $key => $facility)
                                    <div>{{$facility}}</div>
                                @endforeach
                            @endif
                            <br>
                            @auth
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <button class="requestMore request-more-btn" style="border-radius:6px;" data-toggle="tooltip" data-placement="right" title="Click to get more info, we will contact your soon!">Request Info <i class="loader fa fa-spinner fa-pulse"></i></button>
                                    </div>
                                    <div class="col-6 col-md-6"></div>
                                </div>
                            @endauth

                        </div>

                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-7 mb-4">
                    <div id="sliderIndicators" class="carousel slide" data-ride="carousel">
                        {{-- <ol class="carousel-indicators">
                            @foreach ($property->pictures as $key => $picture)
                                <img data-target="#sliderIndicators" data-slide-to="{{$key}}" class="active" src="{{url('images/'.$property->property_code.'/thumbnails'.'/'.$picture)}}" style="height:50px; width:100px;">
                            @endforeach
                        </ol> --}}
                        <div class="carousel-inner">
                            @foreach ($property->pictures as $key => $picture)
                                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                    <img class="d-block w-100" id="property-images" src="{{url('storage/projects/'.$property->property_code.'/'.$picture)}}" onerror="this.onerror=null;this.src='{{ url('img/icons/default.png') }}';" style="border-radius:4px;">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#sliderIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#sliderIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        {{-- <center> --}}
                            <div style="width:100%;">
                            <center>
                                <ol class="carousel-indicators" style="position: relative; bottom:-4px; overflow-x:auto; margin-left:0; margin-right:0; justify-content: unset !important;">
                                    @foreach ($property->pictures as $key => $picture)
                                        <img data-target="#sliderIndicators" data-slide-to="{{$key}}" class="{{$key==0 ? 'active' : ''}} px-1" src="{{url('storage/projects/'.$property->property_code.'/thumbnails'.'/'.$picture)}}" style="height:60px; width:100px; border-radius:6px;">
                                    @endforeach
                                </ol>
                            </center>
                            </div>
                        {{-- </center> --}}
                    </div>

                </div>
                <div class="col-md-5 mb-4">
                    <div class="card" style="height: 100%;">
                        <div class="card-body">

                            @if($property->vr_url)
                                <div class="float-right">
                                    <a href="{{$property->vr_url}}" target="_blank"><span style="font-size:16px;"><mark><i>VR</i></mark></span></a>
                                </div>
                            @endif

                            <h5 class="card-title">{{$property->title}}</h5>
                            <hr>
                            <br>

                            <h6 class="card-info-text">Features</h6>
                            <div><p>{!!html_entity_decode($property->features)!!}</p></div>
                            @if ( !empty($property->facilities) )
                                <hr>
                                @foreach ($property->facilities as $key => $facility)
                                    <div>{{$facility}}</div>
                                @endforeach
                            @endif
                            <br>
                            @auth
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <button class="requestMore request-more-btn" style="border-radius:6px;" data-toggle="tooltip" data-placement="right" title="Click to get more info, we will contact your soon!">Request Info <i class="loader fa fa-spinner fa-pulse"></i></button>
                                </div>
                                <div class="col-6 col-md-6"></div>
                            </div>
                            @endauth
                        </div>
                    </div>

                </div>
            </div>
        @endif

        @auth
        @if ( !empty($property->videos) )
            <div class="card mt-3">
                <h5 class="card-header">Videos</h5>
                <div class="card-body">
                    @foreach ($property->videos as $key => $video)
                        <video controls muted poster={{url('logo/logo.png')}}>
                            @if ($property->project_type == 1)
                                <source src="{{ URL::asset('storage/properties/'.$property->property_code.'/videos'.'/'.$video) }}">
                            @else
                                <source src="{{ URL::asset('storage/projects/'.$property->property_code.'/videos'.'/'.$video) }}">
                            @endif
                            Your browser does not support HTML5 video.
                        </video>
                        <br><br>
                    @endforeach
                </div>
            </div>
            <br>
        @endif
        @endauth

        @if ( !empty($property->description) )
            <div class="card mt-3">
                <h5 class="card-header">Description</h5>
                <div class="card-body">
                    <p class="card-text">
                        <div>{!!html_entity_decode($property->description)!!}</div>
                    </p>
                </div>
            </div>
            <br>
        @endif

        @if (Auth::user()->role == 0 || Auth::user()->role == 2 || Auth::user()->role == 3)
            @if ( !empty($property->price_list) )
                <div class="card mt-3">
                    <h5 class="card-header">Price List</h5>
                    <div class="card-body">
                        <p class="card-text">
                            <div>{!!html_entity_decode($property->price_list)!!}</div>
                        </p>
                    </div>
                </div>
                <br>
            @endif
        @endif

        @auth
        @if ( !empty($property->files) )
            <div class="card mt-3">
                <h5 class="card-header">Brochure</h5>
                <div class="card-body">
                    @foreach ($property->files as $key => $file)

                        <div class="scroll-wrapper">
                            @if ($property->project_type == 1)
                                <iframe src="{{ url('storage/properties/'.$property->property_code.'/pdf'.'/'.$file) }}#view=FitH">
                                </iframe>
                                <div class="float-right"><a href="{{ URL::asset('storage/properties/'.$property->property_code.'/pdf'.'/'.$file) }}" target="_blank">Download PDF</a></div><br>

                            @else
                                <iframe src="{{ url('storage/projects/'.$property->property_code.'/pdf'.'/'.$file) }}#view=FitH">
                                </iframe>
                                <div class="float-right"><a href="{{ URL::asset('storage/projects/'.$property->property_code.'/pdf'.'/'.$file) }}" target="_blank">Download PDF</a></div><br>
                            @endif
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
            <br>
        @endif
        @endauth


    </div>

    <div style="height:140px;"></div>

    <script type="text/javascript">

        $('.loader').css("display", "none");
        $(".requestMore").click(function(e){
            e.preventDefault();
            $('.loader').css("display", "inline-block");


            $.ajax({
                type:'POST',
                // dataType: 'JSON',
                // url:'https://postb.in/1588855925699-7338490695692',
                url:'{{ route('like_this', app()->getLocale())}}',
                data:{
                   _token:'{{csrf_token()}}',
                   propertyURL: window.location.href,
                   propertyID: "{{$property->property_id}}"
                },
                success:function(data){
                    $('.loader').css("display", "none");
                }
            });
    	});
    </script>

    <style>

        ul,
        ol {
            margin: 12px !important;
            li {
                list-style: inside !important;
            }
        }

        ul li, ol li {
            margin: 12px !important;
            list-style: inside !important;
        }

        .footer-widget-area ul, ol {
            margin: 0 !important;
            li {
                list-style: none !important;
            }
        }
        .footer-widget-area ul li, ol li {
            margin: 0 !important;
            list-style: none !important;
        }
        .scroll-wrapper {
          -webkit-overflow-scrolling: touch;
          overflow-y: scroll;
          /* important:  dimensions or positioning here! */
        }
        .scroll-wrapper iframe {
            border: 0;
            width: 100%;
            height: 500px;
        }


        .request-more-btn.active, .request-more-btn:hover, .request-more-btn:focus {
            color: #ffffff;
            background-color: #000000;
        }

        .request-more-btn {
            border: 0px;
            color: #ffffff;
            font-size: 14px;
            padding: 14px;
            background-color: #947054;
            border-radius: 0;
            text-transform: uppercase;
        }
    </style>


@stop
