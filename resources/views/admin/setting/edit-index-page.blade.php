@extends('admin.layouts.master')

@section('haed-tag')
<link rel="stylesheet" href="{{ asset('admin-assets/css/component-custom-switch.css') }}">

<title> تنظیمات نمایش صفحه اصلی سایت | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.setting.index') }}">تنظیمات</a></li>
        <li class="breadcrumb-item active" aria-current="page">تنظیمات نمایش صفحه اصلی سایت</li>
        <li class="breadcrumb-item active" aria-current="page">{{$setting->title}}</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    تنظیمات نمایش صفحه اصلی سایت
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.setting.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="">
                <form id="form" action="{{ route('admin.setting.index-page.update', $setting->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <section class="row">
                        <section class="col-12 col-md-3">
                            <div class="form-group mb-3">
                                <label for="title">نمایش سلایدر</label>
                                <section>
                                    @php $slider = isset($setting->index_page['slider']) ? $setting->index_page['slider'] : ''; @endphp
                                    <div class="custom-switch custom-switch-label-onoff mt-2 d-flex align-content-center" dir="ltr">
                                        <input class="custom-switch-input" id="slider" name="index_page[slider]" type="checkbox" @checked($slider)>
                                        <label class="custom-switch-btn" for="slider"></label>
                                    </div>
                                </section>
                            </div>
                        </section>
                        <section class="col-12 col-md-3">
                            <div class="form-group mb-3">
                                <label for="title">نمایش پربازدیدترین کالاها</label>
                                <section>
                                    @php $mostVisitedProducts = isset($setting->index_page['mostVisitedProducts']) ? $setting->index_page['mostVisitedProducts'] : ''; @endphp
                                    <div class="custom-switch custom-switch-label-onoff mt-2 d-flex align-content-center" dir="ltr">
                                        <input class="custom-switch-input" id="most_visited_products" name="index_page[mostVisitedProducts]" type="checkbox" @checked($mostVisitedProducts) >
                                        <label class="custom-switch-btn" for="most_visited_products"></label>
                                    </div>
                                </section>
                            </div>
                        </section>
                        <section class="col-12 col-md-3">
                            <div class="form-group mb-3">
                                <label for="title">نمایش بنر دو ستونه</label>
                                <section>
                                    @php $middleBanners = isset($setting->index_page['middleBanners']) ? $setting->index_page['middleBanners'] : ''; @endphp
                                    <div class="custom-switch custom-switch-label-onoff mt-2 d-flex align-content-center" dir="ltr">
                                        <input class="custom-switch-input" id="middle_banners" name="index_page[middleBanners]" type="checkbox" @checked($middleBanners) >
                                        <label class="custom-switch-btn" for="middle_banners"></label>
                                    </div>
                                </section>
                            </div>
                        </section>
                        <section class="col-12 col-md-3">
                            <div class="form-group mb-3">
                                <label for="title">نمایش محبوب ترین کالاها</label>
                                <section>
                                    @php $popularProducts = isset($setting->index_page['popularProducts']) ? $setting->index_page['popularProducts'] : ''; @endphp
                                    <div class="custom-switch custom-switch-label-onoff mt-2 d-flex align-content-center" dir="ltr">
                                        <input class="custom-switch-input" id="popular_roducts" name="index_page[popularProducts]" type="checkbox" @checked($popularProducts) >
                                        <label class="custom-switch-btn" for="popular_roducts"></label>
                                    </div>
                                </section>
                            </div>
                        </section>
                        <section class="col-12 col-md-3">
                            <div class="form-group mb-3">
                                <label for="title">نمایش بنر های چهار ستونه</label>
                                <section>
                                    @php $fourBanners = isset($setting->index_page['fourBanners']) ? $setting->index_page['fourBanners'] : ''; @endphp
                                    <div class="custom-switch custom-switch-label-onoff mt-2 d-flex align-content-center" dir="ltr">
                                        <input class="custom-switch-input" id="four_banners" name="index_page[fourBanners]" type="checkbox" @checked($fourBanners) >
                                        <label class="custom-switch-btn" for="four_banners"></label>
                                    </div>
                                </section>
                            </div>
                        </section>
                        <section class="col-12 col-md-3">
                            <div class="form-group mb-3">
                                <label for="title">نمایش پیشنهاد به شما</label>
                                <section>
                                    @php $offerProducts = isset($setting->index_page['offerProducts']) ? $setting->index_page['offerProducts'] : ''; @endphp
                                    <div class="custom-switch custom-switch-label-onoff mt-2 d-flex align-content-center" dir="ltr">
                                        <input class="custom-switch-input" id="offer_products" name="index_page[offerProducts]" type="checkbox" @checked($offerProducts) >
                                        <label class="custom-switch-btn" for="offer_products"></label>
                                    </div>
                                </section>
                            </div>
                        </section>
                        <section class="col-12 col-md-3">
                            <div class="form-group mb-3">
                                <label for="title">نمایش بنر عریض یک ستون</label>
                                <section>
                                    @php $bottomBanner = isset($setting->index_page['bottomBanner']) ? $setting->index_page['bottomBanner'] : ''; @endphp
                                    <div class="custom-switch custom-switch-label-onoff mt-2 d-flex align-content-center" dir="ltr">
                                        <input class="custom-switch-input" id="bottom_banner" name="index_page[bottomBanner]" type="checkbox" @checked($bottomBanner) >
                                        <label class="custom-switch-btn" for="bottom_banner"></label>
                                    </div>
                                </section>
                            </div>
                        </section>
                        <section class="col-12 col-md-3">
                            <div class="form-group mb-3">
                                <label for="title">نمایش برندهای ویژه</label>
                                <section>
                                    @php $brands = isset($setting->index_page['brands']) ? $setting->index_page['brands'] : ''; @endphp
                                    <div class="custom-switch custom-switch-label-onoff mt-2 d-flex align-content-center" dir="ltr">
                                        <input class="custom-switch-input" id="brands" name="index_page[brands]" type="checkbox" @checked($brands) >
                                        <label class="custom-switch-btn" for="brands"></label>
                                    </div>
                                </section>
                            </div>
                        </section>
                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection