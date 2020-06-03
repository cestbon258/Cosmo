@extends('layouts.app')

@section('title', 'Properties')

@section('content')
    <div class="container-fluid">

        <div class="col">
            @include('layouts.alert')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard', app()->getLocale())}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Properties</li>
                </ol>
            </nav>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Properties</h6>
                </div>
                <div class="card-body">
                    <table id="propert-table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                @if (Auth::user()->role == 0)
                                    <th>Creator</th>
                                @endif
                                <th>Name of Property</th>
                                <th>Is Project</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Is Public</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $key => $property)
                                <tr>
                                    @if (Auth::user()->role == 0)
                                        <td>{{$property->email}}</td>
                                    @endif
                                    <td> {{$property->title}} </td>
                                    <td> {{$property->project_type == 1 ? 'No' : 'Yes'}} </td>
                                    <td> {{$property->address}} </td>
                                    <td>
                                        <select onchange="updateProjectStatus(this, '{{$property->property_code}}')">
                                            <option {{$property->project_status =='Completed' ? 'selected' : ''}}>Completed</option>
                                            <option {{$property->project_status =='Off plan' ? 'selected' : ''}}>Off plan</option>
                                            <option {{$property->project_status =='Sold out' ? 'selected' : ''}}>Sold out</option>
                                        </select>
                                    </td>
                                    <td>
                                        @if (Auth::user()->role == 0)
                                            <label class="switch">
                                                <input type="checkbox" {{$property->status == 1 ? "checked" : ''}} onchange="event.preventDefault();
                                                document.getElementById('publish-{{$property->id}}').submit();">
                                                <span class="slider round"></span>
                                            </label>
                                            <form id="publish-{{$property->id}}" action="{{ route('publish-property', app()->getLocale()) }}" method="POST" style="display: none;">
                                                @csrf
                                                <input name="publish" value="{{$property->status}}" hidden>
                                                <input name="propertyCode" value="{{$property->property_code}}" hidden>
                                            </form>
                                        @else
                                            <span>{{$property->status == 1 ? 'Approved' : 'Pending'}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($property->project_type == 1)
                                            <a href="{{ route('edit-property', [app()->getLocale(), $property->property_code]) }}"><button type="button" class="btn btn-outline-primary btn-sm">Edit</button></a>

                                        @else
                                            <a href="{{ route('edit-project', [app()->getLocale(), $property->property_code]) }}"><button type="button" class="btn btn-outline-primary btn-sm">Edit</button></a>
                                        @endif

                                        {{-- <a href="property/{{$property->property_code}}"><button type="button" class="btn btn-outline-danger btn-sm" >Delete</button></a> --}}

                                    </td>
                                    <td>
                                        @if ($property->project_type == 1)

                                            {{-- <a href="{{ route('delete-property', app()->getLocale()) }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('pid-{{$property->id}}').submit();">
                                                <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
                                            </a> --}}

                                            <form id="pid-{{$property->id}}" action="{{ route('delete-property', app()->getLocale()) }}" method="POST" class="delete-form">
                                                @csrf
                                                <input name="property" value="{{$property->property_code}}" hidden>
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button></td>
                                            </form>
                                        @else
                                            {{-- <a href="{{ route('delete-project', app()->getLocale()) }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('pid-{{$property->id}}').submit();">
                                                <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
                                            </a> --}}

                                            <form id="pid-{{$property->id}}" action="{{ route('delete-project', app()->getLocale()) }}" method="POST" class="delete-form">
                                                @csrf
                                                <input name="property" value="{{$property->property_code}}" hidden>
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button></td>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>


    $(document).ready(function() {
        $('#propert-table').DataTable({
            "columnDefs": [ {
                  "targets": [1, 4, 5, 6, 7],
                  "orderable": false,
            } ],
            // "responsive": true,
            "scrollX": true,
            // "select": true
        });


        $( ".delete-form" ).submit(function( event ) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this property/project?')){
                this.submit();
            }
        });

    } );

    function updateProjectStatus(self, propertyCode) {
        $.ajax({
               type:'get',
               url: '{{ route('update_project_status', app()->getLocale())}}',
               data: { propertyCode: propertyCode, status: self.value},
               dataType: "json",
               success:function(data) {
                   console.log(data);
               },
               error:function() {
               }
        });
        console.log(self.value);
        console.log(propertyCode);
    }




    </script>

    <style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2ecc71;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2ecc71;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }

    </style>

@stop
