<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index() {
        $orders = Order::all()->sortBy('status');

        return view('admin.orders.index', compact('orders'));
    }

    public function edit(Order $order) {
        $order_and_product = DB::table('order_and_products')
            ->join('orders', 'orders.id', '=', 'order_and_products.order_id')
            ->join('products', 'products.id', '=', 'order_and_products.product_id')
            ->select()->where('order_id', '=', $order->id)->get();

        return view('admin.orders.edit', [
            'order_and_product' => $order_and_product[0],
        ]);
    }

    public function update(Order $order) {
        request()->validate([
            'status' => 'required'
        ]);

        $order->update([
            'status' => request('status')
        ]);

        return redirect()->back();
    }
}
