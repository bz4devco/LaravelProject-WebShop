<?php

namespace App\Providers;

use App\Models\Content\Menu;
use App\Models\Notification;
use App\Models\Content\Comment;
use App\Models\Market\CartItem;
use App\Models\Setting\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Models\Market\ProductCategory;
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
        view()->composer('admin.layouts.header', function ($view) {
            $view->with('unseenComments', Comment::where('seen', 0)->get());
            $view->with('notifications', Notification::where('read_at', null)->get());
        });

        // customer cart Items
        view()->composer('customer.layouts.header', function ($view) {
            $view->with('headerMenu', Menu::where('status', 1)->where('position', 0)->orderBy('sort', 'asc')->take(7)->get());
            $view->with('headerCateegories', ProductCategory::where('status', 1)->get());

            if (Auth::check()) {
                $view->with('cartItems', CartItem::where('user_id', Auth::user()->id)->get());
            } else {
                $view->with('cartItems', collect());
            }
        });

        view()->composer('customer.layouts.footer', function ($view) {
            $view->with('footerMenu', Menu::where('status', 1)->where('position', 1)->orderBy('sort', 'asc')->take(15)->get());
        });

        view()->composer(['customer.*', 'emails.*'], function ($view) {
            $view->with('setting', Setting::where('status', 1)->orderBy('id', 'asc')->first());
        });
    }
}
