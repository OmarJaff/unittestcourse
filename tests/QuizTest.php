<?php


namespace Tests;

use App\Question;
use App\Quiz;
use PHPUnit\Framework\TestCase;

class QuizTest extends TestCase 

{
    /** @test */
     public function it_consist_of_questions() {
         
        $quiz = new Quiz();

        $quiz->addQuestion(new Question("what is 2+2 ?", 4));

        $this->assertCount(1, $quiz->questions());
     } 

      /** @test */
      public function it_grades_a_perfect_quiz() {
         
        $quiz = new Quiz();

        $quiz->addQuestion(new Question("what is 2+2 ?", 4));

        $question = $quiz->nextQuestion();
        
        $question->answer(4);

        $this->assertEquals(100, $quiz->grade());
     } 

      /** @test */
      public function it_grades_a_failuer_quiz() {
         
        $quiz = new Quiz();

        $quiz->addQuestion(new Question("what is 2+2 ?", 4));

        $question = $quiz->nextQuestion();
        
        $question->answer("incorrect answer");

        $this->assertEquals(0, $quiz->grade());
     } 

     
     /** @test */
     public function it_correctly_tracks_the_next_question_in_the_queue () 
     {
         $quiz = new Quiz();
         $toatl = $quiz->totalNumberOfQuestions();
         $quiz->nextQuestion();
         $quiz->nextQuestion();
         $quiz->nextQuestion();
         $this->assertCount(3, $quiz)

     }

    /** @test */
    public function it_cannot_be_graded_until_all_the_questions_is_answered () 
    {
        
    }


}

