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
            Route::get('/edit/{productCategory}', 'CategoryController@edit')->name('admin.market.category.edit');
            Route::put('/update/{productCategory}', 'CategoryController@update')->name('admin.market.category.update');
            Route::delete('/destroy/{productCategory}', 'CategoryController@destroy')->name('admin.market.category.destroy');
            Route::get('/status/{productCategory}', 'CategoryController@status')->name('admin.market.category.status');
            Route::get('/show-in-menu/{productCategory}', 'CategoryController@showInMenu')->name('admin.market.category.show-in-menu');
        });

    
        // section market and brand side in admin panel
        Route::prefix('brand')->group(function (){
            Route::get('/', 'BrandController@index')->name('admin.market.brand.index');
            Route::get('/create', 'BrandController@create')->name('admin.market.brand.create');
            Route::post('/store', 'BrandController@store')->name('admin.market.brand.store');
            Route::get('/edit/{brand}', 'BrandController@edit')->name('admin.market.brand.edit');
            Route::put('/update/{brand}', 'BrandController@update')->name('admin.market.brand.update');
            Route::delete('/destroy/{brand}', 'BrandController@destroy')->name('admin.market.brand.destroy');
            Route::get('/status/{brand}', 'BrandController@status')->name('admin.market.brand.status');
        });


        // section market and comment side in admin panel
        Route::prefix('comment')->group(function (){
            Route::get('/', 'CommentController@index')->name('admin.market.comment.index');
            Route::get('/show/{comment}', 'CommentController@show')->name('admin.market.comment.show');
            Route::put('/update/{comment}', 'CommentController@update')->name('admin.market.comment.update');
            Route::get('/status/{comment}', 'CommentController@status')->name('admin.market.comment.status');
            Route::get('/answershow/{comment}', 'CommentController@answershow')->name('admin.market.comment.answershow');
            Route::get('/approved/{comment}', 'CommentController@approved')->name('admin.market.comment.approved');
        });
  
  
        // section market and delivery side in admin panel
        Route::prefix('delivery')->group(function (){
            Route::get('/', 'DeliveryController@index')->name('admin.market.delivery.index');
            Route::get('/create', 'DeliveryController@create')->name('admin.market.delivery.create');
            Route::post('/store', 'DeliveryController@store')->name('admin.market.delivery.store');
            Route::get('/edit/{delivery}', 'DeliveryController@edit')->name('admin.market.delivery.edit');
            Route::put('/update/{delivery}', 'DeliveryController@update')->name('admin.market.delivery.update');
            Route::delete('/destroy/{delivery}', 'DeliveryController@destroy')->name('admin.market.delivery.destroy');
            Route::get('/status/{delivery}', 'DeliveryController@status')->name('admin.market.delivery.status');
        });

        
        // section market , discount  and copan side in admin panel
        Route::prefix('discount')->namespace('Discount')->group(function (){

            Route::prefix('copan')->group(function (){
                Route::get('/', 'CopanController@index')->name('admin.market.discount.copan.index');
                Route::get('/create', 'CopanController@create')->name('admin.market.discount.copan.create');
                Route::post('/store', 'CopanController@store')->name('admin.market.discount.copan.store');
                Route::get('/edit/{copan}', 'CopanController@edit')->name('admin.market.discount.copan.edit');
                Route::put('/update/{copan}', 'CopanController@update')->name('admin.market.discount.copan.update');
                Route::delete('/destroy/{copan}', 'CopanController@destroy')->name('admin.market.discount.copan.destroy');
                Route::get('/status/{copan}', 'CopanController@status')->name('admin.market.discount.copan.status');

            });
            
            
            // section market , discount  and common discount side in admin panel
            Route::prefix('common-discount')->group(function (){
                Route::get('/', 'CommonDiscountController@index')->name('admin.market.discount.common-discount.index');
                Route::get('/create', 'CommonDiscountController@create')->name('admin.market.discount.common-discount.create');
                Route::post('/store', 'CommonDiscountController@store')->name('admin.market.discount.common-discount.store');
                Route::get('/edit/{commonDiscount}', 'CommonDiscountController@edit')->name('admin.market.discount.common-discount.edit');
                Route::put('/update/{commonDiscount}', 'CommonDiscountController@update')->name('admin.market.discount.common-discount.update');
                Route::delete('/destroy/{commonDiscount}', 'CommonDiscountController@destroy')->name('admin.market.discount.common-discount.destroy');
                Route::get('/status/{commonDiscount}', 'CommonDiscountController@status')->name('admin.market.discount.common-discount.status');

            });


            // section market , discount  and amazing sale side in admin panel
            Route::prefix('amazing-sale')->group(function (){
                Route::get('/', 'AmazingSaleController@index')->name('admin.market.discount.amazing-sale.index');
                Route::get('/create', 'AmazingSaleController@create')->name('admin.market.discount.amazing-sale.create');
                Route::post('/store', 'AmazingSaleController@store')->name('admin.market.discount.amazing-sale.store');
                Route::get('/edit/{amazingSale}', 'AmazingSaleController@edit')->name('admin.market.discount.amazing-sale.edit');
                Route::put('/update/{amazingSale}', 'AmazingSaleController@update')->name('admin.market.discount.amazing-sale.update');
                Route::delete('/destroy/{amazingSale}', 'AmazingSaleController@destroy')->name('admin.market.discount.amazing-sale.destroy');
                Route::get('/status/{amazingSale}', 'AmazingSaleController@status')->name('admin.market.discount.amazing-sale.status');

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
            
            
            Route::get('/show/{order}', 'OrderController@show')->name('admin.market.order.show-order');         
            Route::get('/show/{order}/detail', 'OrderController@detail')->name('admin.market.order.detail-order');         
            Route::get('/change-send-status/{order}', 'OrderController@changeSendStatus')->name('admin.market.order.change-send-status');         
            Route::get('/change-order-status/{order}', 'OrderController@changeOrderStatus')->name('admin.market.order.change-order-status');         
            Route::get('/cancel-order/{order}', 'OrderController@cancelOrder')->name('admin.market.order.cancel-order');         
        });

        // section market and payment side in admin panel
        Route::prefix('payment')->group(function (){
            Route::get('/', 'PaymentController@total')->name('admin.market.payment.total-payment');         
            Route::get('/online', 'PaymentController@online')->name('admin.market.payment.online-payment');         
            Route::get('/offline', 'PaymentController@offline')->name('admin.market.payment.offline-payment');         
            Route::get('/cash', 'PaymentController@cash')->name('admin.market.payment.cash-payment');         
            Route::get('/canceled/{payment}', 'PaymentController@canceled')->name('admin.market.payment.canceled');         
            Route::get('/returned/{payment}', 'PaymentController@returned')->name('admin.market.payment.returned');         
            Route::get('/show/{payment}', 'PaymentController@show')->name('admin.market.payment.show');         
        });

        // section market and product side in admin panel
        Route::prefix('product')->group(function (){
            Route::get('/', 'ProductController@index')->name('admin.market.product.index');
            Route::get('/create', 'ProductController@create')->name('admin.market.product.create');
            Route::post('/store', 'ProductController@store')->name('admin.market.product.store');
            Route::get('/edit/{product}', 'ProductController@edit')->name('admin.market.product.edit');
            Route::put('/update/{product}', 'ProductController@update')->name('admin.market.product.update');
            Route::delete('/destroy/{product}', 'ProductController@destroy')->name('admin.market.product.destroy');
            Route::get('/status/{product}', 'ProductController@status')->name('admin.market.product.status');
            Route::get('/marketable/{product}', 'ProductController@marketable')->name('admin.market.product.marketable');


            // section market and product colors side in admin panel
            Route::get('/color/{product}', 'ProcutColorController@index')->name('admin.market.product.color.index');
            Route::get('/color/create/{product}', 'ProcutColorController@create')->name('admin.market.product.color.create');
            Route::post('/color/store/{product}', 'ProcutColorController@store')->name('admin.market.product.color.store');
            Route::delete('/color/destroy/{product}/{productColor}', 'ProcutColorController@destroy')->name('admin.market.product.color.destroy');
            Route::get('/color/status/{productColor}', 'ProcutColorController@status')->name('admin.market.product.color.status');

            // section market and product gallerys side in admin panel
            Route::get('/gallery/{product}', 'GalleryController@index')->name('admin.market.product.gallery.index');
            Route::get('/gallery/create/{product}', 'GalleryController@create')->name('admin.market.product.gallery.create');
            Route::post('/gallery/store/{product}', 'GalleryController@store')->name('admin.market.gallery.product.store');
            Route::delete('/gallery/destroy/{product}/{gallery}', 'GalleryController@destroy')->name('admin.market.product.gallery.destroy');
        });

        // section market and property side in admin panel
        Route::prefix('property')->group(function (){
            Route::get('/', 'PropertyController@index')->name('admin.market.property.index');
            Route::get('/create', 'PropertyController@create')->name('admin.market.property.create');
            Route::post('/store', 'PropertyController@store')->name('admin.market.property.store');
            Route::get('/edit/{categoryAttribute}', 'PropertyController@edit')->name('admin.market.property.edit');
            Route::put('/update/{categoryAttribute}', 'PropertyController@update')->name('admin.market.property.update');
            Route::delete('/destroy/{categoryAttribute}', 'PropertyController@destroy')->name('admin.market.property.destroy');
            

            // section market and property values side in admin panel
            Route::get('/value/{categoryAttribute}', 'PropertyValueController@index')->name('admin.market.property.value.index');
            Route::get('/value/create/{categoryAttribute}', 'PropertyValueController@create')->name('admin.market.property.value.create');
            Route::post('/value/store/{categoryAttribute}', 'PropertyValueController@store')->name('admin.market.property.value.store');
            Route::get('/value/edit/{categoryAttribute}/{value}', 'PropertyValueController@edit')->name('admin.market.property.value.edit');
            Route::put('/value/update/{categoryAttribute}/{value}', 'PropertyValueController@update')->name('admin.market.property.value.update');
            Route::delete('/value/destroy/{categoryAttribute}/{value}', 'PropertyValueController@destroy')->name('admin.market.property.value.destroy');
        });
        

         // section market and store side in admin panel
         Route::prefix('store')->group(function (){
            Route::get('/', 'StoreController@index')->name('admin.market.store.index');
            Route::get('/add-to-store/{product}', 'StoreController@addToStore')->name('admin.market.store.add-to-store');
            Route::post('/store/{product}', 'StoreController@store')->name('admin.market.store.store');
            Route::get('/edit/{product}', 'StoreController@edit')->name('admin.market.store.edit');
            Route::put('/update/{product}', 'StoreController@update')->name('admin.market.store.update');
            
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
            Route::get('/edit/{admin}', 'AdminUserController@edit')->name('admin.user.admin-user.edit');
            Route::put('/update/{admin}', 'AdminUserController@update')->name('admin.user.admin-user.update');
            Route::delete('/destroy/{admin}', 'AdminUserController@destroy')->name('admin.user.admin-user.destroy');
            Route::get('/status/{admin}', 'AdminUserController@status')->name('admin.user.admin-user.status');
        });


        // section user and costumer side in admin panel
        Route::prefix('costumer')->group(function (){
            Route::get('/', 'CostumerController@index')->name('admin.user.costumer.index');
            Route::get('/create', 'CostumerController@create')->name('admin.user.costumer.create');
            Route::post('/store', 'CostumerController@store')->name('admin.user.costumer.store');
            Route::get('/edit/{costumer}', 'CostumerController@edit')->name('admin.user.costumer.edit');
            Route::put('/update/{costumer}', 'CostumerController@update')->name('admin.user.costumer.update');
            Route::delete('/destroy/{costumer}', 'CostumerController@destroy')->name('admin.user.costumer.destroy');
            Route::get('/status/{costumer}', 'CostumerController@status')->name('admin.user.costumer.status');

        });
    

        // section user and role side in admin panel
        Route::prefix('role')->group(function (){
            Route::get('/', 'RoleController@index')->name('admin.user.role.index');
            Route::get('/create', 'RoleController@create')->name('admin.user.role.create');
            Route::post('/store', 'RoleController@store')->name('admin.user.role.store');
            Route::get('/edit/{role}', 'RoleController@edit')->name('admin.user.role.edit');
            Route::put('/update/{role}', 'RoleController@update')->name('admin.user.role.update');
            Route::delete('/destroy/{role}', 'RoleController@destroy')->name('admin.user.role.destroy');
            Route::get('/status/{role}', 'RoleController@status')->name('admin.user.role.status');
            Route::get('/permission-form/{role}', 'RoleController@permissionForm')->name('admin.user.role.permission-form');
            Route::put('/permission-upadte/{role}', 'RoleController@permissionUpadte')->name('admin.user.role.permission-update');
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

        // section ticket and category side in admin panel
        Route::prefix('category')->group(function (){
            Route::get('/', 'TicketCategoryController@index')->name('admin.ticket.category.index');
            Route::get('/create', 'TicketCategoryController@create')->name('admin.ticket.category.create');
            Route::post('/store', 'TicketCategoryController@store')->name('admin.ticket.category.store');
            Route::get('/edit/{ticketCategory}', 'TicketCategoryController@edit')->name('admin.ticket.category.edit');
            Route::put('/update/{ticketCategory}', 'TicketCategoryController@update')->name('admin.ticket.category.update');
            Route::delete('/destroy/{ticketCategory}', 'TicketCategoryController@destroy')->name('admin.ticket.category.destroy');
            Route::get('/status/{ticketCategory}', 'TicketCategoryController@status')->name('admin.ticket.category.status');
        });

        // section ticket and priority side in admin panel
        Route::prefix('priority')->group(function (){
            Route::get('/', 'TicketPriorityController@index')->name('admin.ticket.priority.index');
            Route::get('/create', 'TicketPriorityController@create')->name('admin.ticket.priority.create');
            Route::post('/store', 'TicketPriorityController@store')->name('admin.ticket.priority.store');
            Route::get('/edit/{ticketPriority}', 'TicketPriorityController@edit')->name('admin.ticket.priority.edit');
            Route::put('/update/{ticketPriority}', 'TicketPriorityController@update')->name('admin.ticket.priority.update');
            Route::delete('/destroy/{ticketPriority}', 'TicketPriorityController@destroy')->name('admin.ticket.priority.destroy');
            Route::get('/status/{ticketPriority}', 'TicketPriorityController@status')->name('admin.ticket.priority.status');
        });


        // section ticket and admin tickets side in admin panel
        Route::prefix('admin')->group(function (){
            Route::get('/', 'TicketAdminController@index')->name('admin.ticket.admin.index');
            Route::get('/set/{admin}', 'TicketAdminController@set')->name('admin.ticket.admin.set');
        });


        Route::get('/new-tickets', 'TicketController@newTickets')->name('admin.ticket.new-ticket');
        Route::get('/open-tickets', 'TicketController@openTickets')->name('admin.ticket.open-ticket');
        Route::get('/close-tickets', 'TicketController@closeTickets')->name('admin.ticket.close-ticket');
        Route::get('/', 'TicketController@index')->name('admin.ticket.index');

        Route::get('/show/{ticket}', 'TicketController@show')->name('admin.ticket.show');
        Route::put('/update/{ticket}', 'TicketController@update')->name('admin.ticket.update');
        Route::get('/status/{ticket}', 'TicketController@status')->name('admin.ticket.status');
        Route::get('/download/{file}', 'TicketController@download')->name('admin.ticket.download');
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

    Route::post('/notification/read-all', 'NotificationController@readAll')->name('admin.notification.read-all');

});


/*
|--------------------------------------------------------------------------
| Customer
|--------------------------------------------------------------------------
*/

Route::get('/', function() {
    return view('customer.home');
})->name('customer.home');


/*
|--------------------------------------------------------------------------
| Customer Login Register
|--------------------------------------------------------------------------
*/

Route::namespace('Auth\Customer')->group(function () {
    Route::get('login-register', "LoginRegisterController@LoginRegisterForm")->name('auth.customer.login-register-form');
    Route::post('/login-register', "LoginRegisterController@LoginRegister")->name('auth.customer.login-register');
});


/*
|--------------------------------------------------------------------------
| Jetstream
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
