<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users'      => User::count(),
            'categories' => Category::count(),
            'products'   => Product::count(),
            'low_stock'  => Product::where('stock', '<', 10)->count(),
        ];

        $latestProducts = Product::with('category')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'latestProducts'));
    }
}
