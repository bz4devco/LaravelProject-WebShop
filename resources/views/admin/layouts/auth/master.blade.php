<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.auth.head-tag')
    @yield('haed-tag')
    <title>
        @yield('title') | پنل ادمین
    </title>
</head>

<body dir="rtl">
    @include('admin.layouts.auth.header')

    <!-- start main one col -->
    <main id="main-body-one-col">
        @yield('content')
    </main>
    <!-- end main one col -->

    @include('admin.layouts.auth.script')
    @yield('script')
    @if(session('accessDenied'))
    <section class="toast-container flex-row-reverse position-fixed top-0 start-0 p-3" style="z-index: 16000">
        <div class="toast bg-danger text-white " data-bs-delay="10000" data-bs-animation="true" style="transition:  0.4s all;">
            <div class="toast-header bg-danger text-white">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                <strong class="mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                    </svg>
                    عدم دسترسی
                </strong>
            </div>
            <div class="toast-body">
                @lang('auth.access denied')
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.toast').toast('show');
            });
        </script>
    </section>
    @endif

    <script>
        $('input[data-error="error"]').on('keydown', function(e) {
            $('input[data-error="error"]').removeAttr('data-error');
        });
    </script>

    @include('admin.alerts.sweetalert.success')

</body>

</html>