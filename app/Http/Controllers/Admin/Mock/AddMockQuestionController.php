<?php

namespace App\Http\Controllers\Admin\Mock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddMockQuestionController extends Controller
{
    public function addMockQuestion($questionType, $questionId)
    {
        if($questionType == 'fill-blank')
        {
            $fillBlanks = MockFillBlank::where('mock_question_id', $questionId)->with('mockQuestion')->get();
            return view('admin.mock.mockQuestion.add-question.fill-blanks', compact('questionType', 'questionId', 'fillBlanks'));
        }elseif($questionType == 'multiple-choice'){
            $multipleChoice = MockMultipleChoice::where('mock_question_id', $questionId)->with('mockQuestion')->get();
            return view('admin.mock.mockQuestion.add-question.multiple-choice', compact('questionType', 'questionId', 'multipleChoice'));
        }elseif($questionType == 'radio'){
            $radio = MockRadio::where('mock_question_id', $questionId)->with('mockQuestion')->get();
            return view('admin.mock.mockQuestion.add-question.multiple-choice', compact('questionType', 'questionId', 'radio'));
        }elseif($questionType == 'drop-down'){
            $dropDown = MockDropdown::where('mock_question_id', $questionId)->with('mockQuestion')->get();
            return view('admin.mock.mockQuestion.add-question.multiple-choice', compact('questionType', 'questionId', 'dropDown'));
        }
    }
    public function mockStoreMultipleChoice(Request $request) 
    {

        $input = $request->input();
        $quiz_id = $input['quiz_id'];
        $text = $input['text'];
        $blank_answer = $input['blank_answer'];
        $is_correct = $input['is_correct'];
        $marks = $input['marks'];
        if($input['quiz_type'] == 'multiple-choice')
        {
            MultipleChoice::insert([
                'quiz_id' => $quiz_id,
                'text' => $text,
                'option_text' =>  json_encode($blank_answer),
                'is_correct' => json_encode($is_correct),
                'marks' => $marks,
            ]);
        }elseif($input['quiz_type'] == 'radio'){
            QuizRadio::insert([
                'quiz_id' => $quiz_id,
                'text' => $text,
                'option_text' =>  json_encode($blank_answer),
                'is_correct' => json_encode($is_correct),
                'marks' => $marks,
            ]);
        }elseif($input['quiz_type'] == 'drop-down'){
            QuizDropdown::insert([
                'quiz_id' => $quiz_id,
                'text' => $text,
                'option_text' =>  json_encode($blank_answer),
                'is_correct' => json_encode($is_correct),
                'marks' => $marks,
            ]);
        }
        
        return redirect()->back()->with('success', 'Question Added Successfully.');
        
    }
}
