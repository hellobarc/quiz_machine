<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Quiz;
use App\Models\QuizRadio;

class FrontendController extends Controller
{
    public function frontendHome()
    {
        $exams = Exam::get();
        return view('frontend.home', compact('exams'));
    }
    public function frontendExamInfo($test_id)
    {
        $exams = Exam::where('id', $test_id)->first();
        $quizzes = Quiz::where('exam_id', $test_id)->get();
        return view('frontend.test-info', compact('quizzes', 'exams'));
    }
    public function frontendExamStart($test_id)
    {
        $option = [];
        $exams = Exam::where('id', $test_id)->first();
        //$quizzes = Quiz::where('exam_id', $test_id)->where('status', 'active')->where('quiz_type')->with('quizRadio')->get();
        $quizzes = Quiz::where('exam_id', $test_id)->where('status', 'active')->get();
        foreach($quizzes as $questions)
        {
            $quiz_id[] = $questions->id;
            $quiz_type[] = $questions->quiz_type;
            // if($quiz_type =='radio'){
               $quiz =  QuizRadio::where('quiz_id', $quiz_id)->get();
            // }
            
        }
        dd($quiz_id);
        return view('frontend.start-exam', compact('exams', 'quizzes'));
    }

}
