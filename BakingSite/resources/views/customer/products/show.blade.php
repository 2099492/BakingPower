<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-pink-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="float-left px-6 py-4 border-b border-gray-200">
                    <h1 class="text-xl font-bold text-gray-900">{{ $product->name }}</h1>
                    <p class="text-md text-gray-600">{{ $product->description }}</p>
                    <p>€{{ $product->price }}</p>
                    <img src="/storage/{{ $product->image }}" style="width: 300px; height: 300px" alt="">
                </div>
                <form action="{{ route('cartAdd') }}" method="POST" enctype="multipart/form">
                    @csrf

                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="image" value="{{ $product->image }}"/>
                    <input type="hidden" name="quantity" value="1">
                    <div class="float-right px-6 py-4">
                        <x-button>Add to cart</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
