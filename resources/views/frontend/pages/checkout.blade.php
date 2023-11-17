@extends('frontend.layouts.base')
@section('title', 'Checkout')
@section('contents')
<!-- Start Checkout Area  -->
<div class="axil-checkout-area axil-section-gap">
    <div class="container">
        <form action="{{route('client.charge.stripe')}}" method="post" id="card-form">@csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="axil-checkout-billing">
                        <h4 class="title mb--40">Delivery address</h4>
                        <div class="row">
                            <div class="form-group">
                                <label>Other Notes (optional)</label>
                                <textarea name="delivery_address" id="notes" cols="30" rows="10">{{old('delivery_address')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="axil-order-summery order-checkout-summery">
                        <h5 class="title mb--20">Your Order Summary</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php

                                    $total = 0;
                                    $product_id = [];

                                    @endphp
                                    @if(session('cart'))
                                    @foreach(session('cart') as $product)
                                    <tr class="order-product">
                                        <td>{{ $product['name']}} <span class="quantity">x{{$product['quantity']}}</span></td>
                                        <td>Tsh {{ number_format($product['quantity'] * $product['price'])}}</td>
                                    </tr>
                                    @php

                                    $total += $product['price'] * $product['quantity'];

                                    @endphp
                                    <input type="hidden" name="product_id[]" value="{{ $product['id']}}">
                                    <input type="hidden" name="quantity[]" value="{{ $product['quantity']}}">
                                    <input type="hidden" name="price[]" value="{{ $product['price']}}">
                                    @endforeach
                                    @endif
                                    <tr class="order-subtotal">
                                        <td>Subtotal</td>
                                        <td>Tsh {{number_format($total)}}</td>
                                    </tr>
                                    <tr class="order-shipping">
                                        <td colspan="2">
                                            <div class="input-group">
                                                <input type="radio" id="radio1" name="shipping" checked>
                                                <label for="radio1">Free Shippping</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <td>Total</td>
                                        <td class="order-total-amount">Tsh {{number_format($total)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-payment-method">
                            <div class="single-payment">
                                <div id="card"></div>
                                <div class="card-errors"></div>
                            </div>
                            <input type="hidden" name="name" value="yussuf mussa">
                            <input type="hidden" name="email" value="alphillipsa@gmail.com">
                            <input type="hidden" name="amount" value="{{$total}}">
                            <input type="hidden" name="name" id="card-name" value="demo name">

                            @foreach(session('cart', []) as $productId => $quantity)

                            @endforeach
                        </div>
                        <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Checkout Area  -->
@endsection
@section('extra_js_script')
<script src="https://js.stripe.com/v3/"></script>
<script>
    let stripe = Stripe('{{ env("STRIPE_KEY") }}')
    const elements = stripe.elements()
    const cardElement = elements.create('card', {
        style: {
            base: {
                fontSize: '16px'
            }
        }
    })
    const cardForm = document.getElementById('card-form')
    const cardName = document.getElementById('card-name')
    cardElement.mount('#card')

    cardForm.addEventListener('submit', async (e) => {
        e.preventDefault()
        stripe.createToken(cardElement).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('card-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>
@endsection