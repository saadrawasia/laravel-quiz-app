@extends('layouts.app')
@section('content')
    <h1>Marks</h1>
    <hr>
    @foreach($quiz as $quiz)
        <a href="{{url('/answers',$quiz->id)}}"><h2>{{$quiz->quiz_name}}</h2></a>

        <hr>
    @endforeach


@stop