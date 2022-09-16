<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\PostsController;
use App\Http\Controllers\admin\TagsController;
use App\Http\Controllers\news\NewsController;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('news.index',[
        'categories'=> Category::all(),
        ]);
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'as' => 'login.',
        'prefix' => 'login'
    ],function(){

        Route::group([
            'as' => 'admin.',
            'prefix' => 'admin'
        ], function(){
            Route::get('', [AdminController::class, 'index'])->name('index');
            Route::group([
                'as'=>'categories.',
                'prefix' => 'categories'
            ], function (){
                Route::get('',[CategoriesController::class, "index"])->name("index");
                Route::get('create',[CategoriesController::class, "create"])->name("create");
                Route::post('store',[CategoriesController::class, "store"])->name("store");
                Route::get('edit/{id}',[CategoriesController::class, "edit"])->name("edit");
                Route::put('update/{id}',[CategoriesController::class, "update"])->name("update");
                Route::get('destroy/{id}',[CategoriesController::class, "destroy"])->name("destroy");
            });
            Route::group([
                'as'=>'tags.',
                'prefix'=>'tags'
            ],function (){
                Route::get('', [TagsController::class, 'index'])->name('index');
                Route::get('create',[TagsController::class, "create"])->name("create");
                Route::post('store',[TagsController::class, "store"])->name("store");
                Route::get('edit/{id}',[TagsController::class, "edit"])->name("edit");
                Route::put('update/{id}',[TagsController::class, "update"])->name("update");
                Route::get('destroy/{id}',[TagsController::class, "destroy"])->name("destroy");
            });
            Route::group([
                'as' => 'posts.',
                'prefix' => 'posts'
            ], function (){
                Route::get('',[PostsController::class, 'index'])->name("index");
                Route::get('create',[PostsController::class, "create"])->name("create");
                Route::post('store',[PostsController::class, "store"])->name("store");
                Route::get('edit/{post}',[PostsController::class, "edit"])->name("edit");
                Route::put('update/{post}', [PostsController::class, 'update'])->name('update');
                Route::get('destroy/{post}',[PostsController::class, "destroy"])->name("destroy");
            });

        });

    });
});

Route::group([
    'as' =>'news.',
    'prefix'=>'news'
], function () {
        Route::get('postDescription/{post}',[NewsController::class, 'postDescription'])->name('description');
        Route::get('posts/{category}',[NewsController::class, 'posts'])->name('posts');
        Route::get('tagPosts/{tag}',[NewsController::class, 'tagPosts'])->name('tagPosts');
});
