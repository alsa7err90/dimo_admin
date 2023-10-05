<?php
use Modules\Roles\Http\Controllers\Admin\PermissionController;
use Modules\Roles\Http\Controllers\Admin\RolesController;

Route::name('roles.')->prefix('roles')->group(function() {
    Route::get('/create',  [RolesController::class,'create'])->name('create');
    Route::get('/{id}/edit',  [RolesController::class,'edit'])->name('edit');
    Route::get('/',  [RolesController::class,'index'])->name('index');
    Route::get('/{id}',  [RolesController::class,'show'])->name('show');
    Route::PUT('/{id}',  [RolesController::class,'update'])->name('update');
    Route::post('/',  [RolesController::class,'store'])->name('store');
    Route::delete('/{id}',  [RolesController::class,'destroy'])->name('destroy');
});

Route::name('permissions.')->prefix('permissions')->group(function() {
    Route::get('/delete_many_permission', [PermissionController::class, 'delete_many_permission'])->name('delete_many_permission');
    Route::get('/',  [PermissionController::class,'index'])->name('index');
    Route::get('/create',  [PermissionController::class,'create'])->name('create');
    Route::post('/',  [PermissionController::class,'store'])->name('store');
    Route::delete('/{id}',  [PermissionController::class,'destroy'])->name('destroy');
    });
