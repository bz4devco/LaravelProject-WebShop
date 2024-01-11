<?php

namespace App\Providers;

use App\Models\Notification;
use App\Models\Content\Comment;
use App\Models\Market\CartItem;
use App\Models\Setting\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
        // use for paganation view style by bootstrap 5
        Paginator::useBootstrapFive();


        // admin side const informations
        view()->composer('admin.layouts.header', function ($view) {
            $view->with('unseenComments', Comment::where('seen', 0)->get());
            $view->with('notifications', Notification::where('read_at', null)->get());
        });

        // customer cart Items
        view()->composer('customer.layouts.header', function ($view) {
            if (Auth::check()) {
                $view->with('cartItems', CartItem::where('user_id', Auth::user()->id)->get());
            }else{
                $view->with('cartItems', collect());
            }
        });



        // $view->with('setting', Setting::where('id', 1)->where('status', 1)->first());
    }
}
