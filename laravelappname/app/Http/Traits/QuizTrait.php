<?php

namespace App\Http\Traits;
use App\Quiz;

trait QuizTrait {

    public function incrementCount($rate_id) {
        $quiz = Quiz::findOrFail($rate_id);
        $quiz->increment('count');
    }


    public function returnAssociativeValues() {
        $quizzes = Quiz::all();
        foreach ($quizzes as $key => $quiz){
            if($quiz['rate'] === Quiz::STATUS_GOOD){
                $quizzes[$key]->rate = 'Good';
            }
            else if($quiz['rate'] === Quiz::STATUS_FAIR){
                $quizzes[$key]['rate'] = 'Fair';
            }
            else if($quiz['rate'] === Quiz::STATUS_NEUTRAL){
                $quizzes[$key]['rate'] = 'neutral';
            }
            else if($quiz['rate'] === Quiz::STATUS_BAD){
                $quizzes[$key]['rate'] = 'bad';
            }
        }
        return $quizzes;
    }
}
