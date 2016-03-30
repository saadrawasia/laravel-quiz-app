@extends('layouts.app')
@section('content')
    <h1>Edit: {!! $quiz->quiz_name !!} </h1>
    {!! Form::model($quiz,['method'=>'PATCH','action'=>['QuizController@update',$quiz->id]]) !!}
    <div class="form-group">
        {!! Form::label('quiz_name','Name:') !!}
        {!! Form::text('quiz_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Quiz',['class'=>'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
@stop