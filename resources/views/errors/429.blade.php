<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/x-icon" href="{{asset('customer-assets/images/404/969655.png')}}">
    <link rel="stylesheet" href="{{ asset('customer-assets/css/bootstrap/bootstrap-reboot.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer-assets/css/bootstrap/bootstrap.rtl.min.css') }}">
    <title>درخواست غیرمجاز | صفحه 429</title>

    <style>
        /*======================
    404 page
=======================*/

        @font-face {
            font-family: "IRANSans";
            src: url({{asset('customer-assets/fonts/IRANSans/IRANSansWeb.woff2')}});
        }

        .page_404 {
            padding: 40px 0 0 0;
            background: #fff;
            font-family: 'IRANSans', serif;
        }

        .page_404 img {
            width: 100%;
        }

        .four_zero_four_bg {
            background-image: url({{asset('customer-assets/images/404/dribbble_1.gif')}});
            height: 400px;
            background-position: center;
        }


        .four_zero_four_bg h1 {
            font-size: 80px;
        }

        .four_zero_four_bg h3 {
            font-size: 80px;
        }

        .link_404 {
            color: #fff !important;
            padding: 10px 20px;
            background: #39ac31;
            margin: 20px 0;
            display: inline-block;
        }

        .contant_box_404 {
            margin-top: -50px;
        }
    </style>
</head>

<body>
    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="four_zero_four_bg">
                        <h1 class="text-center "></h1>
                    </div>

                    <div class="contant_box_404 text-center">
                        <h3 class="h2">
                            درخواست شما بیش از حد مجاز بوده است
                        </h3>

                        <p>لطفاً پس از چند دقیقه مجدداً تلاش فرمایید!</p>
                        @if(request()->is('admin/*'))
                        <a href="{{ route('admin.home') }}" class="link_404 text-decoration-none">بازگشت به صفحه قبل</a>
                        @else
                        <a href="{{ url()->previous() }}" class="link_404 text-decoration-none">بازگشت به صفحه قبل</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
        </div>
    </section>
</body>

</html>