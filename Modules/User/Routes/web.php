<?php
use Modules\User\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::name('users.')->prefix('users')->group(function() {
    Route::get('/my-profile',  [UserController::class,'myProfile'])->name('my_profile');
    Route::post('/update-profile',  [UserController::class,'updateProfile'])->name('update_profile');

});
