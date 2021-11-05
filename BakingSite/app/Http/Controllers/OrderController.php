<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {
        $items = \Cart::getContent();
        return view('customer.order.index', [
            'items' => $items,
            'totalPrice' => \Cart::getTotal(),
        ]);
    }

    public function create() {
        return view('customer.order.create');
    }

    public function store() {
        request()->validate([
            'name' => 'required',
            'address' => 'required'
        ]);
        $items = \Cart::getContent();


        $order = Order::create([
            'customer_name' => request('name'),
            'customer_address' => request('address'),
        ]);

        foreach($items as $item) {
            DB::table('order_and_products')->insert([
                'product_id' => $item['id'],
                'order_id' => $order->id,
                'quantity' => $item['quantity'],
            ]);
        }

        \Cart::clear();
        return redirect('/home');
    }
}
