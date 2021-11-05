<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('orderStore') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Your name</span>
                            </div>
                            <input required type="text" name="name">
                        </div>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Your full addres</span>
                            </div>
                            <input required type="text" name="address">
                        </div>

                        <br>

                        <div class="input-group">
                            <x-button>Order</x-button>
                            <a href="{{ route('home') }}"><x-button>Cancel</x-button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
