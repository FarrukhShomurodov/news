<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Service\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    private CategoryService $categoryService;
    public function __construct(CategoryService $category)
    {
        $this->categoryService = $category;
    }

    public function index()
    {
        $category = Category::all();
        return view('admin.categories.index',[
            'categories' => $category,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryService->store($request->validated());
        return response(200);
    }

    /**
     * Update the specified resource in storage.
     *

     * @param  int  $id

     */
    public function update(CategoryRequest $request,Category $category)
    {
        $this->categoryService->update($request->validated(),$category);
        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy(Category $category): RedirectResponse
    {
        $this->categoryService->destroy($category);
        return response(200);
    }
}
