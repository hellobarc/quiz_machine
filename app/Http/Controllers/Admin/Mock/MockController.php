<?php

namespace App\Http\Controllers\Admin\Mock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SaveMockRequest;
use App\Interfaces\MockRepositoryInterface;
use App\Http\Resources\MockResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class MockController extends Controller
{

    private MockRepositoryInterface $mockRepository;

    public function __construct(MockRepositoryInterface $mockRepository) 
    {
        $this->mockRepository = $mockRepository;
    }
    public function allMock()
    {
       $getData = $this->mockRepository->getAll();
       $allData = MockResource::collection($getData);
        return view('admin.mock.manage-mock', compact('allData'));
    }
    public function createMock()
    {
        return view('admin.mock.create-mock');
    }
    public function storeMock(SaveMockRequest $request)
    {
        $mockDetails = $request->only([
            'mock_name',
            'slug',
        ]);

        $getData = $this->mockRepository->create($mockDetails);

        return redirect()->route('admin.settings.mock')->with('success', 'Mock Created Successfully.');
    }
    public function editMock(Request $request)
    {
        $mockId = $request->route('id');
        $data = $this->mockRepository->getById($mockId);
        return view('admin.mock.edit-mock', compact('data'));
    }
    public function updateMock(Request $request)
    {
        $mockId = $request->route('id');
        
        $mockDetails = $request->only([
            'mock_name',
            'slug',
        ]);

        $getData = $this->mockRepository->update($mockId, $mockDetails);

        return redirect()->route('admin.settings.mock')->with('success', 'Mock Update Successfully.');
    }
    public function deleteMock(Request $request) 
    {
        $mockId = $request->route('id');
        
        $this->mockRepository->delete($mockId);

        return redirect()->route('admin.settings.mock')->with('success', 'Mock Delete Successfully.');
    }
}
