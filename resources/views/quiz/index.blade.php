@extends('layouts.app')
@section('content')
    <h1>Quizzes</h1>
    <hr>
    @foreach($quiz as $quiz)
        <a href="{{url('/quiz',$quiz->id)}}"><h2>{{$quiz->quiz_name}}</h2></a>
        @if($user->role_id == 1)

            {!! Form::open([
                   'method' => 'GET',
                   'route' => ['quiz.edit', $quiz->id]
                 ]) !!}
            {!! Form::submit('Edit', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
            {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['quiz.destroy', $quiz->id]
                  ]) !!}
            {!! Form::submit('Delete?', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
        <hr>
    @endforeach
    @if($user->role_id == 1)
        {!! Form::open([
                    'method' => 'GET',
                    'route' => ['quiz.create']
                  ]) !!}
        {!! Form::submit('Add Quiz', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
        {!! Form::open([
                    'method' => 'GET',
                    'route' => ['question.create']
                  ]) !!}
        {!! Form::submit('Add Question', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
        {!! Form::open([
                    'method' => 'GET',
                    'route' => ['question.index']
                  ]) !!}
        {!! Form::submit('All Questions', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    @endif
        {!! Form::open([
                    'method' => 'GET',
                    'route' => ['answers.index']
                  ]) !!}
        {!! Form::submit('Marks', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}


@stop