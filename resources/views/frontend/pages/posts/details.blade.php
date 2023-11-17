@extends('frontend.layouts.base')
@section('title', ''.$post->title.'')
@section('description', \Illuminate\Support\Str::limit($post->body, 160))
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
<!-- ============================ Blog Detail Start ================================== -->
<section class="space min pt-0">
    <div class="container">
        <!-- row Start -->
        <div class="row">

            <!-- Blog Detail -->
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="article_detail_wrapss single_article_wrap format-standard">
                    <div class="article_body_wrap">

                        <div class="article_featured_image">
                            <img class="img-fluid" src="{{asset('photos/posts/'.$post->thumbnail)}}" alt="{{$post->title}}">
                        </div>

                        <h2 class="post-title">{{$post->title}}</h2>
                        {!! $post->body !!}
                    </div>
                </div>
                <!-- Blog Comment -->
            
            </div>
            <!-- Single blog Grid -->
            @include('frontend.pages.posts.partials.right_side_business_details')

        </div>
        <!-- /row -->

    </div>

</section>
<!-- ============================ Blog Detail End ================================== -->
@endsection

@section('extra_js_script')
@endsection