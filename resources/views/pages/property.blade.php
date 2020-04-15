@extends('layouts.master')

@section('title', 'Property')

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
        <div class="row">
            <div class="col-md-7 mb-4">

                <div id="sliderIndicators" class="carousel slide" data-ride="carousel">
                    {{-- <ol class="carousel-indicators">
                        @foreach ($property->pictures as $key => $picture)
                            <img data-target="#sliderIndicators" data-slide-to="{{$key}}" class="active" src="{{url('images/'.$property->house_code.'/thumbnails'.'/'.$picture)}}" style="height:50px; width:100px;">
                        @endforeach
                    </ol> --}}
                    <div class="carousel-inner">
                        @foreach ($property->pictures as $key => $picture)
                            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                <img class="d-block w-100" id="property-images" src="{{url('images/'.$property->house_code.'/'.$picture)}}" onerror="this.onerror=null;this.src='{{ url('img/icons/default.png') }}';" style="border-radius:4px;">
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
                                    <img data-target="#sliderIndicators" data-slide-to="{{$key}}" class="{{$key==0 ? 'active' : ''}} px-1" src="{{url('images/'.$property->house_code.'/thumbnails'.'/'.$picture)}}" style="height:60px; width:100px; border-radius:6px;">
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
                    <h5 class="card-title">{{$property->title}}</h5>
                    <hr>
                    <div><h6 style="color:red;">${{$property->price}}</h6></div>
                    <hr>
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
                    <br>
                  </div>
                </div>

            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Description</h5>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">
                    <div>{!!html_entity_decode($property->description)!!}</div>
                </p>
            </div>
        </div>
    </div>

    <div style="height:140px;"></div>

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
    </style>


@stop
