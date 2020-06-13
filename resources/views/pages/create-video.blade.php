@extends('layouts.app')

@section('title', 'Create Video')

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
                    <li class="breadcrumb-item"><a href="{{ route('video-list', app()->getLocale()) }}">All Videos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Video</li>
                </ol>
            </nav>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Create Video</h6>
                </div>
                <div class="card-body">


                    <form enctype="multipart/form-data" method="POST" action="{{ route('create-video', app()->getLocale()) }}" class="needs-validation" novalidate>
                        @csrf


                        <div class="form-group">
                            <label>Choose Developer</label>
                            <select class="form-control" name="developer" required>
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                            </select>
                            <div class="invalid-feedback">
                                Please specify the developer.
                            </div>
                        </div>

                        <div class="control-group mt-3" id="fields">
                            <label class="control-label">Upload Videos (Max. 20MB)</label>
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
                        <br><br>
                        <button type="submit" name="submit" class="btn btn-primary">Create</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <style>
    .entry:not(:first-of-type)
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
    });
    </script>
@stop
