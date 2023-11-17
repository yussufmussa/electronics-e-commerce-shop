@extends('frontend.layouts.base')
@section('title', 'My Delivery Address')
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
                    <h1 class="title">Delivery Address</h1>
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
<!-- Start Shop Area  -->
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
                    <div class="axil-dashboard-order">
                        @foreach(auth()->user()->deliveryAddresses as $address)
                        {{ $address->delivery_address }}
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- End My Account Area  -->
<!-- End Shop Area  -->
@endsection