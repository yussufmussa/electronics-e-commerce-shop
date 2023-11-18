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
    <link href="favicon.ico" rel="shortcut icon">
    <!-- Base Google Font for Web-app -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <!-- Google Fonts for Banners only -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome.min.css')}}">
    <!-- Ion-Icons 4 -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/ionicons.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
    <!-- Jquery-Ui-Range-Slider -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/jquery-ui-range-slider.min.css')}}">
    <!-- Utility -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/utility.css')}}">
    <!-- Main -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bundle.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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