<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Service\AdminService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Expr\PostDec;
use App\Http\Resources\PostsResource;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    private AdminService $postsService;


    public function __construct(AdminService $adminService)
    {
        $this->postsService = $adminService;
    }

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',[
            'posts' => $posts,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(PostRequest $request)
    {

        $this->postsService->create($request->validated());
        return new PostsResource($request);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $this->postsService->update($request->validated(), $post);
        return new PostsResource($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        return response(200);
    }
}
