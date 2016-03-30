<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Questions;
use App\Quiz;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $question = Questions::latest()->get();
      //  $quiz=Quiz::lists('quiz_name','id');
        return view('question.index',compact('question'));
    }
    public function create()
    {
        $quiz=Quiz::lists('quiz_name','id');

        return view('question.create',compact('quiz'));
    }
    public function store(QuestionRequest $request)
    {

        $question=Questions::create(['question'=>$request['question'],
                                     'opt1'=>$request['opt1'],
                                        'opt2'=>$request['opt2'],
                                        'opt3'=>$request['opt3'],
                                        'opt4'=>$request['opt4'],
                                        'correct_ans'=>$request['correct_ans'],
                                        'quiz_id'=>$request['quiz_id']
                                    ]);
        return redirect ('quiz');
    }
    public function edit($id)
    {
        $question=Questions::findOrFail($id);
        $quiz=Quiz::lists('quiz_name','id');
        return view('question.edit',compact('question','quiz'));
    }
    public function update($id,QuestionRequest $request)
    {
        $question=Questions::findOrFail($id);
        $question->update(['question'=>$request['question'],
                            'opt1'=>$request['opt1'],
                            'opt2'=>$request['opt2'],
                            'opt3'=>$request['opt3'],
                            'opt4'=>$request['opt4'],
                            'correct_ans'=>$request['correct_ans'],
                            'quiz_id'=>$request['quiz_id']
                        ]);
        return redirect('question');
    }
    public function destroy($id)
    {
        $question=Question::findOrFail($id);

        $question->delete();
        return redirect('question');

    }


}
