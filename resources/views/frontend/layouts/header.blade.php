<header class="header axil-header header-style-5">
	@include('frontend.layouts.top_bar')
	<!-- Start Mainmenu Area  -->
	<div id="axil-sticky-placeholder"></div>
	<div class="axil-mainmenu">
		<div class="container">
			<div class="header-navbar">
				<div class="header-brand">
					<a href="/" class="logo logo-dark">
						<img src="{{ asset('photos/general/'.$setting->first()->logo) }}" alt="Binshop Logo" width="100px" height="30px">
					</a>
					<a href="/" class="logo logo-light">
						<img src="{{ asset('photos/general/'.$setting->first()->logo) }}" alt="Binshop Logo">
					</a>
				</div>
				<div class="header-main-nav">
					<!-- Start Mainmanu Nav -->
					<nav class="mainmenu-nav">
						<button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
						<div class="mobile-nav-brand">
							<a href="/" class="logo">
								<img src="{{ asset('photos/general/'.$setting->first()->logo) }}" alt="Binshop Logo">
							</a>
						</div>
						<ul class="mainmenu">
							<li>
								<a href="/" class="{{request()->is('/') ? 'active' : ''}}">Home</a>
							</li>
							<li >
								<a href="/products" class="{{request()->is('products') ? 'active' : ''}}">All Products</a>
								
							</li>
							
							<li><a href="/contact-us">Contact</a></li>
						</ul>
					</nav>
					<!-- End Mainmanu Nav -->
				</div>
				<div class="header-action">
					<ul class="action-list">
						<li class="d-xl-block d-none">
							<form action="/searchProduct" method="get">@csrf
							<input type="text" class="" name="keywords"   placeholder="What are you looking for?" autocomplete="off">
							</form>
						</li>
						<li class="shopping-cart">
							<a href="#" class="cart-dropdown-btn">
								<span class="cart-count" id="cart-quantity"></span>
								<i class="flaticon-shopping-cart"></i>
							</a>
						</li>
						@if(!auth()->user())
						<li class="my-account">
							<a href="javascript:void(0)">
								<i class="flaticon-person"></i>
							</a>
							<div class="my-account-dropdown">
								<span class="title">QUICKLINKS</span>
								<ul>
									<li>
										<a href="/">My Account</a>
									</li>
									<li>
										<a href="#">Profile</a>
									</li>
									<li>
										<a href="#">Log out</a>
									</li>
								</ul>
								
							</div>
						</li>
						@endif
						<li class="axil-mobile-toggle">
							<button class="menu-btn mobile-nav-toggler">
								<i class="flaticon-menu-2"></i>
							</button>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- End Mainmenu Area -->

</header>
<!-- End Header -->