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
                        <div  class="section-heading text-left" style=" margin-bottom: 20px; margin-top: -40px;">
                            <h4>Terms and Conditions</h4>
                            <div>Agreement between user and Cosmo Real Estate Limited (“Cosmo”)</div>
                                <br></div>
                                <strong>1. <div class="heading">GENERAL</div></strong>
                                <br>
                                <p class="terms">Cosmo operates a property listing platform located at www.icosmo.co (accessible via desktop, mobile and tablet). Our portal icosmo.com is a passive conduit for the distribution of information about property advertised for sale by sellers and communications between sellers and other users.</p>

                                <p class="terms">By registering or signing up as an icosmo.co member, accessing or using the icosmo.co in any manner, you agree to be bound by Cosmo’s terms and conditions which can be accessed from the website mentioned above.</p>
                                <br>
                                <strong>2. <div class="heading">CHANGE TO THE TERMS</div></strong>
                                <p class="terms">We may amend these Terms from time to time to comply with any regulatory requirements or if there are changes to our business practices. Every time you wish to use our Platform, please check these Terms to ensure you understand the terms that apply at the time. Your use of our Platform will be subject to the most recent version of the Terms available on the Platform. We recommend that you read through the Terms available on the Platform regularly so that you can be sure that you are aware of any changes that may apply to you.</p>
                                <br>
                                <strong>3. <div class="heading">AVAILABILITY</div></strong>
                                <p class="terms">We do not guarantee that icosmo.co will always be available, be uninterrupted, secure or free from bugs or viruses, nor that icosmo.co will be free from errors or omissions. We shall not be liable for any delay or failure to perform resulting from causes outside of our reasonable control, including, without limitation, any failure to perform due to unforeseen circumstances or cause beyond our control such as acts of god, war, terrorism, riots, embargoes, acts of civil or military authorities, fire, floods, accidents, strikes, epidemic or other natural disaster, shortages of transportation facilities, fuel, energy, labor or materials or a failure of public or private telecommunications networks.</p>

                                <br>
                                <strong>4. <div class="heading">INTELLECTUAL PROPERTY RIGHT</div></strong>
                                <p class="terms">All content, information, materials and services provided on the icosmo.co areowned, controlled and/or licensed by Cosmo and/or its directors and related companies and protected by copyright, trademark, and other applicable intellectual property and proprietary rights laws.</p>

                                <div class="terms">All users are prohibited from using:</div>
                                <ol>
                                    <li class="num">any content, information, material, trademarks, logos, or any other intellectual property/rights provided on icosmo.co without the written consent of Cosmo or such third party that owns the intellectual property/ rights; or</li>
                                    <li class="num">other names, including, but not limited to, those identifying Cosmo and/or its directors and related companies or their respective products and services without the written consent of Cosmo or its directors or related companies.</li>
                                </ol>
                                <br>
                                <strong>5. <div class="heading">DISPUTE RESOLUTION</div></strong>
                                <p class="terms">These terms are governed by Hong Kong law and you can bring legal proceedings in respect of the products in the Hong Kong courts Any and all proceedings to resolve Claims will be conducted only on an individual basis and not in a class, consolidated or representative.</p>
                                <p class="terms">You agree to defend and indemnify Cosmo and any of its officers, directors, employees and agents from and against any claims, causes of action, demands, recoveries, losses, damages, fines, penalties or other costs or expenses of any kind or nature including but not limited to reasonable legal and accounting fees, brought by third parties as a result of: </p>
                                <ol>
                                    <li class="num">Your breach of these Terms and Conditions or the documents referenced herein; </li>
                                    <li class="num">Your violation of any law or the rights of a third party; or </li>
                                    <li class="num">Your use of our Platform.</li>
                                </ol>

                                <br>

                            <div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <style>
        .terms {
                font-family: arial, helvetica, sans-serif;
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

        ol{
            font-family: arial, helvetica, sans-serif;
            font-size: 14px;
        }
        li.num {
            font-family: arial, helvetica, sans-serif;
            list-style-type:decimal !important;
            font-size: 14px;
            margin-left: 14px;
        }
        li.bullpoint {
            font-family: arial, helvetica, sans-serif;
            list-style-type:disc;
            font-size: 14px;
            margin-left: 14px;
        }
        .subheading {
            font-family: arial, helvetica, sans-serif;
            font-size: 16px;
            font-style: italic;
        }
        </style>



@stop
