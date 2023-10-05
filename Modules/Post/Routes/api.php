<?php

 use Illuminate\Http\Request;
 use Modules\Post\Http\Controllers\Api\PostController;

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


Route::middleware('auth:sanctum')->name('posts.')->prefix('posts')->group(function() {
    Route::get('/',  [PostController::class,'index'])->name('index');
    Route::get('/{id}',  [PostController::class,'show'])->name('show');
});
