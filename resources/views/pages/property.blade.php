@extends('layouts.master')

@section('title', 'Property')

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
@stop

@section('content')
    <link rel="stylesheet"  href="{{asset('css/lightslider.css')}}"/>
    <style>
    ul{
        list-style: none outside none;
        padding-left: 0;
        margin: 0;
    }
    .slide .item{
        margin-bottom: 60px;
    }
    .content-slider li{
        background-color: #ed3020;
        text-align: center;
        color: #FFF;
    }
    .content-slider h3 {
        margin: 0;
        padding: 70px 0;
    }
    .slide{
        width: 800px;
    }
    </style>
    <script src="{{asset("js/lightslider.js")}}"></script>
    <script>
        $(document).ready(function() {
            $("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:3,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        });
    </script>

    <div style="height:90px;"></div>
    <section class="about-content-wrapper section-padding-100">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="slide">
                        <div class="item">
                            <div class="clearfix" style="max-width:474px;">
                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">

                                    @foreach ($property->pictures as $key => $value)
                                        <li data-thumb="{{url('images/'.$property->house_code.'/'.$value)}}">
                                            <img src="{{url('images/'.$property->house_code.'/'.$value)}}" />
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-6">
                    <div><h5>{{$property->title}}</h5></div>
                    <div><h6 style="color:red;">${{$property->price}}</h6></div>
                    <br>
                    <div class="property-meta-data d-flex align-items-end justify-content-between">
                                    <div class="new-tag">
                                        <img src="{{url('img/icons/new.png')}}" alt="">
                                    </div>
                                    <div class="bathroom">
                                        <img src="{{url('img/icons/bathtub.png')}}" alt="">
                                        <span>{{$property->bathroom}}</span>
                                    </div>
                                    <div class="garage">
                                        <img src="{{url('img/icons/garage.png')}}" alt="">
                                        <span>{{$property->bedroom}}</span>
                                    </div>
                                    <div class="space">
                                        <img src="{{url('img/icons/space.png')}}" alt="">
                                        <span>{{$property->size}} {{$property->measurement}}</span>
                                    </div>
                                </div>
                    <br>
                    <p>{{$property->description}}</p>
                </div>
            </div>
        </div>
    </section>
    <div style="height:500px;"></div>


@stop
