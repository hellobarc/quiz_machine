<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SaveQuizRequest;
use App\Interfaces\QuizRepositoryInterface;
use App\Http\Resources\QuizResource;
use App\Models\Exam;
use App\Models\Quiz;
use App\Models\MultipleChoice;
use App\Models\QuizRadio;
use App\Models\QuizDropDown;
use App\Models\FillBlank;
use App\Models\Article;
use App\Models\Listening;
use Illuminate\Support\Facades\File; 

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
            'templete',
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

    private function deleteQuizQuery($quizId)
    {
        MultipleChoice::where('quiz_id', $quizId)->delete();
        QuizRadio::where('quiz_id', $quizId)->delete();
        QuizDropDown::where('quiz_id', $quizId)->delete();
        FillBlank::where('quiz_id', $quizId)->delete();
        Article::where('quiz_id', $quizId)->delete();
        Listening::where('quiz_id', $quizId)->delete();
    }
    private function deleteQuizFile($quizId, $templete)
    {
        if($templete == 'with_passage'){
            $article = Article::where('quiz_id', $quizId)->first();
            if (File::exists('image/uploads/article/'.$article->image)) {
                File::delete('image/uploads/article/'.$article->image);
            }
        }elseif($templete == 'with_audio'){
            $listening = Listening::where('quiz_id', $quizId)->first();
            if (File::exists('listening/uploads/'.$listening->audio)) {
                File::delete('listening/uploads/'.$listening->audio);
            }
        }

    }
    public function deleteQuiz(Request $request) 
    {
        $quizId = $request->route('id');
        $quiz_type = $request->route('quizType');
        $templete = $request->route('templete');

        $deleteFile = $this->deleteQuizFile($quizId, $templete);
        $deleteAll = $this->deleteQuizQuery($quizId);

        $this->quizRepository->delete($quizId);
        return redirect()->route('admin.settings.quiz')->with('success', 'Quiz Delete Successfully.');
    }

}
