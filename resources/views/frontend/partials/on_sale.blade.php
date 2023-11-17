<!-- Start New Arrivals Product Area  -->
<div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
	<div class="container ml--xxl-0">
		<div class="product-area pb--50">
			<div class="section-title-wrapper">
				<span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> This Week’s</span>
				<h2 class="title">New Arrivals</h2>
			</div>
			<div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
				@foreach($products as $product)
				<div class="slick-single-layout">
					<div class="axil-product product-style-four">
						<div class="thumbnail">
							<a href="{{ route('product.details', $product->slug) }}">
								<img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="{{$product->name}}">
							</a>
							<div class="label-block label-right">
							<div class="product-badget">20% Off</div>
						</div>
						</div>
						
						<div class="product-content">
							<div class="inner">
								<h5 class="title"><a href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a></h5>
								<div class="product-price-variant">
									<span class="price old-price">Tsh {{number_format($product->price)}}</span>
								</div>
							</div>
						</div>
						<ul class="cart-action justify-content-center">
							<li class="select-option add-to-cart"><a href="#">Add to Cart</a></li>
							<li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal{{$product->id}}"><i class="far fa-eye"></i></a></li>
						</ul>
					</div>
					<!-- Product Quick View Modal Start -->
					@include('frontend.partials.modalquickview')
					<!-- Product Quick View Modal End -->

				</div>
				@endforeach

			</div>
		</div>
	</div>
</div>
<!-- End New Arrivals Product Area  -->