<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DeliveryAddress;
use App\Models\District;
use App\Models\Kata;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentGateway;
use App\Models\Product;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Stripe;


class CartController extends Controller
{

    public function addToCart(Request $request)
    {

        $productId = $request->input('id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }


        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            // Product already in cart, increase quantity
            $cart[$productId]['quantity']++;
        } else {
            // Add new product to cart
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'thumbnail' => $product->thumbnail,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);

        return response()->json(['message' => 'Product added to cart']);
    }


    public function getCartQuantity()
    {
        $totalQuantity = 0;

        if (session()->has('cart')) {
            foreach (session('cart') as $item) {
                $totalQuantity += $item['quantity'];
            }
        }

        return response()->json(['quantity' => $totalQuantity]);
    }

    public function removeFromCart(Request $request)
    {

        $productId = $request->input('id');

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            // Remove product from cart
            unset($cart[$productId]);

            Session::put('cart', $cart);

            return response()->json(['message' => 'Product removed from cart']);
        }

        return response()->json(['error' => 'Product not found in cart'], 404);
    }

    public function updateCartQuantity(Request $request)
    {

        $productId = $request->input('id');
        $action = $request->input('action');
        $cart = Session::get('cart', []);

        if (!isset($cart[$productId])) {
            // Product not found in the cart
            return response()->json(['error' => 'Product not found in the cart'], 404);
        }

        if ($action === 'add') {
            $cart[$productId]['quantity']++;
        } elseif ($action === 'remove') {
            // Ensure the quantity doesn't go below 1
            $cart[$productId]['quantity'] = max(1, $cart[$productId]['quantity'] - 1);
        } else {
            // Invalid action
            return response()->json(['error' => 'Invalid action'], 400);
        }

        // Update the session with the modified cart
        Session::put('cart', $cart);

        // Return the updated quantity as a JSON response
        return response()->json(['quantity' => $cart[$productId]['quantity']]);
    }

    public function checkout()
    {

        $paymentmethods = PaymentGateway::where('status', 1)->get();
        $regions = Region::all();
        $districts = District::all();
        $wards     = Kata::all();

        return view('frontend.pages.checkout', compact('regions', 'districts', 'wards', 'paymentmethods'));
    }


    public function chargewithStripe(Request $request)
    {
        $request->validate([
            'delivery_address' => 'required|max:255',
        ]);

        DB::beginTransaction();

        try {
            $ip = $request->ip();
            $userAgent = $request->header('User-Agent');
            $referrer = $request->header('referer');
            $paymentUserAgent = 'Stripe Button';

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $stripeCharge = Stripe\Charge::create([
                'amount' => $request->amount,
                'currency' => 'tzs',
                'source' => $request->stripeToken,
                'description' => 'Demo payment with stripe',
                'ip' => $ip,
                'user_agent' => $userAgent,
                'referrer' => $referrer,
                'payment_user_agent' => $paymentUserAgent,
            ]);

            // Create the order
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->total = $request->amount;
            $order->save();

            // Attach products to the order in the pivot table (order_product)
            for ($i = 0; $i < count($request->product_id); $i++) {
                $product_id = $request->product_id[$i];
                $quantity = $request->quantity[$i];
                $price = $request->price[$i];

                $order->product()->attach($product_id, [
                    'price' => $price,
                    'quantity' => $quantity,
                ]);
            }

            // Save payment information
            $payment = new Payment();
            $payment->user_id = auth()->user()->id;
            $payment->order_id = $order->id;
            $payment->amount = $request->amount;
            $payment->payment_method = 'Stripe';
            $payment->transaction_id = $stripeCharge->id;
            $payment->save();

            //save delivery address
            $address = new DeliveryAddress();
            $address->user_id = auth()->user()->id;
            $address->delivery_address = $request->delivery_address;
            $address->save();

            DB::commit();

            // Clear the cart
            session()->forget('cart');

            return redirect()->route('client.success')->with(['message' => 'Payment is succefully your order will be proccessed.']);
        } catch (\Exception $th) {
            DB::rollBack();
            throw new \Exception("There was a problem processing your payment");
        }
    }

    public function success(){

        return view('frontend.pages.success');
    }
}
