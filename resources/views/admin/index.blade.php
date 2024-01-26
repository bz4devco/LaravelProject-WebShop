@extends('admin.layouts.master')

@section('haed-tag')
<title>داشبورد | پنل مدیریت</title>
@endsection

@section('content')
<!-- dashboard charts -->
<!-- dashboard charts -->
<section class="row">
    @if (session('mustVerifyEmail'))
    <section class="col-12">
        <div class="alert alert-info alert-dismissible fade show">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
            </svg>
            <strong class="alert-heading ">تایید ایمیل</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <hr class="my-2">
            <p class="mb-0">
                @lang('auth.you must verify your email', ['link' => route('admin.auth.email.send.verification')])
            </p>
        </div>
    </section>
    @endif
    <section class="col-lg-3 col-md-6 col-12">
        <a href="" class="text-decoration-none d-block mb-4">
            <section class="card bg-custom-yellow text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <h5>30,200 تومان</h5>
                            <p>سود خالص</p>
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>
    <section class="col-lg-3 col-md-6 col-12">
        <a href="" class="text-decoration-none d-block mb-4">
            <section class="card bg-custom-green text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <h5>30,200 تومان</h5>
                            <p>سود خالص</p>
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>
    <section class="col-lg-3 col-md-6 col-12">
        <a href="" class="text-decoration-none d-block mb-4">
            <section class="card bg-custom-pink text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <h5>30,200 تومان</h5>
                            <p>سود خالص</p>
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>
    <section class="col-lg-3 col-md-6 col-12">
        <a href="" class="text-decoration-none d-block mb-4">
            <section class="card bg-custom-blue text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <h5>30,200 تومان</h5>
                            <p>سود خالص</p>
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>
    <section class="col-lg-3 col-md-6 col-12">
        <a href="" class="text-decoration-none d-block mb-4">
            <section class="card bg-danger text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <h5>30,200 تومان</h5>
                            <p>سود خالص</p>
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>
    <section class="col-lg-3 col-md-6 col-12">
        <a href="" class="text-decoration-none d-block mb-4">
            <section class="card bg-success text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <h5>30,200 تومان</h5>
                            <p>سود خالص</p>
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>
    <section class="col-lg-3 col-md-6 col-12">
        <a href="" class="text-decoration-none d-block mb-4">
            <section class="card bg-warning text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <h5>30,200 تومان</h5>
                            <p>سود خالص</p>
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>
    <section class="col-lg-3 col-md-6 col-12">
        <a href="" class="text-decoration-none d-block mb-4">
            <section class="card bg-primary text-white">
                <section class="card-body">
                    <section class="d-flex justify-content-between">
                        <section class="info-box-body">
                            <h5>30,200 تومان</h5>
                            <p>سود خالص</p>
                        </section>
                        <section class="info-box-icon">
                            <i class="fas fa-chart-line"></i>
                        </section>
                    </section>
                </section>
                <section class="card-footer info-box-footer">
                    <i class="fas fa-clock mx-2"></i> به روز رسانی در : 21:42 بعد از ظهر
                </section>
            </section>
        </a>
    </section>
</section>
<section class="row">
    <section class="col-md-6">
        <section class="main-body-container">
            <canvas id="payments"></canvas>
        </section>
    </section>
    <section class="col-md-6">
        <section class="main-body-container">
            <canvas id="sold-products"></canvas>
        </section>
    </section>
</section>
<!-- dashboard charts -->

<!-- dashboard users information box -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    بخش کاربران
                </h5>
                <p>
                    در این بخش اطلاعاتی در مورد کاربران به شما داده می شود
                </p>
            </section>
            <section class="users-info-body-content">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>

            </section>
        </section>
    </section>
</section>
<!-- dashboard users information box -->
@endsection
@section('script')
<script src="{{ asset('admin-assets/js/chart/chart.min.js')}}"></script>
<script src="{{ asset('admin-assets/js/plugin/ajaxs/payment-chart-ajax.js')}}"></script>
<script src="{{ asset('admin-assets/js/plugin/ajaxs/sold-products-chart-ajax.js')}}"></script>

@endsection