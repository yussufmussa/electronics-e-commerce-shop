<div class="modal fade quick-view-product" id="quick-view-modal{{$product->id}}" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
			</div>
			<div class="modal-body">
				<div class="single-product-thumb">
					<div class="row">
						<div class="col-lg-7 mb--40">
							<div class="row">
								<div class="col-lg-10 order-lg-2">
									<div class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
										<div class="thumbnail">
											<img src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="Product Images">
											<div class="label-block label-right">
												<div class="product-badget">20% OFF</div>
											</div>
											<div class="product-quick-view position-view">
												<a href="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" class="popup-zoom">
													<i class="far fa-search-plus"></i>
												</a>
											</div>
										</div>
										<div class="thumbnail">
											<img src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="Product Images">
											<div class="label-block label-right">
												<div class="product-badget">20% OFF</div>
											</div>
											<div class="product-quick-view position-view">
												<a href="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" class="popup-zoom">
													<i class="far fa-search-plus"></i>
												</a>
											</div>
										</div>
										<div class="thumbnail">
											<img src="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" alt="Product Images">
											<div class="label-block label-right">
												<div class="product-badget">20% OFF</div>
											</div>
											<div class="product-quick-view position-view">
												<a href="{{ asset('photos/thumbnails/'.$product->thumbnail) }}" class="popup-zoom">
													<i class="far fa-search-plus"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-2 order-lg-1">
									<div class="product-small-thumb small-thumb-wrapper">
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
									<h3 class="product-title">{{ $product->name }}</h3>
									<span class="price-amount">Tsh {{ number_format($product->price) }}</span>
									<p class="description">{{$product->description}}</p>

									<!-- Start Product Action Wrapper  -->
									<div class="product-action-wrapper d-flex-center">
										<!-- Start Quentity Action  -->
										<div class="pro-qty"><input type="text" value="1"></div>
										<!-- End Quentity Action  -->

										<!-- Start Product Action  -->
										<ul class="product-action d-flex-center mb--0">
											<li class="add-to-cart"><a href="#" class="axil-btn btn-bg-primary add-to-cart">Add to Cart</a></li>
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
		</div>
	</div>
</div>