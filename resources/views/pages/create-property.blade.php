@extends('layouts.app')

@section('title', 'New House')

@section('content')


        @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
              </ul>
            </div>
        @endif

        <form enctype="multipart/form-data" method="POST" action="{{ route('create-property') }}" class="needs-validation" novalidate>
            @csrf
            <div class="container">

                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Create Property</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 imgUp">
                                    <div class="imagePreview"></div>
                                    <label class="btn btn-primary-custom">
                                        Upload
                                        <input type="file" accept="image/*" class="uploadFile img" name="houseImg[]" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" required>
                                        <div class="invalid-feedback">
                                            Please upload at least an image.
                                        </div>
                                    </label>
                                </div>
                                <i class="fa fa-plus imgAdd"></i>
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" autocomplete="off" placeholder="Name of property" required>
                                <div class="invalid-feedback">
                                    Please input a title.
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date">Year of built</label>
                                <input type="month" class="form-control" name="time" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    Please specify the year.
                                </div>
                            </div>

                            <label for="country">Country</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="country" autocomplete="off" placeholder="Country" required>
                                        <div class="invalid-feedback">
                                            Please specify the country.
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="city" autocomplete="off" placeholder="City" required>
                                        <div class="invalid-feedback">
                                            Please specify the city.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" autocomplete="off" placeholder="Address" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. of Bedroom</label>
                                        <select class="form-control" name="bedroom" required>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please specify the No. of bedroom.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. of Bathroom</label>
                                        <select class="form-control" name="bathroom" required>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please specify the No. of bathroom.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="6" required></textarea>
                                <div class="invalid-feedback">
                                    Please give some information about the house.
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>




    <style>

    .imagePreview {
        width: 100%;
        height: 180px;
        background-position: center center;
        background:url(img/icons/default-2.jpg);
        background-color:#fff;
        background-size: cover;
        background-repeat:no-repeat;
        display: inline-block;
        box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
    }
    .btn-primary-custom
    {
      display:block;
      border-radius:0px;
      box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
      margin-top:-5px;
    }
    .imgUp
    {
      margin-bottom:15px;
    }
    .del
    {
      position:absolute;
      top:0px;
      right:15px;
      width:30px;
      height:30px;
      text-align:center;
      line-height:30px;
      background-color:rgba(255,255,255,0.6);
      cursor:pointer;
    }
    .imgAdd
    {
      width:30px;
      height:30px;
      border-radius:50%;
      background-color:#4bd7ef;
      color:#fff;
      box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
      text-align:center;
      line-height:30px;
      margin-top:0px;
      cursor:pointer;
      font-size:15px;
    }

    </style>
    <script>
    $(".imgAdd").click(function(){
        $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary-custom">Upload<input type="file" accept="image/*" class="uploadFile img" name="houseImg[]" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
    });

    $(document).on("click", "i.del" , function() {
    	$(this).parent().remove();
    });

    $(function() {
        $(document).on("change",".uploadFile", function()
        {
    		var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test( files[0].type)){ // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function(){ // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                }
            }

        });
    });

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
@stop
