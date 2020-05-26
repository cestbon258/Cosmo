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
<strong><div class="heading">DISCLAIMER & LIMITATION OF LIABILITY</div></strong><br><br>
                <p class="terms">Cosmo services and the content contained on the icosmo.co are provided for informational purposes only and are not intended to meet any particular user’s need. Documents provided on the icosmo.co are provided as a service only, and do not constitute official versions of such documents.</p>
                <p class="terms">Under no circumstances will Cosmo, or related partnerships or corporations, or the directors, or employees thereof be liable for any direct, indirect, incidental, special or consequential damages or any loss that result from the use of, or the inability to use, any content, information, material or related service on icosmo.co.</p>
                <p class="terms">Cosmo does not represent, guarantee or warrant that the content, information or material contained on icosmo.co are correct, accurate, complete, current or free from errors or omissions. Information on the icosmo.com should not be regarded as professional, legal, financial or real estate advice nor a substitute for such advice. Any statement or content made available by third parties, including but not limited to sellers on icosmo.com, are those of the respective author or provider. Third party content does not represent the views of Cosmo.</p>
                <p class="terms">The user specifically acknowledges and agrees that neither Cosmo, nor each of their respective directors, officers, employees, consultants and agents shall be liable for any offensive or illegal conduct of the user or any publication of defamatory content by the user.</p>
                <p class="terms">icosmo.co may contain hyperlinks to websites operated by parties other than icosmo.co. Such hyperlinks are provided for your reference only. We do not control such websites and are not responsible for their contents or the privacy or other practices of such websites. Your use of any third-party website may be subject to additional terms and conditions, which we suggest you read carefully before you visit any such website.</p>
                <p class="terms">Cosmo is not liable for any loss or damage arising from or in relation to any dispute between users of the icosmo.co. Cosmo is not liable for any loss caused by Cosmo failing to comply with its obligations to users where that loss is caused by events outside of Cosmo’s reasonable control (such as a malfunction in equipment or software, internet access difficulties or delay or failure of transmission). Cosmo is not liable for any loss caused by the alteration, withdrawal or restoration of any content.</p>
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
        .heading {
            text-decoration: underline;
            font: 12px;
            font-weight: bold;
            display: inline;
        }
            /* @media screen and (max-width: 600px) {
                .terms{
                    font-size:12px;
                }
            } */
        </style>



@stop
