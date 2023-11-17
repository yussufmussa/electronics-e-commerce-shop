@extends('frontend.layouts.base')
@section('title', 'Create Account')
@section('extra_style')
@endsection

@section('contents')
<!-- ======================= Login Detail ======================== -->
<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="/">Home</a></li>
			<li>Register</li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder">Create Account</h1>
			<div class="tt-login-form">
				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-6">
						<div class="tt-item">
							<h2 class="tt-title">Enter your details</h2>
							<div class="form-default">
								<form method="post" action="{{route('register')}}">@csrf
								<div class="form-group">
										<label for="loginInputName">Name</label>
										<input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="Enter Your Name">
										@error('name')
										<div class="text-danger">
											{{$message}}
										</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="loginInputName">Email</label>
										<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Enter Email" required>
										@error('email')
										<div class="text-danger">
											{{$message}}
										</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="loginPassword">Password</label>
										<input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Enter Password" required>
										@error('password')
										<div class="text-danger">
											{{$message}}
										</div>
										@enderror
									</div>
									
									<div class="row">
										<div class="col-auto">
											<div class="form-group">
												<button class="btn btn-border" type="submit">Register</button>
											</div>
										</div>
										<div class="col-auto">
											<div class="form-group">
												<a href="/login">Already have an account? Login </button>
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
<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const passwordToggleIcon = document.getElementById('passwordToggleIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggleIcon.classList.remove('la-eye');
            passwordToggleIcon.classList.add('la-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordToggleIcon.classList.remove('la-eye-slash');
            passwordToggleIcon.classList.add('la-eye');
        }
    }
</script>

@endsection