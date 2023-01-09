<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Quiz;
use App\Models\QuizRadio;
use App\Models\ExamSubmission;
use App\Models\MultipleChoice;
use App\Models\FillBlank;
use App\Models\QuizDropdown;

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
        $exams = Exam::where('id', $test_id)->with('category')->first();
        //if category not equal reading
        if($exams->category != 'Reading'){
        $quizRadio = Quiz::where('exam_id', $test_id)->where('status', 'active')->where('quiz_type', 'radio')->with('quizRadio')->get();
        $multipleChoice = Quiz::where('exam_id', $test_id)->where('status', 'active')->where('quiz_type', 'multiple-choice')->with('multipleChoice')->get();
        $fillBlank = Quiz::where('exam_id', $test_id)->where('status', 'active')->where('quiz_type', 'fill-blank')->with('fillBlank')->get();
        $dropDown = Quiz::where('exam_id', $test_id)->where('status', 'active')->where('quiz_type', 'drop-down')->with('dropDown')->get();
        }
        //dd($dropDown);
        return view('frontend.start-exam', compact('test_id','exams', 'quizRadio', 'multipleChoice', 'fillBlank', 'dropDown'));

    }
    public function frontendExamChecked()
    {
        $test_id = 1;
        $submittedAns = [];
        $quiz_id = [];
        $exams = Exam::where('id', $test_id)->with('category')->first();
        //if category not equal reading
        if($exams->category != 'Reading'){
        $quizRadio = Quiz::where('exam_id', $test_id)->where('status', 'active')->where('quiz_type', 'radio')->with('quizRadio')->get();
        $multipleChoice = Quiz::where('exam_id', $test_id)->where('status', 'active')->where('quiz_type', 'multiple-choice')->with('multipleChoice')->get();
        $fillBlank = Quiz::where('exam_id', $test_id)->where('status', 'active')->where('quiz_type', 'fill-blank')->with('fillBlank')->get();
        $dropDown = Quiz::where('exam_id', $test_id)->where('status', 'active')->where('quiz_type', 'drop-down')->with('dropDown')->get();

        $radioExamSubmission = ExamSubmission::where('user_id', 1)->where('exam_id', $test_id)->where('quiz_type', 'radio')->get();
        $multipleChoiceExamSubmission = ExamSubmission::where('user_id', 1)->where('exam_id', $test_id)->where('quiz_type', 'multiple-choice')->get();
        $dropDownExamSubmission = ExamSubmission::where('user_id', 1)->where('exam_id', $test_id)->where('quiz_type', 'drop-down')->get();
        $fillBlankExamSubmission = ExamSubmission::where('user_id', 1)->where('exam_id', $test_id)->where('quiz_type', 'fill-blank')->get();

        //mark calculation
        $totalQuestion = ExamSubmission::where('user_id', 1)->where('exam_id', $test_id)
                                        ->where('quiz_type', '!=', 'fill-blank')
                                        ->count();
        $obtainMarks = ExamSubmission::where('user_id', 1)->where('exam_id', $test_id)
                                    ->where('quiz_type', '!=', 'fill-blank')
                                    ->where('is_correct', '=', 'yes')
                                    ->count();

        //$totalFillBlanksCount = ExamSubmission::where('user_id', 1)->where('exam_id', $test_id)->where('quiz_type', 'fill-blank')->count();
        $totalFillBlanks = ExamSubmission::where('user_id', 1)->where('exam_id', $test_id)->where('quiz_type', 'fill-blank')->get();
        $countOption = 0;
        $result = 0;
        foreach($totalFillBlanks as $rows){
            $totalOption = json_decode($rows->answered_text);
            $countOption = count($totalOption);
            $result = $rows->is_correct;
        }

        $question = $totalQuestion + $countOption;
        $marks = $obtainMarks + $result;
           
        }

        
        //dd($marks);
        return view('frontend.exam-checked', compact('exams', 'quizRadio', 'multipleChoice', 'fillBlank', 'dropDown', 'radioExamSubmission', 'multipleChoiceExamSubmission', 'dropDownExamSubmission', 'fillBlankExamSubmission', 'question', 'marks'));

    }
    public function frontendExamUserAns(Request $request)
    {
        $data = $request->input();
        $exam_id = $data['exam_id'];
        $radios = $data['radio'];
        $radiosAns = $data['radioAns'];
        $radioQuestionId = $data['radio_question_id'];
        $radio_quiz_type = $data['radio_quiz_type'];
        $multiples = $data['multiple'];
        $multiplesAns = $data['user_multipe_ans'];
        $multipleQuestionId = $data['multiple_question_id'];
        $multiple_quiz_type = $data['multiple_quiz_type'];
        $fillblanks = $data['fillblanks'];
        $fillblankQuestionId = $data['fillBlank_question_id'];
        $fillBlank_quiz_type = $data['fillBlank_quiz_type'];
        $fillblankArr = $data['user_fillBlank_ans'];
        $fillblankJson = json_encode($data['user_fillBlank_ans']);
        $dropdowns = $data['dropdown'];
        $dropdownsAns = $data['user_dropDown_ans'];
        $dropdownQuestionId = $data['dropDown_question_id'];
        $dropDown_quiz_type = $data['dropDown_quiz_type'];
        
      //dd($data);
       // $quiz_id = [];
        if(isset($radios)){
            foreach($radios as $index=>$radio){
                    foreach($radiosAns as $key=>$rAns){
                        if($radio == $key){
                            $ans= $rAns;

                            $allRadio = QuizRadio::where('quiz_id', $radio)->get();

                            foreach($allRadio as $rowCorrect){
                                $decode = json_decode($rowCorrect->is_correct);
                                if($decode[0] == $ans[0]){
                                    $is_correct = "yes";
                                }else{
                                  $is_correct = "no";  
                                }
                            }
                            $array = ['quiz_id'=>$radio,'exam_id'=>$exam_id,'question_id'=>$radioQuestionId[$index], 'fillblankans'=> NULL, 'submitted_ans'=>$ans, 'quiz_type' => $radio_quiz_type, 'is_correct'=>$is_correct];
                        } 
                    }
                $this->examCreate($array);
            }
        }
        if(isset($multiples)){
            foreach($multiplesAns as $key => $multipleBlanksAns){
                $userAns = $multipleBlanksAns;
                $question_id = $multipleQuestionId[$key];
                foreach($multiples as $index=>$quiz_id){

                    // 1. Pick the question detail by this question_id = $multipleQuestionId[$key] 

                    $allMultipleChoice = MultipleChoice::find($question_id);
                    
                    $correct_array = json_decode($allMultipleChoice->is_correct);
                    if( in_array($userAns, $correct_array )  ){
                        $iscorrect= 'yes';
                    }else{
                        $iscorrect= 'no';
                    }
                    $array = ['quiz_id'=>$quiz_id,'exam_id'=>$exam_id, 'question_id'=> $question_id, 'fillblankans'=> NULL, 'submitted_ans'=>$userAns, 'quiz_type' => $multiple_quiz_type, 'is_correct'=>  $iscorrect];
                    $this->examCreate($array);
                }
            }
            
        }

        $fill_correct = 0;

        if(isset($fillblanks)){
        
            foreach($fillblanks as $index=>$fillblank){
                $question_id = $fillblankQuestionId[$index];

                $fillBlankInfo = FillBlank::find($question_id);
                $correct_array = json_decode($fillBlankInfo->blank_answer);
                
                foreach($correct_array as $key=>$values){
                    $pos = strpos(" ".strtolower($values),strtolower($fillblankArr[$key]));
                    if($pos!=null)
                    {
                        $fill_correct +=1;
                    }
                }

                $array = ['quiz_id'=>$fillblank,'exam_id'=>$exam_id, 'question_id'=>$question_id, 'fillblankans'=> $fillblankJson, 'submitted_ans'=>NULL, 'quiz_type' => $fillBlank_quiz_type, 'is_correct'=>  $fill_correct  ];
                $this->examCreate($array);
            }
        }
        if(isset($dropdowns)){
            foreach($dropdownsAns as $key=>$values){
                $question_id = $dropdownQuestionId[$key];
                foreach($dropdowns as $index=>$dropdown){
                    
    
                    $dropDownInfo = QuizDropdown::find($question_id);
                    $correct_array = json_decode($dropDownInfo->is_correct);
    
                    if($correct_array[0] == $values){
                        $is_correct = 'yes';
                    }else{
                        $is_correct = 'no';
                    }
                    $array = ['quiz_id'=>$dropdown,'exam_id'=>$exam_id, 'question_id'=>$question_id, 'fillblankans'=> NULL, 'submitted_ans'=>$values, 'quiz_type' => $dropDown_quiz_type, 'is_correct'=>$is_correct];
                    $this->examCreate($array);
                }
            }
            
        }
        
        return redirect()->back();
    }

    private function examCreate($array)
    {
        ExamSubmission::firstOrcreate([
            'user_id'=> 1,
            'quiz_id'=> $array['quiz_id'],
            'question_id'=> $array['question_id'],
            'quiz_type'=> $array['quiz_type'],
            'exam_id'=>  $array['exam_id'],
            'submitted_ans'=> json_encode($array['submitted_ans']), // ans_id
            'answered_text'=> $array['fillblankans'], // fill ans
            'is_correct'=> $array['is_correct'], // fill ans
        ]);
    }

    public function congratulation(Request $request, $test_id)
    {
        $exams = Exam::where('id', $test_id)->first();
        //mark calculation
        $totalQuestion = ExamSubmission::where('user_id', 1)->where('exam_id', $test_id)
                                        ->where('quiz_type', '!=', 'fill-blank')
                                        ->count();
        $obtainMarks = ExamSubmission::where('user_id', 1)->where('exam_id', $test_id)
                                    ->where('quiz_type', '!=', 'fill-blank')
                                    ->where('is_correct', '=', 'yes')
                                    ->count();

        //$totalFillBlanksCount = ExamSubmission::where('user_id', 1)->where('exam_id', $test_id)->where('quiz_type', 'fill-blank')->count();
        $totalFillBlanks = ExamSubmission::where('user_id', 1)->where('exam_id', $test_id)->where('quiz_type', 'fill-blank')->get();
        $countOption = 0;
        $result = 0;
        foreach($totalFillBlanks as $rows){
            $totalOption = json_decode($rows->answered_text);
            $countOption = count($totalOption);
            $result = $rows->is_correct;
        }

        $question = $totalQuestion + $countOption;
        $marks = $obtainMarks + $result;
        return view('frontend.congratulation', compact('exams', 'question', 'marks'));
    }

}
