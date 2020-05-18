@extends('layouts.master')

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
@stop

@section('content')
<div style="height:120px;"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Account') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert {{session('alert-class')}} alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register', app()->getLocale()) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="userType" class="col-md-4 col-form-label text-md-right">Account Type</label>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input userType" type="radio" name="userType" id="agent" value="agent" checked autocomplete="userType" autofocus>
                                    <label class="form-check-label">
                                        Agent
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input userType" type="radio" name="userType" id="landlord" value="landlord" autocomplete="userType" autofocus>
                                    <label class="form-check-label">
                                        Landlord
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input userType" type="radio" name="userType" id="investor" value="investor" autocomplete="userType" autofocus>
                                    <label class="form-check-label">
                                        Investor
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input userType" type="radio" name="userType" id="renter" value="renter" autocomplete="userType" autofocus>
                                    <label class="form-check-label">
                                        Renter
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-4" id="agentInfo">
                            <label for="agentNumber" class="col-md-4 col-form-label text-md-right">Estate Agent Number</label>

                            <div class="col-md-6">
                                <input id="agentNumber" type="tel" class="form-control @error('agentNumber') is-invalid @enderror" name="agentNumber" value="{{ old('agentNumber') }}" autocomplete="agentNumber" autofocus>
                                <span id="noAgentNumber" class="invalid-feedback" role="alert" style="display: none;">
                                    <strong>You must provide your estate agent number.</strong>
                                </span>
                                @error('agentNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mt-4">
                            <label for="phoneNumber" class="col-md-4 col-form-label text-md-right">Mobile Phone Number</label>

                            <div class="col-md-6">
                                <input id="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}" required autocomplete="phoneNumber" autofocus>

                                @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn primary-btn" id="signUpBtn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            Have an account? <a class="small" href="{{ route('login', app()->getLocale()) }}">Go to login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:80px;"></div>
<script>
$(document).ready(function () {
    // show extra field when account type is agent
    $('.userType').click(function() {
        var x = document.getElementsByName("userType");
        var i;
        for (i = 0; i < x.length; i++) {
            if (x[i].checked) {
                var temp = x[i].value;
                if (temp =="agent") {
                    $('#agentInfo').show();
                } else {
                    $('#agentInfo').hide();
                }
            }
        }
    });

    //
    $('#signUpBtn').click(function() {
        var x = document.getElementsByName("userType");
        var i;
        for (i = 0; i < x.length; i++) {
            if (x[i].checked) {
                var temp = x[i].value;
                if (temp =="agent") {
                    var check = $('#agentNumber').val();
                    if (check.length > 0) {
                        document.getElementById("noAgentNumber").style.display = "none";
                    } else {
                        event.preventDefault();
                        document.getElementById("noAgentNumber").style.display = "block";
                    }

                }
            }
        }
    });




});
</script>

@endsection
