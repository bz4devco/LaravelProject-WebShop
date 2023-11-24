<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head-tag')
    @yield('haed-tag')
</head>

<body dir="rtl">

    @include('admin.layouts.header')

    <section class="body-container">
        @include('admin.layouts.sidebar')

        <!-- main body -->
        <section id="main-body" class="main-body">
            @yield('content')
        </section> 
        <!-- main body -->
    </section>

    @include('admin.layouts.script')
    @yield('script')

</body>

</html>