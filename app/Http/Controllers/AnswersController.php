<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Http\Requests\AnswersRequest;
use App\Questions;
use App\Quiz;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $quiz=Quiz::orderBy('id','ASC')->get();

        return view('answer.index',compact('quiz'));
    }
    public function create()
    {
        $quiz=Quiz::lists('quiz_name','id');
        $question=Questions::lists('question','id');

        return view('answer.index');
    }
    public function store(Request $request)
    {
       $ans = json_decode($request['data']);
       // $check=0;
        foreach($ans as $ans)
        {
           $answer= Answers::create([ 'quiz_id'=>$ans->quiz_id,
                        'question_id'=>$ans->question_id,
                        'ans'=>$ans->ans,
                        'user_id'=>$ans->user_id,
            ]);

        }
        //print_r(json_decode($request['data']));
        /*$a= file_get_contents("php://input");
        $b=
        dd($request);
        $answer=Answers::create([ 'quiz_id'=>$request['quiz_id'],
                                'question_id'=>$request['question_id'],
                                    'ans'=>$request['ans'],
                                    'user_id'=>$request['user_id'],

        ]);*/
       // return redirect ('quiz');

    }
    public function show($id)
    {
        $quiz=Quiz::findOrFail($id);
        $question=Questions::where('quiz_id','=',$quiz->id)->get();
        $user=Auth::user();
        $answers=Answers::where('quiz_id','=',$quiz->id)->where('user_id','=',$user->id)->get();

        //dd($answers);

        return view('answer.show',compact('question','answers','user','quiz'));
    }

}
