<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Service\TagsService;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    private $tagServicel;
    public function __construct(TagsService $tag)
    {
        $this->tagServicel = $tag;
    }

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
    public function store(TagRequest $request)
    {
        $this->tagServicel->store($request->validated());
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
    public function update(TagRequest $request, Tag $tag)
    {
        $this->tagServicel->update($request->validated(), $tag);
        return redirect()->route('login.admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy(Tag $tag)
    {
        $this->tagServicel->destroy($tag);
        return redirect()->route('login.admin.tags.index');
    }
}
