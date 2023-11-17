@extends('frontend.layouts.base')
@section('title', 'Contact Us')
@section('extra_style')
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "{{ $setting->first()->title }}",
        "url": "{{ url()->current() }}",
        "logo": "{{ secure_asset('photos/general/'.$setting->first()->logo) }}",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "{{ $setting->first()->mobile_phone_1 }}",
            "contactType": "customer support"
        }
    }
</script>
@endsection
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
                        <li class="axil-breadcrumb-item active" aria-current="page">Contact</li>
                    </ul>
                    <h1 class="title">Contact With Us</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="inner">
                    <div class="bradcrumb-thumb">
                        <img src="{{asset('photos/general/'.$setting->first()->logo)}}" alt="{{$setting->first()->name}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->

<!-- Start Contact Area  -->
<div class="axil-contact-page-area axil-section-gap">
    <div class="container">
        <div class="axil-contact-page">
            <div class="row row--30">
                <div class="col-lg-8">
                    <div class="">
                        <h3 class="title mb--10">We would love to hear from you.</h3>
                        <p>If you’ve got great products your making or looking to work with us then drop us a line.</p>
                        <form method="post" action="/contact-us" class="axil-contact-form">@csrf
                            <div class="row row--10">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="contact-name">Name <span>*</span></label>
                                        <input type="text" name="name" value="{{old('name')}}">
                                        @error('name')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="contact-email">E-mail <span>*</span></label>
                                        <input type="email" name="email" value="{{old('email')}}">
                                        @error('email')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="contact-name">Subject <span>*</span></label>
                                        <input type="text" name="subject" value="{{old('name')}}">
                                        @error('name')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="contact-message">Your Message</label>
                                        <textarea name="body"  cols="1" rows="2">{{old('body')}}</textarea>
                                        @error('body')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb--0">
                                        <button type="submit"  class="axil-btn btn-bg-primary">Send Message</button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="recaptcha" id="recaptcha">
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-location mb--40">
                        <h4 class="title mb--20">Our Store</h4>
                        <span class="address mb--20">{{ $setting->first()->location }}</span>
                        <span class="phone">Phone: {{ $setting->first()->mobile_phone_1 }}</span>
                        <span class="email">Email: {{ $setting->first()->email_address_1 }}</span>
                    </div>
                    <div class="opening-hour">
                        <h4 class="title mb--20">Opening Hours:</h4>
                        <p>Monday to Saturday: 9am - 10pm
                            <br> Sundays: 10am - 6pm
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Google Map Area  -->
        <div class="axil-google-map-wrap axil-section-gap pb--0">
            <div class="mapouter">
                <div class="gmap_canvas">
                </div>
            </div>
        </div>
        <!-- End Google Map Area  -->
    </div>
</div>
<!-- End Contact Area  -->
<!-- ======================= Contact Page Detail ======================== -->
@endsection

@section('extra_js_script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LcHExIpAAAAAHOsRPMjEsMiKzWlVrEK5hB2y2RK"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LcHExIpAAAAAHOsRPMjEsMiKzWlVrEK5hB2y2RK', {
            action: 'contact'
        }).then(function(token) {
            if (token) {
                document.getElementById('recaptcha').value = token;
            }
        });
    });
</script>
<script>
    let error = "{{Session::has('error')}}";
    let success = "{{Session::has('success')}}";
    if (error) {
        Swal.fire({
            icon: 'error',
            title: 'Great!',
            text: '{{ Session::get("error")}}'
        });
    }

    if (success) {
        Swal.fire({
            icon: 'success',
            title: 'Email Sent',
            text: '{{ Session::get("success")}}',
        });
    }
</script>
@endsection