<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
         return view('admin.tags.index',[
            'tags' => Tag::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(Request $request)
    {
        $category = new Tag;
        $category->tag_name = $request["tag_name"];
        $category->save();
        return redirect()->route('login.admin.tags.index');
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
        return view('admin.tags.edit',[
            'tag' => Tag::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->tag_name = $request["tag_name"];
        $tag->update();
        return redirect()->route('login.admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        Tag::destroy($id);
        return redirect()->route('login.admin.tags.index');
    }
}
