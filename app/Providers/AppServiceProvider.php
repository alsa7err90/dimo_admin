<?php

namespace App\Providers;

use App\Constants\Status;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Modules\Category\Entities\Category;
use Illuminate\Support\Facades\Cache;
use Modules\Setting\Entities\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // if(env('APP_HTTPS')) {
        //     \URL::forceScheme('https');
        //     $this->app['request']->server->set('HTTPS','on');
        // }
        Blade::if ('Role', function ($name_role) {
            return auth()->user()->hasRole($name_role);
        });
        Blade::if ('Roles', function ($name_role_array) {
            return auth()->user()->hasAnyRole($name_role_array);
        });
        Blade::if ('Permission', function ($name_Permission) {
            return auth()->user()->hasPermissionTo($name_Permission);
        });

        view()->composer('*', function ($view) {
            // categories
            $view->with(
                'categories_all',
                Cache::remember('categories_all', Status::CACHE, function () {
                    return Category::get();
                })
            );
            $view->with(
                'categories_array',
                Cache::remember('categories_array', Status::CACHE, function () {
                    return Category::select('id', 'name')->get()->pluck('name', 'id');
                })
            );

            // users
            $view->with(
                'users_all',
                Cache::remember('users_all', Status::CACHE, function () {
                    return User::get();
                })
            );
            $view->with(
                'users_array',
                Cache::remember('users_array', Status::CACHE, function () {
                    return User::select('id', 'name')->get()->pluck('name', 'id');
                })
            );
           
            // Settings
            $view->with(
                'settings_all',
                Cache::remember('settings_all', Status::CACHE, function () {
                    return Setting::get();
                })
            );
            $view->with(
                'settings_array',
                Cache::remember('settings_array', Status::CACHE, function () {
                    return Setting::select('key', 'value')->get()->pluck('value', 'key');
                })
            );
        });
    }
}
