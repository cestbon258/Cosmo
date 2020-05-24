@extends('layouts.app')

@section('title', 'Properties')

@section('content')
    <div class="container-fluid">

        <div class="col">
            @include('layouts.alert')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard', app()->getLocale())}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Favorites</li>
                </ol>
            </nav>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Favorites</h6>
                </div>
                <div class="card-body">
                    <table id="propert-table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name of Property</th>
                                <th>Price</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $key => $property)
                                <tr>
                                    <td> {{$property->title}} </td>
                                    <td> {{$property->price}} </td>

                                    <td>
                                        {{-- @if ($property->project_type == 1) --}}
                                            <a href="{{ route('property', [app()->getLocale(), $property->property_code]) }}"><button type="button" class="btn btn-outline-primary btn-sm">View</button></a>

                                        {{-- @else
                                            <a href="{{ route('property', [app()->getLocale(), $property->property_code]) }}"><button type="button" class="btn btn-outline-primary btn-sm">View</button></a>
                                        @endif --}}
                                    </td>
                                    <td>
                                        {{-- @if ($property->project_type == 1)
                                            <form action="{{ route('delete-property', app()->getLocale()) }}" method="POST" class="delete-form">
                                                @csrf
                                                <input name="property" value="{{$property->property_code}}" hidden>
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button></td>
                                            </form>
                                        @else --}}
                                            <form action="{{ route('unlike_this', app()->getLocale()) }}" method="POST" class="delete-form">
                                                @csrf
                                                <input name="propertyID" value="{{$property->property_id}}" hidden>
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button></td>
                                            </form>
                                        {{-- @endif --}}
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
                  "targets": [2, 3],
                  "orderable": false,
            } ],
            // "responsive": true,
            "scrollX": true,
            // "select": true
        });


        $( ".delete-form" ).submit(function( event ) {
            event.preventDefault();
            if (confirm('Are you sure you want to remove this property/project from favorites?')){
                this.submit();
            }
        });


    } );
    </script>
@stop
