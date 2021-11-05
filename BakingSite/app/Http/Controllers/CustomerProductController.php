<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CustomerProductController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('customer.products.index', compact('products'));
    }

    public function show(Product $product) {
        return view('customer.products.show', compact('product'));
    }
}
