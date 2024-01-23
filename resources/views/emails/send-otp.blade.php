@extends('emails.layouts.master')

@section('haed-tag')
<title>{{ $details['title'] }} |{{-- $setting->title --}}</title>
@endsection

@section('content')
<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
    {!! $details['body'] !!}
</tr>

@isset($publicFiles)
@foreach ($publicFiles as $key => $filePath)
<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
    <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
        <p>فایل پیوست {{++$key}}</p>
        <a href="{{ asset($filePath) }}" target="_bladnk" download class="btn-primary" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">دانلود فایل پیوست {{$key}}</a>
    </td>
</tr>
@endforeach
@endisset

@endsection