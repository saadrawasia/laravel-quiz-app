@extends('app')
@section('content')
    <h1>All Questions</h1>
    <hr>
    @foreach($question as $question)
    <h3>{{$question->question}}</h3>
    {!! Form::open([
              'method' => 'GET',
              'route' => ['question.edit', $question->id]
            ]) !!}
    {!! Form::submit('Edit', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
    {!! Form::open([
            'method' => 'DELETE',
            'route' => ['question.destroy', $question->id]
          ]) !!}
    {!! Form::submit('Delete?', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    <hr>
    @endforeach
@stop
