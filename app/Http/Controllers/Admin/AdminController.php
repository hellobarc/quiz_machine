<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SaveLevelRequest;
use App\Interfaces\LevelRepositoryInterface;
use App\Http\Resources\LevelResource;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;
use App\Models\Level;

class AdminController extends Controller
{
    private LevelRepositoryInterface $levelRepository;

    public function __construct(LevelRepositoryInterface $levelRepository) 
    {
        $this->levelRepository = $levelRepository;
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
    public function level()
    {
       $getData = $this->levelRepository->getAll();
       $allData = LevelResource::collection($getData);
        return view('admin.level.manage-level', compact('allData'));
    }
    public function createLevel()
    {
        return view('admin.level.create-level');
    }
    public function storeLevel(SaveLevelRequest $request)
    {
        $levelDetails = $request->only([
            'name',
            'difficulty',
            'short_description',
        ]);
        $getData = $this->levelRepository->create($levelDetails);

        return redirect()->route('admin.settings.level')->with('success', 'Level Created Successfully.');
    }
    public function editLevel(Request $request)
    {
        $levels = Level::all();
        $catId = $request->route('id');
        $data = $this->levelRepository->getById($catId);
        return view('admin.level.edit-level', compact('data', 'levels'));
    }
    public function updateLevel(Request $request)
    {
        $catId = $request->route('id');
        $levelDetails = $request->only([
            'name',
            'difficulty',
            'short_description',
        ]);
        $getData = $this->levelRepository->update($catId, $levelDetails);

        return redirect()->route('admin.settings.level')->with('success', 'Level Update Successfully.');
    }
    public function deleteLevel(Request $request) 
    {
        $catId = $request->route('id');
        $this->levelRepository->delete($catId);

        return redirect()->route('admin.settings.level')->with('success', 'Level Delete Successfully.');
    }


}
