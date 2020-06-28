@extends('layouts.email')

@section('content')
    <p>Hey, {{ $name }}</p><br>

    <p>Your are requesting details information about the property with ID: {{ $property_id }}, and the property can be retrieved at {{ $url }}</p>.


    <p>Your request is under processing and we will try to contact you via you phone at {{ $phone }} or email: {{ $email }}</p>

    <p>
        <span style="display:block;">Regards,</span>
        <span style="display:block;">The Cosmo</span>
    </p>
@endsection
