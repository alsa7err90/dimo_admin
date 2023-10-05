<?php
use Modules\Post\Http\Controllers\Admin\PostController;

Route::name('posts.')->prefix('posts')->group(function() {
    Route::get('/create',  [PostController::class,'create'])->name('create');
    Route::PUT('/{id}',  [PostController::class,'update'])->name('update');
    Route::get('/',  [PostController::class,'index'])->name('index');
    Route::get('/{id}',  [PostController::class,'show'])->name('show');
    Route::get('/{id}/edit',  [PostController::class,'edit'])->name('edit');
    Route::post('/',  [PostController::class,'store'])->name('store');
    Route::delete('/{id}',  [PostController::class,'destroy'])->name('destroy');
});


