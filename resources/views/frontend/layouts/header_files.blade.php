<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="@yield('description')" />
    <meta name="author" content="check me on https://yussufmussa.com" />
    <meta name="keywords" content="@yield('keywords')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{url()->current()}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('photos/general/'.$setting->first()->favicaon) }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('frontend/assets/css/styles.css')}}" rel="stylesheet" />

    <script async src="https://www.googletagmanager.com/gtag/js?id={{$setting->first()->google_analytics_link}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '{{$setting->first()->google_analytics_link}}');
    </script>
    @yield('extra_style')
    @livewireStyles
</head>