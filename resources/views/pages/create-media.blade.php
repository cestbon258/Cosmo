@extends('layouts.app')

@section('title', 'Media')

@section('content')

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
                    <li class="breadcrumb-item"><a href="{{ route('dashboard', app()->getLocale()) }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Media</li>
                </ol>
            </nav>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Media</h6>
                </div>
                <div class="card-body">

                    <table id="media-table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>URL</th>
                                <th>Title</th>
                                <th>Upload Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <form enctype="multipart/form-data" method="POST" action="{{ route('create-media', app()->getLocale()) }}" class="needs-validation" novalidate>
                                    @csrf
                                    <th><input type="text" class="form-control" name="title" autocomplete="off" placeholder="Title" required></th>
                                    <th><input type="text" class="form-control" name="url" autocomplete="off" placeholder="Link" required></th>
                                    <th><input type="date" class="form-control" name="time" autocomplete="off" required></th>
                                    <th><button type="submit" class="btn btn-primary btn-sm">Add</button></th>
                                </form>
                            </tr>

                            @foreach ($data as $key => $value)
                                <tr>
                                    <form id="form-edit-{{$key}}" enctype="multipart/form-data" method="POST" action="{{ route('update-media', app()->getLocale()) }}" class="needs-validation" novalidate>
                                        @csrf

                                        <th class="text"><input type="text" class="form-control" name="title" value="{{$value->title}}" required readonly></th>
                                        <th class="text"><input type="text" class="form-control" name="url" value="{{$value->url}}" required readonly></th>
                                        <th class="date"><input type="date" class="form-control" name="time" value="{{$value->uploaded_date}}" required readonly></th>
                                        <th style="width:15%;">
                                            <input name="mediaID" value="{{$value->id}}" hidden>
                                            <button type="button" class="btn btn-outline-secondary btn-sm edit-btn">Edit</button>
                                            <button type="submit" class="btn btn-outline-primary btn-sm" style="display:none;">Save</button>
                                            <button id="delete-btn" type="submit" name="delete" class="btn btn-outline-danger btn-sm" style="display:none;">Delete</button>
                                        </th>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    {{-- <div class="form-group">
                        <label for="title">Title of Media</label>
                        <input type="text" class="form-control" name="title" autocomplete="off" placeholder="Title" required>
                        <div class="invalid-feedback">
                            Please input a title.
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="url">Media Link</label>
                        <input type="text" class="form-control" name="url" autocomplete="off" placeholder="Link">
                    </div>

                    <div class="form-group">
                        <label for="date">Date of Upload</label>
                        <input type="month" class="form-control" name="time" autocomplete="off">
                        <div class="invalid-feedback">
                            Please specify the year.
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Create</button> --}}

                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            var t = $('#media-table').DataTable({
                "columnDefs": [ {
                      "targets": [3],
                      "orderable": false,
                } ],
                // "responsive": true,
                "scrollX": true,
                // "select": true
            });


            $( ".delete-form" ).submit(function( event ) {
                event.preventDefault();
                if (confirm('Are you sure you want to delete this record?')){
                   this.submit();
                }
            });
        });

        $('.edit-btn').click(function() {
            $(this).hide();

            var form = $(this).parent().parent();
            form.find('.text').each(function() {
                $(this).find('input').prop('readonly', false);
            });
            form.find('.date').each(function() {
                $(this).find('input').prop('readonly', false);
            });

            form.find('#delete-btn').show();

            // form.find('.is_public div').show();
            // form.find('.status span').hide();
            // form.find('.status select').show();
            // var gender = form.find('.gender').attr('data-gender');
            // form.find('.gender span').hide();
            // form.find('.gender div').show();
            // form.find('.gender div select').val(gender);
            // var countryCode = form.find('.country_code').attr('data-code');
            // form.find('.country_code span').hide();
            // form.find('.country_code div').show();
            // form.find('.country_code div select').val(countryCode);
            // form.find('.colour_code div.read-only').hide();
            // form.find('.colour_code div.editable').show();
            $(this).next().show();
        })


    </script>
@stop
