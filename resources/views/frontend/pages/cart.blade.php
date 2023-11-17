@extends('frontend.layouts.base')
@section('title', 'Cart')
@section('contents')
<!-- Start Shop Area  -->
<div class="axil-shop-area axil-section-gap">
    <div class="container">
        <div class="axil-product-cart-wrap">
            @if(session('cart'))
            <div class="product-table-heading">
                <h4 class="title">Your Cart</h4>
                <a href="#" class="cart-clear">Clear Shoping Cart</a>
            </div>
            <div class="table-responsive">
                <table class="table axil-product-table axil-cart-table mb--40">
                    <thead>
                        <tr>
                            <th scope="col" class="product-remove"></th>
                            <th scope="col" class="product-thumbnail">Product</th>
                            <th scope="col" class="product-title"></th>
                            <th scope="col" class="product-price">Price</th>
                            <th scope="col" class="product-quantity">Quantity</th>
                            <th scope="col" class="product-subtotal">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @if(session('cart'))
                        @foreach (session('cart') as $product)
                        <tr id="cartItem_{{$product['id']}}">
                            <td class="product-remove"><a href="#" class="remove-from-cart" data-id="{{$product['id']}}"><i class="fal fa-times"></i></a></td>
                            <td class="product-thumbnail"><a href="{{ route('product.details', $product['slug']) }}"><img src="{{ asset('photos/thumbnails/'.$product['thumbnail']) }}" alt="{{ $product['name'] }}"></a></td>
                            <td class="product-title"><a href="{{ route('product.details', $product['slug']) }}">{{ $product['name'] }}</a></td>
                            <td class="product-price" data-title="Price"><span class="currency-symbol">Tsh </span>{{number_format($product['price'])}}</td>
                            <td class="product-quantity" data-title="Qty">
                                <div class="pro-qty">
                                    <input type="number" class="quantity-input" value="{{$product['quantity']}}">
                                </div>
                            </td>
                            <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol">Tsh </span>{{ number_format($product['price'] * $product['quantity']) }}</td>
                        </tr>
                        @php $total += $product['price'] * $product['quantity']; @endphp
                        @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                    <div class="axil-order-summery mt--80">
                        <h5 class="title mb--20">Order Summary</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table mb--30">
                                <tbody>
                                    <tr class="order-subtotal">
                                        <td>Subtotal</td>
                                        <td>Tsh {{number_format($total)}}</td>
                                    </tr>
                                    <tr class="order-total">
                                        <td>Total</td>
                                        <td class="order-total-amount">Tsh {{number_format($total)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="client/checkout" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <span>Cart is empty go shopping <a href="/products">Here</a></span>
        @endif
    </div>
</div>
<!-- End Shop Area  -->
@endsection