<?php

use Modules\question\Http\Controllers\Api\questionController;

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


Route::name('question.')->prefix('question')->group(function() {
    Route::get('/create',  [questionController::class,'create'])->name('create');
    Route::PUT('/{id}',  [questionController::class,'update'])->name('update');
    Route::get('/',  [questionController::class,'index'])->name('index');
    Route::get('/{id}',  [questionController::class,'show'])->name('show');
    Route::get('/{id}/edit',  [questionController::class,'edit'])->name('edit');
    Route::post('/',  [questionController::class,'store'])->name('store');
    Route::delete('/{id}',  [questionController::class,'destroy'])->name('destroy');
});
