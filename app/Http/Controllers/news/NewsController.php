<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function posts(Category $category){
        return view('news.posts', [
            'categories'=> Category::all(),
            'posts' => $category->post,
            'tags' => Tag::all(),
        ]);
    }
    public function postDescription(Post $post){
        return view('news.postDescription', [
            'categories'=> Category::all(),
            'post' => $post,
            'post_tags'=> $post->tags,
        ]);
    }
    public function tagPosts(Tag $tag){
        return view('news.tagPost', [
            'categories'=> Category::all(),
            'posts' => $tag->posts,
            'tags' => Tag::all(),
        ]);
    }
}
