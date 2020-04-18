@extends('layouts.app')

@section('title', 'Create Property')

@section('content')


        <form enctype="multipart/form-data" method="POST" action="{{ url('edit-property/'.$property->property_code) }}" class="needs-validation" novalidate>
            @csrf
            <div class="container-fluid">
                <div class="col">
                    @include('layouts.alert')

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('property-list') }}">All Properties</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Property</li>
                        </ol>
                    </nav>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Edit Property</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($property->pictures as $key => $picture)
                                    @if($key == 0)
                                        <div class="col-sm-3 imgUp">
                                            <div class="imagePreview" style="background:url( {{url('storage/properties/'.$property->property_code.'/'.$picture)}} ); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
                                            <input name="orignImg[]"value="{{$picture}}" hidden>

                                            {{-- <label class="btn btn-primary-custom">
                                                Change Image
                                                <input type="file" accept="image/*" class="uploadFile img" name="houseImg[]" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                            </label> --}}
                                            <i class="fa fa-times del"></i>

                                        </div>
                                        {{-- <i class="fa fa-plus imgAdd"></i> --}}
                                    @else
                                        <div class="col-sm-3 imgUp">
                                            <div class="imagePreview" style="background:url( {{url('storage/properties/'.$property->property_code.'/'.$picture)}} ); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
                                            <input name="orignImg[]"value="{{$picture}}" hidden>
                                            <i class="fa fa-times del"></i>
                                        </div>
                                    @endif

                                @endforeach
                                <i class="fa fa-plus imgAdd"></i>
                            </div>

                            <div class="form-group">
                                <label for="title">Name of property</label>
                                <input type="text" class="form-control" name="title" autocomplete="off" value="{{$property->title}}" required>
                                <div class="invalid-feedback">
                                    Please input a title.
                                </div>
                            </div>

                            <label for="date">Property for</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="usage" value="sale" {{$property->purpose == 'sale' ? 'checked' : ''}}>
                                <label class="form-check-label">Sale</label>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="usage" value="rent" {{$property->purpose == 'rent' ? 'checked' : ''}}>
                                <label class="form-check-label">Rent</label>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" autocomplete="off" value="{{$property->price}}" required>
                                <div class="invalid-feedback">
                                    Please specify the price.
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date">Year of Built</label>
                                <input type="month" class="form-control" name="time" autocomplete="off" value="{{$property->time}}">
                                <div class="invalid-feedback">
                                    Please specify the year.
                                </div>
                            </div>

                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select class="form-control" id="country-selected" name="country" required>
                                            @foreach ($districts as $key => $district)
                                                <option {{$property->country == $district->country ? 'selected' : '' }}>{{$district->country}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div> --}}
                            <div class="form-group">
                                <label for="district">District</label>
                                <select class="form-control" name="district">
                                @foreach ($districts as $key => $district)
                                        <option disabled>--- {{$district->country}} ---</option>
                                    @foreach ($district->city as $keyy => $value)
                                        <option {{$property->city == $value ? 'selected' : ''}} value="{{$value}}|{{$district->country}}">{{$value}}</option>
                                    @endforeach
                                @endforeach
                                </select>
                            </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="city" autocomplete="off" value="{{$property->city}}" required>
                                        <div class="invalid-feedback">
                                            Please specify the city.
                                        </div>
                                    </div>
                                </div> --}}

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" autocomplete="off" value="{{$property->address}}" required>
                                <div class="invalid-feedback">
                                    Please specify the address.
                                </div>
                            </div>

                            <label>Size</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="size" autocomplete="off" value="{{$property->size}}" required>
                                        <div class="invalid-feedback">
                                            Please specify the size.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="measure" required>
                                            <option {{$property->measurement =='sq ft' ? 'selected' : ''}}>sq ft</option>
                                            <option {{$property->measurement =='m²' ? 'selected' : ''}}>m&#178;</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please specify the No. of bathroom.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. of Bedroom</label>
                                        <select class="form-control" name="bedroom" required>
                                            <option {{$property->bedroom =='0' ? 'selected' : ''}}>0</option>
                                            <option {{$property->bedroom =='1' ? 'selected' : ''}}>1</option>
                                            <option {{$property->bedroom =='2' ? 'selected' : ''}}>2</option>
                                            <option {{$property->bedroom =='3' ? 'selected' : ''}}>3</option>
                                            <option {{$property->bedroom =='4' ? 'selected' : ''}}>4</option>
                                            <option {{$property->bedroom =='5' ? 'selected' : ''}}>5</option>
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
                                            <option {{$property->bathroom =='0' ? 'selected' : ''}}>0</option>
                                            <option {{$property->bathroom =='1' ? 'selected' : ''}}>1</option>
                                            <option {{$property->bathroom =='2' ? 'selected' : ''}}>2</option>
                                            <option {{$property->bathroom =='3' ? 'selected' : ''}}>3</option>
                                            <option {{$property->bathroom =='4' ? 'selected' : ''}}>4</option>
                                            <option {{$property->bathroom =='5' ? 'selected' : ''}}>5</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please specify the No. of bathroom.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="summernote" name="description">{{$property->description}}</textarea>
                                <script>
                                    $(document).ready(function() {
                                        $('#summernote').summernote({
                                            height: 220,
                                        });
                                    });
                                </script>
                                <div class="invalid-feedback">
                                    Please give some information about the house.
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <style>
        </style>



{{--
    <style>

    .imagePreview {
        width: 100%;
        height: 180px;
        background-position: center center;
        background:url( {{url('/img/icons/default-2.jpg')}} );
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
        $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-3 imgUp"><div class="imagePreview"></div><label class="btn btn-primary-custom">Upload<input type="file" accept="image/*" class="uploadFile img" name="houseImg[]" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
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
    </script> --}}
@stop
