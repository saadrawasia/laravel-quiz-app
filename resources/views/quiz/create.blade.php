@extends('layouts.app')
@section('content')
    <h1>Add Quiz</h1>
    {!! Form::model($quiz = new \App\Quiz,['url'=>'quiz']) !!}
    <div class="form-group">
        {!! Form::label('quiz_name','Name:') !!}
        {!! Form::text('quiz_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Add Quiz',['class'=>'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
@stop