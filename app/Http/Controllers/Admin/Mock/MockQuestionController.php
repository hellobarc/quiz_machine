<?php

namespace App\Http\Controllers\Admin\Mock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SaveMockQuestionRequest;
use App\Interfaces\MockQuestionRepositoryInterface;
use App\Http\Resources\MockQuestionResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Mock;

class MockQuestionController extends Controller
{
    private MockQuestionRepositoryInterface $mockQuestionRepository;

    public function __construct(MockQuestionRepositoryInterface $mockQuestionRepository) 
    {
        $this->mockQuestionRepository = $mockQuestionRepository;
    }
    public function allMockQuestion()
    {
       $getData = $this->mockQuestionRepository->getAll();
       $allData = MockQuestionResource::collection($getData);
        return view('admin.mock.mockQuestion.manage-mock-question', compact('allData'));
    }
    public function createMockQuestion()
    {
        $mocks = Mock::all();
        return view('admin.mock.mockQuestion.create-mock-question', compact('mocks'));
    }
    public function storeMockQuestion(SaveMockQuestionRequest $request)
    {
        $mockQuestionDetails = $request->only([
            'mock_id',
            'question_title',
            'question_type',
            'module',
            'passage_id',
        ]);

        $getData = $this->mockQuestionRepository->create($mockQuestionDetails);

        return redirect()->route('admin.settings.mock.question')->with('success', 'Mock Question Created Successfully.');
    }
    public function editMockQuestion(Request $request)
    {
        $mockQuestionId = $request->route('id');
        $mocks = Mock::all();
        $data = $this->mockQuestionRepository->getById($mockQuestionId);
        return view('admin.mock.mockQuestion.edit-mock-question', compact('data', 'mocks'));
    }
    public function updateMockQuestion(Request $request)
    {
        $mockQuestionId = $request->route('id');
        
        $mockQuestionDetails = $request->only([
            'mock_id',
            'question_title',
            'question_type',
            'module',
            'passage_id',
        ]);

        $getData = $this->mockQuestionRepository->update($mockQuestionId, $mockQuestionDetails);

        return redirect()->route('admin.settings.mock.question')->with('success', 'Mock Question Update Successfully.');
    }
    public function deleteMockQuestion(Request $request) 
    {
        $mockQuestionId = $request->route('id');
        
        $this->mockQuestionRepository->delete($mockQuestionId);

        return redirect()->route('admin.settings.mock.question')->with('success', 'Mock Question Delete Successfully.');
    }
}
