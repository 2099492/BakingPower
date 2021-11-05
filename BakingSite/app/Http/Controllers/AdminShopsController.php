<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Intervention\Image\Facades\Image;

class AdminShopsController extends Controller
{
    public function index() {
        return view('admin.shops.index', ['shops' => Shop::all()]);
    }

    public function edit(Shop $shop) {
        return view('admin.shops.edit', compact('shop'));
    }

    public function update(Shop $shop) {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        if (!request('image')) {
            $shop->update([
                'name' => request('name'),
                'description' => request('description'),
                'image' => $shop->image
            ]);
            return redirect('/admin/shops');
        }

        $imagePath = request('image')->store('image_uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();

        $shop->update([
            'name' => request('name'),
            'description' => request('description'),
            'image' => $imagePath
        ]);

        return redirect('/admin/shops');
    }

    public function create() {
        return view('admin.shops.create');
    }

    public function store() {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $imagePath = request('image')->store('image_uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();

        Shop::create([
            'name' => request('name'),
            'description' => request('description'),
            'image' => $imagePath
        ]);
        return redirect('/admin/shops');
    }

    public function destroy(Shop $shop) {
        $shop->delete();

        return redirect('/admin/shops');
    }
}
