<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-button class="mb-4">
                <a href="{{ route('adminProductsCreate') }}">
                    {{ __('Add product') }}
                </a>
            </x-button>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow">
                @foreach($products as $product)
                    <a href="{{ route('adminProductsEdit', $product->id) }}" class="hover:shadow">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h1 class="text-xl font-bold text-gray-900">{{ $product->name }}</h1>
                            <p class="text-md text-gray-600">{{ $product->description }}</p>
                            <form method="POST" class="flex justify-end" action="{{ route('adminProducts') . '/' . $product->id }}">
                                @csrf
                                @method('DELETE')
                                <x-button>Delete</x-button>
                            </form>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
