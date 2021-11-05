<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>{{ $order_and_product->status }}</h1>

                    <form method="POST" action="{{ route('adminOrdersUpdate', $order_and_product->id) }}">
                        @csrf
                        <input type="hidden" name="status" value="confirmed">
                        <x-button>Confirm</x-button>
                    </form>
                    <form method="POST" action="{{ route('adminOrdersUpdate', $order_and_product->id) }}">
                        @csrf
                        <input type="hidden" name="status" value="denied">
                        <x-button>Deny</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
