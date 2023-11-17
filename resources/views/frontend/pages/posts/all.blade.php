@extends('frontend.layouts.base_other_than_homepage')
@section('title', 'TanzaniaBiz | Blog')
@section('description', 'Blog section from TanzaniaBiz')
@section('extra_style')
@endsection
@section('contents')
<!-- ======================= Top Breadcrubms ======================== -->
<div class="bg-dark py-3">
    <div class="container">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" class="text-light">Home</a></li>
                        <li class="breadcrumb-item"><a href="/blog" class="text-light">Blog</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ======================= Top Breadcrubms ======================== -->

<!-- ======================= Blog Start ============================ -->
<section class="middle">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center mb-5">
                    <h6 class="theme-cl mb-0">Latest Updates</h6>
                    <h2 class="ft-bold">Blog Post From TanzaniaBiz</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <!-- Single Item -->
            @foreach($posts as $post)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="gup_blg_grid_box">
                    <div class="gup_blg_grid_thumb">
                        <a href="{{route('post.details', $post->slug)}}"><img src="{{asset('photos/posts/'.$post->thumbnail)}}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="gup_blg_grid_caption">
                        <div class="blg_title">
                            <h4><a href="{{route('post.details', $post->slug)}}">{{$post->title}}</a></h4>
                        </div>
                    </div>
                    
                </div>
            </div>
            @endforeach
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="position-relative text-center">
                    <a href="javascript:void(0);" class="btn gray rounded ft-medium">Load More Blogs<i class="lni lni-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ======================= Blog Start ============================ -->
@endsection

@section('extra_js_script')

@endsection