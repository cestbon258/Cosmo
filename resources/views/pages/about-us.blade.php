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
                        <h3 style="position:absolute; bottom:50px; color: white;">About us</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### About Content Wrapper Start ##### -->
    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp">
                        <h2>OUR STORY</h2>
                    </div>
                    <div class="wow fadeInUp"  data-wow-delay="100ms" style="margin:-70px 20px; font-size: 16px !important;">

                        Founded by three alumni of the University of Southern California (USC), COSMO started with the goal of lowering the barrier of overhead through real estate agents. Unlike other platforms in the market, COSMO is a quality network that connects vendors or landlords to qualified buyers and tenants safely and securely, for their ideal choices of properties.
                        <br><br>
                        The COSMO team has been extensively involved in the international real estate business for over 15 years. Each of us feels much pride in being able to carry forth the USC Trojan quest for a better world for all. Responding to the increasing pressures of globalisation and the current economic environment, the three partners have taken this opportunity to create a distinctive prop-tech platform that brings quality vendors and landlords from offline to online, while offering a unique channel for buyers to identify dream houses and interesting investment properties.

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Content Wrapper End ##### -->
        <!-- ##### Why Cosmo Start ##### -->
    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp">
                        <h2>Why COSMO?</h2>
                    </div>
                    <div class="wow fadeInUp"  data-wow-delay="100ms" style="margin:-70px 20px; font-size: 16px !important;">

                        Leasing a property requires a lot of work and a high commitment, which many property owners don’t have the time to handle especially when the property is located overseas. COSMO works with top-class property managers and estate agents around the world. Our partners will handle all the leasing paperwork for you, making your life much easier. COSMO is also committed to finding the best agent for your rental property, we will make sure that we find you the right person specializes in property management and works hard to ensure you a sound investment.
                        <br><br><br><br><br>
                        Our core values are: Commitment, Integrity, Quality, Partnership, and Innovation.

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Why Cosmo End ##### -->
    <!-- Core Values -->
    <section class="featured-properties-area section-padding-100-50">
        <div class="container" style="margin-bottom: -200px;">
            <div class="row">
                <div class="col-md-10 col-sm-12" style=" margin: auto;">
                    <div class="section-heading wow fadeInUp">
                        <img src="{{ url('img/core-img/core-value.jpg') }}"alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Core Values -->
    <section class="meet-the-team-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading" style="margin-bottom: 30px;">
                        <h2>Meet The Team</h2>
                    </div>
                </div>
            </div>

            <!-- ##### Meet The Team Area Start ##### -->
            <div class="row justify-content-center">
                <!-- Single Team Member -->
                <div class="col-md-12 col-sm-4 col-lg-4">
                    <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <!-- Team Member Thumb -->
                        <div class="team-member-thumb">
                            <img src="{{ url('img/core-img/ceo.jpg') }}" alt="">
                        </div>
                        <!-- Team Member Info -->
                        <div class="team-member-info">
                            <div class="section-heading">
                                <h2>Vivian Chan</h2>
                                <p style="margin-bottom: -30px;">CEO</p>
                            </div>
                            <h6><img src="{{ url('img/icons/envelope.png') }}" alt=""> vivian@icosmo.co</h6>
                            <br>
                            <span class="trigger" data-modal-trigger="trigger-1"><i class="fa fa-fire" aria-hidden="true"></i>Read More ...</span>
                        </div>
                    </div>
                </div>
                <div class="modal" data-modal="trigger-1">
                    <article class="content-wrapper">
                        <button class="close"></button>
                        <header class="modal-header">
                            <div class="founder-img"><img src="{{ url('img/core-img/ceo.jpg') }}" alt=""></div>
                            <div class="founder-bio">
                                <h2>Vivian Chan</h2>
                                <p>CEO and Co-Founder</p>
                                <h6>vivian@icosmo.co</h6>
                            </div>
                        </header>
                        <div class="content">
                            <span>
                                <p>Vivian Chan is the CEO and Co-Founder of COSMO Real Estate Limited. Prior to founding COSMO, Vivian has been a serial entrepreneur, a seasoned investor, and a world traveller for over 15 years. Her professional expertise in global investments and real assets, coupled with her passion for technology, has led to the creation of COSMO – a technology-powered platform that provides property investment services and one-stop access to global properties.</p>
                                <p>Outside of COSMO, Vivian serves as the advisor of International Innovative Parks Alliance Association, and is also advisor to multiple local and regional start-ups.  Vivian holds a Bachelor of Science degree in Finance from the University of Southern California, Master’s degree from Monash University and has completed the Senior Executive Leadership Program at Stanford University.</p>
                            </span>
                        </div>
                    </article>
                </div>
                <!-- End Single Team Member -->


                <!-- Single Team Member -->
                <div class="col-md-12 col-sm-4 col-lg-4">
                    <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <!-- Team Member Thumb -->
                        <div class="team-member-thumb">
                            <img src="{{ url('img/core-img/coo.jpg') }}" alt="">
                        </div>
                        <!-- Team Member Info -->
                        <div class="team-member-info">
                            <div class="section-heading">
                                <h2>Garrick Tang</h2>
                                <p style="margin-bottom: -30px;">COO</p>
                            </div>
                            <h6><img src="{{ url('img/icons/envelope.png') }}" alt=""> garrick@icosmo.co</h6>
                            <br>
                            <span class="trigger" data-modal-trigger="trigger-2"><i class="fa fa-fire" aria-hidden="true"></i>Read More ...</span>
                        </div>
                    </div>
                </div>
                <div class="modal" data-modal="trigger-2">
                    <article class="content-wrapper">
                        <button class="close"></button>
                        <header class="modal-header">
                            <div class="founder-img"><img src="{{ url('img/core-img/coo.jpg') }}" alt=""></div>
                            <div class="founder-bio">
                                <h2>Garrick Tang</h2>
                                <p>COO and Co-Founder</p>
                                <h6>garrick@icosmo.co</h6>
                            </div>
                        </header>
                        <div class="content">
                            <span>
                                <p>Garrick Tang is the COO and Co-Founder of COSMO Real Estate Limited. Prior to founding COSMO, Garrick spent over 12 years in sales and marketing working for Hong Kong, China and other international property developers. He has extensive experience in the acquisition, development and sale of commercial, residential and industrial properties, including real estate transactions in Australia, China, the United Kingdom and the USA. In addition, he has represented landlords on both leasing and management issues for office buildings, mixed-use developments and shopping centers.
                                </p>

                                <p>
                                    Garrick has been Chairman of the USC Alumni Association (Hong Kong) and the founder of Hong Kong Real Estate Management Bulletin. He has been a member of the Hong Kong Institute of Real Estate Administrators (HIREA) and Hong Kong Institute of Directors (HKIoD). He was recently on the Board of Directors of the USC Asian Pacific Alumni Association (USCAPAA). Garrick holds a Bachelor of Science in Finance from the University of Southern California (USC). He attended the University College of Estate Management (UCEM) earning a Master Degree in Real Estate.
                                </p>
                            </span>
                        </div>
                    </article>
                </div>


                <!-- Single Team Member -->
                <div class="col-md-12 col-sm-4 col-lg-4">
                    <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <!-- Team Member Thumb -->
                        <div class="team-member-thumb">
                            <img src="{{ url('img/core-img/cto.jpg')}}" alt="">
                        </div>
                        <!-- Team Member Info -->
                        <div class="team-member-info">
                            <div class="section-heading">
                                <h2>Stephen Poon</h2>
                                <p style="margin-bottom: -30px;">CTO</p>
                            </div>

                            <h6><img src="{{ url('img/icons/envelope.png') }}" alt=""> stephen@icosmo.co</h6>
                            <br>
                            <span class="trigger" data-modal-trigger="trigger-3"><i class="fa fa-fire" aria-hidden="true"></i>Read More ...</span>

                        </div>
                    </div>
                </div>
                <div class="modal" data-modal="trigger-3">
                    <article class="content-wrapper">
                        <button class="close"></button>
                        <header class="modal-header">
                            <div class="founder-img"><img src="{{ url('img/core-img/cto.jpg')}}" alt=""></div>
                            <div class="founder-bio">
                                <h2>Stephen Poon</h2>
                                <p>CTO and Co-Founder</p>
                                <h6>stephen@icosmo.co</h6>
                            </div>
                        </header>
                        <div class="content">
                            <span>
                                <p>Stephen Poon is the CTO and Co-Founder of COSMO Real Estate Limited. Prior to founding COSMO, Stephen has tremendous professional experience as a business analyst, IT project manager in various industries. His valuable experience in real estate and loan industry has prepared him a quality professional in collaboration of both technology and business.</p>
                                <p>
                                    Currently, Stephen serves as a lecturer for Information Technology of Business program for Coventry University (City University of Hong Kong Campus). Stephen holds a dual master degree in Electrical Engineer from University of Southern California (USC) and Information System of Business from Eastern Michigan University.</p>
                                </span>
                            </div>
                        </article>
                    </div>
                    <!-- End Single Team Member -->
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Meet The Team Area End ##### -->

    <style>
        span > p {
            font-size: 14px;
            color: black;
            font-weight: normal;
        }

        .trigger {
          margin: 0 0.75rem;
          padding: 0.625rem 1.25rem;
          /*border: none;
          border-radius: 0.25rem;
          box-shadow: 0 0.0625rem 0.1875rem rgba(0, 0, 0, 0.12), 0 0.0625rem 0.125rem rgba(0, 0, 0, 0.24);
          transition: all 0.25s cubic-bezier(0.25, 0.8, 0.25, 1);*/
          font-size: 0.875rem;
          font-weight: 300;
          -webkit-transition: font-size .5s ease;
          -moz-transition: font-size .5s ease;
          -o-transition: font-size .5s ease;
          transition: font-size .5s ease;
        }
        .trigger i {
          margin-right: 0.3125rem;

        }
        .trigger:hover {
          box-shadow: 0 0.875rem 1.75rem rgba(0, 0, 0, 0.25), 0 0.625rem 0.625rem rgba(0, 0, 0, 0.22);
          font-size: 1em;
        }

        .modal {
          position: fixed;
          top: 0;
          left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          height: 0vh;
          background-color: transparent;
          /*overflow: hidden;*/
          transition: background-color 0.25s ease;
          z-index: 9999;
        }
        .modal.open {
        /*position: fixed;*/
          width: 100%;
          height: 100vh;
          background-color: rgba(0, 0, 0, 0.5);
          transition: background-color 0.25s;
          overflow-y: scroll;
        }
        .modal.open > .content-wrapper {
          transform: scale(1);

        }
        .modal .content-wrapper {
          position: relative;
          display: flex;
          flex-direction: column;
          align-items: center;
          /*justify-content: flex-start;*/
          width: 70%;
          margin: 0;
          padding: 2.5rem;
          background-color: white;
          border-radius: 0.3125rem;
          box-shadow: 0 0 2.5rem rgba(0, 0, 0, 0.5);
          transform: scale(0);
          transition: transform 1.5s;
          /*transition-delay: 0.2s;*/
        }
        .modal .content-wrapper .close {
          position: absolute;
          top: 0.5rem;
          right: 0.5rem;
          display: flex;
          align-items: center;
          /*justify-content: center;*/
          width: 2.5rem;
          height: 2.5rem;
          border: none;
          background-color: transparent;
          font-size: 1.5rem;
          transition: 0.5s linear;
        }
        .modal .content-wrapper .close:before, .modal .content-wrapper .close:after {
          position: absolute;
          content: '';
          width: 1.25rem;
          height: 0.125rem;
          background-color: black;
        }
        .modal .content-wrapper .close:before {
          transform: rotate(-45deg);
        }
        .modal .content-wrapper .close:after {
          transform: rotate(45deg);
        }
        .modal .content-wrapper .close:hover {
          transform: rotate(360deg);
        }
        .modal .content-wrapper .close:hover:before, .modal .content-wrapper .close:hover:after {
          background-color: tomato;
        }
        .modal .content-wrapper .modal-header {
          position: relative;
          /*display: flex;
          flex-direction: row;
          align-items: center;
          justify-content: space-between;*/
          width: 100%;
          margin: 0;
          padding: 0 0 1.25rem;
        }
        .modal .content-wrapper .modal-header h2 {
          font-size: 1.5rem;
          font-weight: bold;
        }
        .modal .content-wrapper .content {
          position: relative;
          display: flex;
        }
        .modal .content-wrapper .content p {
          font-size: 0.875rem;
          line-height: 1.75;
        }
        .modal .content-wrapper .modal-footer {
          position: relative;
          /*display: flex;*/
          align-items: center;
          /*justify-content: flex-end;*/
          width: 100%;
          margin: 0;
          padding: 1.875rem 0 0;
        }
        .modal .content-wrapper .modal-footer .action {
          position: relative;
          margin-left: 0.625rem;
          padding: 0.625rem 1.25rem;
          border: none;
          background-color: slategray;
          border-radius: 0.25rem;
          color: white;
          font-size: 0.87rem;
          font-weight: 300;
          overflow: hidden;
          z-index: 1;
        }
        .modal .content-wrapper .modal-footer .action:before {
          position: absolute;
          content: '';
          top: 0;
          left: 0;
          width: 0%;
          height: 100%;
          background-color: rgba(255, 255, 255, 0.2);
          transition: width 0.25s;
          z-index: 0;
        }
        .modal .content-wrapper .modal-footer .action:first-child {
          background-color: #2ecc71;
        }
        .modal .content-wrapper .modal-footer .action:last-child {
          background-color: #e74c3c;
        }
        .modal .content-wrapper .modal-footer .action:hover:before {
          width: 100%;
        }

        .founder-img {
            width: 30%;
        }

        .founder-bio {
            width:70%;
            margin: 10px;
        }

        @media only screen and (max-width: 540px) {
            span {
                font-size: 12px;
            }
            .modal .content-wrapper {
              width: 90%;
              margin-top: 30%;
            }
            .founder-img {
                width: 100%;
            }

            .founder-bio {
                width:100%;
                margin: 10px;
            }
        }
    </style>
    <script>

        const buttons = document.querySelectorAll('.trigger[data-modal-trigger]');

        for(let button of buttons) {
            modalEvent(button);
        }

        function modalEvent(button) {
            button.addEventListener('click', () => {
                const trigger = button.getAttribute('data-modal-trigger');
                const modal = document.querySelector(`[data-modal=${trigger}]`);
                const contentWrapper = modal.querySelector('.content-wrapper');
                const close = modal.querySelector('.close');

                close.addEventListener('click', () => modal.classList.remove('open'));
                modal.addEventListener('click', () => modal.classList.remove('open'));
                contentWrapper.addEventListener('click', (e) => e.stopPropagation());

                modal.classList.toggle('open');
            });
        }
    </script>
@stop
