<?php

namespace App\Providers;

use App\Models\Notification;
use App\Models\Content\Comment;
use App\Models\Setting\Setting;
use Illuminate\Support\ServiceProvider;

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
        // admin side const informations
        view()->composer('admin.layouts.header', function($view) {
            $view->with('unseenComments', Comment::where('seen', 0)->get());
            $view->with('notifications', Notification::where('read_at', null)->get());
        });
        
        // // cutomer side const informations
        // view()->composer('customer', function($view) {
        //     $view->with('setting', Setting::where('id', 1)->where('status', 1)->first());
        // });
    }
}
