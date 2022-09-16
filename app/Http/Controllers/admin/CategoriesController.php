<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.categories.index',[
            'categories' => Category::all()
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->category_name = $request["category_name"];
        $category->save();
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
        return view('admin.categories.edit',[
            'category' => Category::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *

     * @param  int  $id

     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request["category_name"];
        $category->update();
        return redirect()->route('login.admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('login.admin.categories.index');
    }
}
