<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('order') }}">
                <x-button class="mb-4">
                    {{ __('Order') }}
                </x-button>
            </a>
            <form action="{{ route('cartRemoveAll') }}" method="POST">
                @csrf
                @method('DELETE')
                <x-button class="mb-4">
                        {{ __('Remove all') }}
                </x-button>
            </form>
            @foreach($items as $item)
            <div class="bg-pink-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="float-left px-6 py-6 bg-pink-100 border-b border-gray-200 hover:shadow">
                    <h1 class="text-xl font-bold text-gray-900">{{ $item->name }}</h1>
                    <p class="text-md text-gray-600">€{{ $item->price }}</p>
                </div>
                <form class="flex justify-center py-3" action="{{ route('cartUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <span>
                        Quantity
                        <input type="number" name="quantity" value="{{ $item->quantity}}">
                    </span>
                </form>
                <form method="POST" class="float-right px-6 py-6" action="{{ route('cartRemoveItem', $item->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <x-button>Delete</x-button>
                </form>
            </div>
                <br>
            @endforeach
        </div>
    </div>
</x-app-layout>
