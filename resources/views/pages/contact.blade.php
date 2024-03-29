@extends('layouts.master')

@section('title', 'Contact Us')

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
@stop

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
       <section class="breadcumb-area bg-img" style="background-image: url({{ url('img/bg-img/hero1.jpg') }});">
           <div class="container h-100">
               <div class="row h-100 align-items-center">
                   <div class="col-12">
                       <div class="breadcumb-content">
                        <h3 style="position:absolute; bottom:10px; left: 150px; color: white;">Contact Us</h3>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- ##### Breadcumb Area End ##### -->

       <section class="south-contact-area section-padding-100">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="contact-heading">
                           <h6>Contact info</h6>
                       </div>
                   </div>
               </div>

               @if (session('status'))
                   <div class="alert {{session('alert-class')}} alert-dismissible fade show" role="alert">
                       {{ session('status') }}
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
               @endif

               <div class="row">
                   <div class="col-12 col-lg-4">
                       <div class="content-sidebar">
                           <!-- Office Hours -->
                           {{-- <div class="weekly-office-hours">
                               <ul>
                                   <li class="d-flex align-items-center justify-content-between"><span>Monday - Friday</span> <span>09 AM - 19 PM</span></li>
                                   <li class="d-flex align-items-center justify-content-between"><span>Saturday</span> <span>09 AM - 14 PM</span></li>
                                   <li class="d-flex align-items-center justify-content-between"><span>Sunday</span> <span>Closed</span></li>
                               </ul>
                           </div> --}}
                           <!-- Address -->
                           <div class="address mt-30">
                               {{-- <h6><img src="img/icons/phone-call.png" alt=""> +45 677 8993000 223</h6> --}}
                               <h6><img src="{{ url('img/icons/envelope.png') }}" alt=""> cs@icosmo.co</h6>
                               {{-- <h6><img src="img/icons/location.png" alt=""> Main Str. no 45-46, b3, 56832,<br>Los Angeles, CA</h6> --}}
                           </div>
                       </div>
                   </div>

                   <!-- Contact Form Area -->
                   <div class="col-12 col-lg-8">
                       <div class="contact-form">
                           <form action="{{ route('contact', app()->getLocale()) }}" method="POST">
                               @csrf
                               <div class="form-group">
                                   <input type="text" class="form-control" name="name" id="contact-name" placeholder="Your Name" required>
                               </div>
                               <div class="form-group">
                                   <input type="tel" class="form-control" name="phone" id="contact-number" placeholder="Your Phone">
                               </div>
                               <div class="form-group">
                                   <input type="email" class="form-control" name="email" id="contact-email" placeholder="Your Email" required>
                               </div>
                               <div class="form-group">
                                   <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
                               </div>
                               <button type="submit" class="btn south-btn">Send Message</button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </section>


@stop
