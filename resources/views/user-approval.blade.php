@extends('layouts.email')

@section('content')
    <p>Hey, {{ $name }}</p><br>


    <p>Your account has been approved. You can now <a href="{{app()->getLocale(), url('login')}}" target="_blank"><button style="background-color: #4CAF50; border: none; border-radius: 4px; color: white; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor:pointer;">login </button></a> to Cosmo.</p>

    <hr style="border-top: 0.5px solid lightgrey;">
    <p>If you’re having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser: {{ url(app()->getLocale(), 'login')}}</p>

    <p>
        <span style="display:block;">Regards,</span>
        <span style="display:block;">Cosmo</span>
    </p>
@endsection
