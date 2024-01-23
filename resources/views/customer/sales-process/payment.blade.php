@extends('customer.layouts.master-one-col')

@section('haed-tag')
<link rel="stylesheet" href="{{ asset('customer-assets/css/payment.css') }}">
<meta name="robots" content="index, nofollow">

<title>پرداخت | {{$setting->title}}</title>
@endsection

@section('content')
<!-- start cart -->
<section class="mb-4">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <!-- start vontent header -->
                <section class="content-header">
                    <section class="d-flex justify-content-between align-items-center">
                        <h2 class="content-header-title">
                            <span>انتخاب نوع پرداخت </span>
                        </h2>
                    </section>
                </section>

                <section class="row mt-4">
                    <section class="col-md-9">
                        <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                            <!-- start vontent header -->
                            <section class="content-header mb-3">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        کد تخفیف
                                    </h2>
                                </section>
                            </section>

                            @if (!$orderHasCopan)

                            <section class="payment-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                <secrion>
                                    کد تخفیف خود را در این بخش وارد کنید.
                                </secrion>
                            </section>

                            <section class="row">
                                <section class="col-md-5">
                                    <form action="{{ route('customer.sales-process.copan-discount') }}" method="post">
                                        @csrf
                                        <section class="input-group input-group-sm">
                                            <input type="text" class="form-control" id="code" name="code" placeholder="کد تخفیف را وارد کنید">
                                            <button type="submit" class="btn btn-primary" type="button">اعمال کد</button>
                                        </section>
                                        @error('code')
                                        <span class="text-danger font-size-12">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                        @enderror
                                    </form>
                                </section>
                            </section>
                            @else
                            <section class="payment-alert alert alert-success d-flex align-items-center p-2" role="alert">
                                <i class="fas fa-circle-check flex-shrink-0 me-2"></i>
                                <secrion>
                                    کد تخفیف روی محصولات شما اعمال شده است.
                                </secrion>
                            </section>

                            <section class="row">
                                <section class="col-md-12">
                                    <table class="table table-bordered border-white text-success table-hover">
                                        <thead>
                                            <tr class="bg-light border-bottom">
                                                <td class="text-center tex-dark" colspan="3"><strong>تخفیف اعمال شده</strong></td>
                                            </tr>
                                            <tr class="bg-light border-bottom">
                                                <th class="text-center">کد تخفیف</th>
                                                <th class="text-center">نوع تخفیف</th>
                                                <th class="text-center">{{ $orderHasCopan->copan->amount_type == 0 ? "درصد " : "مبلغ " }} تخفیف</th>
                                            </tr>
                                        </thead>
                                        <tr class="bg-light border-bottom">
                                            <td class="text-center">{{$orderHasCopan->copan->code}}</td>
                                            <td class="text-center">{{$orderHasCopan->copan->type == 0 ? 'عمومی' : 'خصوصی'}}</td>
                                            <td class="text-center">{{$orderHasCopan->copan->amount_type == 0 ? $orderHasCopan->copan->amount.'%' : number_format($orderHasCopan->copan->amount).' تومان '}}</td>

                                        </tr>
                                    </table>
                                </section>
                            </section>
                            @endif
                        </section>


                        <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                            <!-- start vontent header -->
                            <section class="content-header mb-3">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        انتخاب نوع پرداخت
                                    </h2>
                                </section>
                            </section>
                            <section class="payment-select">

                                <section class="payment-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                    <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                    <secrion>
                                        برای پیشگیری از انتقال ویروس کرونا پیشنهاد می کنیم روش پرداخت اینترنتی رو پرداخت کنید.
                                    </secrion>
                                </section>
                                <form action="{{ route('customer.sales-process.payment-submit') }}" id="payment-submit" method="post">
                                    @csrf
                                    <input type="radio" name="payment_type" value="1" id="d1" />
                                    <label for="d1" class="col-12 col-md-4 payment-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-credit-card mx-1"></i>
                                            پرداخت آنلاین
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            درگاه پرداخت زرین پال
                                        </section>
                                    </label>

                                    <section class="mb-2"></section>

                                    <input type="radio" name="payment_type" value="2" id="d2" />
                                    <label for="d2" class="col-12 col-md-4 payment-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-id-card-alt mx-1"></i>
                                            پرداخت آفلاین
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            حداکثر در 2 روز کاری بررسی می شود
                                        </section>
                                    </label>

                                    <section class="mb-2"></section>

                                    <input type="radio" name="payment_type" value="3" id="cash-payment" class="cash" @error('cash_receiver') checked @enderror dada-old-value="{{old('cash_receiver')}}" />
                                    <label for="cash-payment" class="col-12 col-md-4 payment-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-money-check mx-1"></i>
                                            پرداخت در محل
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            پرداخت به پیک هنگام دریافت کالا
                                        </section>
                                    </label>
                                </form>
                            </section>
                        </section>
                    </section>

                    @php
                    $totalProductPrice = 0;
                    @endphp
                    @foreach ($cartItems as $cartItem)
                    @php
                    $totalProductPrice += $cartItem->cartItemProductPrice() * $cartItem->number;
                    @endphp
                    @endforeach

                    <section class="col-md-3">
                        <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">قیمت کالاها ({{$cartItems->count()}})</p>
                                <p class="text-muted">{{number_format($totalProductPrice)}} تومان</p>
                            </section>

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">تخفیف کالاها</p>
                                <p class="text-danger fw-bolder">{{number_format($order->order_discount_amount ?? 0)}} تومان</p>
                            </section>
                            @if($order->commonDiscount != null)
                            <section class="border-bottom mb-3"></section>

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">میزان تخفیف عمومی</p>
                                <p class="text-danger fw-bolder">{{$order->commonDiscount->percentage ?? 0}} %</p>
                            </section>

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">مبلغ تخفیف عمومی</p>
                                <p class="text-danger fw-bolder">{{number_format($order->order_common_discount_amount ?? 0)}} تومان</p>
                            </section>

                            <section class="border-bottom mb-3"></section>
                            @endif

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">تخفیف کد تخفیف</p>
                                <p class="text-danger fw-bolder">{{number_format($order->order_copan_discount_amount ?? 0)}} تومان</p>
                            </section>

                            <section class="border-bottom mb-3"></section>

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">هزینه ارسال</p>
                                <p class="text-warning">{{number_format($order->delivery_amount) ?? 0}} تومان</p>
                            </section>

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">جمع تخفیف اعمال شده</p>
                                <p class="text-danger">{{number_format($order->sumDiscountOrder())}} تومان</p>
                            </section>

                            <p class="my-3">
                                <i class="fa fa-info-circle me-1"></i> کاربر گرامی کالاها بر اساس نوع ارسالی که انتخاب می کنید در مدت زمان ذکر شده ارسال می شود.
                            </p>

                            <section class="border-bottom mb-3"></section>

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">مبلغ قابل پرداخت</p>
                                <p class="fw-bold">{{number_format($order->order_final_amount ?? 0)}} تومان</p>
                            </section>

                            <section class="">
                                <section id="payment-button" class="text-warning border border-warning text-center py-2 pointer rounded-2 d-block">نوع پرداخت را انتخاب کن</section>
                                <button id="final-level" type="button" onclick="document.getElementById('payment-submit').submit()" class="btn btn-danger d-none w-100">ثبت سفارش و گرفتن کد رهگیری</button>
                            </section>

                        </section>
                    </section>
                </section>
            </section>
        </section>

    </section>
</section>
<!-- end cart -->

@endsection
@section('script')
<script>
    let error = ``;
</script>
@error('cash_receiver')
<script>
    error = `
        <span class="text-danger font-size-12 error">
            <strong>
                {{ $message }}
            </strong>
        </span>
        `;
</script>
@enderror
<script src="{{ asset('customer-assets/js/forms/mask-input/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('customer-assets/js/pages/payment.js') }}"></script>
<script>
    $("#code").mask('*******');
</script>
@include('customer.alerts.sweetalert.success')
@include('customer.alerts.sweetalert.error')
@endsection