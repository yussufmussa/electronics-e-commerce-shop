@extends('frontend.layouts.base')
@section('title', '404')
@section('contents')
<section class="error-page onepage-screen-area">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 text-center">
                    <div class="content text-center" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                        <span class="title-highlighter highlighter-secondary"> <i class="fal fa-exclamation-circle"></i> Oops! Somthing's missing.</span>
                        <h1 class="title">Page not found</h1>
                        <p>The page is not found.</p>
                        <a href="/" class="axil-btn btn-bg-secondary right-icon">Back To Home <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection