<?php
use Modules\question\Http\Controllers\questionController;

Route::prefix('question')->group(function() {
    Route::get('/', 'questionController@index');
});
