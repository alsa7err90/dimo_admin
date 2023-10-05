<?php
        use Modules\Setting\Http\Controllers\Admin\SettingController;

        Route::name('settings.')->prefix('settings')->group(function() {
            Route::PUT('/{id}',  [SettingController::class,'update'])->name('update');
            Route::get('/',  [SettingController::class,'index'])->name('index');
            Route::post('/',  [SettingController::class,'store'])->name('store');
            Route::post('/updateAll',  [SettingController::class,'updateAll'])->name('updateAll');

            Route::delete('/{id}',  [SettingController::class,'destroy'])->name('destroy');
        });
