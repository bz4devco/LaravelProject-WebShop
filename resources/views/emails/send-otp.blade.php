@extends('emails.layouts.master')

@section('haed-tag')
    <title>کد تایید |{{-- $setting->title --}}</title>
@endsection

@section('content')
<h2>{{ $details['title'] }}</h2>
<p>{{ $details['body'] }}</p>
@endsection
