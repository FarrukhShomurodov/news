<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CategoriesController;
use App\Http\Controllers\apache_child_terminate\TagsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('posts/{id}',[\App\Http\Controllers\ApiController::class, 'posts']);

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin'
], function(){
    Route::group([
        'as'=>'categories.',
        'prefix' => 'categories'
    ], function (){
        Route::get('',[CategoriesController::class, "index"])->name("index");
        Route::post('store',[CategoriesController::class, "store"])->name("store");
        Route::put('update/{category}',[CategoriesController::class, "update"])->name("update");
        Route::get('destroy/{category}',[CategoriesController::class, "destroy"])->name("destroy");
    });
    Route::group([
        'as'=>'tags.',
        'prefix'=>'tags'
    ],function (){
        Route::get('', [TagsController::class, 'index'])->name('index');
        Route::post('store',[TagsController::class, "store"])->name("store");
        Route::put('update/{tag}',[TagsController::class, "update"])->name("update");
        Route::get('destroy/{tag}',[TagsController::class, "destroy"])->name("destroy");
    });
    Route::group([
        'as' => 'posts.',
        'prefix' => 'posts'
    ], function (){
        Route::get('',[PostsController::class, 'index'])->name("index");
        Route::post('store',[PostsController::class, "store"])->name("store");
        Route::put('update/{post}', [PostsController::class, 'update'])->name('update');
        Route::get('destroy/{post}',[PostsController::class, "destroy"])->name("destroy");
    });
});