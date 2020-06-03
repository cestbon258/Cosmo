@extends('layouts.email')

@section('content')
    <p>Dear, {{$name}}</p>

    <p>Thank you for registering to <b>{{$event_title}}</b>. Your registration has been received.</p>

    <p>You registered with this email:  {{$email}}.</p>

    <p>If you have any questions leading up to the event, feel free to reply to this email.</p>

    <p>We look forward to seeing you on {{$event_date}}!<p>

    <p>
        <span style="display:block;">Kind Regards,</span>
        <span style="display:block;">The Cosoms</span>
    </p>
@endsection
