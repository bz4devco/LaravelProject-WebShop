@extends('admin.layouts.master')

@section('haed-tag')
<title>مشاهده تیکت | پنل مدیریت</title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb m-0 font-size-12">
<li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش تیکت ها</a></li>
    <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.ticket.index') }}">تیکت ها</a></li>
    <li class="breadcrumb-item active" aria-current="page">مشاهده تیکت</li>
</ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                مشاهده تیکت
                </h5>
            </section>
            <section class="mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section>
                <section class="card mb-3">
                    <section class="card-header bg-custom-blue text-white font-size-14 d-flex justify-content-between">
                    <span class="d-inline-flex align-items-center">
                    {{ $ticket->user->full_name != ' ' || '' || null ? $ticket->user->full_name : ($ticket->user->email ?? $ticket->user->mobile)}}  - {{$ticket->user->id}}
                    </span>
                    <section class="d-flex">
                        <span class="badge p-2 bg-success ms-2"> دسته بندی : {{$ticket->category->name}}</span>
                        <span class="badge p-2 bg-warning text-dark">اولویت : {{$ticket->priority->name}}</span>
                    </section>
                    </section>
                    <section class="card-body">
                        <h5 class="card-title mb-3">موضوع : {{$ticket->subject}}</h5>
                        <section class="d-flex">
                            <i class="far fa-comments ms-2"></i>
                            <p class="card-text font-size-14">{{strip_tags($ticket->description)}}</p>
                        </section>
                    </section>
                    @if($file != '')
                    <section class="card-body text-white  bg-primary py-2">
                        <strong class="card-title d-block">فایل پیوست</strong>
                        <a href="{{ asset($file->file_path)}}" download class="text-decoration-none text-white mt-3">
                            <i class="fa fa-download text-white"></i>
                            {{$file->file_type}} 
                            - 
                            اندازه فایل : {{$file->file_size}} 
                        </a>
                    </section>
                    @endif
                    <section class="card-footer">
                        <small class="text-success"><i class="fa fa-calendar-alt ms-2"></i> {{jalaliDate($ticket->created_at)}}</small>
                    </section>
                </section>
                @if($ticket->answer == null)
                @if($hasTicketAdmin)
                <section class="">
                    <form id="form" action="{{ route('admin.ticket.update', $ticket->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <section class="row">
                        <section class="col-12">
                                <div class="form-group mb-3">
                                    <label for="answer">پاسخ تیکت</label>
                                    <textarea class="form-control form-control-sm d-block" name="answer" id="answer" rows="6">{{old('answer')}}</textarea>
                                    <section class="col-12">
                                        <div class="form-group mb-3">
                                            <input class="form-control form-select-sm" type="file" name="file" id="file">
                                            @error('file')
                                                <span class="text-danger font-size-12">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </section>
                                    @error('answer')
                                        <span class="text-danger font-size-12">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12">
                                <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>
                @endif
                @else
                <section class="card mb-3">
                    <section class="card-header bg-custom-green text-white font-size-14 d-flex justify-content-between">
                        <span>ادمین - {{$ticket->admin->user->full_name}}</span>
                    </section>
                    <section class="card-body">
                        <h5 class="card-title mb-3">پاسخ ادمین</h5>
                        <section class="d-flex">
                            <i class="far fa-comments ms-2"></i>
                            <p class="card-text font-size-14">{{strip_tags($ticket->answer)}}</p>
                        </section>
                    </section>
                    <section class="card-footer">
                        <small class="text-success"><i class="fa fa-calendar-alt ms-2"></i> {{jalaliDate($ticket->answer_at)}}</small>
                    </section>
                </section>
                @endif
            </section>
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection
