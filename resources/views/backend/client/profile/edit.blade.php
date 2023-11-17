@extends('frontend.layouts.base')
@section('title', 'Edit profile infos')
@section('extra_style')
@livewireStyles
@endsection
@section('contents')
<!-- Start Breadcrumb Area  -->
<div class="axil-breadcrumb-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="inner">
                    <ul class="axil-breadcrumb">
                        <li class="axil-breadcrumb-item"><a href="/">Home</a></li>
                        <li class="separator"></li>
                        <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                    </ul>
                    <h1 class="title">My Account Details</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="inner">
                    <div class="bradcrumb-thumb">
                        <img src="{{ auth()->user()->profile_picture ? asset('photos/general/'.auth()->user()->profile_picture) : asset('photos/general/user.png') }}" alt="{{ auth()->user()->name }}" width="100" height="100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->
<div class="axil-dashboard-area axil-section-gap">
    <div class="container">
        <div class="axil-dashboard-warp">
            <div class="axil-dashboard-author">
                <div class="media">
                    <div class="thumbnail">
                        <img src="{{ auth()->user()->profile_picture ? asset('photos/general/'.auth()->user()->profile_picture) : asset('photos/general/user.png') }}" alt="{{ auth()->user()->name }}" width="70" height="70">
                    </div>
                    <div class="media-body">
                        <h5 class="title mb-0">Hello {{auth()->user()->name}}</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('backend.client.pages.partials.side_bar')
                <div class="col-xl-9 col-md-8">
                <div class="axil-dashboard-account">

                @include('backend.client.profile.partials.update-profile-picture')
                @include('backend.client.profile.partials.update-profile-information-form')

                @include('backend.client.profile.partials.update-password-form')
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End My Account Area  -->
@endsection
@section('extra_js_script')
@endsection