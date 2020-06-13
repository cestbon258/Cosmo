@extends('layouts.app')

@section('title', 'Video List')

@section('content')
    <div class="container-fluid">

        <div class="col">
            @include('layouts.alert')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard', app()->getLocale())}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Videos</li>
                </ol>
            </nav>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Videos</h6>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <a  href="{{ route('create-video', app()->getLocale()) }}">
                        <i class="fas fa-plus-circle"></i>
                        <span>Create Video</span></a>
                    </div>
                    <hr>
                    <table id="video-table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Developer</th>
                                <th>Date of Upload</th>
                                <th>Is Public</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $video)
                                <tr>
                                    <td>{{$video->developer}}</td>
                                    <td>{{$video->created_at}}</td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" {{$video->status == 1 ? "checked" : ''}} onchange="event.preventDefault();
                                            document.getElementById('publish-{{$video->id}}').submit();">
                                            <span class="slider round"></span>
                                        </label>
                                        <form id="publish-{{$video->id}}" action="{{ route('publish-video', app()->getLocale()) }}" method="POST" style="display: none;">
                                            @csrf
                                            <input name="publish" value="{{$video->status}}" hidden>
                                            <input name="videoCode" value="{{$video->video_code}}" hidden>
                                        </form>
                                    </td>
                                    <td style="width:108px;">

                                        <a href="{{ route('edit-video', [app()->getLocale(), $video->video_code]) }}"><button type="button" class="btn btn-outline-primary btn-sm">Edit</button></a>

                                        <form style="display:inline-block;" id="pid-{{$video->id}}" action="{{ route('delete-video', app()->getLocale()) }}" method="POST" class="delete-form">
                                            @csrf
                                            <input name="video" value="{{$video->video_code}}" hidden>
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


    <script>


    $(document).ready(function() {
        $('#video-table').DataTable({
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
            if (confirm('Are you sure you want to delete this video?')){
                this.submit();
            }
        });

    } );

    // function updateProjectStatus(self, propertyCode) {
    //     $.ajax({
    //            type:'get',
    //            url: '{{ route('update_project_status', app()->getLocale())}}',
    //            data: { propertyCode: propertyCode, status: self.value},
    //            dataType: "json",
    //            success:function(data) {
    //                console.log(data);
    //            },
    //            error:function() {
    //            }
    //     });
    //     console.log(self.value);
    //     console.log(propertyCode);
    // }




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
