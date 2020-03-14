@extends('layouts.app')

@section('content')
    <script>
    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.profile-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".file-upload").on('change', function(){
            readURL(this);
        });

        $(".upload-button").on('click', function() {
           $(".file-upload").click();
        });
    });
    </script>
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
                    <form method="POST" action="{{ route('profile/update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                           <div class="small-12 medium-2 large-2 columns">
                             <div class="circle">
                               <!-- User Profile Image -->
                               <img class="profile-pic" src="{{ url('storage/'.Auth::user()->profile_img)}}" onerror="this.onerror=null;this.src='{{ url('img/icons/profile.png') }}';">

                               <!-- Default Image -->
                               <!-- <i class="fa fa-user fa-5x"></i> -->
                             </div>
                             <div class="p-image">
                               <i class="fa fa-camera upload-button"></i>
                                <input class="file-upload" name="profileImage" value="{{Auth::user()->profile_img}}" type="file" accept="image/*"/>
                             </div>
                          </div>
                        </div>

                        <br>

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
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
             </div>
        </div>
    </div>
</div>
<style>

.profile-pic {
    /* max-width: 200px; */
    max-height: 200px;
    display: block;
    background-color: lightgrey;
}

.file-upload {
    display: none;
}
.circle {
    border-radius: 1000px !important;
    overflow: hidden;
    width: 128px;
    height: 128px;
    border: 8px solid rgba(255, 255, 255, 0.7);
    /* position: absolute; */
    /* top: 72px; */
}
img {
    max-width: 100%;
    height: auto;
}
.p-image {
    /* position: absolute;
    top: 167px;
    left: 117px; */
    float: right;
    color: #666666;
    transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.p-image:hover {
    transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.upload-button {
    font-size: 1.2em;
}

.upload-button:hover {
    transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    color: #999;
}

</style>

@endsection
