<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Service\TagsService;
use Illuminate\Http\Request;
use App\Http\Resources\TagsResource;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(TagRequest $request)
    {
        $this->tagServicel->store($request->validated());
        return new TagsResource($request);
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
        return new TagsResource($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy(Tag $tag)
    {
        $this->tagServicel->destroy($tag);
        return response(200);
    }
}
