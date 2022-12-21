<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\SaveCategoryRequest;
use App\Interfaces\CategoryRepositoryInterface;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;
use App\Models\Category;

class CategoryController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository) 
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function category()
    {
       $getData = $this->categoryRepository->getAll();
       $allData = CategoryResource::collection($getData);
        return view('admin.category.manage-category', compact('allData'));
    }
    public function createCategory()
    {
        return view('admin.category.create-category');
    }
    public function storeCategory(SaveCategoryRequest $request)
    {
        $levelDetails = $request->only([
            'name',
            'short_description',
        ]);
        $getData = $this->categoryRepository->create($levelDetails);

        return redirect()->route('admin.settings.category')->with('success', 'Category Created Successfully.');
    }
    public function editCategory(Request $request)
    {
        $levels = Category::all();
        $catId = $request->route('id');
        $data = $this->categoryRepository->getById($catId);
        return view('admin.category.edit-category', compact('data', 'levels'));
    }
    public function updateCategory(Request $request)
    {
        $catId = $request->route('id');
        $levelDetails = $request->only([
            'name',
            'short_description',
        ]);
        $getData = $this->categoryRepository->update($catId, $levelDetails);

        return redirect()->route('admin.settings.category')->with('success', 'Category Update Successfully.');
    }
    public function deleteCategory(Request $request) 
    {
        $catId = $request->route('id');
        $this->categoryRepository->delete($catId);

        return redirect()->route('admin.settings.category')->with('success', 'Category Delete Successfully.');
    }
}
