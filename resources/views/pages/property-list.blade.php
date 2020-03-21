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
                                    <td>Yes</td>
                                    <td>
                                        <a href="{{ url('edit-property/'.$property->house_code) }}"><button type="button" class="btn btn-outline-primary btn-sm">Edit</button></a>

                                        <a href="property/{{$property->house_code}}"><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a>
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
                  "targets": [5],
                  "orderable": false,
            } ],
            // "responsive": true,
            "scrollX": true,
            // "select": true
        });

    } );

    </script>

@stop
