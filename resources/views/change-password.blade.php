@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col">
            @include('layouts.alert')

            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('change-password/update') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Original Password</label>
                            <input type="password" class="form-control" name="oldPassword" autocomplete="off" placeholder="Original Password">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" class="form-control" name="newPasswordA" aria-describedby="passwordHelp" autocomplete="off" placeholder="New Password">
                            <small id="passwordHelp" class="form-text text-muted">New password should not be the same as the old password.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm New Password</label>
                            <input type="password" class="form-control" name="newPasswordB" autocomplete="off" placeholder="Confirm New Password">
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </form>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection
