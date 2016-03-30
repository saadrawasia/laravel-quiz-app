@extends('app')
@section('content')
    <h1>Add Question</h1>
    {!! Form::model($question = new \App\Questions,['url'=>'question']) !!}
    <div class="form-group">
        {!! Form::label('question','Question:') !!}
        {!! Form::text('question',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('opt1','Option 1:') !!}
        {!! Form::text('opt1',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('opt2','Option 2:') !!}
        {!! Form::text('opt2',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('opt3','Option 3:') !!}
        {!! Form::text('opt3',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('opt4','Option 4:') !!}
        {!! Form::text('opt4',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('correct_ans','Correct Answer') !!}
        {!! Form::select('correct_ans',[1,2,3,4],null,['id'=>'correct_ans','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('quiz_id','Quiz') !!}
        {!! Form::select('quiz_id',$quiz,null,['id'=>'quiz_id','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Add question',['class'=>'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
@stop