<!-- main sibebar -->
<aside id="main-sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">


            <!-- start section home link -->
            <a href="{{ route('admin.home') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>
            <!-- end section home link -->


            <!-- ///////////////////////////////////////////////////////////// -->


            <!-- start markets section managment -->
            <section id="markets-section" class="sidebar-part-title">بخش فروش</section>

            <section id="products-section" class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>ویترین</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    @can('view-products-category-list')
                    <a href="{{ route('admin.market.category.index') }}">دسته بندی</a>
                    @endcan
                    @can('view-product-properties-list')
                    <a href="{{ route('admin.market.property.index') }}">فرم کالا</a>
                    @endcan
                    @can('view-brands-list')
                    <a href="{{ route('admin.market.brand.index') }}">برندها</a>
                    @endcan
                    @can('view-products-list')
                    <a href="{{ route('admin.market.product.index') }}">کالاها</a>
                    @endcan
                    @can('view-store')
                    <a href="{{ route('admin.market.store.index') }}">انبار</a>
                    @endcan
                    @can('view-product-comments-list')
                    <a href="{{ route('admin.market.comment.index') }}">نظرات</a>
                    @endcan
                </section>
            </section>
            <!-- end markets section managment -->


            <!-- ///////////////////////////////////////////////////////////// -->


            <!-- start orders section managment -->
            <section id="order-section" class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>سفارشات</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    @can('view-orders-list')
                    <a href="{{ route('admin.market.order.new-order') }}"> تازه ها</a>
                    <a href="{{ route('admin.market.order.total-order') }}">تمام سفارشات</a>
                    <a href="{{ route('admin.market.order.sending-order') }}">در حال ارسال</a>
                    <a href="{{ route('admin.market.order.unpaind-order') }}">پرداخت نشده</a>
                    <a href="{{ route('admin.market.order.canceled-order') }}">باطل شده</a>
                    <a href="{{ route('admin.market.order.returned-order') }}">مرجوعی</a>
                    @endcan
                </section>
            </section>
            <!-- end orders section managment -->


            <!-- ///////////////////////////////////////////////////////////// -->


            <!-- start payments section managment -->
            <section id="payments-section" class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>پرداخت ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    @can('view-payment-list')
                    <a href="{{ route('admin.market.payment.total-payment') }}">تمام پرداخت ها</a>
                    <a href="{{ route('admin.market.payment.online-payment') }}">پرداخت های آنلاین</a>
                    <a href="{{ route('admin.market.payment.offline-payment') }}">پرداخت های آفلاین</a>
                    <a href="{{ route('admin.market.payment.cash-payment') }}">پرداخت در محل</a>
                    @endcan
                </section>
            </section>
            <!-- end payments section managment -->


            <!-- ///////////////////////////////////////////////////////////// -->


            <!-- start dicounts section managment -->
            <section id="dicounts-section" class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>تخفیف ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    @can('view-copans-list')
                    <a href="{{ route('admin.market.discount.copan.index') }}">کوپن تخفیف</a>
                    @endcan
                    @can('view-common-discount-list')
                    <a href="{{ route('admin.market.discount.common-discount.index') }}">تخفیف عمومی</a>
                    @endcan
                    @can('view-amazing-sales')
                    <a href="{{ route('admin.market.discount.amazing-sale.index') }}">فروش شگفت انگیز</a>
                    @endcan
                </section>
            </section>
            <!-- end dicounts section managment -->


            <!-- ///////////////////////////////////////////////////////////// -->

            @can('view-deliveries-list')
            <!-- start delivery section managment -->
            <a href="{{ route('admin.market.delivery.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>روش های ارسال</span>
            </a>
            <!-- end delivery section managment -->
            @endcan


            <!-- ///////////////////////////////////////////////////////////// -->


            <!-- start content section managment -->
            <section id="contents-section" class="sidebar-part-title">بخش محتوی</section>
            @can('view-content-categories-list')
            <a href="{{ route('admin.content.category.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته بندی</span>
            </a>
            @endcan
            @can('view-posts-list')
            <a href="{{ route('admin.content.post.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>پست ها</span>
            </a>
            @endcan
            @can('view-content-comments-list')
            <a href="{{ route('admin.content.comment.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>نظرات</span>
            </a>
            @endcan
            @can('view-menus-list')
            <a href="{{ route('admin.content.menu.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>منو</span>
            </a>
            @endcan
            @can('view-faqs-list')
            <a href="{{ route('admin.content.faq.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>سوالات متداول</span>
            </a>
            @endcan
            @can('view-pages-list')
            <a href="{{ route('admin.content.page.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>پیج ساز</span>
            </a>
            @endcan
            @can('view-banners-list')
            <a href="{{ route('admin.content.banner.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>بنرها</span>
            </a>
            @endcan
            <!-- end content section managment -->


            <!-- ///////////////////////////////////////////////////////////// -->


            <!-- start users section managment -->
            <section id="users-section" class="sidebar-part-title">بخش کاربران</section>
            @can('view-admins-list')
            <a href="{{ route('admin.user.admin-user.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>کاربران ادمین</span>
            </a>
            @endcan
            @can('view-customers-list')
            <a href="{{ route('admin.user.costumer.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>مشتریان</span>
            </a>
            @endcan

            <section id="roles-section" class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>سطوح دسترسی</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    @can('view-roles-list')
                    <a href="{{ route('admin.user.role.index') }}">مدیریت نقش ها</a>
                    @endcan
                    @can('view-permissions')
                    <a href="{{ route('admin.user.permission.index') }}">مدیریت دسترسی ها</a>
                    @endcan
                </section>
            </section>
            <!-- end users section managment -->


            <!-- ///////////////////////////////////////////////////////////// -->


            <!-- start tickets section managment -->
            <section id="tickets-section" class="sidebar-part-title">تیکت ها</section>
            @can('view-ticket-admins')
            <a href="{{ route('admin.ticket.admin.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>مسئولین تیکت</span>
            </a>
            @endcan
            @can('view-ticket-category-list')
            <a href="{{ route('admin.ticket.category.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته بندی تیکت ها</span>
            </a>
            @endcan
            @can('view-priorities-list')
            <a href="{{ route('admin.ticket.priority.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>اولویت تیکت ها</span>
            </a>
            @endcan
            @can('view-tickets-list')
            <a href="{{ route('admin.ticket.new-ticket') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های جدید</span>
            </a>
            <a href="{{ route('admin.ticket.open-ticket') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های باز</span>
            </a>
            <a href="{{ route('admin.ticket.close-ticket') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های بسته</span>
            </a>
            @endcan
            <!-- end tickets section managment -->


            <!-- ///////////////////////////////////////////////////////////// -->


            <!-- start notifies section managment -->
            <section id="notifies-section" class="sidebar-part-title">اطلاع رسانی</section>
            @can('view-notify-emails-list')
            <a href="{{ route('admin.notify.email.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>اعلامیه ایمیلی</span>
            </a>
            @endcan
            @can('view-notify-sms-list')
            <a href="{{ route('admin.notify.sms.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>اعلامیه پیامکی</span>
            </a>
            @endcan
            <!-- end notifies section managment -->


            <!-- ///////////////////////////////////////////////////////////// -->


            <!-- start settings section managment -->
            <section id="settings-section" class="sidebar-part-title">تنظیمات</section>
            @can('view-settings-list')
            <a href="{{ route('admin.setting.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تنظیمات سایت</span>
            </a>
            @endcan
            @can('view-provinces-list')
            <a href="{{ route('admin.setting.province.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>مدیریت استان و شهرستان</span>
            </a>
            @endcan
            <!-- end settings section managment -->
        </section>
    </section>
</aside>
<!-- main sibebar -->