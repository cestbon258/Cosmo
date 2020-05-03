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
                            <h3>Disclaimer & Limitation of Liability</h3>
                        </div>
                        <p class="terms"><STRONG>CREL</STRONG> does not represent, guarantee or warrant that the content, information or material contained on the icosmo.co are correct, accurate, complete, current or free from errors or omissions. <STRONG>CREL</STRONG> accepts content from users in good faith.</p>

                        <p class="terms"><STRONG>CREL</STRONG> services and the content contained on the icosmo.co are provided for informational purposes only and are not intended to meet any particular user’s need. Documents provided on the icosmo.co are provided as a service only, and do not constitute official versions of such documents.</p>

                        <p class="terms"><STRONG>CREL</STRONG> makes no representation, warranty or endorsement of any product, service or content provided by the icosmo.co or the availability of any product, service or information available. The users must investigate for itself the suitability, quality and condition of any products or services advertised or provided on icosmo.co. It is the user’s sole responsibility to verify any content on icosmo.co, or provided to the users by othe users of icosmo.co before relying on it. <STRONG>CREL</STRONG> takes no responsibility of the outcome if any of such reliance. This disclaimer shall take effect to the fullest extent permitted by law.</p>

                       <p class="terms"> The user specifically acknowledges and agrees that neither <STRONG>CREL</STRONG>, nor each of their respective directors, officers, employees, consultants and agents shall be liable for any offensive or illegal conduct of the user or any publication of defamatory content by the user.</p>

                        <p class="terms"><STRONG>CREL</STRONG> is not liable for any loss or damage arising from or in relation to any dispute between users of the icosmo.co. <STRONG>CREL</STRONG> is not liable for any loss caused by <STRONG>CREL</STRONG> failing to comply with its obligations to users where that loss is caused by events outside of <STRONG>CREL</STRONG>’s reasonable control (such as a malfunction in equipment or software, Internet access difficulties or delay or failure of transmission). <STRONG>CREL</STRONG> is not liable for any loss caused by the alteration, withdrawal or restoration of any content.</p>
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
        </style>



@stop
