<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function posts($id){
        $posts = Post::findOrFail($id);
        return response($posts);
    }
}
