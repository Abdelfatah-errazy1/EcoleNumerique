<!DOCTYPE html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ printHtmlAttributes('html') }} >
<head>
    <base href=""/>
    <title>@yield('page_title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8"/>
    <meta name="page-id" content=""/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content=""/>
    <link rel="canonical" href=""/>
    @include('include.styles')
</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center">

<div class="d-flex flex-column justify-content-center h-100 align-items-center" id="kt_app_root">
   @yield('content')
</div>
@include('include.scripts')
</body>
</html>
