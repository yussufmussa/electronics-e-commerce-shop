@extends('frontend.layouts.base')
@section('title', 'New Password')
@section('extra_style')
@endsection

@section('contents')

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bg-gradient-gray py-4">
    <div class="container-fluid padding-right-40px padding-left-40px">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                    <ul class="list-items bread-list bread-list-2 ">
                        <li><a href="/">Home</a></li>
                        <li>New Password</li>
                    </ul>

                    <div class="section-heading">
                        <h2 class="sec__title font-size-26 mb-0">New Password</h2>
                    </div>

                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container-fluid -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->
<section class="add-listing-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">

                <div class="block-card mb-4">

                    <div class="block-card-body">
                        <form method="post" action="{{ route('password.store') }}" class="form-box">@csrf
                            @if (Session::has('status'))
                            <div class="alert alert-success">
                                {{ Session::get('status') }}
                            </div>
                            @endif
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="input-box">
                                <label class="label-text">Email</label>
                                <div class="form-group">
                                    <span class="la la-user form-icon"></span>
                                    <input class="form-control form-control-styled" type="email" name="email" placeholder="Email address" required autofocus value="{{old('email',$request->email)}}">
                                    @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                </div>
                            </div>
                            <div class="input-box">
                                <label class="label-text">New Password</label>
                                <div class="form-group">
                                    <span class="la la-user form-icon"></span>
                                    <input class="form-control form-control-styled" type="password" name="password" placeholder="Enter new Password" required>
                                    @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                </div>
                            </div>
                            <div class="input-box">
                                <label class="label-text">Confirm New Password</label>
                                <div class="form-group">
                                    <span class="la la-user form-icon"></span>
                                    <input class="form-control form-control-styled" type="password" name="password_confirmation" placeholder="Confirm New Password" required>
                                    @error('password_confirmation')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>

                                    @enderror
                                </div>
                            </div>
                            <div class="btn-box">
                                <button type="submit" class="theme-btn gradient-btn w-100">
                                    Reset<i class="la la-arrow-right ml-1"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('extra_js_script')
@endsection