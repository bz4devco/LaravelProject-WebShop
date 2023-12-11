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
            Route::get('/edit/{postCategory}', 'CategoryController@edit')->name('admin.content.category.edit');
            Route::put('/update/{postCategory}', 'CategoryController@update')->name('admin.content.category.update');
            Route::delete('/destroy/{postCategory}', 'CategoryController@destroy')->name('admin.content.category.destroy');
            Route::get('/status/{postCategory}', 'CategoryController@status')->name('admin.content.category.status');
        });


        // section content and comment side in admin panel
        Route::prefix('comment')->group(function (){
            Route::get('/', 'CommentController@index')->name('admin.content.comment.index');
            Route::get('/show/{comment}', 'CommentController@show')->name('admin.content.comment.show');
            Route::put('/update/{comment}', 'CommentController@update')->name('admin.content.comment.update');
            Route::get('/status/{comment}', 'CommentController@status')->name('admin.content.comment.status');
            Route::get('/answershow/{comment}', 'CommentController@answershow')->name('admin.content.comment.answershow');
            Route::get('/approved/{comment}', 'CommentController@approved')->name('admin.content.comment.approved');
        });


        // section content and faq side in admin panel
        Route::prefix('faq')->group(function (){
            Route::get('/', 'FaqController@index')->name('admin.content.faq.index');
            Route::get('/create', 'FaqController@create')->name('admin.content.faq.create');
            Route::post('/store', 'FaqController@store')->name('admin.content.faq.store');
            Route::get('/edit/{faq}', 'FaqController@edit')->name('admin.content.faq.edit');
            Route::put('/update/{faq}', 'FaqController@update')->name('admin.content.faq.update');
            Route::delete('/destroy/{faq}', 'FaqController@destroy')->name('admin.content.faq.destroy');
            Route::get('/status/{faq}', 'FaqController@status')->name('admin.content.faq.status');
        });

        
        // section content and menu side in admin panel
        Route::prefix('menu')->group(function (){
            Route::get('/', 'MenuController@index')->name('admin.content.menu.index');
            Route::get('/create', 'MenuController@create')->name('admin.content.menu.create');
            Route::post('/store', 'MenuController@store')->name('admin.content.menu.store');
            Route::get('/edit/{menu}', 'MenuController@edit')->name('admin.content.menu.edit');
            Route::put('/update/{menu}', 'MenuController@update')->name('admin.content.menu.update');
            Route::delete('/destroy/{menu}', 'MenuController@destroy')->name('admin.content.menu.destroy');
            Route::get('/status/{menu}', 'MenuController@status')->name('admin.content.menu.status');
        });
        

        // section content and post side in admin panel
        Route::prefix('post')->group(function (){
            Route::get('/', 'PostController@index')->name('admin.content.post.index');
            Route::get('/create', 'PostController@create')->name('admin.content.post.create');
            Route::post('/store', 'PostController@store')->name('admin.content.post.store');
            Route::get('/edit/{post}', 'PostController@edit')->name('admin.content.post.edit');
            Route::put('/update/{post}', 'PostController@update')->name('admin.content.post.update');
            Route::delete('/destroy/{post}', 'PostController@destroy')->name('admin.content.post.destroy');
            Route::get('/status/{post}', 'PostController@status')->name('admin.content.post.status');
            Route::get('/commentable/{post}', 'PostController@commentable')->name('admin.content.post.commentable');
        });

        
        // section content and page side in admin panel
        Route::prefix('page')->group(function (){
            Route::get('/', 'PageController@index')->name('admin.content.page.index');
            Route::get('/create', 'PageController@create')->name('admin.content.page.create');
            Route::post('/store', 'PageController@store')->name('admin.content.page.store');
            Route::get('/edit/{page}', 'PageController@edit')->name('admin.content.page.edit');
            Route::put('/update/{page}', 'PageController@update')->name('admin.content.page.update');
            Route::delete('/destroy/{page}', 'PageController@destroy')->name('admin.content.page.destroy');
            Route::get('/status/{page}', 'PageController@status')->name('admin.content.page.status');

        });
    });


    // User Module
    
    // section user in admin panel
    Route::prefix('user')->namespace('User')->group(function (){
        
        // section user and admin-user side in admin panel
        Route::prefix('admin-user')->group(function (){
            Route::get('/', 'AdminUserController@index')->name('admin.user.admin-user.index');
            Route::get('/create', 'AdminUserController@create')->name('admin.user.admin-user.create');
            Route::post('/store', 'AdminUserController@store')->name('admin.user.admin-user.store');
            Route::get('/edit/{id}', 'AdminUserController@edit')->name('admin.user.admin-user.edit');
            Route::put('/update/{id}', 'AdminUserController@update')->name('admin.user.admin-user.update');
            Route::delete('/destroy/{id}', 'AdminUserController@destroy')->name('admin.user.admin-user.destroy');
        });


        // section user and costumer side in admin panel
        Route::prefix('costumer')->group(function (){
            Route::get('/', 'CostumerController@index')->name('admin.user.costumer.index');
            Route::get('/create', 'CostumerController@create')->name('admin.user.costumer.create');
            Route::post('/store', 'CostumerController@store')->name('admin.user.costumer.store');
            Route::get('/edit/{id}', 'CostumerController@edit')->name('admin.user.costumer.edit');
            Route::put('/update/{id}', 'CostumerController@update')->name('admin.user.costumer.update');
            Route::delete('/destroy/{id}', 'CostumerController@destroy')->name('admin.user.costumer.destroy');
        });
    

        // section user and role side in admin panel
        Route::prefix('role')->group(function (){
            Route::get('/', 'RoleController@index')->name('admin.user.role.index');
            Route::get('/create', 'RoleController@create')->name('admin.user.role.create');
            Route::post('/store', 'RoleController@store')->name('admin.user.role.store');
            Route::get('/edit/{id}', 'RoleController@edit')->name('admin.user.role.edit');
            Route::put('/update/{id}', 'RoleController@update')->name('admin.user.role.update');
            Route::delete('/destroy/{id}', 'RoleController@destroy')->name('admin.user.role.destroy');
        });
        
    });
    
    
    // Notify Module
    
    // section notify in admin panel
    Route::prefix('notify')->namespace('Notify')->group(function (){

        // section notify and email side in admin panel
        Route::prefix('email')->group(function (){
            Route::get('/', 'EmailController@index')->name('admin.notify.email.index');
            Route::get('/create', 'EmailController@create')->name('admin.notify.email.create');
            Route::post('/store', 'EmailController@store')->name('admin.notify.email.store');
            Route::get('/edit/{email}', 'EmailController@edit')->name('admin.notify.email.edit');
            Route::put('/update/{email}', 'EmailController@update')->name('admin.notify.email.update');
            Route::delete('/destroy/{email}', 'EmailController@destroy')->name('admin.notify.email.destroy');
            Route::get('/status/{email}', 'EmailController@status')->name('admin.notify.email.status');
        });

          // section notify and email file side in admin panel
          Route::prefix('email-file')->group(function (){
            Route::get('/{email}', 'EmailFileController@index')->name('admin.notify.email-file.index');
            Route::get('/{email}/create', 'EmailFileController@create')->name('admin.notify.email-file.create');
            Route::post('/{email}/store', 'EmailFileController@store')->name('admin.notify.email-file.store');
            Route::get('/edit/{file}', 'EmailFileController@edit')->name('admin.notify.email-file.edit');
            Route::put('/update/{file}', 'EmailFileController@update')->name('admin.notify.email-file.update');
            Route::delete('/destroy/{file}', 'EmailFileController@destroy')->name('admin.notify.email-file.destroy');
            Route::get('/status/{file}', 'EmailFileController@status')->name('admin.notify.email-file.status');
        });


        // section notify and sms side in admin panel
        Route::prefix('sms')->group(function (){
            Route::get('/', 'SmsController@index')->name('admin.notify.sms.index');
            Route::get('/create', 'SmsController@create')->name('admin.notify.sms.create');
            Route::post('/store', 'SmsController@store')->name('admin.notify.sms.store');
            Route::get('/edit/{sms}', 'SmsController@edit')->name('admin.notify.sms.edit');
            Route::put('/update/{sms}', 'SmsController@update')->name('admin.notify.sms.update');
            Route::delete('/destroy/{sms}', 'SmsController@destroy')->name('admin.notify.sms.destroy');
            Route::get('/status/{sms}', 'SmsController@status')->name('admin.notify.sms.status');
        });
                
    });


    // Ticket Module
    
    // section ticket in admin panel
    Route::prefix('ticket')->namespace('Ticket')->group(function (){

        Route::get('/new-tickets', 'TicketController@newTickets')->name('admin.ticket.new-ticket');
        Route::get('/open-tickets', 'TicketController@openTickets')->name('admin.ticket.open-ticket');
        Route::get('/close-tickets', 'TicketController@closeTickets')->name('admin.ticket.close-ticket');
        Route::get('/', 'TicketController@index')->name('admin.ticket.index');

        Route::get('/show', 'TicketController@show')->name('admin.ticket.show');
        Route::get('/edit/{id}', 'TicketController@edit')->name('admin.ticket.edit');
        Route::put('/update/{id}', 'TicketController@update')->name('admin.ticket.update');
        Route::delete('/destroy/{id}', 'TicketController@destroy')->name('admin.ticket.destroy');

    });


    // Setting Module
    
    // section setting in admin panel
    Route::prefix('setting')->namespace('Setting')->group(function (){
        Route::get('/', 'SettingController@index')->name('admin.setting.index');
        Route::get('/create', 'SettingController@create')->name('admin.setting.create');
        Route::post('/store', 'SettingController@store')->name('admin.setting.store');
        Route::get('/edit/{setting}', 'SettingController@edit')->name('admin.setting.edit');
        Route::put('/update/{setting}', 'SettingController@update')->name('admin.setting.update');
        Route::delete('/destroy/{setting}', 'SettingController@destroy')->name('admin.setting.destroy');
        Route::get('/status/{setting}', 'SettingController@status')->name('admin.setting.status');
    });
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
