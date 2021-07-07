<?php

namespace App\Http\Controllers;

use App\Http\Traits\QuizTrait;
use App\Question;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{
    use QuizTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->returnAssociativeValues(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quizId= $request['responseId'];
        $this->incrementCount($request['responseId']);
        return response()->json('Quiz submited successfuly!',200);

    }

    public function getQuestion(Request $request)
    {
        //hardcoded to 1 question
        $question = Question::firstOrFail();
        $responses = $this->returnAssociativeValues($question->quizRates());
        return response()->json( [ 'question' => $question->description ,'responses' => $responses] ,200);

    }

}
