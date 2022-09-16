<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function showTitles($id){
        return view('admin.titles',[
            'categories' => Category::all(),
            'id'=>$id,
        ]);
    }
    public function showPosts(){
        return view('admin.posts',[
            'categories' => Category::all(),
        ]);
    }
}
