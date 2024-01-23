@extends('customer.layouts.master-two-col')

@section('haed-tag')
<meta name="robots" content="noindex, nofollow">

<title>مشاهده تیکت | {{$setting->title}}</title>
@endsection

@section('content')
<section class="content-wrapper bg-white p-3 rounded-2 mb-4">

    <!-- start vontent header -->
    <section class="content-header mb-4">
        <section class="d-flex justify-content-between align-items-center">
            <h2 class="content-header-title">
                <span>موضوع تیکت : {!! $ticket->subject !!}</span>
            </h2>
            <section class="content-header-link">
                <a class="btn btn-sm btn-dark text-white mb-1" href="{{ route('customer.profile.ticket.my-tickets') }}">بازگشت به لیست تیکت ها</a>
            </section>
        </section>
    </section>
    <!-- end vontent header -->



    <section class="my-tickets">
        <main class="msger-chat">
            <div class="msg left-msg">
                <div class="msg-img" style="background-image: url({{ hasFileUpload('#' , 'avatar') }})"></div>

                <div class="msg-bubble">
                    <div class="msg-info border-bottom">
                        <div class="msg-info-name">{{$ticket->user->full_name ?? ( $ticket->user->email ?? $ticket->user->email)}}</div>
                        <div class="msg-info-time">{{jalaliDate($ticket->created_at ,'%d %B %Y - H:i')}}</div>
                    </div>
                    <div class="msg-text">
                        <span>{!! $ticket->description !!}</span>
                    </div>
                </div>
            </div>
            @forelse ($ticket->ticketFiles as $ticketAttachment)
            @if($ticketAttachment->userTypeFileUploded() == 0)
            <div class="msg left-msg msg-file user-select-none">
                <div class="msg-img" style="background-image: url({{ hasFileUpload('#' , 'avatar') }})"></div>
                <div class="msg-bubble">
                    <div class="msg-attachment d-flex justify-content-start">
                        <section class="rounded-pill border-file shadow">
                            <i class="fa fa-fas fa-file-invoice fa-lg ticket-icon text-success"></i>
                        </section>
                        <section class="ms-3">
                            <span class="text-success">فایل پیوست</span>
                            <div>
                                {{$ticketAttachment->file_type}} file - {{$ticketAttachment->showFileSize()}}
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            @endif
            @empty
            @endforelse


            @if($ticket->answer)
            <div class="msg right-msg">
                <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"></div>
                <div class="msg-bubble">
                    <div class="msg-info border-bottom">
                        <div class="msg-info-name">ادمین</div>
                        <div class="msg-info-time">{{jalaliDate($ticket->answer_date ,'%d %B %Y - H:i')}}</div>
                    </div>
                    <div class="msg-text">
                        {!! $ticket->answer !!}
                    </div>
                </div>
            </div>
            @forelse ($ticket->ticketFiles as $ticketAttachment)
            @if($ticketAttachment->userTypeFileUploded() == 1)
            <div class="msg right-msg msg-file user-select-none">
                <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"></div>
                <div class="msg-bubble">
                    <a href="{{ public_path($ticketAttachment->file_path)}}" class="btn-link text-decoration-none text-white" download>
                        <div class="msg-attachment d-flex justify-content-start">
                            <section class="rounded-pill border-file shadow">
                                <i class="fa fa-fas fa-file-invoice ticket-icon fa-lg"></i>
                            </section>
                            <section class="ms-3">
                                دانلود فایل پیوست
                                <div>
                                    {{$ticketAttachment->file_type}} file - {{$ticketAttachment->showFileSize()}}
                                </div>
                            </section>
                        </div>
                    </a>
                </div>
            </div>
            @endif
            @empty
            @endforelse

            @endif
        </main>
    </section>
</section>
@endsection
@section('script')
<script src="{{ asset('customer-assets/js/pages/address-and-delivery.js') }}"></script>
<script src="{{ asset('customer-assets/js/forms/mask-input/jquery.inputmask.js') }}"></script>
<script src="{{ asset('customer-assets/js/forms/price-format.js') }}"></script>
<script src="{{ asset('customer-assets/js/ajax/get-cities-ajax.js') }}"></script>

<script>
    $("#postal_code").inputmask("mask", {
        "mask": "9999999999"
    });
    $("#mobile").inputmask("mask", {
        "mask": "(999) 999-9999"
    });
</script>
@if($errors->any())
<script>
    $(document).ready(function() {
        $("#add-address").modal('show');
    });
</script>
@endif

@include('customer.alerts.sweetalert.success')
@include('customer.alerts.sweetalert.error')

@include('customer.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => ' این آدرس'])
@endsection