<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow">
                @foreach($orders as $order)
                    <a href="{{ route('adminOrdersEdit', $order->id) }}">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h1 class="text-xl font-bold text-gray-900">{{ $order->customer_name }}</h1>
                            <h1>{{ $order->created_at }}</h1>
                            <h1>{{ $order->status }}</h1>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
