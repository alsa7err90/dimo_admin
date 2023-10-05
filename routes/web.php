<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);
Route::get('home', [HomeController::class, 'index'])->name('home');

// Route::get('placeholder-image/{size}', 'placeholderImage')->name('placeholder.image');

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'admin'])->middleware('admin-editor')->name('admin.home');
Route::get('builder', [HomeController::class, 'builder'])->name('builder.index');
Route::post('builder', [HomeController::class, 'builderStore'])->name('builder.store');

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cache cleared successfully";
 });

