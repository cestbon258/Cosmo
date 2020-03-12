@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert {{session('alert-class')}} alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('profile/update') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="{{ Auth::user()->email }}" disabled>
                            <small id="emailHelp" class="form-text text-muted">This email cannot be changed.</small>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="name" class="form-control" name="name" autocomplete="off" value="{{ Auth::user()->name }}">
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection
