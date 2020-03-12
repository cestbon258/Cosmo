@extends('layouts.email')

@section('content')
    <p>Hey, {{ $name }}</p><br>
    <p>A sign in attempt requires further verification because we did not recognize your device. To complete the sign in, enter the verification code on the unrecognized device.</p>

    <p>Device: Chrome on Windows</p>
    <p>Verification code: 837654</p>

    <p>If you did not attempt to sign in to your account, your password may be compromised. Visit https://github.com/settings/admin to create a new, strong password for your GitHub account.</p>

    <p>If you'd like to automatically verify devices in the future, consider enabling two-factor authentication on your account. Visit https://help.github.com/articles/configuring-two-factor-authentication learn about two-factor authentication.</p>

    <p>If you decide to enable two-factor authentication, ensure you retain access to one or more account recovery methods. See https://help.github.com/articles/configuring-two-factor-authentication-recovery-methods in the GitHub Help.</p>

    <p>
        <span style="display:block;">Thanks,</span>
        <span style="display:block;">The Cosoms</span>
    </p>
@endsection
