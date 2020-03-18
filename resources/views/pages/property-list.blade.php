@extends('layouts.app')

@section('title', 'My Property')

@section('content')
    <table>
        <td>Title</td>
        <td>House Code</td>
        <tbody>
            @foreach ($properties as $key => $value)
                <th><a href="property/{{$value->house_code}}"> {{$value->title}}</a></th>
                <th></th>
            @endforeach
        </tbody>
    </table>

@stop
