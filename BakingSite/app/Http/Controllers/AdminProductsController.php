<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Intervention\Image\Facades\Image;

class AdminProductsController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function edit(Product $product) {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Product $product) {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        if (!request('image')) {
            $product->update([
                'name' => request('name'),
                'description' => request('description'),
                'price' => request('price'),
                'image' => $product->image
            ]);
            return redirect('/admin/products');
        }

        $imagePath = request('image')->store('image_uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();

        $product->update([
            'name' => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'image' => $imagePath
        ]);

        return redirect('/admin/products');
    }

    public function create() {
        return view('admin.products.create');
    }

    public function store() {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);

        $imagePath = request('image')->store('image_uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();

        Product::create([
            'name' => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'image' => $imagePath
        ]);
        return redirect('/admin/products');
    }

    public function destroy(Product $product) {
        $product->delete();

        return redirect('/admin/products');
    }
}
