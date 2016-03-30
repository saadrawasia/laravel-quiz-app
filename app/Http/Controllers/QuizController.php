<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Questions;
use App\Quiz;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user=Auth::user();
        $quiz=Quiz::orderBy('id','ASC')->get();

        return view('quiz.index', compact('quiz','user'));
       // return $quiz;
    }
    public function create()
    {
        return view('quiz.create');
    }
    public function store(QuizRequest $request)
    {

        $quiz=Quiz::create(['quiz_name'=>$request['quiz_name']]);

        return redirect('quiz');
    }
    public function show($id)
    {
        $quiz =Quiz::findOrFail($id);
       $question=Questions::where('quiz_id','=',$quiz->id)->get();
        $user=Auth::user();
        return view('quiz.show',compact('quiz','question','user'));
    }
    public function edit($id)
    {
        $quiz=Quiz::findOrFail($id);
        return view('quiz.edit',compact('quiz'));
    }
    public function update($id,QuizRequest $request)
    {
        $quiz=Quiz::findOrFail($id);
        $quiz->update($request->all());
        return redirect('quiz');
    }
    public function destroy($id)
    {
        $quiz=Quiz::findOrFail($id);

        $quiz->delete();
        return redirect('quiz');

    }
}
