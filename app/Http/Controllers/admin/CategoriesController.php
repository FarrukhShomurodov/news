<?php

namespace App\Http\Controllers\admin;

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
     * Show the form for creating a new resource.

     */
    public function create()
    {
        return view('admin.categories.create');
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
        return redirect()->route('login.admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id

     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit',[
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *

     * @param  int  $id

     */
    public function update(CategoryRequest $request,Category $category)
    {
        $this->categoryService->update($request->validate(),$category);
        return redirect()->route('login.admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy(Category $category): RedirectResponse
    {
        $this->categoryService->destroy($category);
        return redirect()->route('login.admin.categories.index');
    }
}
