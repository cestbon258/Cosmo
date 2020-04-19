@extends('layouts.app')

@section('title', 'Create Project')

@section('content')



        <form enctype="multipart/form-data" method="POST" action="{{ route('create-project') }}" class="needs-validation" novalidate>
            @csrf
            <div class="container-fluid">

                <div class="col">
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
                    @include('layouts.alert')


                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Project</li>
                        </ol>
                    </nav>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Create Project</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3 imgUp">
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
                                <label for="title">Name of Project</label>
                                <input type="text" class="form-control" name="title" autocomplete="off" placeholder="Name" required>
                                <div class="invalid-feedback">
                                    Please input a title.
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Features</label>
                                <textarea id="summernote" name="features"></textarea>
                                <script>
                                    $(document).ready(function() {
                                        $('#summernote').summernote({
                                            height: 220,
                                        });
                                    });
                                </script>
                            </div>

                            <div class="control-group mt-3" id="fields">
                                <label class="control-label">Uplode Videos</label>
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
                                <label class="control-label">Uplode pdf</label>
                                <div class="pdf-controls">
                                    <div class="pdf-entry input-group col-xs-3">
                                        <input class="btn btn-light" name="PDFs[]" type="file" accept="application/pdf">
                                        {{-- <span class="input-group-btn">
                                            <button class="btn btn-success btn-add-pdf" type="button">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>


                            {{-- <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="filename" accept="application/pdf">
                                <label class="custom-file-label" for="customFile">Choose pdf</label>
                            </div> --}}


                            {{-- <input type="file" id="video" name="video[]" accept="video/*"> --}}

                            {{-- <label for="date">Property for</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="usage" value="sale" checked>
                                <label class="form-check-label">Sale</label>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="usage" value="rent">
                                <label class="form-check-label">Rent</label>
                            </div> --}}

                            {{-- <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    Please specify the price.
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date">Year of Built</label>
                                <input type="month" class="form-control" name="time" autocomplete="off">
                                <div class="invalid-feedback">
                                    Please specify the year.
                                </div>
                            </div> --}}



                            <div class="form-group mt-3">
                                <label for="district">District</label>
                                <select class="form-control" name="district">
                                @foreach ($districts as $key => $district)
                                        <option disabled>--- {{$district->country}} ---</option>
                                    @foreach ($district->city as $keyy => $value)
                                        <option value="{{$value}}|{{$district->country}}">{{$value}}</option>
                                    @endforeach
                                @endforeach
                                </select>
                            </div>


                             <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" autocomplete="off" placeholder="Address" required>
                                <div class="invalid-feedback">
                                    Please specify the address.
                                </div>
                            </div>
                            {{--

                            <label>Size</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="size" autocomplete="off" placeholder="Size" required>
                                        <div class="invalid-feedback">
                                            Please specify the size.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="measure" required>
                                            <option>sq ft</option>
                                            <option>m&#178;</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please specify the No. of bathroom.
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="row">
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
                            </div> --}}



                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="summernote2" name="description"></textarea>
                                <script>
                                    $(document).ready(function() {
                                        $('#summernote2').summernote({
                                            height: 220,
                                        });
                                    });
                                </script>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
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

        </style>

        <script>
        $(function(){
            // videos
            $(document).on('click', '.btn-add', function(e)
            {
                e.preventDefault();

                var controlForm = $('.controls:first'),
                    currentEntry = $(this).parents('.entry:first'),
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

                var controlForm = $('.pdf-controls:first'),
                    currentEntry = $(this).parents('.pdf-entry:first'),
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

@stop
