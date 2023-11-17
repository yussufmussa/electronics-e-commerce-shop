@extends('frontend.layouts.base')
@section('title', 'Payment successully')
@section('contents')
<!-- Start Shop Area  -->
<div class="axil-shop-area axil-section-gap bg-color-white">
    <div class="container">
        
        <div class="row row--15">
            @if(Session::has('message'))
            <div class="alert alert-success">
            {{ Session::get('message') }}
            </div>
            @endif
        </div>
        <div class="text-center pt--30">
            <a href="/" class="axil-btn btn-bg-lighter btn-load-more">Shop Again</a>
        </div>
    </div>
    <!-- End .container -->
</div>
<!-- End Shop Area  -->
@endsection