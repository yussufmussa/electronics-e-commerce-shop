@extends('frontend.layouts.base')
@section('title', 'Products')
@section('contents')
<!-- Start Shop Area  -->
<div class="page-style-a">
	<div class="container">
		<div class="page-intro">
			<h2>Shop</h2>
			<ul class="bread-crumb">
				<li class="has-separator"><i class="ion ion-md-home"></i> <a href="/">Home</a></li>
				<li class="is-marked"><a href="/">Shop</a></li>
			</ul>
		</div>
	</div>
</div>
<section class="section-maker">
	<div class="container">
		<div class="sec-maker-header text-center">
			<h3 class="sec-maker-h3">NEW PRODUCTS</h3>
			<!-- Carousel -->
			<div class="slider-fouc">
				<div class="products-slider owl-carousel" data-item="4">
					@foreach ($products as $product)
					<div class="item">
						<div class="image-container">
							<a class="item-img-wrapper-link" href="{{ route('product.details', $product->slug) }}">
								<img class="img-fluid" src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="{{ $product->name }}">
							</a>
							<div class="item-action-behaviors">
								<a class="item-quick-look" data-toggle="modal" href="#quick-view{{$product->id}}">Quick Look</a>
								<a class="item-addCart add-to-cart" href="#" data-id="{{$product->id}}">Add to Cart</a>
							</div>
						</div>
						<div class="item-content">
							<div class="what-product-is">
								<ul class="bread-crumb">
									<li>
										<a href="{{route('filter.category', $product->category->slug)}}">{{$product->category->name}}</a>
									</li>
								</ul>
								<h6 class="item-title">
									<a href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
								</h6>
							</div>
							<div class="price-template">
								<div class="item-new-price">
									Tsh {{ number_format($product->price) }}
								</div>
							</div>
						</div>
						<div class="tag hot">
							<span>HOT</span>
						</div>
					</div>
					@endforeach



				</div>
			</div>
			<!-- Carousel /- -->
		</div>
</section>
@endsection