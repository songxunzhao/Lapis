<?php

namespace App\Providers;

use App\Http\Controllers\Auth\UserLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('isrole', function (UserLevel $role) {
            Auth::check() && Auth::user()->user_level == $role;
        });

        Blade::if('isadmin', function () {
            Auth::check() && Auth::user()->user_level != UserLevel::NORMAL;
        });

        Blade::if('canhandletag', function($tag) {
            $tags = explode(',', Auth::user()->tags);
            return in_array($tag, $tags);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
