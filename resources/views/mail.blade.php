@extends('layouts.email')

@section('content')
    <p>Hey, {{ $name }}</p><br>
    <p>Thank you for your registration.<b> Your account is waiting for our approval.</b> </p>
    <p>Please view another email to validate your email address.</p>
    <br>
    <p>
        <span style="display:block;">Regards,</span>
        <span style="display:block;">The Cosmo</span>
    </p>
@endsection
