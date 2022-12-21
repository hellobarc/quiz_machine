<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SaveExamRequest;
use App\Interfaces\ExamRepositoryInterface;
use App\Http\Resources\ExamResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Exam;
use App\Models\Level;
use App\Models\Category;
use Image;
use File;


class ExamController extends Controller
{
    private ExamRepositoryInterface $examRepository;

    public function __construct(ExamRepositoryInterface $examRepository) 
    {
        $this->examRepository = $examRepository;
    }
    public function exam()
    {
       $getData = $this->examRepository->getAll();
       $allData = ExamResource::collection($getData);
        return view('admin.exam.manage-exam', compact('allData'));
    }
    public function createExam()
    {
        $levels = Level::all();
        $category = Category::all();
        return view('admin.exam.create-exam', compact('levels', 'category'));
    }
    public function storeExam(SaveExamRequest $request)
    {
        $levelDetails = $request->only([
            'title',
            'level_id',
            'category_id',
            'short_description',
            'instruction',
            'time_limit',
        ]);

        $image = $request->file('thumbnail');
        $img = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('image/uploads/exam/original_thumbnail/' .$img);
        $thumbnail = public_path('image/uploads/exam/thumbnail/' .$img);
        $imgFile = Image::make($image)->save($location);

        $imgFile->resize(150, 150, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($thumbnail);

        $levelDetails['thumbnail'] = $img;

        $getData = $this->examRepository->create($levelDetails);

        return redirect()->route('admin.settings.exam')->with('success', 'Exam Created Successfully.');
    }
    public function editExam(Request $request)
    {
        $catId = $request->route('id');
        $levels = Level::all();
        $category = Category::all();
        $data = $this->examRepository->getById($catId);
        return view('admin.exam.edit-exam', compact('data','levels', 'category'));
    }
    public function updateExam(Request $request)
    {
        $catId = $request->route('id');
        $find_id = Exam::where('id', $catId)->first();
        if (File::exists('image/uploads/exam/original_thumbnail/'.$find_id->thumbnail) && File::exists('image/uploads/exam/thumbnail/'.$find_id->thumbnail)) {
            File::delete('image/uploads/exam/original_thumbnail/'.$find_id->thumbnail);
            File::delete('image/uploads/exam/thumbnail/'.$find_id->thumbnail);
        }
        $levelDetails = $request->only([
            'title',
            'level_id',
            'category_id',
            'short_description',
            'instruction',
            'time_limit',
        ]);

        $image = $request->file('thumbnail');
        $img = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('image/uploads/exam/original_thumbnail/' .$img);
        $thumbnail = public_path('image/uploads/exam/thumbnail/' .$img);
        $imgFile = Image::make($image)->save($location);

        $imgFile->resize(150, 150, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($thumbnail);

        $levelDetails['thumbnail'] = $img;

        $getData = $this->examRepository->update($catId, $levelDetails);

        return redirect()->route('admin.settings.exam')->with('success', 'Exam Update Successfully.');
    }
    public function deleteExam(Request $request) 
    {
        $catId = $request->route('id');
        $find_id = Exam::where('id', $catId)->first();
        if (File::exists('image/uploads/exam/original_thumbnail/'.$find_id->thumbnail) && File::exists('image/uploads/exam/thumbnail/'.$find_id->thumbnail)) {
            File::delete('image/uploads/exam/original_thumbnail/'.$find_id->thumbnail);
            File::delete('image/uploads/exam/thumbnail/'.$find_id->thumbnail);
        }
        $this->examRepository->delete($catId);

        return redirect()->route('admin.settings.exam')->with('success', 'Exam Delete Successfully.');
    }
}
