<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('emails.layouts.head-tag')
    @yield('haed-tag')
</head>
<body>
    <!-- start header -->
    @include('emails.layouts.header')
    <!-- end header -->


    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">
        @yield('content')
    </main>
    <!-- end main one col -->
    
    <!-- start footer -->
    @include('emails.layouts.footer')
    <!-- end footer -->
</body>
</html>