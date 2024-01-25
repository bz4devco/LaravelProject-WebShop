@extends('admin.layouts.master')

@section('haed-tag')
<title>تیکت های جدید | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش تیکت ها</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.ticket.index') }}">تیکت ها</a></li>
        <li class="breadcrumb-item active" aria-current="page">تیکت های جدید</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    تیکت های جدید
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.ticket.index') }}" class="btn btn-sm btn-info text-white">لیست تمام تیکت ها</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>
            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="border-bottom border-dark table-col-count">
                        <th></th>
                        <th>#</th>
                        <th>نویسنده تیکت</th>
                        <th>عنوان تیکت</th>
                        <th>دسته تیکت</th>
                        <th>اولویت تیکت</th>
                        <th>ارجاع شده</th>
                        <th>وضعیت پاسخ</th>
                        <th class="text-center"><i class="fa fa-cogs ms-2"></i>تنظیمات</th>
                    </thead>
                    <tbody>
                        @forelse($tickets as $key => $ticket )

                        {{-- notif for unseen comment --}}
                        @php
                        $bg_notif = ($ticket->seen == 0) ? 'bg-new-notif' : '';
                        $icon_notif = ($ticket->seen == 0) ? 'icon-before-notif' : '';

                        @endphp

                        <tr class="align-middle {{$bg_notif}}">
                            <td class="position-relative {{$icon_notif}}"></td>
                            <th>{{ iteration($loop->iteration, request()->page) }}</th>
                            <td>{{ $ticket->user->full_name }}</td>
                            <td class="text-truncate" style="max-width: 120px;">{{ strip_tags($ticket->description) }}</td>
                            <td>{{ $ticket->category->name }}</td>
                            <td>{{ $ticket->priority->name }}</td>
                            <td>{{ $ticket->admin ?  $ticket->admin->user->full_name : 'مسئول تیکت' }}</td>
                            <td>{{ $ticket->answer == null ? 'در انتظار پاسخ' : 'پاسخ داده شد'}}</td>
                            <td class="width-16-rem text-start">
                                @can('show-ticket')
                                <a href="{{ route('admin.ticket.show', $ticket->id) }}" class="btn bg-custom-blue border-0 text-white btn-sm d-inline-flex align-items-center "><i class="fa fa-eye ms-2"></i><span>نمایش تیکت</span></a>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <th colspan="" class="text-center emptyTable  py-4">جدول تیکت های جدید خالی می باشد</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <section class="mb-3 mt-5 d-flex justify-content-center border-0">
                    <nav>
                        {{ $tickets->links('pagination::bootstrap-5') }}
                    </nav>
                </section>
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection