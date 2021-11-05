<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit shop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('adminShopsUpdate', $shop->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Name of shop</span>
                            </div>
                            <input required type="text" name="name" value="{{ $shop->name }}"/>
                        </div>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Description of shop</span>
                            </div>
                            <textarea required name="description" class="h-20">{{ $shop->description }}</textarea>
                        </div>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Image of shop (Max 2mb)</span>
                                <br>
                                <span class="input-group-text">Not uploading a image keeps the old image</span>
                                <img src="/storage/{{ $shop->image }}" alt="">
                            </div>
                            <input type="file" name="image">
                        </div>

                        <br>

                        <div class="input-group">
                            <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Update</button>
                            <a href="{{ route('adminShops') }}" class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Cancel</a>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('adminShopsDestroy', $shop->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
