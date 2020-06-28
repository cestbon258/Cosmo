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
                                <label for="title">Name of Project</label>
                                <input type="text" class="form-control" name="title" autocomplete="off" value="{{$property->title}}" required>
                                <div class="invalid-feedback">
                                    Please input a title.
                                </div>
                            </div>

                            <label for="date">Property Type</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" value="Residential" {{$property->type == 'Residential' ? 'checked' : ''}}>
                                <label class="form-check-label">Residential</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" value="Commercial" {{$property->type == 'Commercial' ? 'checked' : ''}}>
                                <label class="form-check-label">Commercial</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" value="Industrial" {{$property->type == 'Industrial' ? 'checked' : ''}}>
                                <label class="form-check-label">Industrial</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" value="Retail" {{$property->type == 'Retail' ? 'checked' : ''}}>
                                <label class="form-check-label">Retail</label>
                            </div>


                            {{-- <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="carpark">Carpark</label>
                                        <select class="form-control" name="carpark" required>
                                            <option {{$property->carpark =='0' ? 'selected' : ''}}>0</option>
                                            <option {{$property->carpark =='1' ? 'selected' : ''}}>1</option>
                                            <option {{$property->carpark =='2' ? 'selected' : ''}}>2</option>
                                            <option {{$property->carpark =='3' ? 'selected' : ''}}>3</option>
                                            <option {{$property->carpark =='4' ? 'selected' : ''}}>4</option>
                                            <option {{$property->carpark =='5' ? 'selected' : ''}}>5</option>
                                            <option {{$property->carpark =='6' ? 'selected' : ''}}>6</option>
                                            <option {{$property->carpark =='7' ? 'selected' : ''}}>7</option>
                                            <option {{$property->carpark =='8' ? 'selected' : ''}}>8</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please specify the carpark.
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <label class="mt-3" for="carpark">More Facilities</label>
                            <div class="row" style="margin-left:4px;">
                                <div class="form-check col-12 col-md-4 col-lg-3">
                                  <input class="form-check-input facility" type="checkbox" value="Garden" name="facilities[]">
                                  <label class="form-check-label">Garden</label>
                                </div>
                                <div class="form-check col-12 col-md-4 col-lg-3">
                                  <input class="form-check-input facility" type="checkbox" value="Terrace" name="facilities[]">
                                  <label class="form-check-label">Terrace</label>
                                </div>
                                <div class="form-check col-12 col-md-4 col-lg-3">
                                  <input class="form-check-input facility" type="checkbox" value="Patio" name="facilities[]">
                                  <label class="form-check-label">Patio</label>
                                </div>
                                <div class="form-check col-12 col-md-4 col-lg-3">
                                  <input class="form-check-input facility" type="checkbox" value="Balcony" name="facilities[]">
                                  <label class="form-check-label">Balcony</label>
                                </div>
                                <div class="form-check col-12 col-md-4 col-lg-3">
                                  <input class="form-check-input facility" type="checkbox" value="Deck Area" name="facilities[]">
                                  <label class="form-check-label">Deck Area</label>
                                </div>
                                <div class="form-check col-12 col-md-4 col-lg-3">
                                  <input class="form-check-input facility" type="checkbox" value="Pool" name="facilities[]">
                                  <label class="form-check-label">Pool</label>
                                </div>
                                <div class="form-check col-12 col-md-4 col-lg-3">
                                  <input class="form-check-input facility" type="checkbox" value="Yard" name="facilities[]">
                                  <label class="form-check-label">Yard</label>
                                </div>
                                <div class="form-check col-12 col-md-4 col-lg-3">
                                  <input class="form-check-input facility" type="checkbox" value="Roof" name="facilities[]">
                                  <label class="form-check-label">Roof</label>
                                </div>
                                <div class="form-check col-12 col-md-4 col-lg-3">
                                  <input class="form-check-input facility" type="checkbox" value="Loft" name="facilities[]">
                                  <label class="form-check-label">Loft</label>
                                </div>
                                <div class="form-check col-12 col-md-4 col-lg-3">
                                  <input class="form-check-input facility" type="checkbox" value="Garage" name="facilities[]">
                                  <label class="form-check-label">Garage</label>
                                </div>
                            </div>

                            <div class="form-group mt-3">
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
                                <label class="control-label">VR URLs</label>
                                @if ($property->vr_url)
                                    @foreach ($property->vr_url as $key => $url)
                                        <div class="url-controls" style="margin-bottom:10px;">
                                            <div class="url-entry input-group col-sm-12 col-md-12" style="padding:0;">
                                                <input class="form-control" name="originURLs[]" value="{{$url}}">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger btn-remove-url" type="button">
                                                    <i class="fas fa-minus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                    <br>
                                @endif

                                <div class="url-controls">
                                    <div class="url-entry input-group col-sm-12 col-md-12" style="padding:0;">
                                        <input class="form-control" name="URLs[]">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success btn-add-url" type="button">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="completionDate">Date of Completion</label>
                                <input type="text" class="form-control" name="completedDate" value="{{$property->completed_date ? $property->completed_date :''}}" autocomplete="off" placeholder="Expected Date">
                            </div>


                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency">Currency</label>
                                        <select class="form-control" name="currency" required>
                                            <option {{$property->currency =='AUD' ? 'selected' : ''}}>AUD</option>
                                            <option {{$property->currency =='AED' ? 'selected' : ''}}>AED</option>
                                            <option {{$property->currency =='GBP' ? 'selected' : ''}}>GBP</option>
                                            <option {{$property->currency =='HKD' ? 'selected' : ''}}>HKD</option>
                                            <option {{$property->currency =='RMB' ? 'selected' : ''}}>RMB</option>
                                            <option {{$property->currency =='USD' ? 'selected' : ''}}>USD</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please specify the currency.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price Start From</label>
                                        <input type="number" class="form-control" name="price" autocomplete="off" value="{{$property->price}}" required>
                                        <div class="invalid-feedback">
                                            Please specify the price.
                                        </div>
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
                            <div class="form-group mt-2">
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


                            <div class="table-wrapper">
                                <div class="table-title">
                                    <div class="row">
                                        <div class="col-sm-6">Project Property Details</div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <select class="form-control" name="measure" required>
                                                    <option {{$property->measurement =='sq ft' ? 'selected' : ''}}>sq ft</option>
                                                    <option {{$property->measurement =='m²' ? 'selected' : ''}}>m&#178;</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please specify the unit.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="button" class="btn btn-info add-new" id="add-new-btn"><i class="fa fa-plus"></i> Add New</button>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th><img src="{{ url('img/table-icons/units.jpg') }}"></th>
                                            <th><img src="{{ url('img/table-icons/bedrooms.jpg') }}"></th>
                                            <th><img src="{{ url('img/table-icons/bathrooms.jpg') }}"></th>
                                            <th><img src="{{ url('img/table-icons/carpark.jpg') }}"></th>
                                            <th><img src="{{ url('img/table-icons/price.jpg') }}"></th>
                                            <th><img src="{{ url('img/table-icons/availability.jpg') }}"></th>
                                            <th><img src="{{ url('img/table-icons/layout-header.jpg') }}"></th>
                                            <th><img src="{{ url('img/table-icons/images.jpg') }}"></th>
                                            <th><img src="{{ url('img/table-icons/size.jpg') }}"></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list-table">
                                        <tr hidden>
                    						<td>99</td>
                    						<td>99</td>
                    						<td>99</td>
                    						<td>99</td>
                    						<td>99</td>
                    						<td>99</td>
                    						<td>99</td>
                    						<td>99</td>
                    						<td>99</td>
                    						<td>
                    							<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                    							<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                    							<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    						</td>
                    					</tr>

                                        @if($property->project_property_list)
                                            @foreach ($property->project_property_list as $index => $row)
                                                <tr>
                                                    <td><input readonly type="text" class="form-control" name="originList[{{$index}}][unit]" value="{{$row->unit}}"></td>
                                                    <td><input readonly type="text" class="form-control" name="originList[{{$index}}][bedroom]" value="{{$row->bedroom}}"></td>
                                                    <td><input readonly type="text" class="form-control" name="originList[{{$index}}][bathroom]" value="{{$row->bathroom}}"></td>
                                                    <td><input readonly type="text" class="form-control" name="originList[{{$index}}][carpark]" value="{{$row->carpark}}"></td>
                                                    <td><input readonly type="text" class="form-control" name="originList[{{$index}}][price]" value="{{$row->price}}"></td>
                                                    <td>
                                                        <select class="form-control" name="originList[{{$index}}][availability]">
                                                            <option {{$row->availability =='Available' ? 'selected' : ''}} value="Available">Available</option>
                                                            <option {{$row->availability =='Presale' ? 'selected' : ''}} value="Presale">Presale</option>
                                                            <option {{$row->availability =='Sold' ? 'selected' : ''}} value="Sold">Sold</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myLayout-{{$index}}">View</button>

                                                        <div class="modal" id="myLayout-{{$index}}" data-backdrop="static" data-keyboard="false">
                                                            <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                                                                <div class="modal-content">

                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Property Layout</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                        @if(!empty($row->layouts))
                                                                            @foreach ($row->layouts as $key => $picture)
                                                                                @if($key == 0)
                                                                                    <div class="col-12 imgUp">
                                                                                        <div class="imagePreview" style="background:url( {{url('storage/projects/'.$property->property_code.'/layouts'.'/'.$picture)}} ); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
                                                                                        <input name="originList[{{$index}}][layouts][]" value="{{$picture}}" hidden>
                                                                                        <i class="fa fa-times del"></i>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="col-sm-6 imgUp">
                                                                                        <div class="imagePreview" style="background:url( {{url('storage/projects/'.$property->property_code.'/layouts'.'/'.$picture)}} ); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
                                                                                        <input name="originList[{{$index}}][layouts][]" value="{{$picture}}" hidden>
                                                                                        <i class="fa fa-times del"></i>
                                                                                    </div>
                                                                                @endif
                                                                                <input name="originList[{{$index}}][allLayouts][]" value="{{$picture}}" hidden>

                                                                            @endforeach

                                                                        @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                      {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> --}}
                                                                      <div class="upload-btn-wrapper col-3"><button class="btn">Upload Image</button><input type="file" accept="image/*" name="originList[{{$index}}][layout][]"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>

                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myView-{{$index}}">View</button>

                                                        <div class="modal" id="myView-{{$index}}" data-backdrop="static" data-keyboard="false">
                                                            <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                                                                <div class="modal-content">

                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Property View</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                        @if(!empty($row->views))
                                                                            @foreach ($row->views as $key => $picture)
                                                                                @if($key == 0)
                                                                                    <div class="col-sm-6 imgUp">
                                                                                        <div class="imagePreview" style="background:url( {{url('storage/projects/'.$property->property_code.'/views'.'/'.$picture)}} ); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
                                                                                        <input name="originList[{{$index}}][views][]" value="{{$picture}}" hidden>
                                                                                        <i class="fa fa-times del"></i>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="col-sm-6 imgUp">
                                                                                        <div class="imagePreview" style="background:url( {{url('storage/projects/'.$property->property_code.'/views'.'/'.$picture)}} ); background-position: center center; background-size: cover; background-repeat: no-repeat;"></div>
                                                                                        <input name="originList[{{$index}}][views][]" value="{{$picture}}" hidden>
                                                                                        <i class="fa fa-times del"></i>
                                                                                    </div>
                                                                                @endif
                                                                                <input name="originList[{{$index}}][allViews][]" value="{{$picture}}" hidden>
                                                                            @endforeach
                                                                        @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                      {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> --}}
                                                                      <div class="upload-btn-wrapper col-3"><button class="btn">Upload Images</button><input type="file" accept="image/*" name="originList[{{$index}}][view][]" multiple></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td><input readonly type="text" class="form-control" name="originList[{{$index}}][size]" value="{{$row->size}}"></td>
                                                    <td>
                                                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
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
            .url-entry:not(:first-of-type)
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

            // URLs
            $(document).on('click', '.btn-add-url', function(e)
            {
                e.preventDefault();

                var controlForm = $('.url-controls:first'),
                    currentEntry = $(this).parents('.url-entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input').val('');
                controlForm.find('.url-entry:not(:last) .btn-add-url')
                    .removeClass('btn-add-url').addClass('btn-remove-url')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<i class="fas fa-minus"></i>');
            }).on('click', '.btn-remove-url', function(e)
            {
              $(this).parents('.url-entry:first').remove();

                e.preventDefault();
                return false;
            });


            // checked more facilities
            let facilities = {!! json_encode($property->facilities) !!};
            let facilityGroup = document.querySelectorAll(".facility");

            for (var i = 0; i < facilityGroup.length; i++) {
                if (facilities && facilities.length) {
                    for (var j = 0; j < facilities.length; j++) {
                        if ( facilityGroup[i].value == facilities[j] ) {
                            facilityGroup[i].checked = true;
                        }
                    }
                }
            }

            // // Add the following code if you want the name of the file appear on select
            // $(".custom-file-input").on("change", function() {
            //     var fileName = $(this).val().split("\\").pop();
            //     $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            // });
        });
        </script>



        <style type="text/css">
        	/* body {
        		color: #404E67;
        		background: #F5F7FA;
        		font-family: 'Open Sans', sans-serif;
        	} */
        	th, td {
        		text-align: center;
        	}
        	th>img {
        		height: 60%;
        	}
        	td>img {
        		height: 40%;
        	}
        	tbody tr:hover{
        		background-color:#f5f5f5;
        	}
        	.table-wrapper {
        		/* margin: 30px auto;
        		background: #fff;
        		padding: 20px; */
        		box-shadow: 0 1px 1px rgba(0,0,0,.05);
        	}
        	.table-title {
        		padding-bottom: 10px;
        		margin: 0 0 10px;
        	}
        	.table-title h2 {
        		margin: 6px 0 0;
        		font-size: 22px;
        	}
        	.table-title .add-new {
        		float: right;
        		height: 30px;
        		font-weight: bold;
        		font-size: 12px;
        		text-shadow: none;
        		min-width: 100px;
        		border-radius: 50px;
        		line-height: 13px;
        	}
        	.table-title .add-new i {
        		margin-right: 4px;
        	}
        	table.table {
        		table-layout: fixed;
        	}
        	table.table tr th, table.table tr td {
        		border-color: #e9e9e9;
        	}
        	table.table th i {
        		font-size: 13px;
        		margin: 0 5px;
        		cursor: pointer;
        	}
        	table.table th:last-child {
        		width: 100px;
        	}
        	table.table td a {
        		cursor: pointer;
        		display: inline-block;
        		margin: 0 5px;
        		min-width: 24px;
        	}
        	table.table td a.add {
        		color: #27C46B;
        	}
        	table.table td a.edit {
        		color: #FFC107;
        	}
        	table.table td a.delete {
        		color: #E34724;
        	}
        	table.table td i {
        		font-size: 19px;
        	}
        	table.table td a.add i {
        		font-size: 24px;
        		margin-right: -1px;
        		position: relative;
        		top: 3px;
        	}
        	table.table .form-control {
        		height: 32px;
        		line-height: 32px;
        		box-shadow: none;
        		border-radius: 2px;
        	}
        	table.table .form-control.error {
        		border-color: #f50000;
        	}
        	table.table td .add {
        		display: none;
        	}

        	.upload-btn-wrapper {
        		position: relative;
        		overflow: hidden;
        		display: inline-block;
        	}

        	table .btn {
        		border: 2px solid gray;
        		color: gray;
        		background-color: white;
        		padding: 4px 6px;
        		border-radius: 8px;
        		font-size: 14px;
        		font-weight: bold;
        	}

        	.upload-btn-wrapper input[type=file] {
        		font-size: 100px;
        		position: absolute;
        		left: 0;
        		top: 0;
        		opacity: 0;
        	}
            .list-table  td  input{
                width: 100% !important;
            }

            .list-table  td  .error{
                font-size: 1rem !important;
            }
        </style>
        <script type="text/javascript">
        	$(document).ready(function(){
        		$('[data-toggle="tooltip"]').tooltip();
        		var actions = $("table td:last-child").html();
          // Append table with add row form on add new button click
          $(".add-new").click(function(){
          	$(this).attr("disabled", "disabled");
          	var index = $("table tbody tr:last-child").index();
          	var row = '<tr>' +
          	'<td><input type="text" class="form-control" name="list['+ index +'][unit]" ></td>' +
          	'<td><input type="text" class="form-control" name="list['+ index +'][bedroom]" ></td>' +
          	'<td><input type="text" class="form-control" name="list['+ index +'][bathroom]" ></td>' +
          	'<td><input type="text" class="form-control" name="list['+ index +'][carpark]" ></td>' +
          	'<td><input type="text" class="form-control" name="list['+ index +'][price]" ></td>' +
          	'<td><select class="form-control" name="list['+ index +'][availability]"><option value="Available">Available</option><option value="Presale">Presale</option><option value="Sold">Sold</option></select></td>' +
          	// '<td><input type="text" class="form-control" name="list[row'+ index +'][availability]" ></td>' +
          	'<td><div class="upload-btn-wrapper"><button class="btn">Upload</button><input type="file" accept="image/*" name="list['+ index +'][layout][]" ></div></td>' +
          	'<td><div class="upload-btn-wrapper"><button class="btn">Upload</button><input type="file" accept="image/*" name="list['+ index +'][view][]" multiple></div></td>' +
          	'<td><input type="text" class="form-control" name="list['+ index +'][size]" ></td>' +
          	'<td>' + actions + '</td>' +
          	'</tr>';
          	$("table").append(row);
          	$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
          	$('[data-toggle="tooltip"]').tooltip();
          });
          // Add row on add button click
          $(document).on("click", ".add", function(){
          	var empty = false;
          	var input = $(this).parents("tr").find('input[type="text"]');
          	input.each(function(){
          		if(!$(this).val()){
          			$(this).addClass("error");
          			empty = true;
          		} else{
          			$(this).removeClass("error");
          		}
          	});
          	$(this).parents("tr").find(".error").first().focus();
          	if(!empty){
          		input.each(function(){
          			// $(this).parent("td").html($(this).val());
          			$(this).parent("td").find("input").prop('readonly', true);
          		});
          		$(this).parents("tr").find(".add, .edit").toggle();
          		$(".add-new").removeAttr("disabled");
          	}
          });
          // Edit row on edit button click
          $(document).on("click", ".edit", function(){
          	$(this).parents("tr").find("td:not(:last-child)").each(function(){
          		console.log($(this));
          		$(this).find("input").prop('readonly', false);
          		// $(this).parent("tr").find("td").find("input").removeAttr("disabled");


          		// $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
          	});
          	$(this).parents("tr").find(".add, .edit").toggle();
          	$(".add-new").attr("disabled", "disabled");
          });
          // Delete row on delete button click
          $(document).on("click", ".delete", function(){
          	$(this).parents("tr").remove();
          	$(".add-new").removeAttr("disabled");
          });

          document.getElementById("add-new-btn").click();
        });
        </script>


@stop
