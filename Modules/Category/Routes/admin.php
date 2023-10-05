<?php
use Modules\Category\Http\Controllers\Admin\CategoryController;

Route::name('category.')->prefix('category')->group(function() {
    Route::PUT('/{id}',  [CategoryController::class,'update'])->name('update');
    Route::get('/',  [CategoryController::class,'index'])->name('index');
    Route::post('/',  [CategoryController::class,'store'])->name('store');
    Route::delete('/{id}',  [CategoryController::class,'destroy'])->name('destroy');
});


