@extends('layouts.master')

@section('title', 'Property')

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
@stop

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <style>
        .carousel-indicators img {
            opacity: .6;
        }
        .card-info-text {
            color: #7d7d7d;
        }
    </style>

    <div style="height:180px;"></div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-7">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($property->pictures as $key => $picture)
                            <img data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="active" src="{{url('images/'.$property->house_code.'/thumbnails'.'/'.$picture)}}" style="height:50px; width:100px;">
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($property->pictures as $key => $picture)
                            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                <img class="d-block w-100" src="{{url('images/'.$property->house_code.'/'.$picture)}}" onerror="this.onerror=null;this.src='{{ url('img/icons/default.png') }}';" style="border-radius:4px;">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">{{$property->title}}</h3>
                    <hr>
                    <div><h6 style="color:red;">${{$property->price}}</h6></div>
                    <hr>
                    <br>

                    <h6 class="card-info-text">Facilities</h6>
                    <div class="row">
                        <div class="col-md-2 new-tag">
                            <img src="{{url('img/icons/new.png')}}" alt="">
                        </div>
                        <div class="col-md-auto bathroom">
                            <img src="{{url('img/icons/bathtub.png')}}" alt="">
                            <span>{{$property->bathroom}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 garage">
                            <img src="{{url('img/icons/garage.png')}}" alt="">
                            <span>{{$property->bedroom}}</span>
                        </div>
                        <div class="col-md-auto space">
                            <img src="{{url('img/icons/space.png')}}" alt="">
                            <span>{{$property->size}} {{$property->measurement}}</span>
                        </div>
                    </div>
                    <br>
                    <h6 class="card-info-text">Description</h6>
                    <div>{{$property->description}}</div>
                    <br><br>
                  </div>
                </div>

            </div>
        </div>
    </div>

    <div style="height:140px;"></div>


@stop
