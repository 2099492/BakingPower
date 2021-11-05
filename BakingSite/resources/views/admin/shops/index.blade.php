<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shops') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-button class="mb-4">
                <a href="{{ route('adminShopsCreate') }}">
                    {{ __('Add shop') }}
                </a>
            </x-button>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($shops as $shop)
                    <a href="{{ route('adminShopsEdit', $shop->id)}}">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <img src="/storage/{{ $shop->image }}" class="float-left" style="width: 100px; height: 100px" alt="">
                            <h1 class="row text-xl font-bold text-gray-900">{{ $shop->name }}</h1>
                            <p class="row text-md text-gray-600">{{ $shop->description }}</p>
                            <div class="flex justify-end">
                                <form method="POST" action="{{ route('adminShopsDestroy', $shop->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <x-button>Delete</x-button>
                                </form>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
