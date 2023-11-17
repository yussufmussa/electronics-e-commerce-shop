@extends('frontend.layouts.base')
@section('title', 'List of '.$category->name.'')

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
                        <li class="axil-breadcrumb-item active" aria-current="page">{{$category->name}}</li>
                    </ul>
                    <h1 class="title">List of {{$category->name}}</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="inner">
                    <div class="bradcrumb-thumb">
                        <img src="{{ asset('photos/category_photo/'.$category->photo) }}" alt="{{ $category->name }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->
<!-- Start Shop Area  -->
<div class="axil-product-area bg-color-white axil-section-gap">
	<div class="container">
		<div class="section-title-wrapper">
			<span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Our Products</span>
			<h2 class="title">New Products</h2>
		</div>
		<div class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
			<div class="slick-single-layout">
				<div class="row row--15">
					@foreach($products as $product)
					<div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
						<div class="axil-product product-style-one">
							<div class="thumbnail">
								<a href="{{ route('product.details', $product->slug) }}">
									<img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" class="main-img" src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="Product Images">
									<img class="hover-img" src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="Product Images">
								</a>

							</div>
							<div class="product-content">
								<div class="inner">
									<h5 class="title"><a href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a></h5>
									<div class="product-price-variant">
										<span class="price current-price">Tsh {{number_format($product->price)}}</span>
									</div>
								</div>
								<div>
									<ul class="cart-action justify-content-center">
										<li class="select-option add-to-cart" data-id="{{$product->id}}"><a href="#">Add to Cart</a></li>
										<li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal{{$product->id}}"><i class="far fa-eye"></i></a></li>
									@include('frontend.partials.modalquickview')

									</ul>
								</div>
							</div>
						</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-lg-12 text-center mt--20 mt_sm--0">
				<a href="/products" class="axil-btn btn-bg-lighter btn-load-more">View All Products</a>
			</div>
		</div> -->
	</div>
</div>
<!-- End Shop Area  -->
@endsection