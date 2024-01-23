@extends('customer.layouts.master-two-col')

@section('haed-tag')
<meta name="robots" content="noindex, nofollow">

<title>تیکت های من | {{$setting->title}}</title>
@endsection

@section('content')
<section class="content-wrapper bg-white p-3 rounded-2 mb-2">

    <!-- start vontent header -->
    <section class="content-header mb-4">
        <section class="d-flex justify-content-between align-items-center">
            <h2 class="content-header-title">
                <span>تیکت های من</span>
            </h2>
            <section class="content-header-link">
                <a class="btn btn-sm btn-primary text-white mb-1" data-bs-toggle="modal" data-bs-target="#newTicketModal">ارسال تیکت جدید</a>
            </section>
        </section>
    </section>
    <!-- end vontent header -->



    <section class="my-tickets">

        @forelse ($tickets as $ticket)
        @php
        $isSeen = $ticket->seen_user == 0 && $ticket->answer ? 'new-ticket' : '';
        $tikcetStatusStyle = $ticket->answer ? 'bg-success' : ($ticket->seen == 1 ? 'bg-warning' : 'bg-danger') ;
        @endphp
        <section class="my-tickets-wrapper mb-2 p-2 {{ $isSeen }}">
            <section class="mb-2">
                <strong>
                    <i class="fa fa-quote-right mx-1"></i>
                    موضوع تیکت : {{$ticket->subject}}
                </strong>
            </section>
            <section class="mb-2">
                <i class="fa fa-list-alt mx-1"></i>
                دسته تیکت : {{ $ticket->category->name }}
            </section>
            <section class="mb-2">
                <i class="fa fa-lightbulb mx-1"></i>
                وضعیت تیکت :
                <span class="text-white px-1 rounded {{ $tikcetStatusStyle }}">{{ $ticket->ticketStatus() }}</span>
            </section>
            <section class="mb-2">
                <i class="fa fas fas fa-calendar-alt mx-1"></i>
                تاریخ ارسال تیکت : {{jalaliDate($ticket->created_at ,'%d %B %Y - H:i')}}
            </section>
            @if($ticket->answer)
            <section class="mb-2">
                <a href="{{route('customer.profile.ticket.my-tickets.show', $ticket->id)}}" class="show-answer-button"></i> مشاهده پاسخ ادمین</a>
            </section>
            @endif
            <a class="" href="{{route('customer.profile.ticket.my-tickets.show', $ticket->id)}}"><i class="fa fa-eye"></i> مشاهده جزئیات</a>
        </section>

        @empty
        <section class="cart-item d-flex py-5 justify-content-center">
            <strong>تیکتی برای شما وجود ندارد</strong>
        </section>
        @endforelse
    </section>
</section>
@include('customer.model.new-ticket-modal')
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
        $("#newTicketModal").modal('show');
    });
</script>

@endif
<script>
    $('#ticketAttachment').on('change', function() {
        files = $(this)[0].files;
        name = '';
        for (var i = 0; i < files.length; i++) {
            name += files[i].name + (i != files.length - 1 ? ", " : "");
        }
        $(".custom-file-label").html(name);
    })
</script>

@include('customer.alerts.sweetalert.success')
@include('customer.alerts.sweetalert.error')

@include('customer.alerts.sweetalert.delete-confirm', ['className' => 'delete','fieldTitle' => ' این آدرس'])
@endsection