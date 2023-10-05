<?php

use Modules\Category\Http\Controllers\Api\CategoryController;

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


Route::name('category.')->prefix('category')->group(function() {
    Route::PUT('/{id}',  [CategoryController::class,'update'])->name('update');
    Route::get('/',  [CategoryController::class,'index'])->name('index');
    Route::post('/',  [CategoryController::class,'store'])->name('store');
    Route::delete('/{id}',  [CategoryController::class,'destroy'])->name('destroy');
});
