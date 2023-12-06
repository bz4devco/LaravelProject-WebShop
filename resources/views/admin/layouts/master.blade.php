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
    <section class="toast-container flex-row-reverse position-fixed top-0 end-0 p-3" style="z-index: 16000">
        @include('admin.alerts.toast.success')
        @include('admin.alerts.toast.error')
    </section>
    <section class="toast-wrapper d-flex flex-column-reverse" style="display: none!important">
        
    </section>

    @include('admin.alerts.sweetalert.success')

</body>

</html>