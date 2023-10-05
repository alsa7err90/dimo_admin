<?php
use Modules\User\Http\Controllers\Admin\UserController;

Route::name('users.')->prefix('users')->group(function() {
    Route::get('/create',  [UserController::class,'create'])->name('create');
    Route::PUT('/{id}',  [UserController::class,'update'])->name('update');
    Route::get('/',  [UserController::class,'index'])->name('index');
    Route::get('/{id}',  [UserController::class,'show'])->name('show');
    Route::get('/{id}/edit',  [UserController::class,'edit'])->name('edit');
    Route::post('/',  [UserController::class,'store'])->name('store');
    Route::delete('/{id}',  [UserController::class,'destroy'])->name('destroy');
});
