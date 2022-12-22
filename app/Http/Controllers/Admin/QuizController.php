<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SaveQuizRequest;
use App\Interfaces\QuizRepositoryInterface;
use App\Http\Resources\QuizResource;
use App\Models\Exam;
use App\Models\Quiz;

class QuizController extends Controller
{
    private QuizRepositoryInterface $quizRepository;

    public function __construct(QuizRepositoryInterface $quizRepository) 
    {
        $this->quizRepository = $quizRepository;
    }
    public function quiz()
    {
       $getData = $this->quizRepository->getAll();
       $allData = QuizResource::collection($getData);
        return view('admin.quiz.manage-quiz', compact('allData'));
    }
    public function createQuiz()
    {
        $exams = Exam::all();
        return view('admin.quiz.create-quiz', compact('exams'));
    }
    public function storeQuiz(SaveQuizRequest $request)
    {
        $levelDetails = $request->only([
            'exam_id',
            'title',
            'instruction',
            'quiz_type',
            'marks',
            'status',
        ]);
        $getData = $this->quizRepository->create($levelDetails);
        return redirect()->route('admin.settings.quiz')->with('success', 'Quiz Created Successfully.');
    }
    public function editQuiz(Request $request)
    {
        $catId = $request->route('id');
        $quizzes = Quiz::all();
        $exams = Exam::all();
        $data = $this->quizRepository->getById($catId);
        return view('admin.quiz.edit-quiz', compact('data', 'quizzes', 'exams'));
    }
    public function updateQuiz(Request $request)
    {
        $catId = $request->route('id');
        $levelDetails = $request->only([
            'exam_id',
            'title',
            'instruction',
            'quiz_type',
            'marks',
            'status',
        ]);
        $getData = $this->quizRepository->update($catId, $levelDetails);

        return redirect()->route('admin.settings.quiz')->with('success', 'Quiz Update Successfully.');
    }
    public function deleteQuiz(Request $request) 
    {
        $catId = $request->route('id');
        $this->quizRepository->delete($catId);
        return redirect()->route('admin.settings.quiz')->with('success', 'Quiz Delete Successfully.');
    }
}
