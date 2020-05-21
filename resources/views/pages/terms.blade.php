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
                            <div>Agreement between user and Cosmo Real Estate Limited (“Cosmo”)</div>
                                <br></div>
                                <strong>1. <div class="heading">GENERAL</div></strong>
                                <br>
                                <p class="terms">Cosmo operates a property listing platform located at www.icosmo.co (accessible via desktop, mobile and tablet.) Our portal icosmo.com is a passive conduit for the distribution of information about property advertised for sale by sellers and communications between sellers and other users.</p>

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
                                <strong>6. <div class="heading">DISCLAIMER & LIMITATION OF LIABILITY</div></strong>
                                <p class="terms">Cosmo services and the content contained on the icosmo.co are provided for informational purposes only and are not intended to meet any particular user’s need. Documents provided on the icosmo.co are provided as a service only, and do not constitute official versions of such documents.</p>
                                <p class="terms">Under no circumstances will Cosmo, or related partnerships or corporations, or the directors, or employees thereof be liable for any direct, indirect, incidental, special or consequential damages or any loss that result from the use of, or the inability to use, any content, information, material or related service on icosmo.co.</p>
                                <p class="terms">Cosmo does not represent, guarantee or warrant that the content, information or material contained on icosmo.co are correct, accurate, complete, current or free from errors or omissions. Information on the icosmo.com should not be regarded as professional, legal, financial or real estate advice nor a substitute for such advice. Any statement or content made available by third parties, including but not limited to sellers on icosmo.com, are those of the respective author or provider. Third party content does not represent the views of Cosmo.</p>
                                <p class="terms">The user specifically acknowledges and agrees that neither Cosmo, nor each of their respective directors, officers, employees, consultants and agents shall be liable for any offensive or illegal conduct of the user or any publication of defamatory content by the user.</p>
                                <p class="terms">icosmo.co may contain hyperlinks to websites operated by parties other than icosmo.co. Such hyperlinks are provided for your reference only. We do not control such websites and are not responsible for their contents or the privacy or other practices of such websites. Your use of any third-party website may be subject to additional terms and conditions, which we suggest you read carefully before you visit any such website.</p>
                                <p class="terms">Cosmo is not liable for any loss or damage arising from or in relation to any dispute between users of the icosmo.co. Cosmo is not liable for any loss caused by Cosmo failing to comply with its obligations to users where that loss is caused by events outside of Cosmo’s reasonable control (such as a malfunction in equipment or software, internet access difficulties or delay or failure of transmission). Cosmo is not liable for any loss caused by the alteration, withdrawal or restoration of any content..</p>
                                <strong>7. <div class="heading">PRIVACY</div></strong>
                                <p class="terms">This policy statement applies to the URL www.icomso.co and sets out the policies of Cosmo Real Estate Limited (“Cosmo”) relating to personal information provided to Cosmo, or collected by Cosmo, throughthe icosmo.co.</p>
                                <p class="terms">Throughout this Privacy Policy, we use the term “personal information” to describe information that can be associated with a specific person and can be used to identify that person. Cosmo does not consider personal information to include information that has been made anonymous or aggregated so that it cannot be used, whether in combination with other information or otherwise, to identify a specific user.</p>
                                <p class="terms">By using the icosmo.co and its services and/or registering as an icosmo.co user (registering as either a “landlord” or “investor” or “agent”), you expressly consent to Cosmo’s collection, use, disclosure and retention of your personal information as described in this Privacy Policy.</p>
                                <br>
                                <p class="terms subheading">7.1. Collecting Information about You</p>
                                <p class="terms">Registration – when you register as a user or member, you will provide information such as your email address, first name, surname, phone number and address. </p>
                                <p class="terms">General Enquiries– if you make an enquiry through icosmo.co you will be required to provide us with your contact details which include but are not limited to your name, a valid phone number and email.</p>
                                <p class="terms">If you choose not to provide certain personal information, we may not be able to approve your icosmo.co membership and/or provide you with the services you require.</p>
                                <p class="terms">In addition to the personal information which you voluntarily provide Cosmo while using icosmo.co, Cosmo maintains server logs regarding visits made to icosmo.co. Most internet sites maintain such server logs, and we analyse such logs in an effort to constantly improve the value of materials on the Cosmo Site. The server logs DO NOT contain personally identifiable information and Cosmo DOES NOT make any attempt to link the traffic information on icosmo.co with the individuals who actually visit icosmo.co.</p>
                                <p class="terms subheading">7.2. Cookies</p>
                                <p class="terms">When you access icosmo.co use our services, we may place small data files on your computer or other device. These data files may be cookies, pixel tags, flash cookies, or other local storage provided by your browser or associated applications (“Cookies”). Most Cookies are session cookies and are automatically deleted from your hard drive at the end of a session. </p>
                                <p class="terms">These data files assist us:</p>
                                <ol>
                                    <li class="bullpoint">identify you as a member and maintain your signed –in status;</li>
                                    <li class="bullpoint">customise services and content;</li>
                                    <li class="bullpoint">maintain your account security;</li>
                                    <li class="bullpoint">reduce risk and prevent fraud; and</li>
                                    <li class="bullpoint">provide safety and security across icosmo.co</li>
                                </ol>
                                <br>
                                <p class="terms">You may decline our Cookies if your browser permits, however doing so may interfere with your use of icosmo.co as certain features are only available through the use of Cookies.</p>
                                <p class="terms">You may encounter Cookies from third party service providers that are on icosmo.co in order to help us with various services and features of icosmo.co. You also may encounter Cookies from third parties that we have not authorised and have no control of when you access and view a third-party web page.</p>
                                <p class="terms subheading">7.3. Change to Privacy Policy</p>
                                <p class="terms">We may change this Privacy Policy at any time and from time to time.  Any amendments or modifications to Online Privacy Policy will become effective immediately upon posting.  Your continued use of any of our Online Services following the posting of a revised version of this Online Privacy Policy will constitute your acceptance of the revised Policy.  If you do not agree with the revised Online Privacy Policy, do not use any of our Online Services.</p>
                                <p class="terms subheading">7.4. Use and Disclosure of Personal Information</p>
                                <p class="terms">Cosmo may disclose any personal information without your consent in the following circumstances;</p>
                                <ol>
                                    <li class="bullpoint">such information must be provided in order to answer any of your queries submitted to icosmo.co or otherwise to provide you with a service which you have requested from us. In this instance, we may need to provide your personal information to one of our strategic partners. When doing so we will use reasonable commercial endeavours to ensure that your personal information is not misused by the recipient.</li>
                                    <li class="bullpoint">such information is required by law to be disclosed;</li>
                                    <li class="bullpoint">we believe, in our sole discretion we must disclose such information in order to prevent a violation of the law; and</li>
                                    <li class="bullpoint">such information is required to be provided in the course of a corporate transaction (divestiture, merger, consolidation, assets sale etc).</li>
                                    <li class="bullpoint">our personal information may also be used to:</li>
                                    <li class="bullpoint">verify your identity;</li>
                                    <li class="bullpoint">administer and manage the services we provide you, including charging, billings and collecting debts;</li>
                                    <li class="bullpoint">inform you of ways the services we provide you could be improved;</li>
                                    <li class="bullpoint">research and develop our services and facilitate market research; and</li>
                                    <li class="bullpoint">keep you informed of our products, services and special offers</li>
                                </ol>
                                <br>
                                <p class="terms">Information about the kinds of properties that you are interested in and reserve through icosmo.co may also be combined with other information to generate statistics about the types of properties that people are searching for or interested in and that information in the aggregate may be provided to other parties. However, your personal information will not be shared with any other parties unless Cosmo has obtained your express permission.</p>
                                <p class="terms">When you register as a member on icosmo.co your name and details will be provided to users of icosmo.co and made available to other members or users of icosmo.co so that members and users can contact you. If you do not wish your contact information or other details to be made available to other members and users of icosmo.co it is your responsibility to delete that information from your profile page and any other location on icosmo.co.</p>
                                <p class="terms">By providing your email address to Cosmo, you expressly consent to receive emails from us. We may use email to communicate with you, to send information that you have requested or to send information about other services provided by us. We will not give your email address to another party to promote their products or services directly to you.</p>
                                <p class="terms">If you do not wish to receive any Cosmo marketing information you may at any time edit your notification preferences within your profile panel. Even if you deselect all communications from us you understand and accept that from time to time</p>
                                <div class="terms">We may still contact you if:</div>
                                <ol>
                                    <li class="bullpoint">you are in breach of Cosmo terms and conditions;</li>
                                    <li class="bullpoint">we have reason to believe it is necessary to maintain icosmo.co security; or</li>
                                    <li class="bullpoint">there is likely to be a change to your account that you should be aware of.</li>
                                </ol>
                                <br>
                                <p class="terms subheading">7.5. Changing or Deleting Your Personal Information</p>
                                <p class="terms">If you wish to correct, modify or delete any personal information you have submitted to icosmo.co you may do so by changing or deleting the personal information from your profile page. Cosmo takes no responsibility for the removal/deletion of any of your personal information available on icosmo.co. </p>
                                <br>
                                <p class="terms subheading">7.6. Changes to the Privacy Policy</p>
                                <p class="terms">Cosmo reserves the right to modify or amend this Privacy Policy at any time and for any reason without notice.</p>
                                <br>
                                <strong>8. <div class="heading">SECURITY</div></strong>
                                <p class="terms">Cosmo has implemented technology and security features to safeguard the privacy of personal information from unauthorised access or improper use and we will continue to enhance our security procedures as new technology becomes available.</p>
                                <p class="terms">All information that you submit to us on or through icosmo.co is transmitted directly to our internal database server and stored. Account access only via passwords generated by users. The database storing information is only accessible by specifically authorised staff of Cosmo and is security protected. No hard copies of information collected as set out above are created or stored by Cosmo.</p>
                                <p class="terms">Cosmo takes the security of your personal information very seriously. However, due to the open nature of the Internet we do not guarantee that communications made by you, or information stored on our database, will be free from unauthorized access by third parties such as hackers and your use of icosmo.co demonstrates your assumption of this risk.</p>
                                <p class="terms">If you have any further questions regarding this Privacy Policy, please contact us at support@icosmo.co</p>
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
