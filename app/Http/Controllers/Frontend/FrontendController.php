<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Quiz;
use App\Models\QuizRadio;
use App\Models\ExamSubmission;

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
        }

        
        //dd($radioExamSubmission);
        return view('frontend.exam-checked', compact('exams', 'quizRadio', 'multipleChoice', 'fillBlank', 'dropDown', 'radioExamSubmission', 'multipleChoiceExamSubmission', 'dropDownExamSubmission', 'fillBlankExamSubmission'));

    }
    public function frontendExamUserAns(Request $request)
    {
        $data = $request->input();
        $exam_id = $data['exam_id'];
        $radios = $data['radio'];
        $radiosAns = $data['radioAns'];
        $multiples = $data['multiple'];
        $multiplesAns = $data['user_multipe_ans'];
        $fillblanks = $data['fillblanks'];
        $dropdowns = $data['dropdown'];
        $dropdownsAns = $data['user_dropDown_ans'];
        $fillblankans = json_encode($data['user_fillBlank_ans']);
        $radio_quiz_type = $data['radio_quiz_type'];
        $multiple_quiz_type = $data['multiple_quiz_type'];
        $fillBlank_quiz_type = $data['fillBlank_quiz_type'];
        $dropDown_quiz_type = $data['dropDown_quiz_type'];
        
       //dd($ans);
       // $quiz_id = [];
        if(isset($radios)){
            foreach($radios as $radio){
                    foreach($radiosAns as $key=>$rAns){
                        if($radio == $key){
                            $ans= $rAns;
                            $array = ['quiz_id'=>$radio,'exam_id'=>$exam_id, 'fillblankans'=> NULL, 'submitted_ans'=>$ans, 'quiz_type' => $radio_quiz_type];
                        }   
                    }
                $this->examCreate($array);
            }
        }
        if(isset($multiples)){
            foreach($multiples as $multiple){
                $array = ['quiz_id'=>$multiple,'exam_id'=>$exam_id, 'fillblankans'=> NULL, 'submitted_ans'=>$multiplesAns, 'quiz_type' => $multiple_quiz_type];
                $this->examCreate($array);
            }
        }
        if(isset($fillblanks)){
            foreach($fillblanks as $fillblank){
                $array = ['quiz_id'=>$fillblank,'exam_id'=>$exam_id, 'fillblankans'=> $fillblankans, 'submitted_ans'=>NULL, 'quiz_type' => $fillBlank_quiz_type];
                $this->examCreate($array);
            }
        }
        if(isset($dropdowns)){
            foreach($dropdowns as $dropdown){
                $array = ['quiz_id'=>$dropdown,'exam_id'=>$exam_id, 'fillblankans'=> NULL, 'submitted_ans'=>$dropdownsAns, 'quiz_type' => $dropDown_quiz_type];
                $this->examCreate($array);
            }
        }
        
        return redirect()->back();
    }

    private function examCreate($array)
    {
        ExamSubmission::firstOrcreate([
            'user_id'=> 1,
            'quiz_id'=> $array['quiz_id'],
            'quiz_type'=> $array['quiz_type'],
            'exam_id'=>  $array['exam_id'],
            'submitted_ans'=> json_encode($array['submitted_ans']), // ans_id
            'answered_text'=> $array['fillblankans'], // fill ans
        ]);
    }

}
