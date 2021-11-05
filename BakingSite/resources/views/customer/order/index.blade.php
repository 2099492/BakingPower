<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Total: €{{ $totalPrice }}</h1>
            <div class="bg-pink-100 overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($items as $item)
                    <a href="{{ route('customerProductsShow', $item->id) }}" class="hover:shadow">
                        <div class="p-6 bg-pink-100 border-b border-gray-200">
                            <h1 class="text-xl font-bold text-gray-900">{{ $item->name }}</h1>
                            <p class="text-md text-gray-600">€{{ $item->price }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <br>
            <a href="{{ route('orderForm') }}">
                <x-button>Order</x-button>
            </a>
        </div>
    </div>
</x-app-layout>
