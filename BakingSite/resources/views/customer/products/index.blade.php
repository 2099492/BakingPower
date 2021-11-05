<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-pink-100 overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($products as $product)
                    <a href="{{ route('customerProductsShow', $product->id) }}" class="hover:shadow">
                        <div class="p-6 bg-pink-100 border-b border-gray-200">
                            <h1 class="text-xl font-bold text-gray-900">{{ $product->name }}</h1>
                            <p class="text-md text-gray-600">{{ $product->description }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
