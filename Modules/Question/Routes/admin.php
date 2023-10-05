<?php
use Modules\question\Http\Controllers\Admin\questionController;

Route::name('question.')->prefix('question')->group(function() {
    Route::PUT('/{id}',  [questionController::class,'update'])->name('update');
    Route::get('/',  [questionController::class,'index'])->name('index');
    Route::post('/',  [questionController::class,'store'])->name('store');
    Route::delete('/{id}',  [questionController::class,'destroy'])->name('destroy');
});


