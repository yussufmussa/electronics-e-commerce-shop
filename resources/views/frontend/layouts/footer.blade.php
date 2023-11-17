<!-- Start Footer Area  -->
<footer class="axil-footer-area footer-style-1 footer-dark">
    <!-- Start Footer Top Area  -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- Start Single Widget  -->
                <div class="col-md-4 col-sm-12">
                    <div class="axil-footer-widget">
                        <div class="logo mb--30">
                            <a href="index.html">
                                <img class="light-logo" src="{{asset('photos/general/'.$setting->first()->logo)}}" alt="Logo Images">
                            </a>
                        </div>
                        <div class="inner">
                            <p>
                                {{ $setting->first()->location }}
                            </p>
                            <div class="social-share">
                                <a href="{{$setting->first()->facebook}}"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{$setting->first()->instagram}}"><i class="fab fa-instagram"></i></a>
                                <a href="{{$setting->first()->twitter}}"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-md-4 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">ACCOUNT</h5>
                        <div class="inner">
                            <ul>
                                <li><a href="/client/orders">My Account</a></li>
                                <li><a href="/login">Login </a></li>
                                <li><a href="/cart">Cart</a></li>
                                <li><a href="/products">All products</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-md-4 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">SUPPORT</h5>
                        <div class="inner">
                            <ul>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="t#">Terms Of Use</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="/contact-us">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
            </div>
        </div>
    </div>
    <!-- End Footer Top Area  -->
    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-default separator-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-12">
                    <div class="copyright-left d-flex flex-wrap justify-content-xl-start justify-content-center">
                        <ul class="quick-link">
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="terms-of-service.html">Terms of Service</a></li>
                        </ul>
                        <ul class="quick-link">
                            <li>© {{ date('Y') }}. All rights reserved by <a target="_blank" href="https://yussufmussa.com/">Yussuf Mussa</a>.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-12">
                    <div class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                        <span class="card-text">Accept For</span>
                        <ul class="payment-icons-bottom quick-link">
                        <li><img src="{{ asset('photos/general/cart-1.png') }}" alt="paypal cart"></li>
                                <li><img src="{{ asset('photos/general/cart-2.png') }}" alt="paypal cart"></li>
                                <li><img src="{{ asset('photos/general/cart-3.png') }}" alt="paypal cart"></li>
                                <li><img src="{{ asset('photos/general/cart-6.png') }}" alt="paypal cart"></li>
                                <li><img src="{{ asset('photos/general/cart-5.png') }}" alt="paypal cart"></li>

                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->
</footer>
<!-- End Footer Area  -->