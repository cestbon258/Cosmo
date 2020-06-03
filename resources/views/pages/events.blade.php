@extends('layouts.master')

@section('title', 'About Us')

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
@stop

@section('content')

    <div style="height:70px;"></div>
    <!-- ##### About Us starts here ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url( {{ url('img/bg-img/banner.jpg') }} ); position: relative; height: 35vh; ">

        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 style="position:absolute; bottom:50px; color: white;">Events</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### About Content Wrapper Start ##### -->
    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
            @if (session('status'))
                <div class="alert {{session('alert-class')}} alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp">
                        <h4 style="color:red;">{{$events->event_title}}</h4>
                        <h6>Date and Time: {{$events->event_date}} 6:30-8:30pm</h6>
                        <h6>RSVP</h6>
                    </div>
                    <div class="wow fadeInUp"  data-wow-delay="100ms" style="margin:-70px 20px; font-size: 16px !important;">

                        <div class="contact-form">
                            <form action="{{ route('register_event', app()->getLocale()) }}" method="POST">
                                @csrf
                                <input name="eventID" value="{{$events->id}}" hidden>
                                <input name="eventTitle" value="{{$events->event_title}}" hidden>
                                <input name="eventDate" value="{{$events->event_date}}" hidden>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="contact-name" placeholder="Your Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" name="phone" id="contact-number" placeholder="Your Phone" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="contact-email" placeholder="Your Email" required>
                                </div>
                                <center><button type="submit" class="btn south-btn">Send Message</button></center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div style="height:100px;"></div>
@stop
