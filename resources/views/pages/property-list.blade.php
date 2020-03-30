@extends('layouts.app')

@section('title', 'Properties')

@section('content')
    <div class="container">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Properties</h6>
                </div>
                <div class="card-body">
                    <table id="propert-table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name of Property</th>
                                <th>Purpose for</th>
                                <th>Address</th>
                                <th>Date Modified</th>
                                <th>Is Published</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $key => $property)
                                <tr>
                                    <td> {{$property->title}} </td>
                                    <td> {{$property->purpose}} </td>
                                    <td> {{$property->address}} </td>
                                    <td> {{$property->updated_at}} </td>
                                    <td>
                                        @if (Auth::user()->role == 0)
                                            <label class="switch">
                                                <input type="checkbox" {{$property->status == 1 ? "checked" : ''}}>
                                                <span class="slider round"></span>
                                            </label>
                                        @else
                                            <span>{{$property->status == 1 ? 'Approved' : 'Pending'}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('edit-property/'.$property->house_code) }}"><button type="button" class="btn btn-outline-primary btn-sm">Edit</button></a>

                                        {{-- <a href="property/{{$property->house_code}}"><button type="button" class="btn btn-outline-danger btn-sm" >Delete</button></a> --}}

                                        <a href="{{ route('delete-property') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('delete-property').submit();">
                                            <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </a>

                                        <form id="delete-property" action="{{ route('delete-property') }}" method="POST" style="display: none;">
                                            @csrf
                                            <input name="property" value="{{$property->house_code}}" hidden>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Confrim to delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>

    $(document).ready(function() {
        $('#propert-table').DataTable({
            "columnDefs": [ {
                  "targets": [5],
                  "orderable": false,
            } ],
            // "responsive": true,
            "scrollX": true,
            // "select": true
        });

    } );

    function deleteProperty(e) {
        console.log(e);
        e.preventDefault();
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
