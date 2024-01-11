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

Route::prefix('admin')->namespace('Admin')->group(function () {


    // dashboard route
    Route::get('/', 'AdminDashboardController@index')->name('admin.home');


    // Market Module

    // section market in admin panel
    Route::prefix('market')->namespace('Market')->group(function () {

        // section market and category side in admin panel
        Route::prefix('category')->controller("CategoryController")->group(function () {
            Route::get('/', 'index')->name('admin.market.category.index');
            Route::get('/create', 'create')->name('admin.market.category.create');
            Route::post('/store', 'store')->name('admin.market.category.store');
            Route::get('/edit/{productCategory}', 'edit')->name('admin.market.category.edit');
            Route::put('/update/{productCategory}', 'update')->name('admin.market.category.update');
            Route::delete('/destroy/{productCategory}', 'destroy')->name('admin.market.category.destroy');
            Route::get('/status/{productCategory}', 'status')->name('admin.market.category.status');
            Route::get('/show-in-menu/{productCategory}', 'showInMenu')->name('admin.market.category.show-in-menu');
        });


        // section market and brand side in admin panel
        Route::prefix('brand')->controller("BrandController")->group(function () {
            Route::get('/', 'index')->name('admin.market.brand.index');
            Route::get('/create', 'create')->name('admin.market.brand.create');
            Route::post('/store', 'store')->name('admin.market.brand.store');
            Route::get('/edit/{brand}', 'edit')->name('admin.market.brand.edit');
            Route::put('/update/{brand}', 'update')->name('admin.market.brand.update');
            Route::delete('/destroy/{brand}', 'destroy')->name('admin.market.brand.destroy');
            Route::get('/status/{brand}', 'status')->name('admin.market.brand.status');
        });


        // section market and comment side in admin panel
        Route::prefix('comment')->controller("CommentController")->group(function () {
            Route::get('/', 'index')->name('admin.market.comment.index');
            Route::get('/show/{comment}', 'show')->name('admin.market.comment.show');
            Route::put('/update/{comment}', 'update')->name('admin.market.comment.update');
            Route::get('/status/{comment}', 'status')->name('admin.market.comment.status');
            Route::get('/answershow/{comment}', 'answershow')->name('admin.market.comment.answershow');
            Route::get('/approved/{comment}', 'approved')->name('admin.market.comment.approved');
        });


        // section market and delivery side in admin panel
        Route::prefix('delivery')->controller("DeliveryController")->group(function () {
            Route::get('/', 'index')->name('admin.market.delivery.index');
            Route::get('/create', 'create')->name('admin.market.delivery.create');
            Route::post('/store', 'store')->name('admin.market.delivery.store');
            Route::get('/edit/{delivery}', 'edit')->name('admin.market.delivery.edit');
            Route::put('/update/{delivery}', 'update')->name('admin.market.delivery.update');
            Route::delete('/destroy/{delivery}', 'destroy')->name('admin.market.delivery.destroy');
            Route::get('/status/{delivery}', 'status')->name('admin.market.delivery.status');
        });


        // section market , discount  and copan side in admin panel
        Route::prefix('discount')->namespace('Discount')->group(function () {

            Route::prefix('copan')->controller("CopanController")->group(function () {
                Route::get('/', 'index')->name('admin.market.discount.copan.index');
                Route::get('/create', 'create')->name('admin.market.discount.copan.create');
                Route::post('/store', 'store')->name('admin.market.discount.copan.store');
                Route::get('/edit/{copan}', 'edit')->name('admin.market.discount.copan.edit');
                Route::put('/update/{copan}', 'update')->name('admin.market.discount.copan.update');
                Route::delete('/destroy/{copan}', 'destroy')->name('admin.market.discount.copan.destroy');
                Route::get('/status/{copan}', 'status')->name('admin.market.discount.copan.status');
            });


            // section market , discount  and common discount side in admin panel
            Route::prefix('common-discount')->controller("CommonDiscountController")->group(function () {
                Route::get('/', 'index')->name('admin.market.discount.common-discount.index');
                Route::get('/create', 'create')->name('admin.market.discount.common-discount.create');
                Route::post('/store', 'store')->name('admin.market.discount.common-discount.store');
                Route::get('/edit/{commonDiscount}', 'edit')->name('admin.market.discount.common-discount.edit');
                Route::put('/update/{commonDiscount}', 'update')->name('admin.market.discount.common-discount.update');
                Route::delete('/destroy/{commonDiscount}', 'destroy')->name('admin.market.discount.common-discount.destroy');
                Route::get('/status/{commonDiscount}', 'status')->name('admin.market.discount.common-discount.status');
            });


            // section market , discount  and amazing sale side in admin panel
            Route::prefix('amazing-sale')->controller("AmazingSaleController")->group(function () {
                Route::get('/', 'index')->name('admin.market.discount.amazing-sale.index');
                Route::get('/create', 'create')->name('admin.market.discount.amazing-sale.create');
                Route::post('/store', 'store')->name('admin.market.discount.amazing-sale.store');
                Route::get('/edit/{amazingSale}', 'edit')->name('admin.market.discount.amazing-sale.edit');
                Route::put('/update/{amazingSale}', 'update')->name('admin.market.discount.amazing-sale.update');
                Route::delete('/destroy/{amazingSale}', 'destroy')->name('admin.market.discount.amazing-sale.destroy');
                Route::get('/status/{amazingSale}', 'status')->name('admin.market.discount.amazing-sale.status');
            });
        });

        // section market and oders side in admin panel
        Route::prefix('order')->controller("OrderController")->group(function () {
            Route::get('/', 'total')->name('admin.market.order.total-order');
            Route::get('/new-order', 'newOrder')->name('admin.market.order.new-order');
            Route::get('/sending', 'sending')->name('admin.market.order.sending-order');
            Route::get('/unpaind', 'unpaind')->name('admin.market.order.unpaind-order');
            Route::get('/canceled', 'canceled')->name('admin.market.order.canceled-order');
            Route::get('/returned', 'returned')->name('admin.market.order.returned-order');

            Route::get('/show/{order}', 'show')->name('admin.market.order.show-order');
            Route::get('/show/{order}/detail', 'detail')->name('admin.market.order.detail-order');
            Route::get('/change-send-status/{order}', 'changeSendStatus')->name('admin.market.order.change-send-status');
            Route::get('/change-order-status/{order}', 'changeOrderStatus')->name('admin.market.order.change-order-status');
            Route::get('/cancel-order/{order}', 'cancelOrder')->name('admin.market.order.cancel-order');
        });

        // section market and payment side in admin panel
        Route::prefix('payment')->controller("PaymentController")->group(function () {
            Route::get('/', 'total')->name('admin.market.payment.total-payment');
            Route::get('/online', 'online')->name('admin.market.payment.online-payment');
            Route::get('/offline', 'offline')->name('admin.market.payment.offline-payment');
            Route::get('/cash', 'cash')->name('admin.market.payment.cash-payment');
            Route::get('/canceled/{payment}', 'canceled')->name('admin.market.payment.canceled');
            Route::get('/returned/{payment}', 'returned')->name('admin.market.payment.returned');
            Route::get('/show/{payment}', 'show')->name('admin.market.payment.show');
        });

        // section market and product side in admin panel
        Route::prefix('product')->group(function () {
            Route::controller("ProductController")->group(function () {
                Route::get('/', 'index')->name('admin.market.product.index');
                Route::get('/create', 'create')->name('admin.market.product.create');
                Route::post('/store', 'store')->name('admin.market.product.store');
                Route::get('/edit/{product}', 'edit')->name('admin.market.product.edit');
                Route::put('/update/{product}', 'update')->name('admin.market.product.update');
                Route::delete('/destroy/{product}', 'destroy')->name('admin.market.product.destroy');
                Route::get('/status/{product}', 'status')->name('admin.market.product.status');
                Route::get('/marketable/{product}', 'marketable')->name('admin.market.product.marketable');
            });


            // section market and product colors side in admin panel
            Route::controller("ProcutColorController")->group(function () {
                Route::get('/color/{product}', 'index')->name('admin.market.product.color.index');
                Route::get('/color/create/{product}', 'create')->name('admin.market.product.color.create');
                Route::post('/color/store/{product}', 'store')->name('admin.market.product.color.store');
                Route::delete('/color/destroy/{product}/{productColor}', 'destroy')->name('admin.market.product.color.destroy');
                Route::get('/color/status/{productColor}', 'status')->name('admin.market.product.color.status');
            });

            // section market and product gallerys side in admin panel
            Route::controller("GalleryController")->group(function () {
                Route::get('/gallery/{product}', 'index')->name('admin.market.product.gallery.index');
                Route::get('/gallery/create/{product}', 'create')->name('admin.market.product.gallery.create');
                Route::post('/gallery/store/{product}', 'store')->name('admin.market.product.gallery.store');
                Route::delete('/gallery/destroy/{product}/{gallery}', 'destroy')->name('admin.market.product.gallery.destroy');
            });


            // section market and product colors side in admin panel
            Route::controller("GuaranteeController")->group(function () {
                Route::get('/guarantee/{product}', 'index')->name('admin.market.product.guarantee.index');
                Route::get('/guarantee/create/{product}', 'create')->name('admin.market.product.guarantee.create');
                Route::post('/guarantee/store/{product}', 'store')->name('admin.market.product.guarantee.store');
                Route::delete('/guarantee/destroy/{product}/{guarantee}', 'destroy')->name('admin.market.product.guarantee.destroy');
                Route::get('/guarantee/status/{guarantee}', 'status')->name('admin.market.product.guarantee.status');
            });
        });

        // section market and property side in admin panel
        Route::prefix('property')->group(function () {
            Route::controller("PropertyController")->group(function () {
                Route::get('/', 'index')->name('admin.market.property.index');
                Route::get('/create', 'create')->name('admin.market.property.create');
                Route::post('/store', 'store')->name('admin.market.property.store');
                Route::get('/edit/{categoryAttribute}', 'edit')->name('admin.market.property.edit');
                Route::put('/update/{categoryAttribute}', 'update')->name('admin.market.property.update');
                Route::delete('/destroy/{categoryAttribute}', 'destroy')->name('admin.market.property.destroy');
            });


            // section market and property values side in admin panel
            Route::controller("PropertyValueController")->group(function () {
                Route::get('/value/{categoryAttribute}', 'index')->name('admin.market.property.value.index');
                Route::get('/value/create/{categoryAttribute}', 'create')->name('admin.market.property.value.create');
                Route::post('/value/store/{categoryAttribute}', 'store')->name('admin.market.property.value.store');
                Route::get('/value/edit/{categoryAttribute}/{value}', 'edit')->name('admin.market.property.value.edit');
                Route::put('/value/update/{categoryAttribute}/{value}', 'update')->name('admin.market.property.value.update');
                Route::delete('/value/destroy/{categoryAttribute}/{value}', 'destroy')->name('admin.market.property.value.destroy');
            });
        });


        // section market and store side in admin panel
        Route::prefix('store')->controller("StoreController")->group(function () {
            Route::get('/', 'index')->name('admin.market.store.index');
            Route::get('/add-to-store/{product}', 'addToStore')->name('admin.market.store.add-to-store');
            Route::post('/store/{product}', 'store')->name('admin.market.store.store');
            Route::get('/edit/{product}', 'edit')->name('admin.market.store.edit');
            Route::put('/update/{product}', 'update')->name('admin.market.store.update');
        });
    });



    // Content Module

    // section content in admin panel
    Route::prefix('content')->namespace('Content')->group(function () {

        // section content and category side in admin panel
        Route::prefix('category')->controller("CategoryController")->group(function () {
            Route::get('/', 'index')->name('admin.content.category.index');
            Route::get('/create', 'create')->name('admin.content.category.create');
            Route::post('/store', 'store')->name('admin.content.category.store');
            Route::get('/edit/{postCategory}', 'edit')->name('admin.content.category.edit');
            Route::put('/update/{postCategory}', 'update')->name('admin.content.category.update');
            Route::delete('/destroy/{postCategory}', 'destroy')->name('admin.content.category.destroy');
            Route::get('/status/{postCategory}', 'status')->name('admin.content.category.status');
        });


        // section content and comment side in admin panel
        Route::prefix('comment')->controller("CommentController")->group(function () {
            Route::get('/', 'index')->name('admin.content.comment.index');
            Route::get('/show/{comment}', 'show')->name('admin.content.comment.show');
            Route::put('/update/{comment}', 'update')->name('admin.content.comment.update');
            Route::get('/status/{comment}', 'status')->name('admin.content.comment.status');
            Route::get('/answershow/{comment}', 'answershow')->name('admin.content.comment.answershow');
            Route::get('/approved/{comment}', 'approved')->name('admin.content.comment.approved');
        });


        // section content and faq side in admin panel
        Route::prefix('faq')->controller("FaqController")->group(function () {
            Route::get('/', 'index')->name('admin.content.faq.index');
            Route::get('/create', 'create')->name('admin.content.faq.create');
            Route::post('/store', 'store')->name('admin.content.faq.store');
            Route::get('/edit/{faq}', 'edit')->name('admin.content.faq.edit');
            Route::put('/update/{faq}', 'update')->name('admin.content.faq.update');
            Route::delete('/destroy/{faq}', 'destroy')->name('admin.content.faq.destroy');
            Route::get('/status/{faq}', 'status')->name('admin.content.faq.status');
        });


        // section content and menu side in admin panel
        Route::prefix('menu')->controller("MenuController")->group(function () {
            Route::get('/', 'index')->name('admin.content.menu.index');
            Route::get('/create', 'create')->name('admin.content.menu.create');
            Route::post('/store', 'store')->name('admin.content.menu.store');
            Route::get('/edit/{menu}', 'edit')->name('admin.content.menu.edit');
            Route::put('/update/{menu}', 'update')->name('admin.content.menu.update');
            Route::delete('/destroy/{menu}', 'destroy')->name('admin.content.menu.destroy');
            Route::get('/status/{menu}', 'status')->name('admin.content.menu.status');
        });


        // section content and post side in admin panel
        Route::prefix('post')->controller("PostController")->group(function () {
            Route::get('/', 'index')->name('admin.content.post.index');
            Route::get('/create', 'create')->name('admin.content.post.create');
            Route::post('/store', 'store')->name('admin.content.post.store');
            Route::get('/edit/{post}', 'edit')->name('admin.content.post.edit');
            Route::put('/update/{post}', 'update')->name('admin.content.post.update');
            Route::delete('/destroy/{post}', 'destroy')->name('admin.content.post.destroy');
            Route::get('/status/{post}', 'status')->name('admin.content.post.status');
            Route::get('/commentable/{post}', 'commentable')->name('admin.content.post.commentable');
        });


        // section content and page side in admin panel
        Route::prefix('page')->controller("PageController")->group(function () {
            Route::get('/', 'index')->name('admin.content.page.index');
            Route::get('/create', 'create')->name('admin.content.page.create');
            Route::post('/store', 'store')->name('admin.content.page.store');
            Route::get('/edit/{page}', 'edit')->name('admin.content.page.edit');
            Route::put('/update/{page}', 'update')->name('admin.content.page.update');
            Route::delete('/destroy/{page}', 'destroy')->name('admin.content.page.destroy');
            Route::get('/status/{page}', 'status')->name('admin.content.page.status');
        });


        // section content and banner side in admin panel
        Route::prefix('banner')->controller("BannerController")->group(function () {
            Route::get('/', 'index')->name('admin.content.banner.index');
            Route::get('/create', 'create')->name('admin.content.banner.create');
            Route::post('/store', 'store')->name('admin.content.banner.store');
            Route::get('/edit/{banner}', 'edit')->name('admin.content.banner.edit');
            Route::put('/update/{banner}', 'update')->name('admin.content.banner.update');
            Route::delete('/destroy/{banner}', 'destroy')->name('admin.content.banner.destroy');
            Route::get('/status/{banner}', 'status')->name('admin.content.banner.status');
        });
    });


    // User Module

    // section user in admin panel
    Route::prefix('user')->namespace('User')->group(function () {

        // section user and admin-user side in admin panel
        Route::prefix('admin-user')->controller("AdminUserController")->group(function () {
            Route::get('/', 'index')->name('admin.user.admin-user.index');
            Route::get('/create', 'create')->name('admin.user.admin-user.create');
            Route::post('/store', 'store')->name('admin.user.admin-user.store');
            Route::get('/edit/{admin}', 'edit')->name('admin.user.admin-user.edit');
            Route::put('/update/{admin}', 'update')->name('admin.user.admin-user.update');
            Route::delete('/destroy/{admin}', 'destroy')->name('admin.user.admin-user.destroy');
            Route::get('/status/{admin}', 'status')->name('admin.user.admin-user.status');
            Route::get('/activation/{admin}', 'activation')->name('admin.user.admin-user.activation');
            Route::get('/roles/{admin}', 'roles')->name('admin.user.admin-user.roles');
            Route::post('/roles/{admin}/store', 'rolesStore')->name('admin.user.admin-user.roles.store');
            Route::get('/permissions/{admin}', 'permissions')->name('admin.user.admin-user.permissions');
            Route::post('/permissions/{admin}/store', 'permissionsStore')->name('admin.user.admin-user.permissions.store');
        });


        // section user and costumer side in admin panel
        Route::prefix('costumer')->controller("CostumerController")->group(function () {
            Route::get('/', 'index')->name('admin.user.costumer.index');
            Route::get('/create', 'create')->name('admin.user.costumer.create');
            Route::post('/store', 'store')->name('admin.user.costumer.store');
            Route::get('/edit/{costumer}', 'edit')->name('admin.user.costumer.edit');
            Route::put('/update/{costumer}', 'update')->name('admin.user.costumer.update');
            Route::delete('/destroy/{costumer}', 'destroy')->name('admin.user.costumer.destroy');
            Route::get('/status/{costumer}', 'status')->name('admin.user.costumer.status');
            Route::get('/activation/{costumer}', 'activation')->name('admin.user.costumer.activation');
        });


        // section user and role side in admin panel
        Route::prefix('role')->controller("RoleController")->group(function () {
            Route::get('/', 'index')->name('admin.user.role.index');
            Route::get('/create', 'create')->name('admin.user.role.create');
            Route::post('/store', 'store')->name('admin.user.role.store');
            Route::get('/edit/{role}', 'edit')->name('admin.user.role.edit');
            Route::put('/update/{role}', 'update')->name('admin.user.role.update');
            Route::delete('/destroy/{role}', 'destroy')->name('admin.user.role.destroy');
            Route::get('/status/{role}', 'status')->name('admin.user.role.status');
            Route::get('/permission-form/{role}', 'permissionForm')->name('admin.user.role.permission-form');
            Route::put('/permission-upadte/{role}', 'permissionUpadte')->name('admin.user.role.permission-update');
        });


        // section user and permission side in admin panel
        Route::prefix('permission')->controller("PermissionController")->group(function () {
            Route::get('/', 'index')->name('admin.user.permission.index');
            Route::get('/create', 'create')->name('admin.user.permission.create');
            Route::post('/store', 'store')->name('admin.user.permission.store');
            Route::get('/edit/{permission}', 'edit')->name('admin.user.permission.edit');
            Route::put('/update/{permission}', 'update')->name('admin.user.permission.update');
            Route::delete('/destroy/{permission}', 'destroy')->name('admin.user.permission.destroy');
            Route::get('/status/{permission}', 'status')->name('admin.user.permission.status');
        });
    });


    // Notify Module

    // section notify in admin panel
    Route::prefix('notify')->namespace('Notify')->group(function () {

        // section notify and email side in admin panel
        Route::prefix('email')->controller("EmailController")->group(function () {
            Route::get('/', 'index')->name('admin.notify.email.index');
            Route::get('/create', 'create')->name('admin.notify.email.create');
            Route::post('/store', 'store')->name('admin.notify.email.store');
            Route::get('/edit/{email}', 'edit')->name('admin.notify.email.edit');
            Route::put('/update/{email}', 'update')->name('admin.notify.email.update');
            Route::delete('/destroy/{email}', 'destroy')->name('admin.notify.email.destroy');
            Route::get('/status/{email}', 'status')->name('admin.notify.email.status');
        });

        // section notify and email file side in admin panel
        Route::prefix('email-file')->controller("EmailFileController")->group(function () {
            Route::get('/{email}', 'index')->name('admin.notify.email-file.index');
            Route::get('/{email}/create', 'create')->name('admin.notify.email-file.create');
            Route::post('/{email}/store', 'store')->name('admin.notify.email-file.store');
            Route::get('/edit/{file}', 'edit')->name('admin.notify.email-file.edit');
            Route::put('/update/{file}', 'update')->name('admin.notify.email-file.update');
            Route::delete('/destroy/{file}', 'destroy')->name('admin.notify.email-file.destroy');
            Route::get('/status/{file}', 'status')->name('admin.notify.email-file.status');
        });


        // section notify and sms side in admin panel
        Route::prefix('sms')->controller("SmsController")->group(function () {
            Route::get('/', 'index')->name('admin.notify.sms.index');
            Route::get('/create', 'create')->name('admin.notify.sms.create');
            Route::post('/store', 'store')->name('admin.notify.sms.store');
            Route::get('/edit/{sms}', 'edit')->name('admin.notify.sms.edit');
            Route::put('/update/{sms}', 'update')->name('admin.notify.sms.update');
            Route::delete('/destroy/{sms}', 'destroy')->name('admin.notify.sms.destroy');
            Route::get('/status/{sms}', 'status')->name('admin.notify.sms.status');
        });
    });


    // Ticket Module

    // section ticket in admin panel
    Route::prefix('ticket')->namespace('Ticket')->group(function () {

        // section ticket and category side in admin panel
        Route::prefix('category')->controller("TicketCategoryController")->group(function () {
            Route::get('/', 'index')->name('admin.ticket.category.index');
            Route::get('/create', 'create')->name('admin.ticket.category.create');
            Route::post('/store', 'store')->name('admin.ticket.category.store');
            Route::get('/edit/{ticketCategory}', 'edit')->name('admin.ticket.category.edit');
            Route::put('/update/{ticketCategory}', 'update')->name('admin.ticket.category.update');
            Route::delete('/destroy/{ticketCategory}', 'destroy')->name('admin.ticket.category.destroy');
            Route::get('/status/{ticketCategory}', 'status')->name('admin.ticket.category.status');
        });

        // section ticket and priority side in admin panel
        Route::prefix('priority')->controller("TicketPriorityController")->group(function () {
            Route::get('/', 'index')->name('admin.ticket.priority.index');
            Route::get('/create', 'create')->name('admin.ticket.priority.create');
            Route::post('/store', 'store')->name('admin.ticket.priority.store');
            Route::get('/edit/{ticketPriority}', 'edit')->name('admin.ticket.priority.edit');
            Route::put('/update/{ticketPriority}', 'update')->name('admin.ticket.priority.update');
            Route::delete('/destroy/{ticketPriority}', 'destroy')->name('admin.ticket.priority.destroy');
            Route::get('/status/{ticketPriority}', 'status')->name('admin.ticket.priority.status');
        });


        // section ticket and admin tickets side in admin panel
        Route::prefix('admin')->controller("TicketAdminController")->group(function () {
            Route::get('/', 'index')->name('admin.ticket.admin.index');
            Route::get('/set/{admin}', 'set')->name('admin.ticket.admin.set');
        });

        Route::controller("TicketController")->group(function () {
            Route::get('/new-tickets', 'newTickets')->name('admin.ticket.new-ticket');
            Route::get('/open-tickets', 'openTickets')->name('admin.ticket.open-ticket');
            Route::get('/close-tickets', 'closeTickets')->name('admin.ticket.close-ticket');
            Route::get('/', 'index')->name('admin.ticket.index');

            Route::get('/show/{ticket}', 'show')->name('admin.ticket.show');
            Route::put('/update/{ticket}', 'update')->name('admin.ticket.update');
            Route::get('/status/{ticket}', 'status')->name('admin.ticket.status');
            Route::get('/download/{file}', 'download')->name('admin.ticket.download');
        });
    });


    // Setting Module

    // section setting in admin panel
    Route::prefix('setting')->controller("SettingController")->namespace('Setting')->group(function () {
        Route::get('/', 'index')->name('admin.setting.index');
        Route::get('/create', 'create')->name('admin.setting.create');
        Route::post('/store', 'store')->name('admin.setting.store');
        Route::get('/edit/{setting}', 'edit')->name('admin.setting.edit');
        Route::put('/update/{setting}', 'update')->name('admin.setting.update');
        Route::delete('/destroy/{setting}', 'destroy')->name('admin.setting.destroy');
        Route::get('/status/{setting}', 'status')->name('admin.setting.status');
    });

    Route::post('/notification/read-all', 'NotificationController@readAll')->name('admin.notification.read-all');
});


/*
|--------------------------------------------------------------------------
| Customer
|--------------------------------------------------------------------------
*/

Route::namespace('customer')->group(function () {

    Route::controller("HomeController")->group(function () {
        Route::get('/', 'home')->name('customer.home');
        Route::get('/add-to-favorite/{product:slug}', 'addToFavorite')->name('customer.add-to-favorite');
    });


    // section sales process
    Route::namespace('SalesProcess')->group(function () {
        // cart items
        Route::controller("CartController")->group(function () {
            Route::get('/cart', 'cart')->name('customer.sales-process.cart');
            Route::post('/cart', 'updateCart')->name('customer.sales-process.update-cart');
            Route::post('/add-to-cart/{product:slug}', 'addToCart')->name('customer.sales-process.add-to-cart');
            Route::get('/remove-from-cart/{cartItem}', 'removeFromCart')->name('customer.sales-process.remove-from-cart');
        });

        Route::middleware(['cart.items', 'profile.completion'])->group(function () {
            // address
            Route::controller("AddressAndDeliveryController")->group(function () {
                Route::get('/address-and-delivery', 'addressAndDelivery')->name('customer.sales-process.address-and-delivery');
                Route::post('/add-address', 'addAddress')->name('customer.sales-process.add-address');
                Route::get('/get-cities/{province}', 'getCities')->name('customer.sales-process.get-cities');
                Route::get('/edit-address/{address}', 'editAddress')->name('customer.sales-process.edit-address');
                Route::put('/update-address/{address}', 'updateAddress')->name('customer.sales-process.update-address');
                Route::delete('/delete-address/{address}', 'deleteAddress')->name('customer.sales-process.delete-address');
                Route::post('/choose-address-and-delivery', 'chooseAddressAndDelivery')->name('customer.sales-process.choose-address-and-delivery');
            });


            Route::middleware('payment.order')->controller("PaymentController")->group(function () {
                // payment
                Route::get('/payment', 'payment')->name('customer.sales-process.payment');
                Route::post('/copan-discount', 'copanDiscount')->name('customer.sales-process.copan-discount');
                Route::post('/payment-submit', 'paymentSubmit')->name('customer.sales-process.payment-submit');
                Route::any('/payment-callback/{order}/{onlinePayment}', 'paymentCallback')->name('customer.sales-process.payment-call-back');
            });
        });

        // profile completion
        Route::controller("ProfileCompletionController")->group(function () {
            Route::get('/profile-completion', 'profileCompletion')->name('customer.sales-process.profile-completion');
            Route::post('/profile-completion', 'ProfileUpdate')->name('customer.sales-process.profile-completion-update');
        });
    });


    // section products in customer view website
    Route::namespace('Market')->controller("ProductController")->group(function () {
        Route::get('/product/{product:slug}', 'product')->name('customer.market.product');
        Route::post('/add-comment/product/{product:slug}', 'addComment')->name('customer.market.add-comment');
        Route::get('/add-to-favorite/product/{product:slug}', 'addToFavorite')->name('customer.market.add-to-favorite');
    });


    // section profile in customer view website
    Route::prefix('profile')->namespace('Profile')->group(function () {
        // orders profile
        Route::get('/orders', 'OrderController@index')->name('customer.profile.order.orders');

        // account profile
        Route::controller("AccountProfileController")->group(function () {
            Route::get('/', 'index')->name('customer.profile.my-profile');
            Route::get('/edit-profile/{user:id}', 'edit')->name('customer.profile.edit-profile');
            Route::put('/update-profile/{user}', 'update')->name('customer.profile.update-profile');
        });

        // address profile
        Route::controller("AddressController")->group(function () {
            Route::get('/my-address', 'index')->name('customer.profile.address.my-address');
            Route::post('/add-address', 'store')->name('customer.profile.address.add-address');
            Route::get('/edit-address/{address}', 'edit')->name('customer.profile.address.edit-address');
            Route::put('/update-address/{address}', 'update')->name('customer.profile.address.update-address');
            Route::delete('/destroy-address/{address}', 'destroy')->name('customer.profile.address.destroy-address');
            Route::get('/get-cities/{province}', 'getCities')->name('customer.profile.address.get-cities');
        });

        // favorites profile
        Route::controller("FavoriteController")->group(function () {
            Route::get('/my-favorite', 'index')->name('customer.profile.favorite.my-favorites');
            Route::get('/destroy-favorite/{favorite}', 'destroy')->name('customer.profile.favorite.destroy-favorites');
        });

        // tickets profile
        Route::controller("TicketController")->group(function () {
            Route::get('/my-ticket', 'index')->name('customer.profile.ticket.my-tickets');
            Route::get('/new-ticket', 'create')->name('customer.profile.tickets.my-tikcet.create');
            Route::post('/my-ticket/store', 'store')->name('customer.profile.ticket.my-tickets.store');
            Route::get('/my-ticket/{ticket}', 'show')->name('customer.profile.ticket.my-tickets.show');
        });
    });
});
/*
|--------------------------------------------------------------------------
| Customer Login Register
|--------------------------------------------------------------------------
*/

Route::namespace('Auth\Customer')->controller("LoginRegisterController")->group(function () {
    Route::get('login-register', "LoginRegisterForm")->name('auth.customer.login-register-form');
    Route::middleware('throttle:customer-login-register-limiter')
        ->post('/login-register', "LoginRegister")->name('auth.customer.login-register');

    Route::get('login-confirm/{token}', "LoginConfirmForm")->name('auth.customer.login-confirm-form');
    Route::middleware('throttle:customer-login-confirm-limiter')
        ->post('/login-confirm/{token}', "LoginConfirm")->name('auth.customer.login-confirm');

    Route::middleware('throttle:customer-login-resend-otp')
        ->get('/resend-code/{token}', "LoginResendCode")->name('auth.customer.login-resend-code');

    Route::get('/logout', "Logout")->name('auth.customer.logout');
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
