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

Route::middleware('admin.auth')->prefix('admin')->namespace('Admin')->group(function () {


    // dashboard route
    Route::get('/', 'AdminDashboardController@index')->name('admin.home');

    // section admin profile in admin panel
    Route::prefix('profile')->controller("ProfileController")->group(function () {
        Route::get('/{user:slug?}', 'index')->name('admin.profile.index');
        Route::get('/edit/{user}', 'edit')->name('admin.profile.edit');
        Route::put('/update/{user}', 'update')->name('admin.profile.update');
    });

    // Market Module

    // section market in admin panel
    Route::prefix('market')->namespace('Market')->group(function () {

        // section market and category side in admin panel
        Route::prefix('category')->controller("CategoryController")->group(function () {
            Route::get('/', 'index')->name('admin.market.category.index')->can('view-products-category-list');
            Route::get('/create', 'create')->name('admin.market.category.create')->can('create-product-category');
            Route::post('/store', 'store')->name('admin.market.category.store')->can('create-product-categoryt');
            Route::get('/edit/{productCategory}', 'edit')->name('admin.market.category.edit')->can('edit-product-category');
            Route::put('/update/{productCategory}', 'update')->name('admin.market.category.update')->can('edit-product-category');
            Route::delete('/destroy/{productCategory}', 'destroy')->name('admin.market.category.destroy')->can('delete-product-category');
            Route::get('/status/{productCategory}', 'status')->name('admin.market.category.status')->can('edit-product-category');
            Route::get('/show-in-menu/{productCategory}', 'showInMenu')->name('admin.market.category.show-in-menu')->can('edit-product-category');
        });


        // section market and brand side in admin panel
        Route::prefix('brand')->controller("BrandController")->group(function () {
            Route::get('/', 'index')->name('admin.market.brand.index')->can('view-brands-list');
            Route::get('/create', 'create')->name('admin.market.brand.create')->can('create-brand');
            Route::post('/store', 'store')->name('admin.market.brand.store')->can('create-brand');
            Route::get('/edit/{brand}', 'edit')->name('admin.market.brand.edit')->can('edit-brand');
            Route::put('/update/{brand}', 'update')->name('admin.market.brand.update')->can('edit-brand');
            Route::delete('/destroy/{brand}', 'destroy')->name('admin.market.brand.destroy')->can('delete-brand');
            Route::get('/status/{brand}', 'status')->name('admin.market.brand.status')->can('edit-brand');
        });


        // section market and comment side in admin panel
        Route::prefix('comment')->controller("CommentController")->group(function () {
            Route::get('/', 'index')->name('admin.market.comment.index')->can('view-product-comments-list');
            Route::get('/show/{comment}', 'show')->name('admin.market.comment.show')->can('show-comment-product');
            Route::put('/update/{comment}', 'update')->name('admin.market.comment.update')->can('answer-comment-product');
            Route::get('/status/{comment}', 'status')->name('admin.market.comment.status')->can('approved-comment-product');
            Route::get('/answershow/{comment}', 'answershow')->name('admin.market.comment.answershow')->can('answer-comment-product');
            Route::get('/approved/{comment}', 'approved')->name('admin.market.comment.approved')->can('answer-comment-product');
        });


        // section market and delivery side in admin panel
        Route::prefix('delivery')->controller("DeliveryController")->group(function () {
            Route::get('/', 'index')->name('admin.market.delivery.index')->can('view-deliveries-list');
            Route::get('/create', 'create')->name('admin.market.delivery.create')->can('create-delivery');
            Route::post('/store', 'store')->name('admin.market.delivery.store')->can('create-delivery');
            Route::get('/edit/{delivery}', 'edit')->name('admin.market.delivery.edit')->can('edit-delivery');
            Route::put('/update/{delivery}', 'update')->name('admin.market.delivery.update')->can('edit-delivery');
            Route::delete('/destroy/{delivery}', 'destroy')->name('admin.market.delivery.destroy')->can('delete-delivery');
            Route::get('/status/{delivery}', 'status')->name('admin.market.delivery.status')->can('edit-delivery');
        });


        // section market , discount  and copan side in admin panel
        Route::prefix('discount')->namespace('Discount')->group(function () {

            // section market , discount  and copan side in admin panel
            Route::prefix('copan')->controller("CopanController")->group(function () {
                Route::get('/', 'index')->name('admin.market.discount.copan.index')->can('view-copans-list');
                Route::get('/create', 'create')->name('admin.market.discount.copan.create')->can('create-copan');
                Route::post('/store', 'store')->name('admin.market.discount.copan.store')->can('create-copan');
                Route::get('/edit/{copan}', 'edit')->name('admin.market.discount.copan.edit')->can('edit-copan');
                Route::put('/update/{copan}', 'update')->name('admin.market.discount.copan.update')->can('edit-copan');
                Route::delete('/destroy/{copan}', 'destroy')->name('admin.market.discount.copan.destroy')->can('delete-copan');
                Route::get('/status/{copan}', 'status')->name('admin.market.discount.copan.status')->can('edit-copan');
            });


            // section market , discount  and common discount side in admin panel
            Route::prefix('common-discount')->controller("CommonDiscountController")->group(function () {
                Route::get('/', 'index')->name('admin.market.discount.common-discount.index')->can('view-common-discount-list');
                Route::get('/create', 'create')->name('admin.market.discount.common-discount.create')->can('create-common-discount');
                Route::post('/store', 'store')->name('admin.market.discount.common-discount.store')->can('create-common-discount');
                Route::get('/edit/{commonDiscount}', 'edit')->name('admin.market.discount.common-discount.edit')->can('edit-common-discount');
                Route::put('/update/{commonDiscount}', 'update')->name('admin.market.discount.common-discount.update')->can('edit-common-discount');
                Route::delete('/destroy/{commonDiscount}', 'destroy')->name('admin.market.discount.common-discount.destroy')->can('delete-common-discount');
                Route::get('/status/{commonDiscount}', 'status')->name('admin.market.discount.common-discount.status')->can('edit-common-discount');
            });


            // section market , discount  and amazing sale side in admin panel
            Route::prefix('amazing-sale')->controller("AmazingSaleController")->group(function () {
                Route::get('/', 'index')->name('admin.market.discount.amazing-sale.index')->can('view-amazing-sales');
                Route::get('/create', 'create')->name('admin.market.discount.amazing-sale.create')->can('create-amazing-sale');
                Route::post('/store', 'store')->name('admin.market.discount.amazing-sale.store')->can('create-amazing-sale');
                Route::get('/edit/{amazingSale}', 'edit')->name('admin.market.discount.amazing-sale.edit')->can('edit-amazing-sale');
                Route::put('/update/{amazingSale}', 'update')->name('admin.market.discount.amazing-sale.update')->can('edit-amazing-sale');
                Route::delete('/destroy/{amazingSale}', 'destroy')->name('admin.market.discount.amazing-sale.destroy')->can('delete-amazing-sale');
                Route::get('/status/{amazingSale}', 'status')->name('admin.market.discount.amazing-sale.status')->can('edit-amazing-sale');
            });
        });

        // section market and oders side in admin panel
        Route::prefix('order')->controller("OrderController")->group(function () {
            Route::get('/', 'total')->name('admin.market.order.total-order');
            Route::get('/new-order', 'newOrder')->name('admin.market.order.new-order')->can('view-orders-list');
            Route::get('/sending', 'sending')->name('admin.market.order.sending-order')->can('view-orders-list');
            Route::get('/unpaind', 'unpaind')->name('admin.market.order.unpaind-order')->can('view-orders-list');
            Route::get('/canceled', 'canceled')->name('admin.market.order.canceled-order')->can('view-orders-list');
            Route::get('/returned', 'returned')->name('admin.market.order.returned-order')->can('view-orders-list');

            Route::get('/show/{order}', 'show')->name('admin.market.order.show-order')->can('show-order');
            Route::get('/show/{order}/detail', 'detail')->name('admin.market.order.detail-order')->can('show-order');
            Route::get('/change-send-status/{order}', 'changeSendStatus')->name('admin.market.order.change-send-status')->can('change-order-send-status');
            Route::get('/change-order-status/{order}', 'changeOrderStatus')->name('admin.market.order.change-order-status')->can('change-order-status');
            Route::get('/cancel-order/{order}', 'cancelOrder')->name('admin.market.order.cancel-order')->can('change-order-status');
        });

        // section market and payment side in admin panel
        Route::prefix('payment')->controller("PaymentController")->group(function () {
            Route::get('/', 'total')->name('admin.market.payment.total-payment')->can('view-payment-list');
            Route::get('/online', 'online')->name('admin.market.payment.online-payment')->can('view-payment-list');
            Route::get('/offline', 'offline')->name('admin.market.payment.offline-payment')->can('view-payment-list');
            Route::get('/cash', 'cash')->name('admin.market.payment.cash-payment')->can('view-payment-list');
            Route::get('/canceled/{payment}', 'canceled')->name('admin.market.payment.canceled')->can('canceled-payment');
            Route::get('/returned/{payment}', 'returned')->name('admin.market.payment.returned')->can('returned-payment');
            Route::get('/show/{payment}', 'show')->name('admin.market.payment.show')->can('show-payment');
        });

        // section market and product side in admin panel
        Route::prefix('product')->group(function () {
            Route::controller("ProductController")->group(function () {
                Route::get('/', 'index')->name('admin.market.product.index')->can('view-products-list');
                Route::get('/create', 'create')->name('admin.market.product.create')->can('create-product');
                Route::post('/store', 'store')->name('admin.market.product.store')->can('create-product');
                Route::post('/upload-images', 'uploadImagesCkeditor')->name('admin.market.product.upload-images-ckeditor')->can('edit-product')->can('create-product');
                Route::get('/edit/{product}', 'edit')->name('admin.market.product.edit')->can('edit-product');
                Route::put('/update/{product}', 'update')->name('admin.market.product.update')->can('edit-product');
                Route::delete('/destroy/{product}', 'destroy')->name('admin.market.product.destroy')->can('delete-product');
                Route::get('/status/{product}', 'status')->name('admin.market.product.status')->can('edit-product');
                Route::get('/marketable/{product}', 'marketable')->name('admin.market.product.marketable')->can('edit-product');
            });


            // section market and product colors side in admin panel
            Route::controller("ProcutColorController")->group(function () {
                Route::get('/color/{product}', 'index')->name('admin.market.product.color.index')->can('view-product-colors-list');
                Route::get('/color/create/{product}', 'create')->name('admin.market.product.color.create')->can('create-color');
                Route::post('/color/store/{product}', 'store')->name('admin.market.product.color.store')->can('create-color');
                Route::delete('/color/destroy/{product}/{productColor}', 'destroy')->name('admin.market.product.color.destroy')->can('delete-color');
                Route::get('/color/status/{productColor}', 'status')->name('admin.market.product.color.status')->can('create-color');
            });

            // section market and product gallerys side in admin panel
            Route::controller("GalleryController")->group(function () {
                Route::get('/gallery/{product}', 'index')->name('admin.market.product.gallery.index')->can('view-product-gallerys-list');
                Route::get('/gallery/create/{product}', 'create')->name('admin.market.product.gallery.create')->can('create-gallery');
                Route::post('/gallery/store/{product}', 'store')->name('admin.market.product.gallery.store')->can('create-gallery');
                Route::delete('/gallery/destroy/{product}/{gallery}', 'destroy')->name('admin.market.product.gallery.destroy')->can('delete-gallery');
            });


            // section market and product colors side in admin panel
            Route::controller("GuaranteeController")->group(function () {
                Route::get('/guarantee/{product}', 'index')->name('admin.market.product.guarantee.index')->can('view-guaranties-list');
                Route::get('/guarantee/create/{product}', 'create')->name('admin.market.product.guarantee.create')->can('create-guarantee');
                Route::post('/guarantee/store/{product}', 'store')->name('admin.market.product.guarantee.store')->can('create-guarantee');
                Route::delete('/guarantee/destroy/{product}/{guarantee}', 'destroy')->name('admin.market.product.guarantee.destroy')->can('delete-guarantee');
                Route::get('/guarantee/status/{guarantee}', 'status')->name('admin.market.product.guarantee.status')->can('create-guarantee');
            });
        });

        // section market and property side in admin panel
        Route::prefix('property')->group(function () {
            Route::controller("PropertyController")->group(function () {
                Route::get('/', 'index')->name('admin.market.property.index')->can('view-product-properties-list');
                Route::get('/create', 'create')->name('admin.market.property.create')->can('create-product-property');
                Route::post('/store', 'store')->name('admin.market.property.store')->can('create-product-property');
                Route::get('/edit/{categoryAttribute}', 'edit')->name('admin.market.property.edit')->can('edit-product-property');
                Route::put('/update/{categoryAttribute}', 'update')->name('admin.market.property.update')->can('edit-product-property');
                Route::delete('/destroy/{categoryAttribute}', 'destroy')->name('admin.market.property.destroy')->can('delete-product-property');
            });


            // section market and property values side in admin panel
            Route::controller("PropertyValueController")->group(function () {
                Route::get('/value/{categoryAttribute}', 'index')->name('admin.market.property.value.index')->can('view-property-values-list');
                Route::get('/value/create/{categoryAttribute}', 'create')->name('admin.market.property.value.create')->can('create-property-value');
                Route::post('/value/store/{categoryAttribute}', 'store')->name('admin.market.property.value.store')->can('view-products-category-list');
                Route::get('/value/edit/{categoryAttribute}/{value}', 'edit')->name('admin.market.property.value.edit')->can('edit-property-value');
                Route::put('/value/update/{categoryAttribute}/{value}', 'update')->name('admin.market.property.value.update')->can('edit-property-value');
                Route::delete('/value/destroy/{categoryAttribute}/{value}', 'destroy')->name('admin.market.property.value.destroy')->can('delete-property-value');
            });
        });


        // section market and store side in admin panel
        Route::prefix('store')->controller("StoreController")->group(function () {
            Route::get('/', 'index')->name('admin.market.store.index')->can('view-store');
            Route::get('/add-to-store/{product}', 'addToStore')->name('admin.market.store.add-to-store')->can('add-to-store');
            Route::post('/store/{product}', 'store')->name('admin.market.store.store')->can('add-to-store');
            Route::get('/edit/{product}', 'edit')->name('admin.market.store.edit')->can('edit-store');
            Route::put('/update/{product}', 'update')->name('admin.market.store.update')->can('edit-store');
        });
    });



    // Content Module

    // section content in admin panel
    Route::prefix('content')->namespace('Content')->group(function () {

        // section content and category side in admin panel
        Route::prefix('category')->controller("CategoryController")->group(function () {
            Route::get('/', 'index')->name('admin.content.category.index')->can('view-content-categories-list');
            Route::get('/create', 'create')->name('admin.content.category.create')->can('create-content-category');
            Route::post('/store', 'store')->name('admin.content.category.store')->can('create-content-category');
            Route::get('/edit/{postCategory}', 'edit')->name('admin.content.category.edit')->can('edit-content-category');
            Route::put('/update/{postCategory}', 'update')->name('admin.content.category.update')->can('edit-content-category');
            Route::delete('/destroy/{postCategory}', 'destroy')->name('admin.content.category.destroy')->can('delete-content-category');
            Route::get('/status/{postCategory}', 'status')->name('admin.content.category.status')->can('edit-content-category');
        });


        // section content and comment side in admin panel
        Route::prefix('comment')->controller("CommentController")->group(function () {
            Route::get('/', 'index')->name('admin.content.comment.index')->can('view-content-comments-list');
            Route::get('/show/{comment}', 'show')->name('admin.content.comment.show')->can('show-content-comment');
            Route::put('/update/{comment}', 'update')->name('admin.content.comment.update')->can('answer-comment-content');
            Route::get('/status/{comment}', 'status')->name('admin.content.comment.status')->can('approved-content-comment');
            Route::get('/answershow/{comment}', 'answershow')->name('admin.content.comment.answershow')->can('answer-comment-content');
            Route::get('/approved/{comment}', 'approved')->name('admin.content.comment.approved')->can('approved-content-comment');
        });


        // section content and faq side in admin panel
        Route::prefix('faq')->controller("FaqController")->group(function () {
            Route::get('/', 'index')->name('admin.content.faq.index')->can('view-faqs-list');
            Route::get('/create', 'create')->name('admin.content.faq.create')->can('craete-faq');
            Route::post('/store', 'store')->name('admin.content.faq.store')->can('craete-faq');
            Route::get('/edit/{faq}', 'edit')->name('admin.content.faq.edit')->can('edit-faq');
            Route::put('/update/{faq}', 'update')->name('admin.content.faq.update')->can('edit-faq');
            Route::delete('/destroy/{faq}', 'destroy')->name('admin.content.faq.destroy')->can('delete-faq');
            Route::get('/status/{faq}', 'status')->name('admin.content.faq.status')->can('edit-faq');
        });


        // section content and menu side in admin panel
        Route::prefix('menu')->controller("MenuController")->group(function () {
            Route::get('/', 'index')->name('admin.content.menu.index')->can('view-menus-list');
            Route::get('/create', 'create')->name('admin.content.menu.create')->can('create-menu');
            Route::post('/store', 'store')->name('admin.content.menu.store')->can('create-menu');
            Route::get('/edit/{menu}', 'edit')->name('admin.content.menu.edit')->can('edit-menu');
            Route::put('/update/{menu}', 'update')->name('admin.content.menu.update')->can('edit-menu');
            Route::delete('/destroy/{menu}', 'destroy')->name('admin.content.menu.destroy')->can('delete-menu');
            Route::get('/status/{menu}', 'status')->name('admin.content.menu.status')->can('edit-menu');
        });


        // section content and post side in admin panel
        Route::prefix('post')->controller("PostController")->group(function () {
            Route::get('/', 'index')->name('admin.content.post.index')->can('view-posts-list');
            Route::get('/create', 'create')->name('admin.content.post.create')->can('create-post');
            Route::post('/store', 'store')->name('admin.content.post.store')->can('create-post');
            Route::post('/upload-images', 'uploadImagesCkeditor')->name('admin.content.post.upload-images-ckeditor')->can('edit-post')->can('create-post');
            Route::get('/edit/{post}', 'edit')->name('admin.content.post.edit')->can('edit-post');
            Route::put('/update/{post}', 'update')->name('admin.content.post.update')->can('edit-post');
            Route::delete('/destroy/{post}', 'destroy')->name('admin.content.post.destroy')->can('delete-post');
            Route::get('/status/{post}', 'status')->name('admin.content.post.status')->can('edit-post');
            Route::get('/commentable/{post}', 'commentable')->name('admin.content.post.commentable')->can('edit-post');
        });


        // section content and page side in admin panel
        Route::prefix('page')->controller("PageController")->group(function () {
            Route::get('/', 'index')->name('admin.content.page.index')->can('view-pages-list');
            Route::get('/create', 'create')->name('admin.content.page.create')->can('create-page');
            Route::post('/store', 'store')->name('admin.content.page.store')->can('create-page');
            Route::post('/upload-images', 'uploadImagesCkeditor')->name('admin.content.page.upload-images-ckeditor')->can('edit-page')->can('create-page');
            Route::get('/edit/{page}', 'edit')->name('admin.content.page.edit');
            Route::put('/update/{page}', 'update')->name('admin.content.page.update')->can('edit-page');
            Route::delete('/destroy/{page}', 'destroy')->name('admin.content.page.destroy')->can('delete-page');
            Route::get('/status/{page}', 'status')->name('admin.content.page.status')->can('edit-page');
        });


        // section content and banner side in admin panel
        Route::prefix('banner')->controller("BannerController")->group(function () {
            Route::get('/', 'index')->name('admin.content.banner.index')->can('view-banners-list');
            Route::get('/create', 'create')->name('admin.content.banner.create')->can('create-banner');
            Route::post('/store', 'store')->name('admin.content.banner.store')->can('create-banner');
            Route::get('/edit/{banner}', 'edit')->name('admin.content.banner.edit')->can('edit-banner');
            Route::put('/update/{banner}', 'update')->name('admin.content.banner.update')->can('edit-banner');
            Route::delete('/destroy/{banner}', 'destroy')->name('admin.content.banner.destroy')->can('delete-banner');
            Route::get('/status/{banner}', 'status')->name('admin.content.banner.status')->can('edit-banner');
        });
    });


    // User Module

    // section user in admin panel
    Route::prefix('user')->namespace('User')->group(function () {

        // section user and admin-user side in admin panel
        Route::prefix('admin-user')->controller("AdminUserController")->group(function () {
            Route::get('/', 'index')->name('admin.user.admin-user.index')->can('view-admins-list');
            Route::get('/create', 'create')->name('admin.user.admin-user.create')->can('create-admin');
            Route::post('/store', 'store')->name('admin.user.admin-user.store')->can('create-admin');
            Route::get('/edit/{admin}', 'edit')->name('admin.user.admin-user.edit')->can('edit-admin');
            Route::put('/update/{admin}', 'update')->name('admin.user.admin-user.update')->can('edit-admin');
            Route::delete('/destroy/{admin}', 'destroy')->name('admin.user.admin-user.destroy')->can('delete-admin');
            Route::get('/status/{admin}', 'status')->name('admin.user.admin-user.status')->can('edit-admin');
            Route::get('/activation/{admin}', 'activation')->name('admin.user.admin-user.activation')->can('edit-admin');
            Route::get('/roles/{admin}', 'roles')->name('admin.user.admin-user.roles')->can('edit-admin-role');
            Route::post('/roles/{admin}/store', 'rolesStore')->name('admin.user.admin-user.roles.store')->can('edit-admin-role');
            Route::get('/permissions/{admin}', 'permissions')->name('admin.user.admin-user.permissions')->can('edit-admin-permission');
            Route::post('/permissions/{admin}/store', 'permissionsStore')->name('admin.user.admin-user.permissions.store')->can('edit-admin-permission');
        });


        // section user and costumer side in admin panel
        Route::prefix('costumer')->controller("CostumerController")->group(function () {
            Route::get('/', 'index')->name('admin.user.costumer.index')->can('view-customers-list');
            Route::get('/create', 'create')->name('admin.user.costumer.create')->can('create-customer');
            Route::post('/store', 'store')->name('admin.user.costumer.store')->can('create-customer');
            Route::get('/edit/{costumer}', 'edit')->name('admin.user.costumer.edit')->can('edit-customer');
            Route::put('/update/{costumer}', 'update')->name('admin.user.costumer.update')->can('edit-customer');
            Route::delete('/destroy/{costumer}', 'destroy')->name('admin.user.costumer.destroy')->can('delete-customer');
            Route::get('/status/{costumer}', 'status')->name('admin.user.costumer.status')->can('edit-customer');
            Route::get('/activation/{costumer}', 'activation')->name('admin.user.costumer.activation')->can('edit-customer');
        });


        // section user and role side in admin panel
        Route::prefix('role')->controller("RoleController")->group(function () {
            Route::get('/', 'index')->name('admin.user.role.index')->can('view-roles-list');
            Route::get('/create', 'create')->name('admin.user.role.create')->can('create-role');
            Route::post('/store', 'store')->name('admin.user.role.store')->can('create-role');
            Route::get('/edit/{role}', 'edit')->name('admin.user.role.edit')->can('edit-role');
            Route::put('/update/{role}', 'update')->name('admin.user.role.update')->can('edit-role');
            Route::delete('/destroy/{role}', 'destroy')->name('admin.user.role.destroy')->can('delete-role');
            Route::get('/status/{role}', 'status')->name('admin.user.role.status')->can('edit-role');
            Route::get('/permission-form/{role}', 'permissionForm')->name('admin.user.role.permission-form')->can('permission-role-sync');
            Route::put('/permission-upadte/{role}', 'permissionUpadte')->name('admin.user.role.permission-update')->can('permission-role-sync');
        });


        // section user and permission side in admin panel
        Route::prefix('permission')->controller("PermissionController")->group(function () {
            Route::get('/', 'index')->name('admin.user.permission.index')->can('view-products-category-list');
            Route::get('/create', 'create')->name('admin.user.permission.create')->can('view-products-category-list');
            Route::post('/store', 'store')->name('admin.user.permission.store')->can('view-products-category-list');
            Route::get('/edit/{permission}', 'edit')->name('admin.user.permission.edit')->can('view-products-category-list');
            Route::put('/update/{permission}', 'update')->name('admin.user.permission.update')->can('view-products-category-list');
            Route::delete('/destroy/{permission}', 'destroy')->name('admin.user.permission.destroy')->can('view-products-category-list');
            Route::get('/status/{permission}', 'status')->name('admin.user.permission.status')->can('view-products-category-list');
        });
    });


    // Notify Module

    // section notify in admin panel
    Route::prefix('notify')->namespace('Notify')->group(function () {

        // section notify and email side in admin panel
        Route::prefix('email')->controller("EmailController")->group(function () {
            Route::get('/', 'index')->name('admin.notify.email.index')->can('view-notify-emails-list');
            Route::get('/create', 'create')->name('admin.notify.email.create')->can('create-notify-email');
            Route::post('/store', 'store')->name('admin.notify.email.store')->can('create-notify-email');
            Route::post('/upload-images', 'uploadImagesCkeditor')->name('admin.notify.email.upload-images-ckeditor')->can('create-notify-email')->can('edit-notify-email');
            Route::get('/edit/{email}', 'edit')->name('admin.notify.email.edit')->can('edit-notify-email');
            Route::put('/update/{email}', 'update')->name('admin.notify.email.update')->can('edit-notify-email');
            Route::delete('/destroy/{email}', 'destroy')->name('admin.notify.email.destroy')->can('delete-notify-email');
            Route::get('/status/{email}', 'status')->name('admin.notify.email.status')->can('edit-notify-email');
            Route::get('/send-mail/{email}', 'sendMail')->name('admin.notify.email.send-mail')->can('send-notify-email');
        });

        // section notify and email file side in admin panel
        Route::prefix('email-file')->controller("EmailFileController")->group(function () {
            Route::get('/{email}', 'index')->name('admin.notify.email-file.index')->can('sync-notify-email-file');
            Route::get('/{email}/create', 'create')->name('admin.notify.email-file.create')->can('sync-notify-email-file');
            Route::post('/{email}/store', 'store')->name('admin.notify.email-file.store')->can('sync-notify-email-file');
            Route::get('/edit/{file}', 'edit')->name('admin.notify.email-file.edit')->can('sync-notify-email-file');
            Route::put('/update/{file}', 'update')->name('admin.notify.email-file.update')->can('sync-notify-email-file');
            Route::delete('/destroy/{file}', 'destroy')->name('admin.notify.email-file.destroy')->can('sync-notify-email-file');
            Route::get('/status/{file}', 'status')->name('admin.notify.email-file.status')->can('sync-notify-email-file');
        });


        // section notify and sms side in admin panel
        Route::prefix('sms')->controller("SmsController")->group(function () {
            Route::get('/', 'index')->name('admin.notify.sms.index')->can('view-notify-sms-list');
            Route::get('/create', 'create')->name('admin.notify.sms.create')->can('create-notify-sms');
            Route::post('/store', 'store')->name('admin.notify.sms.store')->can('create-notify-sms');
            Route::get('/edit/{sms}', 'edit')->name('admin.notify.sms.edit')->can('edit-notify-sms');
            Route::put('/update/{sms}', 'update')->name('admin.notify.sms.update')->can('edit-notify-sms');
            Route::delete('/destroy/{sms}', 'destroy')->name('admin.notify.sms.destroy')->can('delete-notify-sms');
            Route::get('/status/{sms}', 'status')->name('admin.notify.sms.status')->can('edit-notify-sms');
            Route::get('/send-sms/{sms}', 'sendSMS')->name('admin.notify.sms.send-sms')->can('send-notify-sms');
        });
    });


    // Ticket Module

    // section ticket in admin panel
    Route::prefix('ticket')->namespace('Ticket')->group(function () {

        // section ticket and category side in admin panel
        Route::prefix('category')->controller("TicketCategoryController")->group(function () {
            Route::get('/', 'index')->name('admin.ticket.category.index')->can('view-ticket-category-list');
            Route::get('/create', 'create')->name('admin.ticket.category.create')->can('create-ticket-category');
            Route::post('/store', 'store')->name('admin.ticket.category.store')->can('create-ticket-category');
            Route::get('/edit/{ticketCategory}', 'edit')->name('admin.ticket.category.edit')->can('edit-ticket-category');
            Route::put('/update/{ticketCategory}', 'update')->name('admin.ticket.category.update')->can('edit-ticket-category');
            Route::delete('/destroy/{ticketCategory}', 'destroy')->name('admin.ticket.category.destroy')->can('delete-ticket-category');
            Route::get('/status/{ticketCategory}', 'status')->name('admin.ticket.category.status')->can('edit-ticket-category');
        });

        // section ticket and priority side in admin panel
        Route::prefix('priority')->controller("TicketPriorityController")->group(function () {
            Route::get('/', 'index')->name('admin.ticket.priority.index')->can('view-priorities-list');
            Route::get('/create', 'create')->name('admin.ticket.priority.create')->can('create-priority');
            Route::post('/store', 'store')->name('admin.ticket.priority.store')->can('create-priority');
            Route::get('/edit/{ticketPriority}', 'edit')->name('admin.ticket.priority.edit')->can('edit-priority');
            Route::put('/update/{ticketPriority}', 'update')->name('admin.ticket.priority.update')->can('edit-priority');
            Route::delete('/destroy/{ticketPriority}', 'destroy')->name('admin.ticket.priority.destroy')->can('delete-priority');
            Route::get('/status/{ticketPriority}', 'status')->name('admin.ticket.priority.status')->can('edit-priority');
        });


        // section ticket and admin tickets side in admin panel
        Route::prefix('admin')->controller("TicketAdminController")->group(function () {
            Route::get('/', 'index')->name('admin.ticket.admin.index')->can('view-ticket-admins');
            Route::get('/set/{admin}', 'set')->name('admin.ticket.admin.set')->can('edit-ticket-admin');
        });


        Route::controller("TicketController")->group(function () {
            Route::get('/new-tickets', 'newTickets')->name('admin.ticket.new-ticket')->can('view-products-category-list');
            Route::get('/open-tickets', 'openTickets')->name('admin.ticket.open-ticket')->can('view-products-category-list');
            Route::get('/close-tickets', 'closeTickets')->name('admin.ticket.close-ticket')->can('view-products-category-list');
            Route::get('/', 'index')->name('admin.ticket.index')->can('view-products-category-list');

            Route::get('/show/{ticket}', 'show')->name('admin.ticket.show')->can('view-products-category-list');
            Route::put('/update/{ticket}', 'update')->name('admin.ticket.update')->can('view-products-category-list');
            Route::get('/status/{ticket}', 'status')->name('admin.ticket.status')->can('view-products-category-list');
            Route::get('/download/{file}', 'download')->name('admin.ticket.download')->can('view-products-category-list');
        });
    });


    // Setting Module

    // section setting in admin panel
    Route::prefix('setting')->controller("SettingController")->namespace('Setting')->group(function () {
        Route::get('/', 'index')->name('admin.setting.index')->can('view-settings-list');
        Route::get('/create', 'create')->name('admin.setting.create')->can('create-setting');
        Route::post('/store', 'store')->name('admin.setting.store')->can('create-setting');
        Route::get('/edit/{setting}', 'edit')->name('admin.setting.edit')->can('edit-setting');
        Route::put('/update/{setting}', 'update')->name('admin.setting.update')->can('edit-setting');
        Route::delete('/destroy/{setting}', 'destroy')->name('admin.setting.destroy')->can('delete-setting');
        Route::get('/status/{setting}', 'status')->name('admin.setting.status')->can('edit-setting');

        // section index of website and admin settings side in admin panel
        Route::get('/edit-index-page/{setting}', 'editIndexPage')->name('admin.setting.index-page.edit')->can('manage-index-page');
        Route::put('/update-index-page/{setting}', 'updateIndexPage')->name('admin.setting.index-page.update')->can('manage-index-page');

        // section province and admin settings side in admin panel
        Route::prefix('province')->controller("ProvinceController")->group(function () {
            Route::get('/', 'index')->name('admin.setting.province.index')->can('view-provinces-list');
            Route::get('/create', 'create')->name('admin.setting.province.create')->can('create-province');
            Route::post('/store', 'store')->name('admin.setting.province.store')->can('create-province');
            Route::get('/edit/{province}', 'edit')->name('admin.setting.province.edit')->can('edit-province');
            Route::put('/update/{province}', 'update')->name('admin.setting.province.update')->can('edit-province');
            Route::delete('/destroy/{province}', 'destroy')->name('admin.setting.province.destroy')->can('delete-province');
            Route::get('/status/{province}', 'status')->name('admin.setting.province.status')->can('edit-province');


            // section city and admin settings side in admin panel
            Route::controller("CityController")->group(function () {
                Route::get('/city/{province}', 'index')->name('admin.setting.city.index')->can('view-cities-list');
                Route::get('/city/create/{province}', 'create')->name('admin.setting.city.create')->can('create-city');
                Route::post('/city/store/{province}', 'store')->name('admin.setting.city.store')->can('create-city');
                Route::get('/city/edit/{province}/{city}', 'edit')->name('admin.setting.city.edit')->can('edit-city');
                Route::put('/city/update/{province}/{city}', 'update')->name('admin.setting.city.update')->can('edit-city');
                Route::delete('/city/destroy/{province}/{city}', 'destroy')->name('admin.setting.city.destroy')->can('delete-city');
                Route::get('/city/status/{city}', 'status')->name('admin.setting.city.status')->can('edit-city');
            });
        });
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
        Route::get('/page/{page:slug}', 'page')->name('customer.page');
        Route::get('/add-to-favorite/{product:slug}', 'addToFavorite')->name('customer.add-to-favorite');
        Route::get('/search-ajax', 'searchAjax')->name('customer.search-ajax');
    });


    // section sales process
    Route::namespace('SalesProcess')->group(function () {
        // cart items
        Route::middleware('customer.auth')->controller("CartController")->group(function () {
            Route::get('/cart', 'cart')->name('customer.sales-process.cart');
            Route::post('/cart', 'updateCart')->name('customer.sales-process.update-cart');
            Route::post('/add-to-cart/{product:slug}', 'addToCart')->name('customer.sales-process.add-to-cart');
            Route::get('/remove-from-cart/{cartItem}', 'removeFromCart')->name('customer.sales-process.remove-from-cart');
        });

        Route::middleware(['cart.items', 'profile.completion'])->group(function () {
            // address
            Route::middleware('customer.auth')->controller("AddressAndDeliveryController")->group(function () {
                Route::get('/address-and-delivery', 'addressAndDelivery')->name('customer.sales-process.address-and-delivery');
                Route::get('/edit-address/{address}', 'editAddress')->name('customer.sales-process.edit-address');
                Route::put('/update-address/{address}', 'updateAddress')->name('customer.sales-process.update-address');
                Route::delete('/delete-address/{address}', 'deleteAddress')->name('customer.sales-process.delete-address');
                Route::post('/choose-address-and-delivery', 'chooseAddressAndDelivery')->name('customer.sales-process.choose-address-and-delivery');
            });


            Route::middleware('customer.auth')->controller("PaymentController")->group(function () {
                // payment
                Route::get('/payment', 'payment')->name('customer.sales-process.payment');
                Route::post('/copan-discount', 'copanDiscount')->name('customer.sales-process.copan-discount');
                Route::post('/payment-submit', 'paymentSubmit')->name('customer.sales-process.payment-submit');
                Route::any('/payment-callback/{order}/{onlinePayment}', 'paymentCallback')->name('customer.sales-process.payment-call-back');
            });
        });

        // profile completion
        Route::middleware('customer.auth')->controller("ProfileCompletionController")->group(function () {
            Route::get('/profile-completion', 'profileCompletion')->name('customer.sales-process.profile-completion');
            Route::post('/profile-completion', 'ProfileUpdate')->name('customer.sales-process.profile-completion-update');
        });
    });


    // section products in customer view website
    Route::namespace('Market')->controller("ProductController")->group(function () {
        Route::get('/products/{category?}', 'products')->name('customer.market.products');

        // product details
        Route::get('/product/{product:slug}', 'product')->name('customer.market.product');
        Route::post('/add-comment/product/{product:slug}', 'addComment')->name('customer.market.add-comment');
        Route::get('/add-to-favorite/product/{product:slug}', 'addToFavorite')->name('customer.market.add-to-favorite');
        Route::middleware('customer.auth')->get('/add-to-compare/product/{product:slug}', 'addToCompare')->name('customer.market.add-to-compare');
        Route::get('/add-rate/product/{product}', 'addRating')->name('customer.market.product.add-rate');
    });


    // section profile in customer view website
    Route::prefix('profile')->namespace('Profile')->group(function () {
        // orders profile
        Route::middleware('customer.auth')->get('/orders', 'OrderController@index')->name('customer.profile.order.orders');

        // account profile
        Route::middleware('customer.auth')->controller("AccountProfileController")->group(function () {
            Route::get('/', 'index')->name('customer.profile.my-profile');
            Route::get('/edit-profile/{user:id}', 'edit')->name('customer.profile.edit-profile');
            Route::put('/update-profile/{user}', 'update')->name('customer.profile.update-profile');
        });

        // address profile
        Route::middleware('customer.auth')->controller("AddressController")->group(function () {
            Route::get('/my-address', 'index')->name('customer.profile.address.my-address');
            Route::post('/add-address', 'store')->name('customer.profile.address.add-address');
            Route::get('/edit-address/{address}', 'edit')->name('customer.profile.address.edit-address');
            Route::put('/update-address/{address}', 'update')->name('customer.profile.address.update-address');
            Route::delete('/destroy-address/{address}', 'destroy')->name('customer.profile.address.destroy-address');
            Route::get('/get-cities/{province}', 'getCities')->name('customer.profile.address.get-cities');
        });

        // favorites profile
        Route::middleware('customer.auth')->controller("FavoriteController")->group(function () {
            Route::get('/my-favorite', 'index')->name('customer.profile.favorite.my-favorites');
            Route::get('/destroy-favorite/{favorite}', 'destroy')->name('customer.profile.favorite.destroy-favorites');
        });

        // compares profile
        Route::middleware('customer.auth')->controller("CompareController")->group(function () {
            Route::get('/my-comperes', 'index')->name('customer.profile.compare.my-comperes');
            Route::get('/add-to-compare/{product:slug}', 'addToCompare')->name('customer.profile.compare.add-to-compare');
            Route::get('/destroy-compare/{product:slug}', 'destroy')->name('customer.profile.compare.destroy-compare');
        });

        // tickets profile
        Route::middleware('customer.auth')->controller("TicketController")->group(function () {
            Route::get('/my-ticket', 'index')->name('customer.profile.ticket.my-tickets');
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
| Admin Auth
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin/auth', 'namespace' => 'Auth\Admin'], function () {

    // admin login
    Route::controller("LoginController")->group(function () {
        Route::get('login', 'showLoginForm')->name('admin.auth.login.form');
        Route::post('login', 'login')->name('admin.auth.login');
        Route::get('logout', 'logout')->name('admin.auth.logout');
    });
    
    // admin email verification 
    Route::controller("VerificationController")->group(function () {
        Route::get('email/send-verification', 'send')->name('admin.auth.email.send.verification');
        Route::get('email/verify', 'verify')->name('admin.auth.email.verify');
    });
    
    // admin forget password
    Route::controller("ForgotPasswordController")->group(function () {
        Route::get('password/forget', 'showForgetForm')->name('admin.auth.password.forget.form');
        Route::post('password/forget', 'sendResetLink')->name('admin.auth.password.forget');
    });
    
    // admin account reset password
    Route::controller("ResetPasswordController")->group(function () {
        Route::get('password/reset', 'showResetForm')->name('admin.auth.password.reset.form');
        Route::post('password/reset', 'reset')->name('admin.auth.password.reset');
    });
    
    
    // admin login with social media (google)
    Route::controller("SocialController")->group(function () {
        Route::get('redirect/{provider}', 'redirectToProvider')->name('admin.auth.login.provider.redirect');
        Route::get('{provider}/callback', 'providerCallback')->name('admin.auth.login.provider.callback');
    });

    // admin login without passowrd
    Route::controller("MagicController")->group(function () {
        Route::get('magic/login', 'showMagicForm')->name('admin.auth.magic.login.form');
        Route::post('magic/login', 'sendToken')->name('admin.auth.magic.send.token');
        Route::get('magic/login/{token}', 'login')->name('admin.auth.magic.login');
    });

    // Route::get('two-factor/toggle', 'TwoFactorController@showToggleForm')->name('auth.two.factor.toggle.form');
    // Route::get('two-factor/activate', 'TwoFactorController@activate')->name('auth.two.factor.activate');
    // Route::get('two-factor/code', 'TwoFactorController@showEnterCodeForm')->name('auth.two.factor.code.form');
    // Route::post('two-factor/code', 'TwoFactorController@confirmCode')->name('auth.two.factor.code');
    // Route::get('two-factor/deactivate', 'TwoFactorController@deactivate')->name('auth.two.factor.deactivate');
    // Route::get('login/code', 'showCodeForm')->name('auth.login.code.form');
    // Route::post('login/code', 'confirmCode')->name('auth.login.code');
    // Route::get('two-factor/resent', 'TwoFactorController@resent')->name('auth.two.factor.resent');
});
