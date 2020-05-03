@extends('layouts.master')

@section('title', 'Terms')

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
@stop

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
       {{-- <section class="breadcumb-area bg-img" style="background-image: url({{ url('img/bg-img/hero1.jpg') }});">
           <div class="container h-100">
               <div class="row h-100 align-items-center">
                   <div class="col-12">
                       <div class="breadcumb-content">
                           <h3 class="breadcumb-title">Contact</h3>
                       </div>
                   </div>
               </div>
           </div>
       </section> --}}
       <!-- ##### Breadcumb Area End ##### -->
       <div style="height:60px;"></div>

        <section class="south-contact-area section-padding-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div  class="section-heading text-left" style=" margin-bottom: 20px;">
                            <h3>Terms and Conditions</h3>
                        </div>
                        <p class="terms"><strong>Cosmo Real Estate Limited (CREL)</strong> operates a property listing platform located at <strong>www.icomso.co</strong> (accessible via desktop, mobile and tablet.) Our portal icosmo.co is a passive conduit for the distribution of information about property advertised for sale by sellers and communications between sellers and other users.

                        <p class="terms">By registering or signing up as an <strong>icosmo.co</strong> member, accessing or using the icosmo.co in any manner, you agree to be bound by <strong>CREL’s</strong> terms and conditions which can be accessed from the website mentioned above.

                        <p class="terms"><strong>CREL</strong> does not represent, guarantee or warrant that the content, information or material contained on icosmo.co are correct, accurate, complete, current or free from errors or omissions. Information on the icosmo.co should not be regarded as professional, legal, financial or real estate advice nor a substitute for such advice. Any statement or content made available by third parties, including but not limited to sellers on icosmo.co, are those of the respective author or provider. Third party content does not represent the views of <strong>CREL</strong>.

                        <p class="terms">All content, material, information or postings found on or accessed through icosmo.co, are provided on an “AS IS” basis, with no guarantee of completeness, reliability, accuracy, timeliness and without warranty of any kind, express or implied, including, but not limited to warranties of performance, non-infringement of third party rights title, merchantability, satisfactory quality, fitness for a particular purpose and freedom from computer virus.

                        <p class="terms">Under no circumstances will <strong>CREL</strong>, or related partnerships or corporations, or the directors, or employees thereof be liable for any direct, indirect, incidental, special or consequential damages or any loss that result from the use of, or the inability to use, any content, information, material or related service on <strong>icosmo.co</strong>.</p>

                        <br>
                        <h4>Copyright</h4>
                        <p class="terms">All content, information, materials and services provided on the icosmo.co are: owned, controlled and/or licensed by <STRONG>CREL</STRONG> and/or its directors and related companies and protected by copyright, trademark, and other applicable intellectual property and proprietary rights laws.</p>
                        <p class="terms mb-0" >All users are prohibited from using:</p>

                        <ul class="point">
                        <li>any content, information, material, trade-marks, logos, or any other intellectual property/ rights provided on icosmo.co without the written consent of <STRONG>CREL</STRONG> or such third party that owns the intellectual property/ rights; or</li>
                        <li>other names, including, but not limited to, those identifying <STRONG>CREL</STRONG> and/or its directors and related companies or their respective products and services without the written consent of <STRONG>CREL</STRONG> or its directors or related companies.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>



        <style>
            .terms {
                font-family: arial, helvetica, sans-serif !important;
                font-size: 14px;
                font-weight: normal;
                color: black;
            }
            /* @media screen and (max-width: 600px) {
                .terms{
                    font-size:12px;
                }
            } */
            .point li {
               list-style-type: disc !important;
               margin-left: 35px;
               font-size: 14px;
               color: black;
               font-family: arial, helvetica, sans-serif !important;
            }
            li {
               line-height: 1.8em
            }
        </style>



@stop
