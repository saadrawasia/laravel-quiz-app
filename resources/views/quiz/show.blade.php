@extends('layouts.app')
@section('content')
    <h1>{{$quiz->quiz_name}}</h1>
   {!! Form::model($answer = new \App\Answers,['id'=>'form']) !!}

    @foreach($question as $question)
        <div class="next">
            <p>Q: {{$question->question}}</p>
            {{ Form::radio('ans', 0,false,array('id'=>'ans-0')) }} {{ Form::label('ans', $question->opt1) }}<br>
            {{ Form::radio('ans', 1,false,array('id'=>'ans-1')) }} {{ Form::label('ans', $question->opt2) }}<br>
            {{ Form::radio('ans', 2,false,array('id'=>'ans-2')) }} {{ Form::label('ans', $question->opt3) }}<br>
            {{ Form::radio('ans', 3,false,array('id'=>'ans-3')) }} {{ Form::label('ans', $question->opt4) }}<br>
            {{Form::hidden('question_id',$question->id)}}
            {{Form::hidden('quiz_id',$quiz->id)}}
            {{Form::hidden('user_id',$user->id)}}

            <hr/>
        </div>

    @endforeach()
    {{Form::label('error',"Some error occurred, Please Try Again", array('id' => 'error'))}}
    <div class="form-group">
        {!! Form::submit('Submit',['class'=>'btn btn-primary form-control','id'=>'submit']) !!}
        {!! Form::button('Next',['class'=>'btn btn-primary form-control','id'=>'next']) !!}
    </div>

   {!! Form::close() !!}
@stop

@section('footer')
<script>
$(function () {
    $('#error').hide();
    var json="";
    $('#submit').hide();
    $('div.next').first().show();
    var questions =$('div.next').length;
    var question_id=[];
    var j=0;
    $('input:hidden[name=question_id] ').each(function(){
        question_id[j]=$(this).val();
        j++;
    });
/*    $('input:submit').attr('disabled','disabled');
    $("input[type='radio'][name='ans']").change(function(){
        $('input:submit').removeAttr('disabled');
    });*/
    var dataString=[];
    var $i=0;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#next').click(function (event) {
        $('#error').hide();
        var ans = $("input[type='radio'][name='ans']:checked").val();
        var quiz_id = $('input:hidden[name=quiz_id]').val();
        var user_id = $('input:hidden[name=user_id]').val();

        var data={
            'ans': ans,
            'question_id':question_id[$i],
            'quiz_id':quiz_id,
            'user_id':user_id
        };

        dataString.push(data);

        //dataString='ans=' + ans + '&question_id=' + question_id[$i] + '&quiz_id=' + quiz_id + '&user_id=' + user_id;



        $i++;
        $('div.next').hide().eq($i).show();

        //console.log(dataString);
        if (($i+1) == questions) {

            $('.btn').attr('value', 'Submit');

            return false;

        }
        if (!(($i) == questions)) {
            event.preventDefault();
           /* $('input:submit').attr('disabled', 'disabled');
            $("input[type='radio'][name='ans']").change(function () {
                $('input:submit').removeAttr('disabled');
            });*/
            /*$.ajax({
                type: "POST",
                url: "/laravel/quiz_app/public/answers",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                // data:asd,//keys,
                //contentType: "application/json",

                data: dataString,
                //async: false,
                //success:store,

                //cache: false
            });*/
           return false;
        }
        if((($i) == questions))
        {
            json=JSON.stringify(dataString);
            $('#submit').show();
            $('#next').hide();
            /*$.ajax({
                type: "POST",
                url: "/laravel/quiz_app/public/answers",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                // data:asd,//keys,
                //contentType: "application/json; charset=utf-8",
                data: json,
                //async: false,
                //success:store,

                //cache: false
            });*/

            console.log(json);
            return false;
        }
    });
    $('form').submit(function(event) {
        //event.preventDefault();
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)

        // process the form
        $.ajax({
                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url         : "/laravel/quiz_app/public/answers", // the url where we want to POST
                    data        : {'data':json}, // our data object
                    dataType    : 'json', // what type of data do we expect back from the server
                    encode          : true,
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                })
                // using the done promise callback
                .success (function(data) {
                    location.href="http://www.google.com";
                })
                .error (function(data) {
                    $('#error').show();
                    if( data.status === 422 ) {
                        console.log(data);
                    }
                    if( data.status === 500 ) {
                        console.log(data);
                    }
                });

        // stop the form from submitting the normal way and refreshing the page


    });

});
</script>
@stop