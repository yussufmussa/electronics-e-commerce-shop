<header>
	<!-- Top-Header -->
	<div class="full-layer-outer-header">
		<div class="container clearfix">
			<nav>
				<ul class="primary-nav g-nav">
					<li>
						<a href="tel:+111444989">
							<i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
							Telephone:{{ $setting->first()->mobile_phone_1 }}</a>
					</li>
					<li>
						<a href="mailto:{{ $setting->first()->email_address_1 }}">
							<i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
							E-mail: {{ $setting->first()->email_address_1 }}
						</a>
					</li>
				</ul>
			</nav>
			<nav>
				<ul class="secondary-nav g-nav">
					@if(auth()->user())
					<li>
						<a>My Account
							<i class="fas fa-chevron-down u-s-m-l-9"></i>
						</a>
						<ul class="g-dropdown" style="width:200px">
							<li>
								<a href="/client/profile">
									<i class="fas fa-cog u-s-m-r-9"></i>
									Profile</a>
							</li>
							<li>
								<a href="/logout">
									<i class="fas fa-sign-in-alt u-s-m-r-9"></i>
									Log out</a>
							</li>
						</ul>
					</li>
					@endif
					<li>
						<a>TZS
							<i class="fas fa-chevron-down u-s-m-l-9"></i>
						</a>
						<ul class="g-dropdown" style="width:90px">
							<li>
								<a href="#" class="u-c-brand">($) USD</a>
							</li>
						</ul>
					</li>
					<li>
						<a>ENG
							<i class="fas fa-chevron-down u-s-m-l-9"></i>
						</a>
						<!-- <ul class="g-dropdown" style="width:70px">
							<li>
								<a href="#" class="u-c-brand">ENG</a>
							</li>
							<li>
								<a href="#">ARB</a>
							</li>
						</ul> -->
				</ul>
			</nav>
		</div>
	</div>
	<!-- Top-Header /- -->
	<!-- Mid-Header -->
	<div class="full-layer-mid-header">
		<div class="container">
			<div class="row clearfix align-items-center">
				<div class="col-lg-3 col-md-9 col-sm-6">
					<div class="brand-logo text-lg-center">
						<a href="/">
							<img src="{{ asset('photos/general/'.$setting->first()->logo) }}" alt="{{ $setting->first()->name }}" class="app-brand-logo img-responsive" style="width: 100px" height="80px">
						</a>
					</div>
				</div>
				<div class="col-lg-6 u-d-none-lg">
					<form class="form-searchbox" method="get" action="/searchProduct">@csrf
						<label class="sr-only" for="search-landscape">Search</label>
						<input id="search-landscape" type="text" name="keywords" class="text-field" placeholder="Search everything">
						<div class="select-box-position">
							<div class="select-box-wrapper select-hide">
								<label class="sr-only" for="select-category">Choose category for search</label>
								<select class="select-box" id="select-category" name="category_id">
								@foreach ($categories as $category)
								<option value="{{$category->id}}">{{ $category->name }}</option>
								@endforeach									
								</select>
							</div>
						</div>
						<button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
					</form>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6">
					<nav>
						<ul class="mid-nav g-nav">
							<li class="u-d-none-lg">
								<a href="/">
									<i class="ion ion-md-home u-c-brand"></i>
								</a>
							</li>
							<li>
								<a id="mini-cart-trigger">
									<i class="ion ion-md-basket"></i>
									<span class="item-counter" id="cart-quantity"></span>
									<span class="item-price">$220.00</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Mid-Header /- -->
	<!-- Responsive-Buttons -->
	<div class="fixed-responsive-container">
		<div class="fixed-responsive-wrapper">
			<button type="button" class="button fas fa-search" id="responsive-search"></button>
		</div>
		<div class="fixed-responsive-wrapper">
			<a href="wishlist.html">
				<i class="far fa-heart"></i>
				<span class="fixed-item-counter">4</span>
			</a>
		</div>
	</div>
	<!-- Responsive-Buttons /- -->
	<!-- Mini Cart -->
	<div class="mini-cart-wrapper">
		<div class="mini-cart">
			<div class="mini-cart-header">
				YOUR CART
				<button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
			</div>
			<ul class="mini-cart-list">
			@php $total = 0; @endphp

				@if(session('cart'))
				@foreach(session('cart') as $product)
				<li class="clearfix">
					<a href="single-product.html">
						<img src="{{ asset('photos/thumbnails/'.$product['thumbnail']) }}" alt="{{ $product['name'] }}">
						<span class="mini-item-name">{{ $product['name'] }}</span>
						<span class="mini-item-price">Tsh {{number_format($product['price'])}}</span>
						<span class="mini-item-quantity"> x {{ $product['quantity'] }} </span>
					</a>
				</li>
				@php $total += $product['price'] * $product['quantity']; @endphp
				@endforeach
				@endif
			</ul>
				
			<div class="mini-shop-total clearfix">
				<span class="mini-total-heading float-left">Total:</span>
				<span class="mini-total-price float-right">Tsh {{$total }}</span>
			</div>
			<div class="mini-action-anchors">
				<a href="/cart" class="cart-anchor">View Cart</a>
				<a href="/client/checkout" class="checkout-anchor">Checkout</a>
			</div>
		</div>
	</div>
	<!-- Mini Cart /- -->
	<!-- Bottom-Header -->
	<div class="full-layer-bottom-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-9">
					<ul class="bottom-nav g-nav u-d-none-lg">
						<li>
							<a href="/">Home
							</a>
						</li>
						<li>
							<a href="/products">Products
								<span class="superscript-label-hot">HOT</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Bottom-Header /- -->
</header>