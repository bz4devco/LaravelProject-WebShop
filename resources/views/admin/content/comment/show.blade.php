@extends('admin.layouts.master')

@section('haed-tag')
<title> نمایش نظر | پنل مدیریت </title>
@endsection

@section('content')
<!-- category page Breadcrumb area -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0 font-size-12">
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item deco"><a class="text-decoration-none" href="{{ route('admin.content.comment.index') }}">نظرات</a></li>
        <li class="breadcrumb-item active" aria-current="page">نمایش نظر</li>
    </ol>
</nav>
<!-- category page Breadcrumb area -->

<!--category page category list area -->
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    نمایش نظر
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 pb-3 mb-3 border-bottom">
                <a href="{{ route('admin.content.comment.index') }}" class="btn btn-sm btn-info text-white">بازگشت</a>
            </section>
            <section class="card mb-3">
                <section class="card-header bg-custom-yellow text-white font-size-14">
                    {{$comment->author->full_name}} - {{$comment->author->id}}
                </section>
                <section class="card-body">
                    <h5 class="card-title mb-3">عنوان خبر : {{$comment->commentable->title}} &nbsp;-&nbsp; کد خبر: {{$comment->commentable->id}}</h5>
                    <section class="d-flex">
                        <i class="far fa-comments ms-2"></i>
                        <p class="card-text font-size-14">{{strip_tags($comment->body)}}</p>
                    </section>
                    <section class="card-footer">
                        <small class="text-success"><i class="fa fa-calendar-alt ms-2"></i> {{jalaliDate($comment->created_at)}}</small>
                    </section>
                </section>
            </section>
            
            @if($comment->answer == null)
            @can('answer-comment-content')
            <section class="">
                <form id="form" action="{{ route('admin.content.comment.update', $comment->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <section class="row">
                        <section class="col-12">
                            <div class="form-group mb-3">
                                <label for="answer">پاسخ ادمین</label>
                                <textarea class="form-control form-control-sm d-block" name="answer" id="answer" rows="6">{{old('answer')}}</textarea>
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
            @endcan
            @else

            {{-- approved button status check and show --}}
            @php
            $btn_style = ($comment->answershow == 1) ? 'danger' : 'success';
            $icon_style = ($comment->answershow == 1) ? 'eye-slash' : 'eye';
            $btn_text = ($comment->answershow == 1) ? 'عدم نمایش پاسخ در نظرات' : 'نمایش پاسخ در نظرات';
            $attr_checked = ($comment->answershow == 1) ? 'checked' : '';
            @endphp


            <section class="card mb-3">
                <section class="card-header bg-custom-green text-white font-size-14 d-flex justify-content-between">
                    <span>ادمین - {{ $comment->responder ? $comment->responder->full_name : ''}}</span>
                    @can('answer-comment-content')
                    <button {{$attr_checked}} type="button" data-url="{{ route('admin.content.comment.answershow', $comment->id) }}" onclick="answershow(this.id)" id="{{ $comment->id }}-answershow" class="btn btn-{{$btn_style}} btn-sm"><i class="fa fa-{{$icon_style}} ms-1 align-middle"></i>{{$btn_text}}</button>
                    @endcan
                </section>
                <section class="card-body">
                    <h5 class="card-title mb-3">پاسخ ادمین</h5>
                    <section class="d-flex">
                        <i class="far fa-comments ms-2"></i>
                        <p class="card-text font-size-14">{{strip_tags($comment->answer)}}</p>
                    </section>
                </section>
                <section class="card-footer">
                    <small class="text-success"><i class="fa fa-calendar-alt ms-2"></i> {{jalaliDate($comment->answer_date)}}</small>
                </section>
            </section>
            @endif
        </section>
    </section>
</section>
<!-- category page category list area -->
@endsection
@section('script')
<script src="{{ asset('admin-assets/js/plugin/ajaxs/answershow-ajax.js') }}"></script>
@endsection