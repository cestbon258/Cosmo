@extends('layouts.app')

@section('title', 'Properties')

@section('content')
    <div class="container-fluid">

        <div class="col">
            @include('layouts.alert')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard', app()->getLocale())}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Users</li>
                </ol>
            </nav>


            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="new-user-tab" data-toggle="tab" href="#" role="tab" aria-controls="new-user" aria-selected="true">New Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="inactive-user-tab" data-toggle="tab" href="#" role="tab" aria-controls="inactive-user" aria-selected="false">Inactive Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="active-user-tab" data-toggle="tab" href="#" role="tab" aria-controls="active-user" aria-selected="false">Active Users</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="new-user" role="tabpanel" aria-labelledby="new-user-tab">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <table id="new-user-table" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>Phone Number</th>
                                        <th>Created at</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td> {{$user->name}} </td>
                                            <td> {{$user->email}} </td>
                                            <td>
                                                @if ($user->role == 0)
                                                    Admin
                                                @elseif ($user->role == 1)
                                                    Agent
                                                @elseif ($user->role == 2)
                                                    Landlord
                                                @elseif ($user->role == 3)
                                                    Investor
                                                @else
                                                    Renter
                                                @endif
                                            </td>
                                            <td> {{$user->phone_no}} </td>
                                            <td> {{$user->email_verified_at}}  </td>
                                            <td>
                                                <form id="u-{{$user->email}}" action="{{ route('update-status', app()->getLocale()) }}" method="POST" class="update-status-form">
                                                    @csrf
                                                    <input name="email" value="{{$user->email}}" hidden>
                                                    <input name="status" value="{{$user->active_status}}" hidden>
                                                    <input name="to" value="approve" hidden>
                                                    <input name="name" value="{{$user->name}}" hidden>
                                                    <button type="submit" class="btn btn-outline-primary btn-sm">Approve</button></td>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="u-{{$user->email}}" action="{{ route('delete-user', app()->getLocale()) }}" method="POST" class="delete-user-form">
                                                    @csrf
                                                    <input name="email" value="{{$user->email}}" hidden>
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button></td>
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
        </div>
    </div>


    <script>


    $(document).ready(function() {
        $('#new-user-table').DataTable({
            "columnDefs": [ {
                  "targets": [5, 6],
                  "orderable": false,
            } ],
            // "responsive": true,
            "scrollX": true,
            // "select": true
        });



        $( ".delete-user-form" ).submit(function( event ) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this user?')){
                this.submit();
            }
        });


        var url_string = window.location.href; //window.location.href
        var url = new URL(url_string);

        // Flip tags
        $('#new-user-tab').click(function(){
            window.location.assign(url.origin+url.pathname+'?tab=1');
        })
        $('#inactive-user-tab').click(function(){
            window.location.assign(url.origin+url.pathname+'?tab=2');
        })
        $('#active-user-tab').click(function(){
            window.location.assign(url.origin+url.pathname+'?tab=3');
        })

    } );





    </script>

    <style>

    </style>

@stop
