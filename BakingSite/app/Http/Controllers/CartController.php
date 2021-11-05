<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index() {
        $items = \Cart::getContent();

        return view('customer.cart.index', compact('items'));
    }

    public function add() {
        request()->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        \Cart::add([
            'id' => request('id'),
            'name' => request('name'),
            'price' => request('price'),
            'quantity' => request('quantity'),
            'attributes' => [
                'image' => request('image')
            ]
        ]);

        session()->flash('success', 'Product added to cart');

        return redirect('/cart');
    }

    public function update() {
        \Cart::update(
            request('id'),
            [
                'quantity' => [
                    'relative' => false,
                    'value' => request('quantity'),
                ]
            ]
        );

        session()->flash('success', 'Cart updated');

        return redirect('/cart');
    }

    public function remove() {
        \Cart::remove(request('id'));

        session()->flash('success', 'Item removed');

        return redirect('/cart');
    }

    public function removeAll() {
        \Cart::clear();

        session()->flash('success', 'All items removed');

        return redirect('/home');
    }
}
