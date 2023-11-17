<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = Payment::sum('amount');
        $orders = Order::with('product')->latest()->take(10)->get();
        $payments = Payment::latest()->take(10)->get();
        $allProducts = Product::count();
        $users = User::where('role_id', 2)->get();
        $posts = Post::count();


        // Example query to get daily sales
        $dailySales = Order::whereDate('created_at', '>=', Carbon::now()->subDays(7))
            ->with('payments') // Assuming you have a relationship set up
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            })
            ->map(function ($daySales) {
                return $daySales->sum('total'); // Assuming you have a 'total' column on your orders table
            });

        // Example query to get monthly sales
        $monthlySales = Order::whereMonth('created_at', Carbon::now()->month)
            ->with('payments') // Assuming you have a relationship set up
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('Y-m');
            })
            ->map(function ($monthSales) {
                return $monthSales->sum('total'); // Assuming you have a 'total' column on your orders table
            });


        return view('backend.admin.index', compact('orders', 'totalSales', 'allProducts', 'users', 'posts', 'payments','dailySales', 'monthlySales'));
    }
}
