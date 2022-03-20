<?php

namespace App;

use PHPUnit\Framework\Constraint\Count;

class Quiz 

{
    protected array $questions;

    public function addQuestion(Question $question) {
            $this->questions[] = $question;
    }

    public function nextQuestion() {
        return $this->questions[0];   
    }


    public function questions() {
        return $this->questions;
    }

    public function grade() {

        $totalCorrectAnswers = Count($this->solvedQuestions());
       

        return ($totalCorrectAnswers / Count($this->questions)) * 100;

    }

    protected function solvedQuestions() {
       return array_filter($this->questions, fn($question) => $question->solved());
    }
   

}