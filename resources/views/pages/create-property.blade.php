@extends('layouts.app')

@section('title', 'New House')

@section('content')




        <form enctype="multipart/form-data" method="POST" action="{{ route('create-property') }}" class="needs-validation" novalidate>
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
                            <li class="breadcrumb-item active" aria-current="page">Create Property</li>
                        </ol>
                    </nav>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Create Property</h6>
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
                                <label for="title">Name of Property</label>
                                <input type="text" class="form-control" name="title" autocomplete="off" placeholder="Name" required>
                                <div class="invalid-feedback">
                                    Please input a title.
                                </div>
                            </div>

                            <label for="date">Property for</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="usage" value="sale" checked>
                                <label class="form-check-label">Sale</label>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="usage" value="rent">
                                <label class="form-check-label">Rent</label>
                            </div>

                            <div class="form-group">
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
                            </div>



                            <div class="form-group">
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
                                <textarea id="summernote" name="description"></textarea>
                                <script>
                                    $(document).ready(function() {
                                        $('#summernote').summernote({
                                            height: 220,
                                        });
                                    });
                                </script>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }
        </style>
@stop
