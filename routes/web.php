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
                Route::post('/store', 'CopanController@store')->name('admin.marketdiscount..copan.store');
                Route::get('/edit/{id}', 'CopanController@edit')->name('admin.market.discount.copan.edit');
                Route::put('/update/{id}', 'CopanController@update')->name('admin.market.discount.copan.update');
                Route::delete('/destroy/{id}', 'CopanController@destroy')->name('admin.market.discount.copan.destroy');
            });
        });
    });
});


