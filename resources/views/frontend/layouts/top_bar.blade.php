<div class="axil-header-top">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-sm-6 col-12">
					<div class="header-top-dropdown">
						<div class="dropdown">
							<button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								English
							</button>
							<ul class="dropdown-menu">
								<!-- <li><a class="dropdown-item" href="#">English</a></li> -->
							</ul>
						</div>
						<div class="dropdown">
							<button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								USD
							</button>
							<ul class="dropdown-menu">
								<!-- <li><a class="dropdown-item" href="#">USD</a></li> -->
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-12">
					<div class="header-top-link">
						<ul class="quick-link">
							@if(auth()->user())
							<li><a href="/register">Sign Up</a></li>
							<li><a href="/login">Sign In</a></li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>