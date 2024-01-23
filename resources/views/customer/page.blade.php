@extends('customer.layouts.master-one-col')

@section('haed-tag')
<meta name="robots" content="index, follow">

<title>{{$page->title}} | {{$setting->title}}</title>
@endsection

@section('content')
<section class="mb-3">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <!-- start vontent header -->
                <section class="content-header">
                    <section class="d-flex justify-content-between align-items-center">
                        <h2 class="content-header-title">
                            <span>{{$page->title}}</span>
                        </h2>
                    </section>
                </section>
                {!! $page->body !!}
            </section>
        </section>
    </section>
</section>
@endsection
