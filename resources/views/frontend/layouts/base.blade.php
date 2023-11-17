@include('frontend.layouts.header_files')


<body class="sticky-header newsletter-popup-modal">

    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    @include('frontend.layouts.header')

    <main class="main-wrapper">
        
    @yield('contents')
    </main>


    <!-- Start Footer Area  -->
    @include('frontend.layouts.footer')
    <!-- End Footer Area  -->
    <div class="cart-dropdown" id="cart-dropdown">
        <div class="cart-content-wrap">
            <div class="cart-header">
                <h2 class="header-title">Cart</h2>
                <a href="#" class="cart-close sidebar-close "><i class="fas fa-times"></i></a>
            </div>
            <div class="cart-body">
                <ul class="cart-item-list">
                    @php $total = 0; @endphp
                    @if(session('cart'))
                    @foreach(session('cart') as $cart)
                    <li class="cart-item" id="cartItem_{{$cart['id']}}">
                        <div class="item-img">
                            <a href="{{ route('product.details', $cart['slug']) }}"><img src="{{ asset('photos/thumbnails/'.$cart['thumbnail']) }}" alt="{{$cart['name']}}"></a>
                            <a href="#" class="close-btn remove-from-cart" data-id="{{$cart['id']}}"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="item-content">
                            <h3 class="item-title"><a href="{{ route('product.details', $cart['slug']) }}">{{ $cart['name'] }}</a></h3>
                            <div class="item-price"><span class="currency-symbol">Tsh </span>{{number_format($cart['price'])}}</div>
                            <div class="pro-qty item-quantity">
                                <input type="number" class="quantity-input" value="{{$cart['quantity']}}">
                            </div>
                        </div>
                    </li>
                    @php $total += $cart['quantity'] * $cart['price']; @endphp
                    @endforeach
                    @else
                    <span>Cart is empty go shopping <a href="/products">Here</a></span>
                    @endif
                </ul>
            </div>
            <div class="cart-footer">
                <h3 class="cart-subtotal">
                    <span class="subtotal-title">Subtotal:</span>
                    <span class="subtotal-amount">Tsh {{number_format($total)}}</span>
                </h3>
                <div class="group-btn">
                    <a href="/cart" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a>
                    <a href="client/checkout" class="axil-btn btn-bg-secondary checkout-btn">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="closeMask"></div>
    <!-- Offer Modal End -->
    <!-- JS
============================================ -->
@include('frontend.layouts.footer_files')