<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SaveQuizRequest;
use App\Interfaces\QuizRepositoryInterface;
use App\Http\Resources\QuizResource;
use App\Models\FillBlank;
use App\Models\QuizRadio;
use App\Models\QuizDropdown;
use App\Models\MultipleChoice;


class QuestionController extends Controller
{
    public function addQuestion($quizType, $quizId)
    {
        if($quizType == 'fill-blank')
        {
            $fillBlanks = FillBlank::where('quiz_id', $quizId)->with('quiz')->get();
            return view('admin.add-question.fill-blanks', compact('quizType', 'quizId', 'fillBlanks'));
        }elseif($quizType == 'multiple-choice'){
            $multipleChoice = MultipleChoice::where('quiz_id', $quizId)->with('quiz')->get();
            return view('admin.add-question.multiple-choice', compact('quizType', 'quizId', 'multipleChoice'));
        }elseif($quizType == 'radio'){
            $radio = QuizRadio::where('quiz_id', $quizId)->with('quiz')->get();
            return view('admin.add-question.multiple-choice', compact('quizType', 'quizId', 'radio'));
        }elseif($quizType == 'drop-down'){
            $dropDown = QuizDropdown::where('quiz_id', $quizId)->with('quiz')->get();
            return view('admin.add-question.multiple-choice', compact('quizType', 'quizId', 'dropDown'));
        }
    }
    public function storeFillBlank(Request $request) 
    {
        $quiz_id = $request->quiz_id;
        $instruction = $request->instruction;
        $text = $request->text;
        $answer = explode(',', $request->blank_answer);
        

        FillBlank::insert([
            'quiz_id' => $quiz_id,
            'text' => $text,
            'blank_answer' => json_encode($answer),
            'instruction' => $instruction,
        ]);
        return redirect()->back()->with('success', 'Question Added Successfully.');

    }
    public function deleteFillBlank(Request $request, $id)
    {
        $fillBlanks = FillBlank::find($id);
    	if(!is_null($fillBlanks))
    	{
    		$fillBlanks->delete();
   		}
        return redirect()->back()->with('success', 'Question Delete Successfully.');
    }
    public function storeMultipleChoice(Request $request) 
    {

        $input = $request->input();
        $quiz_id = $input['quiz_id'];
        $text = $input['text'];
        $blank_answer = $input['blank_answer'];
        $is_correct = $input['is_correct'];
        if($input['quiz_type'] == 'multiple-choice')
        {
            MultipleChoice::insert([
                'quiz_id' => $quiz_id,
                'text' => $text,
                'option_text' =>  json_encode($blank_answer),
                'is_correct' => json_encode($is_correct),
            ]);
        }elseif($input['quiz_type'] == 'radio'){
            QuizRadio::insert([
                'quiz_id' => $quiz_id,
                'text' => $text,
                'option_text' =>  json_encode($blank_answer),
                'is_correct' => json_encode($is_correct),
            ]);
        }elseif($input['quiz_type'] == 'drop-down'){
            QuizDropdown::insert([
                'quiz_id' => $quiz_id,
                'text' => $text,
                'option_text' =>  json_encode($blank_answer),
                'is_correct' => json_encode($is_correct),
            ]);
        }
        
        return redirect()->back()->with('success', 'Question Added Successfully.');
        
    }
    public function deleteMultipleChoice(Request $request, $id, $quizType)
    {
        if($quizType == 'multiple-choice')
        {
            $fillBlanks = MultipleChoice::find($id);
            if(!is_null($fillBlanks))
            {
                $fillBlanks->delete();
            }
        }
        elseif($quizType == 'radio')
        {
            $fillBlanks = QuizRadio::find($id);
            if(!is_null($fillBlanks))
            {
                $fillBlanks->delete();
            }
        }
        elseif($quizType == 'drop-down')
        {
            $fillBlanks = QuizDropdown::find($id);
            if(!is_null($fillBlanks))
            {
                $fillBlanks->delete();
            }
        }
        
        return redirect()->back()->with('success', 'Question Delete Successfully.');
    }
    public function showOptionBox($quizId, $quizType) 
    {
        return view('admin.add-question.fill-blank-show-box', compact('quizId', 'quizType'));
    }
    public function showOptionBoxUpdate(Request $request)
    {
        FillBlank::updateOrCreate(
            [
                'quiz_id'=>$request->quiz_id,
        ],
        [
            'is_show'=>$request->add_box,
        ]
        );
        return redirect()->route('admin.settings.quiz')->with('success', 'Added Successfully.');
    }
}
