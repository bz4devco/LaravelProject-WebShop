<?php

use Illuminate\Support\Facades\Route;
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

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->namespace('Admin')->group(function (){


    // dashboard route
    Route::get('/', 'AdminDashboardController@index')->name('admin.home');


    // Market Module
    
    // section market in admin panel
    Route::prefix('market')->namespace('Market')->group(function (){

        // section market and category side in admin panel
        Route::prefix('category')->group(function (){
            Route::get('/', 'CategoryController@index')->name('admin.market.category.index');
            Route::get('/create', 'CategoryController@create')->name('admin.market.category.create');
            Route::post('/store', 'CategoryController@store')->name('admin.market.category.store');
            Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.market.category.edit');
            Route::put('/update/{id}', 'CategoryController@update')->name('admin.market.category.update');
            Route::delete('/destroy/{id}', 'CategoryController@destroy')->name('admin.market.category.destroy');
        });

    
        // section market and brand side in admin panel
        Route::prefix('brand')->group(function (){
            Route::get('/', 'BrandController@index')->name('admin.market.brand.index');
            Route::get('/create', 'BrandController@create')->name('admin.market.brand.create');
            Route::post('/store', 'BrandController@store')->name('admin.market.brand.store');
            Route::get('/edit/{id}', 'BrandController@edit')->name('admin.market.brand.edit');
            Route::put('/update/{id}', 'BrandController@update')->name('admin.market.brand.update');
            Route::delete('/destroy/{id}', 'BrandController@destroy')->name('admin.market.brand.destroy');
        });


        // section market and comment side in admin panel
        Route::prefix('comment')->group(function (){
            Route::get('/', 'CommentController@index')->name('admin.market.comment.index');
            Route::get('/show', 'CommentController@show')->name('admin.market.comment.show');
            Route::put('/update/{id}', 'CommentController@update')->name('admin.market.comment.update');
        });
  
  
        // section market and delivery side in admin panel
        Route::prefix('delivery')->group(function (){
            Route::get('/', 'DeliveryController@index')->name('admin.market.delivery.index');
            Route::get('/create', 'DeliveryController@create')->name('admin.market.delivery.create');
            Route::post('/store', 'DeliveryController@store')->name('admin.market.delivery.store');
            Route::get('/edit/{id}', 'DeliveryController@edit')->name('admin.market.delivery.edit');
            Route::put('/update/{id}', 'DeliveryController@update')->name('admin.market.delivery.update');
            Route::delete('/destroy/{id}', 'DeliveryController@destroy')->name('admin.market.delivery.destroy');
        });

        
        // section market , discount  and copan side in admin panel
        Route::prefix('discount')->namespace('Discount')->group(function (){

            Route::prefix('copan')->group(function (){
                Route::get('/', 'CopanController@index')->name('admin.market.discount.copan.index');
                Route::get('/create', 'CopanController@create')->name('admin.market.discount.copan.create');
                Route::post('/store', 'CopanController@store')->name('admin.market.discoommonDiscountcopan.store');
                Route::get('/edit/{id}', 'CopanController@edit')->name('admin.market.discount.copan.edit');
                Route::put('/update/{id}', 'CopanController@update')->name('admin.market.discount.copan.update');
                Route::delete('/destroy/{id}', 'CopanController@destroy')->name('admin.market.discount.copan.destroy');
            });
            
            
            // section market , discount  and common discount side in admin panel
            Route::prefix('common-discount')->group(function (){
                Route::get('/', 'CommonDiscountController@index')->name('admin.market.discount.common-discount.index');
                Route::get('/create', 'CommonDiscountController@create')->name('admin.market.discount.common-discount.create');
                Route::post('/store', 'CommonDiscountController@store')->name('admin.market.discount.common-discount.store');
                Route::get('/edit/{id}', 'CommonDiscountController@edit')->name('admin.market.discount.common-discount.edit');
                Route::put('/update/{id}', 'CommonDiscountController@update')->name('admin.market.discount.common-discount.update');
                Route::delete('/destroy/{id}', 'CommonDiscountController@destroy')->name('admin.market.discount.common-discount.destroy');
            });


            // section market , discount  and amazing sale side in admin panel
            Route::prefix('amazing-sale')->group(function (){
                Route::get('/', 'AmazingSaleController@index')->name('admin.market.discount.amazing-sale.index');
                Route::get('/create', 'AmazingSaleController@create')->name('admin.market.discount.amazing-sale.create');
                Route::post('/store', 'AmazingSaleController@store')->name('admin.market.discount.amazing-sale.store');
                Route::get('/edit/{id}', 'AmazingSaleController@edit')->name('admin.market.discount.amazing-sale.edit');
                Route::put('/update/{id}', 'AmazingSaleController@update')->name('admin.market.discount.amazing-sale.update');
                Route::delete('/destroy/{id}', 'AmazingSaleController@destroy')->name('admin.market.discount.amazing-sale.destroy');
            });
            

        });

        // section market and oders side in admin panel
        Route::prefix('order')->group(function (){
            Route::get('/', 'OrderController@total')->name('admin.market.order.total-order');         
            Route::get('/new-order', 'OrderController@newOrder')->name('admin.market.order.new-order');         
            Route::get('/sending', 'OrderController@sending')->name('admin.market.order.sending-order');         
            Route::get('/unpaind', 'OrderController@unpaind')->name('admin.market.order.unpaind-order');         
            Route::get('/canceled', 'OrderController@canceled')->name('admin.market.order.canceled-order');         
            Route::get('/returned', 'OrderController@returned')->name('admin.market.order.returned-order');         
            
            
            Route::get('/show', 'OrderController@show')->name('admin.market.order.show-order');         
            Route::get('/change-send-status', 'OrderController@changeSendStatus')->name('admin.market.order.change-send-status');         
            Route::get('/change-order-status', 'OrderController@changeOrderStatus')->name('admin.market.order.change-order-status');         
            Route::get('/cancel-order', 'OrderController@cancelOrder')->name('admin.market.order.cancel-order');         
        });

        // section market and payment side in admin panel
        Route::prefix('payment')->group(function (){
            Route::get('/', 'PaymentController@total')->name('admin.market.payment.total-payment');         
            Route::get('/online', 'PaymentController@online')->name('admin.market.payment.online-payment');         
            Route::get('/offline', 'PaymentController@offline')->name('admin.market.payment.offline-payment');         
            Route::get('/attendance', 'PaymentController@attendance')->name('admin.market.payment.attendance-payment');         
            Route::get('/confirm', 'PaymentController@confirm')->name('admin.market.payment.confirm-payment');         
            
            
            // Route::get('/show', 'OrderController@show')->name('admin.market.order.show-order');         
            // Route::get('/change-send-status', 'OrderController@changeSendStatus')->name('admin.market.order.change-send-status');         
            // Route::get('/change-order-status', 'OrderController@changeOrderStatus')->name('admin.market.order.change-order-status');         
            // Route::get('/cancel-order', 'OrderController@cancelOrder')->name('admin.market.order.cancel-order');         
        });

        // section market and product side in admin panel
        Route::prefix('product')->group(function (){
            Route::get('/', 'ProductController@index')->name('admin.market.product.index');
            Route::get('/create', 'ProductController@create')->name('admin.market.product.create');
            Route::post('/store', 'ProductController@store')->name('admin.market.product.store');
            Route::get('/edit/{id}', 'ProductController@edit')->name('admin.market.product.edit');
            Route::put('/update/{id}', 'ProductController@update')->name('admin.market.product.update');
            Route::delete('/destroy/{id}', 'ProductController@destroy')->name('admin.market.product.destroy');
            
            // gallery
            Route::get('/gallery', 'GalleryController@index')->name('admin.market.gallery.index');
            Route::post('/gallery/store', 'GalleryController@store')->name('admin.market.gallery.store');
            Route::delete('/gallery/destroy/{id}', 'GalleryController@destroy')->name('admin.market.gallery.destroy');
        });

        // section market and property side in admin panel
        Route::prefix('prooperty')->group(function (){
            Route::get('/', 'PropertyController@index')->name('admin.market.property.index');
            Route::get('/create', 'PropertyController@create')->name('admin.market.property.create');
            Route::post('/store', 'PropertyController@store')->name('admin.market.property.store');
            Route::get('/edit/{id}', 'PropertyController@edit')->name('admin.market.property.edit');
            Route::put('/update/{id}', 'PropertyController@update')->name('admin.market.property.update');
            Route::delete('/destroy/{id}', 'PropertyController@destroy')->name('admin.market.property.destroy');
            
            // Route::get('/gallery', 'GalleryController@index')->name('admin.market.gallery.index');
            // Route::post('/gallery/store', 'GalleryController@store')->name('admin.market.gallery.store');
            // Route::delete('/gallery/destroy/{id}', 'GalleryController@destroy')->name('admin.market.gallery.destroy');
        });
        

         // section market and store side in admin panel
         Route::prefix('store')->group(function (){
            Route::get('/', 'StoreController@index')->name('admin.market.store.index');
            // Route::get('/create', 'StoreController@create')->name('admin.market.store.create');
            // Route::post('/store', 'StoreController@store')->name('admin.market.store.store');
            Route::get('/edit/{id}', 'StoreController@edit')->name('admin.market.store.edit');
            Route::put('/update/{id}', 'StoreController@update')->name('admin.market.store.update');
            Route::delete('/destroy/{id}', 'StoreController@destroy')->name('admin.market.store.destroy');
            
            Route::get('/add-to-store', 'StoreController@indexAddToStore')->name('admin.market.store.index-add-to-store');
            Route::post('/add-to-store/store', 'StoreController@addToStore')->name('admin.market.store.add-to-store');
        });
    });



    // Content Module
    
    // section content in admin panel
    Route::prefix('content')->namespace('Content')->group(function (){

        // section content and category side in admin panel
        Route::prefix('category')->group(function (){
            Route::get('/', 'CategoryController@index')->name('admin.content.category.index');
            Route::get('/create', 'CategoryController@create')->name('admin.content.category.create');
            Route::post('/store', 'CategoryController@store')->name('admin.content.category.store');
            Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.content.category.edit');
            Route::put('/update/{id}', 'CategoryController@update')->name('admin.content.category.update');
            Route::delete('/destroy/{id}', 'CategoryController@destroy')->name('admin.content.category.destroy');
        });


        // section content and comment side in admin panel
        Route::prefix('comment')->group(function (){
            Route::get('/', 'CommentController@index')->name('admin.content.comment.index');
            Route::get('/show', 'CommentController@show')->name('admin.content.comment.show');
            Route::put('/update/{id}', 'CommentController@update')->name('admin.content.comment.update');
        });


        // section content and faq side in admin panel
        Route::prefix('faq')->group(function (){
            Route::get('/', 'FaqController@index')->name('admin.content.faq.index');
            Route::get('/create', 'FaqController@create')->name('admin.content.faq.create');
            Route::post('/store', 'FaqController@store')->name('admin.content.faq.store');
            Route::get('/edit/{id}', 'FaqController@edit')->name('admin.content.faq.edit');
            Route::put('/update/{id}', 'FaqController@update')->name('admin.content.faq.update');
            Route::delete('/destroy/{id}', 'FaqController@destroy')->name('admin.content.faq.destroy');
        });
    });

});


