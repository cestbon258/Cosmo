@extends('layouts.master')

@section('title', 'About Us')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css" />
@section('content')
    <div style="height:300px;"></div>
    {{-- <form method="POST" action="{{ route('create-property') }}">
        @csrf
        Name: <input name="name" value="aa house"><br>
        Size: <input name="size" value="43345"><br>
        Price: <input name="price" value="123"><br>
        <button type="submit" class="btn south-btn">Submit</button>
    </form> --}}
    <form enctype="multipart/form-data" method="POST" action="{{ route('create-property') }}">
        @csrf
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <button type="submit" class="btn south-btn">Submit</button>
    </form>
@stop
