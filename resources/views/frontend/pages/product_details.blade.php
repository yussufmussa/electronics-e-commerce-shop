@extends('frontend.layouts.base')
@section('title', $product->name)

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
                        <li class="axil-breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                    </ul>
                    <h1 class="title">List of {{$product->name}}</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="inner">
                    <div class="bradcrumb-thumb">
                        <img src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="{{ $product->photo}}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->
<!-- Start Shop Area  -->
 <!-- Start Shop Area  -->
 <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
            <div class="single-product-thumb mb--40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 mb--40">
                            <div class="row">
                                <div class="col-lg-10 order-lg-2">
                                    <div class="single-product-thumbnail-wrap zoom-gallery">
                                        <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                            <div class="thumbnail">
                                                <a href="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" class="popup-zoom">
                                                    <img src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="Product Images">
                                                </a>
                                            </div>
                                            <div class="thumbnail">
                                                <a href="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" class="popup-zoom">
                                                    <img src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="Product Images">
                                                </a>
                                            </div>
                                            <div class="thumbnail">
                                                <a href="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" class="popup-zoom">
                                                    <img src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="Product Images">
                                                </a>
                                            </div>
                                            <div class="thumbnail">
                                                <a href="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" class="popup-zoom">
                                                    <img src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="Product Images">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="label-block">
                                            <div class="product-badget">20% OFF</div>
                                        </div>
                                        <div class="product-quick-view position-view">
                                            <a href="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" class="popup-zoom">
                                                <i class="far fa-search-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 order-lg-1">
                                    <div class="product-small-thumb-3 small-thumb-wrapper">
                                        <div class="small-thumb-img">
                                            <img src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="thumb image">
                                        </div>
                                        <div class="small-thumb-img">
                                            <img src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="thumb image">
                                        </div>
                                        <div class="small-thumb-img">
                                            <img src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="thumb image">
                                        </div>
                                        <div class="small-thumb-img">
                                            <img src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="thumb image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title">{{ $product->name }}</h2>
                                    <span class="price-amount">Tsh {{number_format($product->price)}}</span>
                                    <p class="description">In ornare lorem ut est dapibus, ut tincidunt nisi pretium. Integer ante est, elementum eget magna. Pellentesque sagittis dictum libero, eu dignissim tellus.</p>

                                    <div class="product-variations-wrapper">

                                    
                                    </div>

                                    <!-- Start Product Action Wrapper  -->
                                    <div class="product-action-wrapper d-flex-center">
                                        <!-- Start Quentity Action  -->
                                        <div class="pro-qty"><input type="text" value="1"></div>
                                        <!-- End Quentity Action  -->

                                        <!-- Start Product Action  -->
                                        <ul class="product-action d-flex-center mb--0">
                                            <li class="add-to-cart"><a href="/cart" class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                        </ul>
                                        <!-- End Product Action  -->

                                    </div>
                                    <!-- End Product Action Wrapper  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .single-product-thumb -->

            <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
                <div class="container">
                    <ul class="nav tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item " role="presentation">
                            <a id="additional-info-tab" data-bs-toggle="tab" href="#	" role="tab" aria-controls="additional-info" aria-selected="false">Additional Information</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a id="reviews-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="product-desc-wrapper">
                                <div class="row">
                                    <div class="col-lg-12 mb--30">
                                        <div class="single-desc">
                                            <h5 class="title">Specifications:</h5>
                                            <p>{{$product->description}}</p>
                                        </div>
                                    </div>
                                    <!-- End .col-lg-6 -->
                                    
                                </div>
                            </div>
                            <!-- End .product-desc-wrapper -->
                        </div>
                        <div class="tab-pane fade" id="additional-info" role="tabpanel" aria-labelledby="additional-info-tab">
                            <div class="product-additional-info">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- woocommerce-tabs -->
        </div>
        <!-- End Shop Area  -->
		<!-- Start New Arrivals Product Area  -->
<div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
	<div class="container ml--xxl-0">
		<div class="product-area pb--50">
			<div class="section-title-wrapper">
				<span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> recently</span>
				<h2 class="title">Viewed</h2>
			</div>
			<div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
				@foreach($relatedProducts as $product)
				<div class="slick-single-layout">
					<div class="axil-product product-style-four">
						<div class="thumbnail">
							<a href="{{ route('product.details', $product->slug) }}">
								<img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="{{$product->name}}">
							</a>
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
							<li class="select-option add-to-cart"><a href="#" class="add-to-cart">Add to Cart</a></li>
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
@endsection