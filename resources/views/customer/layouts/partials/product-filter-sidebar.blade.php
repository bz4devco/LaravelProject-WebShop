<aside id="sidebar" class="sidebar col-md-3">
    <form action="{{ route('customer.market.products', ['category' => request()->category ? request()->category->id : null ]) }}" method="get">
        <input type="hidden" name="sort" value="{{request()->sort}}">
        <input type="hidden" name="search" value="{{request()->search}}">
        <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
            <!-- start sidebar nav-->
            <section class="sidebar-nav">
                @include('customer.layouts.partials.sidebar-category.categories', ['categories' => $productCategories])
            </section>
            <!--end sidebar nav-->
        </section>

        <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
            <section class="content-header mb-3">
                <section class="d-flex justify-content-between align-items-center">
                    <h2 class="content-header-title content-header-title-small">
                        جستجو در نتایج
                    </h2>
                </section>
            </section>

            <section class="">
                <input class="sidebar-input-text" type="text" name="fltr_search" value="{{request()->fltr_search ?? ''}}" placeholder="جستجو بر اساس نام، برند ...">
            </section>
        </section>

        <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
            <section class="content-header mb-3">
                <section class="d-flex justify-content-between align-items-center">
                    <h2 class="content-header-title content-header-title-small">
                        برند
                    </h2>
                </section>
            </section>

            <section class="sidebar-brand-wrapper">
                @forelse ($brands as $key => $brand)
                <section class="form-check sidebar-brand-item">
                    <input class="form-check-input" type="checkbox" value="{{$brand->id}}" name="brands[]" id="brand-{{$key}}" @checked(isset(request()->brands) && !empty(request()->brands) ? in_array($brand->id, request()->brands) : '') >
                    <label class="form-check-label d-flex justify-content-between" for="brand-{{$key}}">
                        <span>{{$brand->persian_name ?? 'نامشخص'}}</span>
                        <span>{{$brand->orginal_name}}</span>
                    </label>
                </section>
                @empty
                <section class="form-check sidebar-brand-item text-center">
                    <span>برندی یافت نشد</span>
                </section>
                @endforelse
            </section>
        </section>

        <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
            <section class="content-header mb-3">
                <section class="d-flex justify-content-between align-items-center">
                    <h2 class="content-header-title content-header-title-small">
                        محدوده قیمت
                    </h2>
                </section>
            </section>
            <section class="sidebar-price-range d-flex justify-content-between">
                <section class="p-1"><input type="text" placeholder="قیمت از ..." name="min_price" value="{{ request()->min_price ?? '' }}"></section>
                <section class="p-1"><input type="text" placeholder="قیمت تا ..." name="max_price" value="{{ request()->max_price ?? '' }}"></section>
            </section>
        </section>


        <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
            <section class="sidebar-filter-btn d-grid gap-2">
                <button class="btn btn-danger" type="submit">اعمال فیلتر</button>
            </section>
        </section>
    </form>
</aside>