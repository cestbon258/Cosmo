@extends('layouts.app')

@section('title', 'Create Property')

@section('content')


        <form enctype="multipart/form-data" method="POST" action="{{ route('update-project', [app()->getLocale(), $property->property_code]) }}" class="needs-validation" novalidate>
            @csrf
            <div class="container-fluid">
                <div class="col">
                    @include('layouts.alert')

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard', app()->getLocale()) }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('property-list', app()->getLocale()) }}">All Properties</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Project</li>
                        </ol>
                    </nav>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Edit Project</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($property->pictures as $key => $picture)
                                    @if($key == 0)
                                        <div class="col-sm-3 imgUp">
                                            <div class="imagePreview" style="background:url( {{url('storage/projects/'.$property->property_code.'/'.$picture)}} ); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
                                            <input name="originImg[]"value="{{$picture}}" hidden>

                                            {{-- <label class="btn btn-primary-custom">
                                                Change Image
                                                <input type="file" accept="image/*" class="uploadFile img" name="houseImg[]" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                            </label> --}}
                                            <i class="fa fa-times del"></i>

                                        </div>
                                        {{-- <i class="fa fa-plus imgAdd"></i> --}}
                                    @else
                                        <div class="col-sm-3 imgUp">
                                            <div class="imagePreview" style="background:url( {{url('storage/projects/'.$property->property_code.'/'.$picture)}} ); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
                                            <input name="originImg[]"value="{{$picture}}" hidden>
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

                            <div class="form-group">
                                <label>Features</label>
                                <textarea id="summernote" name="features">{{$property->features}}</textarea>
                                <script>
                                    $(document).ready(function() {
                                        $('#summernote').summernote({
                                            height: 220,
                                        });
                                    });
                                </script>
                            </div>

                            <div class="control-group mt-3" id="fields">
                                <label class="control-label">Upload Videos (Max. 20MB)</label>
                                @if ($property->videos)
                                    @foreach ($property->videos as $key => $video)

                                            <div class="controls" style="margin-bottom:10px;">
                                                <div class="entry input-group col-xs-3">
                                                    <video controls muted style="width:300px; height:auto;" >
                                                        <source src="{{ URL::asset('storage/projects/'.$property->property_code.'/videos'.'/'.$video) }}">
                                                        Your browser does not support HTML5 video.
                                                    </video>
                                                    <input class="btn btn-light" name="originVideos[]" readonly value="{{$video}}">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-danger btn-remove" type="button" style="height:100%;">
                                                        <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                    @endforeach
                                    <br>
                                @endif

                                <div class="controls">
                                    <div class="entry input-group col-xs-3">
                                        <input class="btn btn-light" name="videos[]" type="file" accept="video/*">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success btn-add" type="button">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>


                            <div class="control-group mt-3">
                                <label class="control-label">Upload PDFs</label>

                                @if ($property->files)
                                    @foreach ($property->files as $key => $file)

                                        <div class="pdf-controls" style="margin-bottom:10px;">
                                            <div class="pdf-entry input-group col-xs-3">
                                                <div class="scroll-wrapper">
                                                	<iframe src="{{ URL::asset('storage/projects/'.$property->property_code.'/pdf'.'/'.$file) }}#view=FitH">
                                                    </iframe>
                                                </div>
                                                <input class="btn btn-light" name="originPDFs[]" readonly value="{{$file}}">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger btn-remove-pdf" type="button" style="height:100%;">
                                                    <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                    <br>
                                @endif

                                <div class="pdf-controls">
                                    <div class="pdf-entry input-group col-xs-3">
                                        <input class="btn btn-light" name="PDFs[]" type="file" accept="application/pdf">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success btn-add-pdf" type="button">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
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
                            <div class="form-group mt-3">
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

                            {{-- <label>Size</label>
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
                            </div> --}}

                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="summernote2" name="description">{{$property->description}}</textarea>
                                <script>
                                    $(document).ready(function() {
                                        $('#summernote2').summernote({
                                            height: 220,
                                        });
                                    });
                                </script>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <style>

            .entry:not(:first-of-type)
            {
                margin-top: 10px;
            }
            .pdf-entry:not(:first-of-type)
            {
                margin-top: 10px;
            }

            .scroll-wrapper {
              -webkit-overflow-scrolling: touch;
              overflow-y: scroll;
              /* important:  dimensions or positioning here! */
            }
            .scroll-wrapper iframe {
                border: 0;
                width: 300px;
                height: auto;
            }

        </style>

        <script>
        $(function(){
            // videos
            $(document).on('click', '.btn-add', function(e)
            {
                e.preventDefault();

                var controlForm = $('.controls:last'),
                    currentEntry = $(this).parents('.entry:last'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<i class="fas fa-minus"></i>');
            }).on('click', '.btn-remove', function(e)
            {
              $(this).parents('.entry:first').remove();

                e.preventDefault();
                return false;
            });


            // PDFs
            $(document).on('click', '.btn-add-pdf', function(e)
            {
                e.preventDefault();

                var controlForm = $('.pdf-controls:last'),
                    currentEntry = $(this).parents('.pdf-entry:last'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input').val('');
                controlForm.find('.pdf-entry:not(:last) .btn-add-pdf')
                    .removeClass('btn-add-pdf').addClass('btn-remove-pdf')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<i class="fas fa-minus"></i>');
            }).on('click', '.btn-remove-pdf', function(e)
            {
              $(this).parents('.pdf-entry:first').remove();

                e.preventDefault();
                return false;
            });

            // // Add the following code if you want the name of the file appear on select
            // $(".custom-file-input").on("change", function() {
            //     var fileName = $(this).val().split("\\").pop();
            //     $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            // });
        });
        </script>



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
