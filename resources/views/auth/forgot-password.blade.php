@extends('frontend.layouts.base')
@section('title', 'Request New Password')
@section('extra_style')
@endsection

@section('contents')
<!-- ======================= Login Detail ======================== -->
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<div class="tt-login-form">
				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-6">
						<div class="tt-item">
							<h2 class="tt-title">Enter email address</h2>
							<div class="form-default">
								<form method="post" action="{{route('password.email')}}">@csrf
									<div class="form-group">
										<label for="loginInputName">Email</label>
										<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Enter Email" required>
										@error('email')
										<div class="text-danger">
											{{$message}}
										</div>
										@enderror
									</div>
									
									<div class="row">
										<div class="col-auto">
											<div class="form-group">
												<button class="btn btn-border" type="submit">Request Password</button>
											</div>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- ======================= Login End ======================== -->

@endsection
@section('extra_js_script')
@endsection