<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function order(){
        $orders = Order::where('user_id', auth()->user()->id)->get();

        return view('backend.client.pages.order', compact('orders'));
        
    }

    public function address(){
        return view('backend.client.pages.address');
    }
}
