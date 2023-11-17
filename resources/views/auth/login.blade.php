@extends('frontend.layouts.base')
@section('title', 'Login')
@section('extra_style')
@endsection

@section('contents')
<!-- ======================= Login Detail ======================== -->
<div class="row ">
    <div class="max-auto offset-xl-2 ">
        <div class="axil-signin-form-wrap " style="max-width: 400px;"> <!-- Adjust the max-width as needed -->
            <div class="axil-signin-form">
                <h3 class="title">Sign in to your account</h3>
                <p class="b2 mb--55">Enter your details below</p>
                <form method="post" action="{{ route('login') }}" class="sign-in-form">@csrf
                    <div class="form-group">
                        <label for="loginInputName">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" required>
                        @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" required>
                        @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-auto">
                            <div class="form-group">
                                <button class="axil-btn btn-bg-primary submit-btn" type="submit">LOG IN</button>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-group">
                                <a href="{{ route('password.request') }}" class="forgot-btn">Forgot password?</a> <!-- Fix the opening tag -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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