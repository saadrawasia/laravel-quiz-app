@extends('layouts.app')
@section('content')
<h2>{{$quiz->quiz_name}}</h2>
<?php
    $marks=0;
    $question_length=count($question);
        $answer_length=count($answers);
    foreach($question as $question)
    {
        $question = $question->correct_ans;

        foreach($answers as $answer)
        {
            $answer_user_id = $answer['user_id'];
            $answer=$answer['ans'];
            //echo $answer_user_id;
            if($user->id == $answer_user_id)
            {
                if($answer == $question)
                {
                    $marks++;
                }
            }
        }

    }
    if($marks && ($question_length == $answer_length))
    {
        echo "Marks: ".$marks;
    }
    else{
        echo "Please, complete the quiz.";
    }

?>
<hr>
@stop

