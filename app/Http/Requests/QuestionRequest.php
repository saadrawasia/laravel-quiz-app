<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuestionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question'=>'required|min:3',
            'opt1'=>'required|min:3',
            'opt2'=>'required|min:3',
            'opt3'=>'required|min:3',
            'opt4'=>'required|min:3',
            'correct_ans'=>'required',
            'quiz_id'=>'required',
        ];
    }
}
