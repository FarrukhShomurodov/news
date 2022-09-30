<?php

namespace App\Http\Controllers\admin;

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
     * Show the form for creating a new resource.

     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create',[
            'categories' => $categories,
            'tags' => $tags,
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

        return redirect()->route('login.admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
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
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit',[
            'post'=> $post,
            'categories' =>$categories,
            'tags' =>  $tags,
        ]);
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
        return redirect()->route('login.admin.posts.index');
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
        return redirect()->route('login.admin.posts.index');
    }
}
