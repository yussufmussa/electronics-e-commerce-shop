@extends('frontend.layouts.base')
@section('title', 'Cart')
@section('contents')
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Shop</h2>
            <ul class="bread-crumb">
                <li class="has-separator"><i class="ion ion-md-home"></i> <a href="/">Home</a></li>
                <li class="is-marked"><a href="/cart">Cart</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Start Shop Area  -->
<div class="page-cart u-s-p-t-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form>
                    <div class="table-wrapper u-s-m-b-60">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @if(session('cart'))
                                @foreach(session('cart') as $product)
                                <tr>
                                    <td>
                                        <div class="cart-anchor-image"><a href="{{ route('product.details', $product['slug']) }}"><img src="{{ asset('photos/thumbnails/'.$product['thumbnail']) }}" alt="Product">
                                                <h6>{{ $product['name'] }}</h6>
                                            </a></div>
                                    </td>
                                    <td>
                                        <div class="cart-price">Tsh {{number_format($product['price'])}}</div>
                                    </td>
                                    <td>
                                        <div class="cart-quantity">
                                            <div class="quantity"><input type="text" class="quantity-text-field" value="{{$product['quantity']}}"> <a class="plus-a" data-max="1000">&#43;</a> <a class="minus-a" data-min="1">&#45;</a></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-wrapper"><button class="button button-outline-secondary fas fa-sync"></button>
                                            <a href="#" class="remove-from-cart button button-outline-secondary fas fa-trash" data-id="{{$product['id']}}">
                                        </div>
                                    </td>
                                </tr>
                                @php $total += $product['price'] * $product['quantity']; @endphp

                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </form>
                <div class="calculation u-s-m-b-60">
                    <div class="table-wrapper-2">
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="2">Cart Totals</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h3 class="calc-h3 u-s-m-b-0">Subtotal</h3>
                                    </td>
                                    <td><span class="calc-text">Tsh {{number_format($total)}}</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3 class="calc-h3 u-s-m-b-8">Shipping</h3>
                                        <div class="calc-choice-text u-s-m-b-4">Free Shipping

                                    </td>
                                    <td></td>
                                </tr>
                               
                                <tr>
                                    <td>
                                        <h3 class="calc-h3 u-s-m-b-0">Total</h3>
                                    </td>
                                    <td><span class="calc-text">Tsh {{number_format($total)}}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection