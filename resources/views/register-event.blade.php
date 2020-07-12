@extends('layouts.email')

@section('content')
    <p>Dear, {{$name}}</p>

    <p>Thank you for registering for the <b>{{$event_title}}</b> event. We have received your registration.</p>

    <p>The email you registered with: {{$email}}.</p>

    <p>If you have any questions leading up to the event, please contact us by replying to this email.</p>

    <p>We look forward to seeing you on {{$event_date}}!<p>

    <p>
        <span style="display:block;">Kind Regards,</span>
        <span style="display:block;">The COSMO Team</span>
    </p>
@endsection
